<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use LaravelLocalization;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post as MainModel;
use App\Models\PostMedia as MediaModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\PostTranslation as TransModel;
use App\Http\Requests\backend\PostRequest as ModuleRequest;
class PostController extends Controller
{
    use UploadAble, Functions;

    public function __construct()
    {
        $this->TblForignKey     = 'post_id';
        $this->ROUTE_PREFIX     = config('custom.route_prefix') . '.posts';
        $this->TRANSLATECOLUMNS = ['title', 'slug', 'description']; // Columns To be Trsanslated
        $this->TRANS            = 'post';
        $this->UPLOADFOLDER     = 'posts';
        $this->Tbl              = 'posts';
    
        // $this->middleware('permission:posts-list|posts-create|posts-edit|posts-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
   
    }
    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['allow_comments'] = isset($request->allow_comments) ? '1' : '0';
            $validated['image'] = !empty($request->file('image')) ? $this->uploadFile($request->file('image'), $this->UPLOADFOLDER) : null;
            $validated['user_id'] = $request->user_id;
            $query = MainModel::create($validated);
            $translatedArr = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS, [$this->TblForignKey => $query->id]);
            if (TransModel::insert($translatedArr)) {
                $query->categories()->sync((array) $request->input('category_id'));
                $query->tags()->sync((array) $request->input('tag_id'));
                $gallery = $request->file('gallery');
                if (!empty($gallery)) {
                    foreach ($gallery as $file) {
                        $fileUpload = $this->uploadFile($file, $this->UPLOADFOLDER);
                        MediaModel::create(['post_id' => $query->id, 'assigned_for' => 'gallery', 'file' => $fileUpload]);
                    }
                }
                $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function index(Request $request, $category_id = null)
    {
        if ($request->ajax()) {
            /*
    $model = MainModel::with([
        'tags' => function($query) {
            $query->select('id', 'name'); # Many to many
        },
        'images' => function($query) {
            $query->select('id', 'url', 'post_id'); # One to many
        },
        'user' => function($query) {
            $query->select('id', 'name'); # One to many
        }
    ])
    ->select(['id', 'title', 'content', 'user_id']);
     */
            $model = MainModel::with(['user', 'tags', 'categories'])->withCount('comments');
            if (!empty(request('tag_id'))) {
                $tag_id = request('tag_id');
                $model = $model->whereHas('tags', function ($qry) use ($tag_id) {
                    $qry->where('tags.id', $tag_id);
                });
            }
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' .
                        route($this->ROUTE_PREFIX . '.edit', $row->id) .
                        " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" .
                        $row->id .
                        "=\"item\">" .
                        Str::words($row->translate->title, '7') .
                        "</a><br>
                <span class=\"text-success fs-7 fw-bold\">" .
                        __('site.author') .
                        '</span><small> ' .
                        $row->user->name .
                        "</small>
                 |
                <span class=\"text-warning fs-7 fw-bold\">" .
                        __('comment.plural') .
                        '</span><a href=' .
                        route(config('custom.route_prefix') . '.comments.index', $row->id) .
                        '> (' .
                        ($row->comments_count ?? '0') .
                        ")</a>

                ";
                })
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row, $this->ROUTE_PREFIX . '.edit');
                })
                //////////////Category Search Filter Original Code////////////////////////
                ->filter(function ($instance) use ($request) {
                    if ($request->get('category_id')) {
                        $category_id = $request->get('category_id');
                        $instance->whereHas('categories', function ($q) use ($category_id) {
                            $q->where('id', $category_id);
                        });
                    }
                    ////////////////////Custom Search////////////////////////////////
                    if ($request->get('search')) {
                        $search = $request->get('search');
                        $instance->whereHas('translate', function ($q) use ($search) {
                            $q->where('title', 'LIKE', '%' . $search . '%');
                        });
                    }
                })
                //////////////////////////////////////////////////////////
                ->editColumn('categories', function (MainModel $row) {
                    $categories = '';
                    if (count($row->categories)) {
                        foreach ($row->categories as $value) {
                            $CClass = !empty(request('category_id')) && request('category_id') == $value->id ? 'badge badge-light-primary' : '';
                            $categories .= '<a href=' . route(config('custom.route_prefix') . '.categories.edit', $value->id) . " class=\"text-hover-success " . $CClass . "\" data-kt-item-filter" . $value->id . "=\"item\" title=" . $value->translate->title . '>' . $value->translate->title . '</a>, ';
                        }
                        $categories = substr($categories, 0, -2);
                    } else {
                        $categories = '<span aria-hidden="true">—</span>';
                    }
                    return $categories;
                })
                ->editColumn('tags', function (MainModel $row) use ($request) {
                    $tags = '';
                    if (count($row->tags)) {
                        foreach ($row->tags as $value) {
                            $TClass = $request->has('tag_id') && !empty($request->tag_id) && $request->tag_id == $value->id ? 'badge badge-light-primary' : '';
                            $tags .= '<a href=' . route(config('custom.route_prefix') . '.tags.edit', $value->id) . " class=\"text-hover-success " . $TClass . "\" data-kt-item-filter" . $value->id . "=\"item\" title=" . $value->translate->title . '>' . $value->translate->title . '</a>, ';
                        }
                        $tags = substr($tags, 0, -2);
                    } else {
                        $tags = '<span aria-hidden="true">—</span>';
                    }
                    return $tags;
                })
                ->editColumn('status', function (MainModel $row) {
                    return $this->dataTableGetStatus($row);
                })
                ->editColumn('created_at', function (MainModel $row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })
                ->rawColumns(['image', 'translate.title', 'user_id', 'tags', 'comments', 'categories', 'status', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.posts.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'categories'            => Category::tree(),
                'allrecords'            => MainModel::count(),
                'publishedCounter'      => MainModel::Status('1')->count(),
                'unpublishedCounter'    => MainModel::Status('0')->count(),
                'category_id'           => $category_id ?? '',
                'tag_id'                => $request->tag_id ?? '',
                // 'cat'                => ($request->has('category_id')) ? Category::findOrFail($category_id) : '',
            ];
            return view('backend.posts.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.posts.create')) {
            $compact = [
                'trans'        => $this->TRANS,
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'   => route($this->ROUTE_PREFIX . '.store'),
                'categories'   => Category::tree(),
                'tags'         => Tag::select('id')->get(),
                'authors'      => User::select('id', 'name')->get(),
            ];
            return view('backend.posts.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $post)
    {
        if ($request->ajax()) {
            $media = $post->media;
            $view = view('backend.posts.galleryload', compact('media'))->render();
            return response()->json(['html' => $view, 'counter' => $post->media->count()]);
        }
        if (view()->exists('backend.posts.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $post->id),
                'row'                     => $post,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($post, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $post->id),
                'trans'                   => $this->TRANS,
                'categories'              => Category::tree(),
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
                'tags'                    => Tag::select('id')->get(),
                'authors'                 => User::select('id', 'name')->get(),
            ];
            return view('backend.posts.edit', $compact);
        }
    }
    public function update(ModuleRequest $request, MainModel $post)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $image = $post->image;
            if (!empty($request->file('image'))) {
                $post->image && File::exists(public_path($post->image)) ? $this->unlinkFile($post->image) : '';
                $image = $this->uploadFile($request->file('image'), $this->UPLOADFOLDER);
            }
            if (isset($request->drop_image_checkBox) && $request->drop_image_checkBox == 1) {
                $this->unlinkFile($post->image);
                $image = null;
            }
            $gallery = $request->file('gallery');
            if (!empty($gallery)) {
                foreach ($gallery as $file) {
                    $fileUpload = $this->uploadFile($file, $this->UPLOADFOLDER);
                    MediaModel::create(['post_id' => $post->id, 'assigned_for' => 'gallery', 'file' => $fileUpload]);
                }
            }

            $validated['status']         = isset($request->status) ? '1' : '0';
            $validated['allow_comments'] = isset($request->allow_comments) ? '1' : '0';
            $validated['image']          = $image;
            $validated['user_id']        = $request->user_id;

            MainModel::findOrFail($post->id)->update($validated);
            $post->tags()->sync((array) $request->input('tag_id'));
            $post->categories()->sync((array) $request->input('category_id'));

            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $post->id]);
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $post)
    {
        foreach ($post->media()->get() as $media) {
            $this->unlinkFile($media->file); // Unlink Media
        }
        $post->media()->delete();
        $post->image ? $this->unlinkFile($post->image) : ''; // Unlink Image
        if ($post->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function delete_media_image(Request $request)
    {
        $id = $request->id;
        $file = MediaModel::select('id', 'file')
            ->where('id', $id)
            ->first();
        $this->unlinkFile($file->file);
        if (
            MediaModel::select('id', 'file')
                ->find($id)
                ->delete()
        ) {
            $cc = MainModel::withCount('media')
                ->where('id', $request->post_id)
                ->first();

            $arr = [
                'msg' => 'IMAGE DELETED SUCCESSFULLY',
                'status' => true,
                'div' => 'Div_' . $id,
                'counter' => $cc->media_count,
            ];
        } else {
            $arr = ['msg' => 'ERROR IMAGE DELETED ', 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroyMultiple(Request $request)
    {
        $ids = explode(',', $request->ids);
        foreach (MainModel::whereIn('id', $ids)->get() as $selectedItems) {
            $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Images
        }
        $items = MainModel::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function UpdateStatus(Request $request)
    {
        if (DB::table($request->table)->find($request->id)) {
            if (
                DB::table($request->table)
                    ->where('id', $request->id)
                    ->update(['status' => $request->status])
            ) {
                //$request->status == 1 ? $TRANS = 'site.been_status':$TRANS = 'site.been_unstatus';
                $arr = ['msg' => __('site.status_updated'), 'status' => true];
            } else {
                $arr = ['msg' => 'ERROR', 'status' => false];
            }
            return response()->json($arr);
        }
    }
}

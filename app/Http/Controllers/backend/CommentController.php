<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Comment as MainModel;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class CommentController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.comments';
        $this->TRANS        = 'comment';
        $this->Tbl          = 'comments';
    }
    public function index(Request $request, $post_id = null)
    {
        if ($request->ajax()) {
            $model = MainModel::with(['post', 'user']);
            $model->when(request('post_id'), function ($q) {
                return $q->where('post_id', request('post_id'));
            });
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('author', function (MainModel $row) {
                    $avatar = !empty($row->user->avatar) ? asset($row->user->avatar) : asset('assets/backend/media/avatars/blank.png');
                    return "<div class=\"d-flex align-items-center\">
                <div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">                    
                        <div class=\"symbol-label\">
                            <img src=" .
                        $avatar .
                        ' alt=' .
                        $row->user->name .
                        " class=\"w-100\" />
                        </div>                  
                </div>
                <div class=\"d-flex flex-column\">
                    <span class=\"text-gray-800 mb-1\">" .
                        $row->user->name .
                        "</span>
                    <span><a href=\"mailto:" .
                        $row->user->email .
                        "\">" .
                        $row->user->email .
                        "</a></span>
                </div>
            </div>";
                })
                ->editColumn('comment', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->comment, '10') . '</a>';
                })
                ->editColumn('post', function (MainModel $row) {
                    return '<a href=' . route(config('custom.route_prefix') . '.posts.edit', $row->post->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->post->translate->title, '10') . '</a>';
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('search')) {
                        $instance->where('comment', 'LIKE', '%' . $request->get('search') . '%');
                    }
                })
                ->editColumn('status', function (MainModel $row) {
                    if ($row->status == 'pending') {
                        $statusLabel = __('site.pending');
                        $class = 'primary';
                    } elseif ($row->status == 'approved') {
                        $statusLabel = __('site.approved');
                        $class = 'success';
                    } elseif ($row->status == 'spam') {
                        $statusLabel = __('site.spam');
                        $class = 'info';
                    } elseif ($row->status == 'rejected') {
                        $statusLabel = __('site.rejected');
                        $class = 'danger';
                    } else {
                        $statusLabel = '';
                    }
                    return "<div class=\"badge py-3 px-4 fs-7 badge-light-" . $class . "\">&nbsp;" . "<span class=\"text-" . $class . "\">" . $statusLabel . '</span></div>';
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
                ->rawColumns(['author', 'comment', 'post', 'status', 'created_at', 'created_at.display', 'actions'])
                ->make(true);
        }
        if (view()->exists('backend.comments.index')) {
            $approved = MainModel::Status('approved')->when($post_id, function ($q) use ($post_id) {
                return $q->where('post_id', $post_id);
            });
            $spam = MainModel::Status('spam')->when($post_id, function ($q) use ($post_id) {
                return $q->where('post_id', $post_id);
            });
            $pending = MainModel::Status('pending')->when($post_id, function ($q) use ($post_id) {
                return $q->where('post_id', $post_id);
            });
            $rejected = MainModel::Status('rejected')->when($post_id, function ($q) use ($post_id) {
                return $q->where('post_id', $post_id);
            });
            $allrecords = MainModel::when($post_id, function ($q) use ($post_id) {
                return $q->where('post_id', $post_id);
            });
            $compact = [
                'trans'                 => $this->TRANS,
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'            => $allrecords->count(),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'ChangeStatusRoute'     => route($this->ROUTE_PREFIX . '.changeStatus'),
                'approved'              => $approved->count(),
                'spam'                  => $spam->count(),
                'pending'               => $pending->count(),
                'rejected'              => $rejected->count(),
                'post_id'               => $post_id ?? '',
                'post'                  => $post_id ? Post::findOrFail($post_id) : '',
            ];
            return view('backend.comments.index', $compact);
        }
    }
    public function ChangeStatus(Request $request)
    {
        $ids = explode(',', $request->ids);
        if (MainModel::whereIn('id', $ids)->update(['status' => $request->status])) {
            $arr = ['msg' => __($this->TRANS . '.' . 'UpdateStatusMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => true];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $comment)
    {
        if ($comment->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function destroyMultiple(Request $request)
    {
        $ids = explode(',', $request->ids);
        $items = MainModel::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function edit($id)
    {
        $compact = [
            'trans'                  => $this->TRANS,
            'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $id),
            'row'                    => MainModel::findOrFail($id),
            'redirectRoute'          => route($this->ROUTE_PREFIX . '.edit', $id),
            'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $id),
        ];
        return view('backend.comments.edit', $compact);
    }

    public function update(Request $request, $id)
    {
        $data['status'] = isset($request->status) ? $request->status : $request->old_status;
        $data['comment'] = $request->comment;
        MainModel::findOrFail($id)->update($data);
        return redirect()
            ->route($this->ROUTE_PREFIX . '.edit', $id)
            ->with(['success' => trans($this->TRANS . '.' . 'updateMessageSuccess')]);
    }
}

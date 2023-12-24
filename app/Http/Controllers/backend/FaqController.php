<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use Illuminate\Support\Str;
use App\Traits\Functions;
use Illuminate\Http\Request;
use App\Models\Faq as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FaqTranslation as TransModel;
use App\Http\Requests\backend\FaqRequest as ModuleRequest;

class FaqController extends Controller
{
    use Functions;
    public function __construct()
    {

        $this->TblForignKey     = 'faq_id';
        $this->ROUTE_PREFIX     = config('custom.route_prefix') . '.faqs';
        $this->TRANSLATECOLUMNS = ['question', 'answer']; // Columns To be Trsanslated
        $this->TRANS            = 'faq';
        $this->Tbl              = 'faqs';
    }
    public function store(ModuleRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $id = DB::table($this->Tbl)->insertGetId([
                'id' => null,
            ]);
            $translatedArr = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS, [$this->TblForignKey => $id]);
            if (TransModel::insert($translatedArr)) {
                $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = MainModel::with([
                'translate' => function ($query) {
                    $query->select($this->TblForignKey, 'question', 'answer');
                },
            ])->select(['id', 'created_at']);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.question', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->translate->question, '20') . '</a>';
                })
                ->editColumn('translate.answer', function (MainModel $row) {
                    return "<div class=\"card-label\">" . Str::words($row->translate->answer, '20') . '</div>';
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
                ->rawColumns(['translate.question', 'translate.answer', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.faqs.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'allrecords'            => MainModel::count(),
            ];
            return view('backend.faqs.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.faqs.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.faqs.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $faq)
    {
        if (view()->exists('backend.faqs.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $faq->id),
                'row'                     => $faq,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($faq, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $faq->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.faqs.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, MainModel $faq)
    {
        $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $faq->id]);
        $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        return response()->json($arr);
    }

    public function destroy(MainModel $faq)
    {
        $faq->image ? $this->unlinkFile($faq->image) : ''; // Unlink Image
        if ($faq->delete()) {
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
}

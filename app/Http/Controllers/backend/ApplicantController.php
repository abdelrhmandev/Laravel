<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Applicant as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.applicants';
        $this->TRANS = 'applicant';
        $this->Tbl = 'applicants';
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = MainModel::with([
                'vacancy' => function ($query) {
                    $query->select('id', 'title'); # Many to many
                },
            ]);
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('name', function (MainModel $row) {
                    return "<div class=\"d-flex align-items-center\">                
                <div class=\"d-flex flex-column\">
                    <a href=" .
                        route($this->ROUTE_PREFIX . '.edit', $row->id) .
                        " class=\"text-gray-800 text-hover-primary mb-1\">" .
                        $row->name .
                        "</a>
                    <span><a href=\"mailto:" .
                        $row->email .
                        "\">" .
                        $row->email .
                        "</a></span>
                </div>
            </div>";
                })
                ->addColumn('vacancy', function (MainModel $row) {
                    return "<span class=\"text-dark fw-bold\">" . $row->vacancy->title . '</span>';
                })
                ->editColumn('file', function (MainModel $row) {
                    $icon = '<img src=' . asset('assets/backend/media/svg/files/' . \File::extension($row->file) . '.svg') . '>';
                    return '<a href=' . asset($row->file) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $icon . '</a>';
                })
                ->editColumn('status', function (MainModel $row) {
                    if ($row->status == 'pending') {
                        $statusLabel = __('site.pending');
                        $class = 'primary';
                    } elseif ($row->status == 'accepted') {
                        $statusLabel = __('site.accepted');
                        $class = 'success';
                    } elseif ($row->status == 'holded') {
                        $statusLabel = __('site.holded');
                        $class = 'warning';
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
                ->rawColumns(['name', 'vacancy', 'status', 'file', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.applicants.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'allrecords' => MainModel::count(),
                'publishedCounter' => MainModel::Status('1')->count(),
                'unpublishedCounter' => MainModel::Status('0')->count(),
            ];
            return view('backend.applicants.index', $compact);
        }
    }
    public function edit(Request $request, MainModel $applicant)
    {
        if (view()->exists('backend.applicants.edit')) {
            $compact = [
                'updateRoute' => route($this->ROUTE_PREFIX . '.update', $applicant->id),
                'row' => $applicant,
                'destroyRoute' => route($this->ROUTE_PREFIX . '.destroy', $applicant->id),
                'trans' => $this->TRANS,
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.applicants.edit', $compact);
        }
    }
    public function update(Request $request, MainModel $applicant)
    {
        $data['status'] = isset($request->status) ? $request->status : $request->old_status;
        MainModel::findOrFail($applicant->id)->update($data);
        $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
        return redirect()
            ->route($this->ROUTE_PREFIX . '.edit', $applicant->id)
            ->with(['success' => trans($this->TRANS . '.' . 'updateMessageSuccess')]);
    }
    public function destroy(MainModel $applicant)
    {
        if ($applicant->delete()) {
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

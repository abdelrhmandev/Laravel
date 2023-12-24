<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Contact as MainModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\Functions;
use DataTables;
class ContactController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.contacts';
        $this->TRANS        = 'contact';
        $this->Tbl          = 'contacts';
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = MainModel::select('id', 'name', 'email', 'subject', 'message', 'created_at');
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('name', function (MainModel $row) {
                    return "<div class=\"d-flex align-items-center\">
                            <div class=\"d-flex flex-column\">
                                <span class=\"text-gray-800 mb-1\">" .
                        $row->name .
                        "</span>
                                <span><a href=\"mailto:" .
                        $row->email .
                        "\">" .
                        $row->email .
                        "</a></span>
                            </div>
                        </div>";
                })
                ->editColumn('message', function (MainModel $row) {
                    return "<div class=\"d-flex align-items-center\">
                            <div class=\"d-flex flex-column\">
                                <span href=\"#\" class=\"text-gray-800 mb-2\">" .
                        $row->subject .
                        "</span>
                                <span>" .
                        $row->message .
                        "</span>
                             </div>
                         </div>";
                })
                ->editColumn('created_at', function (MainModel $row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX, 'hide_edit');
                })
                ->rawColumns(['created_at', 'created_at.display', 'actions'])
                ->make(true);
        }
        if (view()->exists('backend.contacts.index')) {
            $compact = [
                'trans'                => $this->TRANS,
                'listingRoute'         => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
            ];
            return view('backend.contacts.index', $compact);
        }
    }

    public function destroy($id)
    {
        if (
            MainModel::select('id')
                ->find($id)
                ->delete()
        ) {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function destroyMultiple(Request $request)
    {
        $ids   = explode(',', $request->ids);
        $items = MainModel::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
}

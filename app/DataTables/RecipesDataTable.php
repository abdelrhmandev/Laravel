<?php
namespace App\DataTables;
use App\Models\Recipe;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RecipesDatatable extends DataTable
{



	public function dataTable($query) {

 
		return datatables($query)

 

 

	   
			->rawColumns([
				'checkbox',
				'edit',
				'delete',
			]);
	}

  public function query(){
        return Recipe::latest();
    }
	
///////////
	public function html() {
		return $this->builder()
		
				->columns($this->getColumns())
				->minifiedAjax()
				->parameters([
				"pagingType"=>'full_numbers',

	            "dom" => "
	            <'row'
	            <'col-md-3'<fl>>			
	            <'col-md-9'
	            <'col-md-10'B> >r>
	            <'table-scrollable't>
	            <'row'
	            <'col-md-6 col-sm-12'pi>
	            >", // datatable layout
	            
				'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
				'buttons'    => [
					['extend' => 'print', 'className' => '', 'text' => '<i class="kt-nav__link-icon la la-print"></i>'. trans('admin.print')],
					['extend' => 'csv', 'className' => '', 'text' => '<i class="kt-nav__link-icon la la-file-text-o"></i>'. trans('admin.ex_csv')],
					['extend' => 'excel', 'className' => '', 'text' => '<i class="kt-nav__link-icon la la-file-excel-o"></i>'. trans('admin.ex_excel')],
					['extend' => 'pdf', 'className' => '', 'text' => '<i class="kt-nav__link-icon la la-file-pdf-o"></i>'. trans('admin.ex_pdf')],					
					['text' => '<i class="fa fa-trash"></i>'. trans('crud.delete'), 'className' => 'btn btn-danger delBtn'],
					],

					
			 

			]);
	}

/////////////	
	

    /**
     * Get columns.
     *
     * @return array
     */

	protected function getColumns() {
		return [
			[
				'title'          => '<div id="general"><i><span class="counter"></span></i></div><label class="kt-checkbox kt-checkbox--single kt-checkbox--solid"><input type="checkbox" class="check_all" onclick="check_all()" /><span></span></label>',
				'data'           => 'checkbox',
				'name'           => 'checkbox',
				'orderable'      => false,
				'searchable'     => false,
				'exportable'     => false,
				'printable'      => true,
				'width'          => '2%',				
			],[
				'name'  => 'published',
				'data'  => 'published',
				'title' => '#',
				'width'	=>  '5%',				
			 	'title' => trans('country.title')
			] 

		];
	}

	
	
  
}

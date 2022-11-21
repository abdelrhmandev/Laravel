<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait DatatableLang
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
 
        function datatable_lang() {
            return ['sProcessing' => trans('datatable.sProcessing'),
                'sLengthMenu'        => trans('datatable.sLengthMenu'),
                'sZeroRecords'       => trans('datatable.sZeroRecords'),
                'sEmptyTable'        => trans('datatable.sEmptyTable'),
                'sInfo'              => trans('datatable.sInfo'),
                'sInfoEmpty'         => trans('datatable.sInfoEmpty'),
                'sInfoFiltered'      => trans('datatable.sInfoFiltered'),
                'sInfoPostFix'       => trans('datatable.sInfoPostFix'),
                'sSearch'            => trans('datatable.sSearch'),
                'sUrl'               => trans('datatable.sUrl'),
                'sInfoThousands'     => trans('datatable.sInfoThousands'),
                'sLoadingRecords'    => trans('datatable.sLoadingRecords'),
                'oPaginate'          => [
                    'sFirst'            => trans('datatable.sFirst'),
                    'sLast'             => trans('datatable.sLast'),
                    'sNext'             => trans('datatable.sNext'),
                    'sPrevious'         => trans('datatable.sPrevious'),
                ],
                'oAria'            => [
                    'sSortAscending'  => trans('datatable.sSortAscending'),
                    'sSortDescending' => trans('datatable.sSortDescending'),
                ],
            ];
      
    }
}

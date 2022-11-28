<?php
namespace App\Traits;
use Illuminate\Support\Str;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait Functions
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function str_split(string $str, int $len = 1)
    {
        $arr		= [];
        $length 	= mb_strlen($str, 'UTF-8');    
        for ($i = 0; $i < $length; $i += $len) {    
            $arr[] = mb_substr($str, $i, $len, 'UTF-8');    
        }    
        return $arr[0];
    }

 
}

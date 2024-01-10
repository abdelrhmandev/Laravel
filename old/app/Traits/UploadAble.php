<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\UploadedFile;

trait UploadAble
{
     public function uploadFile($uploadedFile, $folder)
    {    
            $extension = $uploadedFile->getClientOriginalExtension();            
            $fileNameToStore =  Str::random(25) . "." . $extension;
            $uploadedFile->move(public_path('uploads/'.$folder), $fileNameToStore);
            $database_file = 'uploads/'.$folder.'/'.$fileNameToStore;
            return $database_file;
    } 
    public function unlinkFile($FileUrl){

        $FilePath = public_path($FileUrl); // public folder
        if (File::exists($FilePath)) {
            unlink($FilePath);            
        }
        return true;
    }
    

}

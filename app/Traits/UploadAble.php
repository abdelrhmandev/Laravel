<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait UploadAble
{


    // public function uploadOne($reqqqquest, $folder)
    // {

    //      $imageName = time().'.'.$request->image->extension();

    //     // Public Folder
    //     $request->image->move(public_path('uploads/categories'), $imageName);

    // }

    
 /**/
     public function uploadFile($uploadedFile, $folder)
    {    
    

 

            $extension = $uploadedFile->getClientOriginalExtension();            
            $fileNameToStore =  Str::random(25) . "." . $extension;
            $uploadedFile->move(public_path('uploads/'.$folder), $fileNameToStore);
            $database_file = 'uploads/'.$folder.'/'.$fileNameToStore;
            return $database_file;
      
 
    } 

}

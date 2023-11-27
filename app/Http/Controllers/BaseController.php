<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\FlashMessages;
use App\Traits\Functions; 

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    use FlashMessages,Functions;

    protected $data = null;
    /*
    protected function setPageTitle($title, $subTitle){
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    protected function showErrorPage($errorCode = 404, $message = null){
        $data['message'] = $message;
        return response()->view('errors.'.$errorCode, $data, $errorCode);
    }
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null){
        return response()->json([
            'error'         =>  $error,
            'response_code' => $responseCode,
            'message'       => $message,
            'data'          =>  $data
        ]);
    }
    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false){
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();
        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }
        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false){
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();
        return redirect()->back();
    }*/

        public function UpdateStatus(Request $request){               
        return $this->dataTableUpdateStatus($request);
    }

}

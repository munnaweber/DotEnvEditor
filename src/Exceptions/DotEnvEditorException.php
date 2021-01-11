<?php 
namespace Munna\DotEnvEditor\Exceptions;
use Exception;

class DotEnvEditorException extends Exception{

    public $message;

    public function __construct($message){
        $this->message = $message;
    }

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json(['status' => false, 'message' => $this->message]);
    }
}
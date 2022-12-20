<?php
class ErrorPageController{

    public function __construct(){}

    public static function view($message = "Something went wrong"){
        print TemplateEngine::template('./views/error/404.php', array( 'message' => $message ));
    }
}

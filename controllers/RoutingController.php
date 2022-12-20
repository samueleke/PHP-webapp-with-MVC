<?php
include_once './controllers/StudentController.php';
include_once './controllers/SchoolController.php';
include_once './controllers/ErrorPageController.php';
include_once './controllers/AdminController.php';
include_once './controllers/SignupController.php';
include_once './controllers/LoginController.php';
include_once './controllers/LogoutController.php';
class RoutingController
{
    public static StudentController $student_controller;
    public static AdminController $admin_controller;
    public static SchoolController $school_controller;
    public static LoginController $login_controller;
    public static LogoutController $logout_controller;

    public static SignupController $signup_controller;
    public function __construct()
    {
    }
    public static function getRouteHandler()
    {
        $req = $_SERVER['REQUEST_URI'];
        // var_dump($req);
        $req_array = explode('/', $req);
        // var_dump($req_array);
        array_shift($req_array);
        // var_dump($req_array);

        $pos = 0;
        // var_dump($req_array[$pos]);

        switch ($req_array[$pos]) {
            case 'register':
                self::$signup_controller = new SignupController();
                self::$signup_controller->signUp();
                break;

            case 'login':
                self::$login_controller = new LoginController();
                self::$login_controller->login();
                break;

            case 'logout':
                self::$logout_controller = new LogoutController();
                self::$logout_controller->logout();
                break;

            case 'reset-password':
                self::$login_controller = new LoginController();
                self::$login_controller->resetPassword();
                break;
            case 'admin':
                self:: $admin_controller= new AdminController();
                self:: $admin_controller->view();
                break;
            case 'student':
                //  || !isset($_SESSION["csapatNev"])
                // var_dump($_COOKIE);
                if (!isset($_COOKIE["csapatNev"])) {
                    session_destroy();
                    header("Location: /login");
                    exit();
                }
                // var_dump($_COOKIE);
                // die();
                self::$student_controller = new StudentController();
                self::$school_controller = new SchoolController();
                $pos++;
                // var_dump($req_array);
                if (array_key_exists($pos, $req_array)) {

                    $path = strtok($req_array[$pos], '?');
                    // var_dump($path);
                    switch ($path) {
                        case 'add-student':
                            self::$student_controller->addStudent();
                            break;

                        case 'altalanos-informaciok':
                            self ::$student_controller->altalanosInformaciok();
                            break;
                        default:
                            http_response_code(404);
                            ErrorPageController::view("Invalid URL!");
                            break;
                    }
                } else {

                    self::$student_controller->view();
                }
                break;
            default:
                http_response_code(404);
                ErrorPageController::view("Invalid URL!");
                break;
        }
    }
}

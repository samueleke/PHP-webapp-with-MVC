<?php
include_once './helpers/StudentHelper.php';
include_once './helpers/SignupHelper.php';
include_once './helpers/LoginHelper.php';

class LoginController
{
    private DBConfiguration $db;
    private StudentHelper $student_helper;
    private SignupHelper $signup_helper;
    private LoginHelper $login_helper;

    function __construct()
    {
        $this->db = new DBConfiguration();
        $this->student_helper = new StudentHelper($this->db);
        $this->signup_helper = new SignupHelper($this->db);
        $this->login_helper = new LoginHelper($this->db);
    }

    public function login()
    {

        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && $this->signup_helper->isImputEmpty(
                array(
                    $_POST['csapatNev'],
                    $_POST['password'],
                )
            )
        ) {

            $user_name = $_POST['csapatNev'];
            $password = $_POST['password'];

            $user = $this->login_helper->verifyUser($user_name, $password);
            if (!$user) {
                echo "Helytelen jelszó!";
            } else {
                setcookie('csapatNev', $user->get_username(), time() + 3600);
                if ($user_name == "admin") {
                    echo "admin";
                } else {
                    echo "student";
                }
            }
        } else {
            print TemplateEngine::template('./views/student/login.php');
        }
    }

    public function resetPassword()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && $this->signup_helper->isImputEmpty(
                array(
                    $_POST['email']
                )
            )
        ) {
            $email = $_POST['email'];
            $user = $this->student_helper->studentExists($email);
            if ($user) {
                $newPassword = $this->login_helper->randomPassword(10);
                $updatedPassword = $this->login_helper->updatePassword($email, $newPassword);

                if (empty($updatedPassword)) {
                    $this->student_helper->sendEmail($email, "Elfelejtett jelszó", "Az Ön új jelszava: $newPassword");
                    $emails = $this->login_helper->getEmails($email);
                    foreach ($emails as $mail) {
                        $this->student_helper->sendEmail($mail["EmailCim"], "Elfelejtett jelszó", "Az Ön új jelszava: $newPassword");
                    }
                }
            }
        } else {
            print TemplateEngine::template('./views/student/reset.php');
        }
    }

    public function view()
    {
        print TemplateEngine::template('./views/student/login.php');
    }
}

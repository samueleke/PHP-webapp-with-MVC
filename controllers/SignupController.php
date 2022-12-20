<?php


include_once './helpers/SignupHelper.php';
class SignupController
{

    private DbConfiguration $db;
    private SignupHelper $signup_helper;
    private StudentHelper $student_helper;

    public function __construct()
    {
        $this->db = new DBConfiguration();
        $this->signup_helper = new SignupHelper($this->db);
        $this->student_helper = new StudentHelper($this->db);

    }


    public function signUp()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && $this->signup_helper->isImputEmpty(
                array(
                    $_POST['VNev'],
                    $_POST['KNev'],
                    $_POST['csapatNev'],
                    $_POST['telefonszam'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['repeatPassword']
                )
            )
        ) {
            $v_nev = $_POST['VNev'];
            $k_nev = $_POST['KNev'];
            $email = $_POST['email'];
            $tel_num = $_POST['telefonszam'];
            $csapat_nev = $_POST['csapatNev'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['repeatPassword'];
            $user_count = $this->signup_helper->isUserEmailExists($email);
            $passwordMatch = $this->signup_helper->isPasswordMatch($password, $passwordRepeat);
            $strong_password = $this->signup_helper->checkPassword($password);


            //if every input is correct
            if ($passwordMatch && !$strong_password["error"]) {
                if (!$user_count) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $res = $this->signup_helper->addTeacher($email, $tel_num, $v_nev, $k_nev, $csapat_nev, $hashedPassword);
                    $message = "Sikeresen regisztráltad a " . $csapat_nev . " nevű csapatot!";
                    $this->student_helper->sendEmail($email, '', $message);
                    if (empty($res[0])) {
                        header("Location: /login");
                        exit();
                    }
                } else {
                    echo "Csapat már létezik!";
                }
            } else {
                if(!$passwordMatch){
                    echo "Jelszavak nem eggyeznek!";
                    die;
                }
                echo $strong_password["msg"];
            }
        } else {
            print TemplateEngine::template('./views/student/register.php', array('visibility' => 'visible'));
        }
    }

    public function view()
    {
        print TemplateEngine::template('./views/student/register.php');
    }
}

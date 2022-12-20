<?php
include_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
// require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';

include_once "./models/Student.php";
include_once "./models/Teacher.php";

class StudentHelper
{
    private DBConfiguration $db;

    public function __construct(DBConfiguration $db)
    {
        $this->db = $db;
    }

    public function addStudent($VNev, $KNev, $EmailCim, $Telefonszam, $Evfolyam, $Evszam, $Csapatnev)
    {
        $sql = "INSERT INTO diak VALUES(:VNev,:KNev,:EmailCim,:Telefonszam,:Evfolyam,:Evszam,:Csapatnev)";
        $sql_school = "INSERT INTO csapat ";
        if ($VNev && $KNev && $EmailCim && $Telefonszam && $Evfolyam && $Evszam && $Csapatnev) {
            return $this->db->execute($sql, array(
                'VNev' => $VNev,
                'KNev' => $KNev,
                'EmailCim' => $EmailCim,
                'Telefonszam' => $Telefonszam,
                'Evfolyam' => $Evfolyam,
                'Evszam'=>$Evszam,
                'Csapatnev' => $Csapatnev
            ))->fetchAll();
        }
    }

    public function countStudents(){
        $sql = "SELECT COUNT(*) FROM diak";
        return $this->db->execute($sql)->fetch();
    }

    public function studentExists($user_email)
    {
        $sql =
            "SELECT * 
        FROM `diak`
        WHERE `EmailCim` = '" . $user_email . "' ";
        return $this->db->execute($sql)->fetch();
    }

    public function sendEmail($email,$subject,$message){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USERNAME'];
        $mail->Password = $_ENV['EMAIL_PWD'];
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($_ENV['EMAIL_USERNAME']);

        $mail->addAddress($email);   

        $mail->isHtml(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    }

    public function getStudents()
    {
        $sql = "SELECT * FROM diak";
        $student_arr = $this->db->execute($sql)->fetchAll();
        $students = [];

        foreach ($student_arr as $student) {
            $students[] = new Student($student["VNev"], $student["KNev"], $student["EmailCim"],$student["CsapatNev"]);
        }
        return $students;
    }

    public function getIranyitoTanar()
    {
        $sql = "SELECT * FROM iranyitotanar";
        $tanar_arr = $this->db->execute($sql)->fetchAll();
        $tanarok = [];

        foreach ($tanar_arr as $tanar) {
            $tanarok[] = new Teacher($tanar["VNev"], $tanar["KNev"], $tanar["EmailCim"], $tanar["CsapatNev"]);
        }
        return $tanarok;
    }


}

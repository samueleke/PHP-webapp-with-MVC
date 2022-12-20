<?php

class SignupHelper
{
    private DBConfiguration $db;

    public function __construct(DBConfiguration $db)
    {
        $this->db = $db;
    }
    private function addGroup($csNev, $password, $regDate, $iskolaID)
    {
        $sql = "INSERT INTO Csapat VALUES(:CsapatNev,:IskolaID,:Jelszo,:RegisztracioIdopont)";
        if ($csNev && $password && $regDate && $iskolaID) {
            return $this->db->execute($sql, array(
                'CsapatNev' => $csNev,
                'IskolaID' => $iskolaID,
                'Jelszo' => $password,
                'RegisztracioIdopont' => $regDate
            ));
        }
    }

    public function addTeacher($email, $telNum, $VNev, $KNev, $csNev, $jelszo)
    {
        $sql = "INSERT INTO iranyitotanar VALUES(:EmailCim, :Telefonszam, :VNev, :KNev, :CsapatNev)";
        $sql1 = "INSERT INTO csapat (CsapatNev, Jelszo, RegisztraciosIdopont) VALUES(:CsapatNev,:Jelszo,:RegisztraciosIdopont)";

        if ($email && $telNum && $VNev && $KNev && $csNev && $jelszo) {
            $inserted_teacher_password = $this->db->execute($sql1, array(
                'CsapatNev' => $csNev,
                'Jelszo' => $jelszo,
                'RegisztraciosIdopont' => date('Y-m-d')
            ))->fetchAll();
            $inserted_teacher = $this->db->execute($sql, array(
                'EmailCim' => $email,
                'Telefonszam' => $telNum,
                'VNev' => $VNev,
                'KNev' => $KNev,
                'CsapatNev' => $csNev
            ))->fetchAll();

            return array($inserted_teacher, $inserted_teacher_password);
        }
    }
    public function isUserEmailExists($user_email)
    {
        $sql =
            "SELECT * 
        FROM `iranyitotanar`
        WHERE `EmailCim` = '" . $user_email . "' ";
        return $this->db->execute($sql)->fetch();
    }

    public function isEmailValid($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function isPasswordMatch($password, $passwordRepeat)
    {
        if ($password == $passwordRepeat) {
            return true;
        }
        return false;
    }

    public function checkPassword($pwd)
    {
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pwd)) {
            return array(
                "error" => true,
                "msg" => "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character."
            );
        } else {
            return array(
                "error" => false,
                "msg" =>"Your password is strong."
            );
        }
    }

    public function isImputEmpty($array)
    {
        foreach ($array as $value) {
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }
}

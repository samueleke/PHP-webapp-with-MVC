<?php
include_once './models/Login.php';
class LoginHelper
{
    private DBConfiguration $db;
    public function __construct(DBConfiguration $db)
    {
        $this->db = $db;
    }

    public function verifyUser($csapat_nev, $password)
    {
        $sql = "SELECT * FROM `csapat`
    WHERE CsapatNev = '" . $csapat_nev . "' 
    ";

        $response = $this->db->execute($sql)->fetchAll();
        if ($response) {
            $result = new Login($response[0]['CsapatNev'], $response[0]['Jelszo']);
        }
        if (password_verify($password, preg_replace('/^.$/', "'", $result->get_password()))) {
            return $result;
        }

        return false;
    }

    public function randomPassword(
        $length,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ) {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    public function updatePassword($email, $password)
    {
        $sql_csapatnev = "SELECT Csapatnev FROM iranyitotanar WHERE EmailCim = '" . $email . "' ";
        $csapatnev = $this->db->execute($sql_csapatnev)->fetch();
        if ($csapatnev["Csapatnev"]) {
            $sql = "UPDATE csapat SET Jelszo = :jelszo WHERE Csapatnev = :csapatNev";
            return $this->db->execute($sql, array(
                "jelszo" => password_hash($password, PASSWORD_DEFAULT),
                "csapatNev" => $csapatnev["Csapatnev"]
            ))->fetchAll();
        }
        echo "222";
        return false;
    }

    public function getEmails($email)
    {
        $sql_csapatnev = "SELECT CsapatNev FROM iranyitotanar WHERE EmailCim = '" . $email . "' ";
        $csapatnev = $this->db->execute($sql_csapatnev)->fetch();
        // var_dump($csapatnev);
        if ($csapatnev) {
            $sql = "SELECT EmailCim FROM diak WHERE Csapatnev = '" . $csapatnev["CsapatNev"] . "' ";
             return $this->db->execute($sql)->fetchAll();
        }
    }
}

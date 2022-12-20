<?php

class Teacher
{
    private $VNev;
    private $kNev;
    private $password;
    private $passwordRepeat;
    private $email;
    private $csapatNev;


    function __construct($VNev, $KNev, $email, $csapatNev)
    {
        $this->VNev = $VNev;
        $this->KNev = $KNev;
        $this->email = $email;
        $this->csapatNev = $csapatNev;
    }

    public function getVNev()
    {
        return $this->VNev;
    }

    public function getKNev()
    {
        return $this->KNev;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCsapatNev()
    {
        return $this->csapatNev;
    }
}

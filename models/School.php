<?php


class School{
    private $nev;
    private $id;
    private $telepules;
    private $telefonszam;
    private $email_cim;

    public function __construct($nev,$telepules,$id,$telefonszam,$email_cim){
        $this->id = $id;
        $this->nev = $nev;
        $this->telepules = $telepules;
        $this->telefonszam = $telefonszam;
        $this->email_cim = $email_cim;
    }

    public function getId(){
        return $this->id;
    }
    public function getNev()
    {
        return $this->nev;
    }

    public function getTelepules()
    {
        return $this->telepules;
    }

    public function getTelefonszam()
    {
        return $this->telefonszam;
    }
    public function getEmail()
    {
        return $this->email_cim;
    }
}

?>
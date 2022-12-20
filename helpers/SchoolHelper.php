<?php
include_once '../utils/DBConfiguration.php';
class SchoolHelper{
    private DBConfiguration $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    const GET_ALL_SCHOOLS = "SELECT * FROM `iskola`";

    public function getSchools(){
        $sql = self::GET_ALL_SCHOOLS;
        $school_arr = $this->db->execute($sql)->fetchAll();
        $schools = [];

        foreach($school_arr as $school){
            $schools[] = new School($school['IskolaNev'],$school['Telepules'],$school['IskolaID'],$school['Telefonszam'],$school['EmailCim']);
        }
        return $schools;
    }

 
}

?>
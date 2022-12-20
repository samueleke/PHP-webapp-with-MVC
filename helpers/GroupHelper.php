<?php
include_once '../utils/DBConfiguration.php';
include_once "./models/Group.php";


class GroupHelper
{
    private DBConfiguration $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    const CREATE_GROUP_TABLE = 'CREATE TABLE IF NOT EXISTS Csapat
                                Nev VARCHAR(255) PRIMARY KEY,
                                Jelszo VARCHAR(255) NOT NULL,
                                RegisztracioIdopont date NOT NULL';

    public function getGroups()
    {
        $sql = "SELECT * FROM csapat";
        $group_arr =  $this->db->execute($sql)->fetchAll();
        $groups = [];

        foreach ($group_arr as $group) {
            $groups[] = new Group($group["CsapatNev"],$group["IskolaID"]);
        }
        return $groups;
    }
}

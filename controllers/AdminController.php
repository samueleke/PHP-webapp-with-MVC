<?php
include_once './helpers/StudentHelper.php';
include_once './helpers/SchoolHelper.php';
include_once './helpers/GroupHelper.php';


class AdminController{
    private DBConfiguration $db;
    private StudentHelper $student_helper;
    private SchoolHelper $schoolHelper;
    private GroupHelper $group_helper;

    public function __construct()
    {
        $this->db = new DbConfiguration();
        $this->student_helper = new StudentHelper($this->db);
        $this->schoolHelper = new SchoolHelper($this->db);
        $this->group_helper = new GroupHelper($this->db);
    }

  
    public function view(){
        
        print TemplateEngine::template('./views/admin/admin.php', array(
            "csapat" => $this->group_helper->getGroups(),
            "diakok" => $this->student_helper->getStudents(),
            "iranyitoTanar" => $this->student_helper->getIranyitoTanar(),
            "iskola" =>$this->schoolHelper->getSchools()
        ));
    }
}

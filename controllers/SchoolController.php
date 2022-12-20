<?php
include_once './helpers/SchoolHelper.php';
class SchoolController {
    private SchoolHelper $schoolHelper;
    private DBConfiguration $db;

    public function __construct()    
    {
        $this->db = new DbConfiguration();
        $this->schoolHelper = new SchoolHelper($this->db);
    }

    public function view(){
        $schools = $this->schoolHelper->getSchools();

        print TemplateEngine::template('./views/student/sign-up-form.php',array("schools"=>$schools));
    }
}

?>
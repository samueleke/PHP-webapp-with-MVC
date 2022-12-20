<?php

class StudentController
{
    private DBConfiguration $db;
    private SignupHelper $signup_helper;
    private StudentHelper $student_helper;
    private SchoolHelper $schoolHelper;


    public function __construct()
    {
        $this->db = new DbConfiguration();
        $this->signup_helper = new SignupHelper($this->db);
        $this->student_helper = new StudentHelper($this->db);
        $this->schoolHelper = new SchoolHelper($this->db);
    }

    public function addStudent()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && $this->signup_helper->isImputEmpty(
                array(
                    $_POST["csname"],
                    $_POST["kname"],
                    $_POST["email"],
                    $_POST["telefonszam"],
                    $_POST["city"],
                    $_POST["county"],
                    $_POST["post_code"],
                    $_POST["group"],
                    $_POST["IskolaNev"],
                )
            )
        ) {

            $csname = $_POST["csname"];
            $kname = $_POST["kname"];
            $email = $_POST["email"];
            $telefonszam = $_POST["telefonszam"];
            $city = $_POST["city"];
            $county = $_POST["county"];
            $post_code = $_POST["post_code"];
            $group = $_POST["group"];
            $IskolaNev = $_POST["IskolaNev"];
            $csapatNev = $_COOKIE["csapatNev"];
            $user = $this->student_helper->studentExists($email);
            $user_count = $this->student_helper->countStudents();

            // var_dump($user_count["COUNT(*)"]);
            if ($user_count["COUNT(*)"] == 3) {
                echo "A csapat megtelt!";
                setcookie("diakSzam",true, time() + 3600);
               
            } else {
                //ha nem letezik
                if (!$user) {
                    $student = $this->student_helper->addStudent(
                        $csname,
                        $kname,
                        $email,
                        $telefonszam,
                        $group,
                        date('Y'),
                        $csapatNev
                    );
                    $message = "Sikeresen regisztráltál a " . $csapatNev . " nevű csoportba!";
                    $this->student_helper->sendEmail($email,'',$message);
                }else{
                    echo "Diák már letezik!";
                }            
            }
        } else {
            $schools = $this->schoolHelper->getSchools();

            print TemplateEngine::template('./views/student/sign-up-form.php', array('schools' => $schools));
        }
    }

    public function view()
    {
        $msg = 'hello';
        print TemplateEngine::template('./views/student/list.php', array('message' => $msg));
    }

    public function altalanosInformaciok(){
        session_start();
        $message = '';
        if(isset($_POST["uploadBtn"]) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK){
                $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
                $fileName = $_FILES['fileToUpload']['name'];
                $fileSize = $_FILES['fileToUpload']['size'];
                $fileType = $_FILES['fileToUpload']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // directory in which the uploaded file will be moved 
                    $uploadFileDir = './assets/Upload/';
                    $dest_path = $uploadFileDir . $newFileName;
                    
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        //beszuras adatbazisba
                        $message = 'File is successfully uploaded.';
                    } else {
                        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                    }
                } else {
                    $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }else{ {
                    $message = 'There is some error in the file upload. Please check the following error.<br>';
                    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
                }
            }
            $_SESSION['message'] = $message;
            header("Location: /student/altalanos-informaciok");
        }else{
            print TemplateEngine::template('./views/student/altalanos-info.php');
        }
    }
}

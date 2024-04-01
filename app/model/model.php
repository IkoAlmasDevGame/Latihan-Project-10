<?php 
namespace model;

class Auth {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function AuthLogin($userMail, $password){
        $userMail = htmlspecialchars($_POST["userMail"]);
        $password = htmlspecialchars($_POST["password"]);
        password_verify($password, PASSWORD_DEFAULT);
        $date = Date('Y-m-d H:i:s a');

        if($userMail == "" || $password == ""){
            header("location:../auth/index.php");
            exit(0);
        }

        $table = "tb_user";
        $sql = "SELECT * FROM $table WHERE email = ? and password = ? || username='$userMail' and password='$password'";
        $dbAuth = $this->db->prepare($sql);
        $dbAuth->execute(array($userMail,$password));
        $cek = $dbAuth->rowCount();

        if($cek > 0){
            $b = array($userMail,$password,$date);
            $response[$table] = $b;
            if($row = $dbAuth->fetch()){
                if($row["user_level"] == "Admin"){
                    $_SESSION["id"] = $row["id_user"];
                    $_SESSION["email_pengguna"] = $row["email"];
                    $_SESSION["nama_pengguna"] = $row["nama"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["user_level"] = "Admin";
                    $_SESSION["created_At"] = $row["created_At"];
                    $_SESSION["created_End"] = $date;
                    header("location:../ui/header.php?page=beranda&nama=".$_SESSION["nama_pengguna"]);
                }
                $_SESSION["status"] = true;
                array_push($response[$table], $row);
                $this->db->prepare("UPDATE $table SET created_End = ? WHERE username='$userMail'")->execute(array($date));
                $this->db->prepare("UPDATE $table SET created_End = ? WHERE email='$userMail'")->execute(array($date));
                exit(0);
            }else{
                $_SESSION["status"] = false;
                header("location:../auth/index.php");
                exit(0);                
            }
        }
    }
}

class pendaftaran {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function AuthPendaftaran(){
        
    }
}

class Account {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function AuthAccount(){
        
    }
}

?>
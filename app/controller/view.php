<?php 
namespace view;

use model\Auth;
class ViewAuth{
    protected $konfig;
    public function __construct($db)
    {
        $this->konfig = new Auth($db);
    }

    public function Login(){
        session_start();
        $userMail = htmlspecialchars($_POST["userMail"]) ? htmlentities($_POST["userMail"]) : $_POST["userMail"];
        $password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : $_POST["password"];
        password_verify($password, PASSWORD_DEFAULT);
        $this->konfig->AuthLogin($userMail,$password);
    }
}

use model\pendaftaran;
class ViewPendaftaran {
    protected $konfig;
    public function __construct($db)
    {
        $this->konfig = new pendaftaran($db);
    }

}

use model\Account;
class ViewAccount {
    protected $konfig;
    public function __construct($db)
    {
        $this->konfig = new Account($db);
    }

}

?>
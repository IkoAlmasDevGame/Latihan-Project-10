<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashoard Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php 
            session_start();
            require_once("../../../config/auth.php");
            require_once("../../../config/config.php");
            require_once("../../../controller/view.php");
            require_once("../../../model/model.php");

            $viewAuth = new view\ViewAuth($configs);
            $viewAccount = new view\ViewPendaftaran($configs);
            $viewAccount = new view\ViewAccount($configs);

            if(!isset($_GET["aksi"])){
                require_once("../dashboard/index.php");
            }else{
                switch ($_GET["aksi"]) {
                    case 'logout':
                        $created_end = Date("Y-m-d H:i:s a");
                        $table = "tb_user";
                        $sql = "UPDATE $table SET created_End = ? WHERE nama = ?";
                        $row = $configs->prepare($sql);
                        $row->execute(array($created_end, $_SESSION['nama_pengguna']));
                        if(isset($_SESSION['status'])){
                            unset($_SESSION['status']);
                            session_unset();
                            session_destroy();
                            $_SESSION = array();
                        }
                        header("location:../auth/index.php");
                        exit(0);
                    break;
                    
                    default:
                        require_once("../dashboard/index.php");
                        break;
                }
            }

            if(!isset($_GET["page"])){
                require_once("../dashboard/index.php");
            }else{
                switch ($_GET["page"]) {
                    case 'beranda':
                        require_once("../dashboard/index.php");
                        break;

                    case 'siswa-pendaftaran':
                        require_once("../siswa/siswa.php");
                        break;
                        
                    case 'lihat-pendaftaran':
                        require_once("../siswa/index.php");
                        break;
                        
                    case 'edit':
                        require_once("../settings/index.php");
                        break;
                    
                    default:
                        require_once("../dashboard/index.php");
                        break;
                }
            }
        ?>
    </head>

    <body>
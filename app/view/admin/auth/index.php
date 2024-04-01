<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Admin Latihan Project 10</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php 
            require_once("../../../database/koneksi.php");
            require_once("../../../model/model.php");
            require_once("../../../controller/view.php");
            /*Table Sistem*/ 
            $table = "tb_sistem";
            $sql = "SELECT * FROM $table ORDER BY id asc";
            $row = $configs->prepare($sql);
            $row->execute();
            $hasil = $row->fetch();

            /* Login */ 
            $mAuth = new view\ViewAuth($configs);
            if(!isset($_GET["act"])){
                require_once("../auth/index.php");
            }else{
                switch ($_GET["act"]) {
                    case 'signin':
                        $mAuth->Login();
                        break;
                    
                    default:
                        require_once("../auth/index.php");
                        break;
                }
            }
        ?>
    </head>

    <body onload="startTime()">
        <div class="app">
            <div class="layout">
                <nav class="navbar navbar-expand-lg navbar-custom-menu bg-body-secondary">
                    <header class="container-fluid">
                        <a href="index.php" aria-current="page" class="navbar-brand fs-5">
                            <?php echo ucwords(ucfirst($hasil[1]));?>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-target="#navbarToggle"
                            data-bs-toggle="collapse" aria-controls="navbarToggle" aria-expanded="false"
                            aria-label="Navbar Toggler">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <aside class="collapse navbar-collapse" id="navbarToggle">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link fs-5 hover" aria-current="page">Beranda</a>
                                </li>
                            </ul>
                        </aside>
                        <span id="time" class="text-end fs-5 fw-lighter fst-normal"></span>
                    </header>
                </nav>

                <section class="d-flex justify-content-center align-items-center flex-wrap" style="min-height: 70vh;">
                    <div class="p-5 py-5 bg-light col-md-9 col-lg-9">
                        <h4 class="fs-1 text-dark display-4 fst-normal fw-semibold text-center">Login Admin</h4>
                        <div class="py-5 p-5 bg-light col-md-9 col-lg-9 mx-auto">
                            <form action="?act=signin" method="post">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="input-group-addon col-md-8 col-lg-8">
                                        <label for="">Email atau Username : </label>
                                        <div class="input-group">
                                            <input type="text" name="userMail" class="form-control"
                                                placeholder="Masukkan Email atau Username anda ..." aria-required="true"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4"></div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="input-group-addon col-md-8 col-lg-8">
                                        <label for="">Password atau Kata sandi : </label>
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Masukkan Password atau Kata sandi anda ..."
                                                aria-required="true" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4"></div>
                                <div class="mx-auto border border-top border-top my-3 col-sm-9 col-md-9"></div>
                                <div class="modal-footer d-flex justify-content-center align-items-center flex-wrap">
                                    <button type="submit" class="btn btn-primary mx-1">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login Here
                                    </button>
                                    <button type="reset" class="btn btn-danger mx-1">
                                        <i class="fas fa-eraser"></i>
                                        Hapus semua
                                    </button>
                                </div>
                            </form>
                        </div>
                        <span>
                            <div class="text-center">
                                <a href="" class="text-decoration-none text-primary">
                                    <i class="fa fa-copyright text-dark"></i>
                                    <span>By IkoAlmasDevGame</span>
                                </a>
                            </div>
                        </span>
                    </div>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
        function startTime() {
            var day = ["Ahad", "Itsnain", "tsulatsa", "Arbia", "Khamiis ", "Jumu’ah", "Sabtu"];
            var today = new Date();
            var tahun = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML =
                day[today.getDay()] + ", " + h + ":" + m + ":" + s + ", " + tahun;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers <script 10
            return i;
        }
        </script>
    </body>

</html>
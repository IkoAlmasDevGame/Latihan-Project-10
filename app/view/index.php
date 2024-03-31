<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landing Page Sekolah</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php 
            require_once("../database/koneksi.php");
            $table = "tb_sistem";
            $sql = "SELECT * FROM $table ORDER BY id asc";
            $row = $configs->prepare($sql);
            $row->execute();
            $hasil = $row->fetch();
        ?>
        <style type="text/css">
        .min-vh-25 {
            min-height: 25vh;
        }

        .min-vh-25 {
            height: 25vh;
        }

        .min-vh-50 {
            min-height: 50vh;
        }

        .min-vh-50 {
            height: 50vh;
        }

        .min-vh-75 {
            min-height: 75vh;
        }

        .min-vh-75 {
            height: 75vh;
        }

        .min-vw-25 {
            min-height: 25vw;
        }

        .min-vw-25 {
            height: 25vw;
        }

        .min-vw-50 {
            min-height: 50vw;
        }

        .min-vw-50 {
            height: 50vw;
        }

        .min-vw-75 {
            min-height: 75vw;
        }

        .min-vw-75 {
            height: 75vw;
        }
        </style>
    </head>

    <body onload="startTime()" id="beranda">
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
                                <li class="nav-item">
                                    <a href="#prestasi" class="nav-link fs-5 hover" aria-current="page">Prestasi
                                        Sekolah</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#gallery" class="nav-link fs-5 hover" aria-current="page">Gallery
                                        Sekolah</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pendaftaran.php" class="nav-link fs-5 hover"
                                        aria-current="page">Pendaftaran Siswa Baru</a>
                                </li>
                            </ul>
                        </aside>
                        <span id="time" class="text-end fs-5 fw-lighter fst-normal"></span>
                    </header>
                </nav>

                <section class="min-vh-100">
                    <div class="container-fluid py-5 p-5 bg-secondary min-vh-75">
                        <h4 class="fs-2 fst-normal fw-semibold text-end text-white">
                            <?php echo ucwords(ucfirst($hasil[1])); ?>
                        </h4>
                        <div class="container-fluid py-5 bg-light min-vh-50">
                            <div class="card border border-transparent border-0">
                                <div class="card-footer border border-transparent border-0">
                                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                                        <h4 for="" class="text-start text-md-start row 
                                            form-group align-items-center fs-3 fw-lighter fst-normal">
                                            Nama Sekolah
                                        </h4>
                                        <div class="col-md-10 col-lg-10 ms-auto ps-auto fs-3">
                                            <p class="text-end"><?=$hasil[1]?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                                        <h4 for="" class="text-start text-md-start row 
                                            form-group align-items-center fs-3 fw-lighter fst-normal">
                                            Jenis Sekolah
                                        </h4>
                                        <div class="col-md-10 col-lg-10 ms-auto ps-auto fs-3">
                                            <p class="text-end"><?=$hasil[2]?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                                        <h4 for="" class="text-start text-md-start row 
                                            form-group align-items-center fs-3 fw-lighter fst-normal">
                                            Nama Kepala Sekolah
                                        </h4>
                                        <div class="col-md-10 col-lg-10 ms-auto ps-auto fs-3">
                                            <p class="text-end"><?=$hasil[3]?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                                        <h4 for="" class="text-start text-md-start row 
                                            form-group align-items-center fs-3 fw-lighter fst-normal">
                                            Tanggal Resmi Sekolah
                                        </h4>
                                        <div class="col-md-10 col-lg-10 ms-auto ps-auto fs-3">
                                            <p class="text-end"><?=$hasil[4]?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="min-vh-100" id="prestasi">
                    <div class="container-fluid rounded-1 py-5 p-5 bg-secondary min-vh-75">
                        <h4 class="fs-2 fst-normal fw-semibold text-end text-white">
                            <?php echo ucwords(ucfirst($hasil[1]))." - Prestasi"; ?>
                        </h4>
                        <div class="container-fluid py-5 bg-light">
                            <ul class="nav-item fs-3 fst-normal fw-lighter">
                                <ol type="1">
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                    <li class="text-decoration-none fst-normal fw-lighter">Isi Sendiri</li>
                                </ol>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="min-vh-100" id="gallery">
                    <div class="container-fluid rounded-1 py-5 p-5 bg-secondary">
                        <h4 class="fs-2 fst-normal fw-semibold text-end text-white">
                            <?php echo ucwords(ucfirst($hasil[1]))." - Gallery"; ?>
                        </h4>
                        <div class="container-fluid py-5 bg-light">
                            <div class="d-flex justify-content-start align-items-start flex-wrap gap-5">
                                <a class="img-responsive">
                                    <img src="https://i.pinimg.com/736x/96/ab/23/96ab23dedb73986842d208b89e8d33e5.jpg"
                                        alt="Haruka JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://cdn.idntimes.com/content-images/community/2020/09/fromandroid-f217092cb844c102378fabb3f2cf44c9.jpg"
                                        alt="Melody JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://www.dailysia.com/wp-content/uploads/2020/05/Nabilah-Eks-JKT48_1-800x1000.jpg"
                                        alt="Nabilah JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://cdn.idntimes.com/content-images/community/2020/09/fromandroid-8e406f564f16275cacd6ecfcda8067b1.jpg"
                                        alt="Frieska JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://th.bing.com/th/id/OIP.lNLO7FNioBosfYClB6RHRQDfEX?rs=1&pid=ImgDetMain"
                                        alt="Kinal JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://i.pinimg.com/originals/55/14/0d/55140da6c249fa3ed417fbd33d9c7804.jpg"
                                        alt="Veranda JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://cdn.idntimes.com/content-images/post/20181119/43778946-155330505410698-10277321730513428-n-f366958dd6bb7b3c85c8d3fa355c5184.jpg"
                                        alt="Shanju JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                                <a class="img-responsive">
                                    <img src="https://live.staticflickr.com/5572/14886574031_211016096d_b.jpg"
                                        alt="Rena JKT48 Prestasi" class="img-thumbnail min-vw-25">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container-fluid text-white">
                    <footer class="py-5 my-5 border-top border-dark">
                        <div style="position: relative; margin-left: 90%;">
                            <a href="#gallery" aria-current="page" class="text-decoration-none">
                                <span class="fa fa-image opacity-50 fs-1" style="z-index: 1000;"></span>
                            </a>
                            <a href="#prestasi" aria-current="page" class="text-decoration-none">
                                <span class="fa fa-file-alt opacity-50 fs-1" style="z-index: 1000;"></span>
                            </a>
                            <a href="#beranda" aria-current="page" class="text-decoration-none">
                                <span class="fa fa-arrow-circle-up opacity-50 fs-1" style="z-index: 1000;"></span>
                            </a>
                        </div>
                    </footer>
                </div>
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
            }; // add zero in front of numbers < 10
            return i;
        }

        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
        </script>
    </body>

</html>
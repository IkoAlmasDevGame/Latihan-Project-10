<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendaftaran Siswa Baru</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php 
            require_once("../database/koneksi.php");
            $table = "tb_sistem";
            $sql = "SELECT * FROM $table ORDER BY id asc";
            $row = $configs->prepare($sql);
            $row->execute();
            $hasil = $row->fetch();

            $sql_nis = "SELECT max(nis) as NisnInput FROM tb_pendaftaran";
            $row_nis = $configs->prepare($sql_nis);
            $row_nis->execute();
            $data = $row_nis->fetch();
            $NisnInput = $data["NisnInput"];

            $urutan = (int) substr($NisnInput, -3,8);
            $urutan++;
            $NisnInput = "00647726";
            $kodenisn = $NisnInput . sprintf("%03s", $urutan);
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
                                <li class="nav-item">
                                    <a href="index.php#prestasi" class="nav-link fs-5 hover"
                                        aria-current="page">Prestasi Sekolah</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php#gallery" class="nav-link fs-5 hover" aria-current="page">Gallery
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
                <div class="d-grid justify-content-center align-items-start mt-1 mt-lg-1">
                    <div class="card col-md-12 col-lg-12">
                        <div class="card-header">
                            <span class="text-start fa fa-user-graduate 
                                fs-1 fst-normal fw-semibold mt-1 mt-lg-1"></span>
                            <h4 class="card-title fs-5 fst-normal fw-lighter text-end">
                                Pendaftaran Siswa Baru
                                <br>
                                <?php echo ucwords(ucfirst($hasil[1])) ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <form action="../view/aksi-pendaftaran.php" enctype="multipart/form-data" method="post">
                                    <table class="table table-striped table-hover">
                                        <th class="text-center fw-lighter fst-normal" colspan="8">DATA SISWA BARU</th>
                                        <tr>
                                            <td colspan="2">Nomer Induk Siswa</td>
                                            <td colspan="6">
                                                <input type="text" maxlength="10" class="form-control col-md-3 col-lg-3"
                                                    required aria-required="true" name="nis" aria-readonly="true"
                                                    readonly value="<?=$kodenisn;?>"
                                                    placeholder="otomatis pengisian nomer induk siswa">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Lengkap</td>
                                            <td colspan="6">
                                                <input type="text" maxlength="10" class="form-control col-md-3 col-lg-3"
                                                    required aria-required="true" name="nama_lengkap" id=""
                                                    placeholder="nama lengkap siswa baru">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-lighter fst-normal fs-6">Tempat Lahir</td>
                                            <td>
                                                <input type="text" name="tempat_lahir" maxlength="128"
                                                    class="form-control" placeholder="Masukkan Tempat Lahir"
                                                    aria-required="true" required>
                                            </td>
                                            <td class="fw-lighter fst-normal fs-6">Tanggal Lahir</td>
                                            <td>
                                                <select name="tanggal_input" class="form-control" aria-required="true"
                                                    required>
                                                    <option value="">Pilih Tanggal Lahir</option>
                                                    <?php 
                                                    $tanggal = 31;
                                                    for($a = 1; $a <= $tanggal; $a += 1){
                                                ?>
                                                    <option value="<?=$a;?>"><?=$a;?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </td>
                                            <td class="fw-lighter fst-normal fs-6">Bulan Lahir</td>
                                            <td>
                                                <select name="bulan_lahir" class="form-control" aria-required="true"
                                                    required>
                                                    <option value="">Pilih Bulan Lahir</option>
                                                    <?php 
                                                $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                $jlh_bln = count($bulan);
                                                $bln1 = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
                                                for ($c = 0; $c < $jlh_bln; $c += 1) { 
                                                ?>
                                                    <option value="<?=$bln1[$c];?>"><?=$bulan[$c]?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </td>
                                            <td class="fw-lighter fst-normal fs-6">Tahun Lahir</td>
                                            <td>
                                                <select name="tahun_lahir" class="form-control" aria-required="true"
                                                    required>
                                                    <option value="">Pilih Tahun Lahir</option>
                                                    <?php 
                                                    $now = Date('Y');
                                                    for ($i=2000; $i <= $now; $i++) { 
                                                ?>
                                                    <option value="<?=$i;?>"><?=$i;?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Agama</td>
                                            <td colspan="3">
                                                <select name="agama" aria-required="true" required class="form-control">
                                                    <option value="">Pilih Agama</option>
                                                    <?php 
                                                $agama = array("Hindu","Budha","Kristen","Katholik","Islam","Konghucu");
                                                $jlh_agama = count($agama);
                                                $agm = array('01', '02', '03', '04', '05', '06');
                                                for ($c = 0; $c < $jlh_agama; $c += 1) { 
                                                ?>
                                                    <option value="<?=$agm[$c];?>"><?=$agama[$c]?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </td>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Jumlah Saudara</td>
                                            <td colspan="3">
                                                <input type="number" name="jumlah_saudara"
                                                    class="form-control col-md-3 col-lg-3" aria-required="true" required
                                                    placeholder="Berapa Jumlah Saudara Kandung">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Alamat Rumah</td>
                                            <td colspan="7">
                                                <textarea name="alamat" maxlength="255"
                                                    class="form-control col-md-3 col-lg-3" required aria-required="true"
                                                    placeholder="alamat rumah anda"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped">
                                        <th class="text-center fw-lighter fst-normal" colspan="8">DATA ORANG TUA</th>
                                        <tr>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Nama Ayah Kandung</td>
                                            <td colspan="2">
                                                <input type="text" name="nama_ayah" maxlength="128"
                                                    class="form-control col-md-3 col-lg-3"
                                                    placeholder="Masukkan Nama Ayah" aria-required="true" required>
                                            </td>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Pekerjaan Ayah Kandung
                                            </td>
                                            <td colspan="2">
                                                <input type="text" name="pekerjaan_ayah" required
                                                    placeholder="Pekerjaan Ayah Kandung"
                                                    class="form-control col-md-3 col-lg-3">
                                            </td>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">No Telepon Ayah</td>
                                            <td colspan="2">
                                                <input type="text" name="telepon_ayah" maxlength="13"
                                                    class="form-control col-md-3 col-lg-3"
                                                    placeholder="Masukkan No Telepon Ayah" aria-required="true"
                                                    required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Nama Ibu Kandung</td>
                                            <td colspan="2">
                                                <input type="text" name="nama_ibu" maxlength="128"
                                                    class="form-control col-md-3 col-lg-3"
                                                    placeholder="Masukkan Nama Ibu" aria-required="true" required>
                                            </td>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">Pekerjaan Ibu Kandung
                                            </td>
                                            <td colspan="2">
                                                <input type="text" name="pekerjaan_ibu" required
                                                    placeholder="Pekerjaan ibu Kandung"
                                                    class="form-control col-md-3 col-lg-3">
                                            </td>
                                            <td colspan="1" class="fw-lighter fst-normal fs-6">No Telepon Ibu</td>
                                            <td colspan="2">
                                                <input type="text" name="telepon_ibu" maxlength="13"
                                                    class="form-control col-md-3 col-lg-3"
                                                    placeholder="Masukkan No Telepon Ibu" aria-required="true" required>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped">
                                        <th class="text-center fw-lighter fst-normal" colspan="8">DATA DOCUMENT SISWA
                                        </th>
                                        <tr>
                                            <td>File Document PDF <br>(Kartu Keluarga)</td>
                                            <td>
                                                <input type="file" name="file_kk" class="form-control col-md-3 col-lg-3"
                                                    required aria-required="true">
                                            </td>
                                            <td>File Document PDF <br>(Akte Lahir)</td>
                                            <td>
                                                <input type="file" name="file_akte"
                                                    class="form-control col-md-3 col-lg-3" required
                                                    aria-required="true">
                                            </td>
                                            <td>File Photo</td>
                                            <td>
                                                <input type="file" name="file_image"
                                                    class="form-control col-md-3 col-lg-3" required
                                                    aria-required="true">
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="card-footer">
                                        <div class="modal-footer mx-2">
                                            <button type="submit" name="submited" class="btn btn-primary mx-1">
                                                <i class="fas fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger mx-1">
                                                <i class="fas fa-close"></i>
                                                <span>Hapus Semua</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
        </script>
    </body>

</html>
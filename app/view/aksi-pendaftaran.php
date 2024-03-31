<?php 
require_once("../database/koneksi.php");
if(isset($_POST["submited"])){
    $nis = htmlspecialchars($_POST["nis"]) ? htmlentities($_POST["nis"]) : $_POST["nis"];
    $nama = htmlspecialchars($_POST["nama_lengkap"]) ? htmlentities($_POST["nama_lengkap"]) : $_POST["nama_lengkap"];
    $tempat = htmlspecialchars($_POST["tempat_lahir"]) ? htmlentities($_POST["tempat_lahir"]) : $_POST["tempat_lahir"];
    $tanggal = htmlspecialchars($_POST["tanggal"]) ? htmlentities($_POST["tanggal"]) : $_POST["tanggal"];
    $bulan = htmlspecialchars($_POST["bulan_lahir"]) ? htmlentities($_POST["bulan_lahir"]) : $_POST["bulan_lahir"];
    $tahun = htmlspecialchars($_POST["tahun_lahir"]) ? htmlentities($_POST["tahun_lahir"]) : $_POST["tahun_lahir"];
    $agama = htmlspecialchars($_POST["agama"]) ? htmlentities($_POST["agama"]) : $_POST["agama"];
    $saudara = htmlspecialchars($_POST["jumlah_saudara"]) ? htmlentities($_POST["jumlah_saudara"]) : $_POST["jumlah_saudara"];
    $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : $_POST["alamat"];
    $tanggal_lahir = $tanggal."-".$bulan."-".$tahun;
    
    /* Data Orang Tua */
    $nama_ayah = htmlspecialchars($_POST["nama_ayah"]) ? htmlentities($_POST["nama_ayah"]) : $_POST["nama_ayah"];
    $pekerjaan_ayah = htmlspecialchars($_POST["pekerjaan_ayah"]) ? htmlentities($_POST["pekerjaan_ayah"]) : $_POST["pekerjaan_ayah"];
    $telepon_ayah = htmlspecialchars($_POST["telepon_ayah"]) ? htmlentities($_POST["telepon_ayah"]) : $_POST["telepon_ayah"];
    $nama_ibu = htmlspecialchars($_POST["nama_ibu"]) ? htmlentities($_POST["nama_ibu"]) : $_POST["nama_ibu"];
    $pekerjaan_ibu = htmlspecialchars($_POST["pekerjaan_ibu"]) ? htmlentities($_POST["pekerjaan_ibu"]) : $_POST["pekerjaan_ibu"];
    $telepon_ibu = htmlspecialchars($_POST["telepon_ibu"]) ? htmlentities($_POST["telepon_ibu"]) : $_POST["telepon_ibu"]; 

    /* File Kartu Keluarga */
    $ekstensi_diperbolehkan_kk = array('pdf');
    $kk = htmlspecialchars($_FILES["file_kk"]["name"]);
    $x_kk = explode('.', $kk);
    $ekstensi_kk = strtolower(end($x_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    /* File Akte Lahir */
    $ekstensi_diperbolehkan_akte = array('pdf');
    $akte = htmlspecialchars($_FILES["file_akte"]["name"]);
    $x_akte = explode('.', $akte);
    $ekstensi_akte = strtolower(end($x_akte));
    $ukuran_akte = $_FILES['file_akte']['size'];
    $file_tmp_akte = $_FILES['file_akte']['tmp_name'];
    /* File Photo */
    $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif');
    $image = htmlspecialchars($_FILES["file_image"]["name"]);
    $x_foto = explode('.', $image);
    $ekstensi_foto = strtolower(end($x_foto));
    $ukuran_foto = $_FILES['file_image']['size'];
    $file_tmp_foto = $_FILES['file_image']['tmp_name'];

    if(in_array($ekstensi_kk, $ekstensi_diperbolehkan_kk) === true){
            if($ukuran_kk < 10440070){
                move_uploaded_file($file_tmp_kk, "../../assets/document/" . $kk);
                if(in_array($ekstensi_akte, $ekstensi_diperbolehkan_akte) === true){
                    if($ukuran_akte < 10440070){
                        move_uploaded_file($file_tmp_akte, "../../assets/document/" . $akte);                    
                        if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
                            if($ukuran_foto < 10440070){
                                move_uploaded_file($file_tmp_foto, "../../assets/image/" . $image);
                                $table = "tb_pendaftaran";
                                $sql = "INSERT INTO $table (nis,nama_lengkap,tempat_lahir,tanggal_lahir,agama,jumlah_saudara,alamat,nama_ayah,pekerjaan_ayah,telepon_ayah,nama_ibu,pekerjaan_ibu,telepon_ibu,file_kk,file_akte,file_image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                $row = $configs -> prepare($sql);
                                if($row === true){
                                $a = array($nis, $nama, $tempat,$tanggal_lahir,$agama,$saudara,$alamat,$nama_ayah,
                                    $pekerjaan_ayah,$telepon_ayah,$nama_ibu,$pekerjaan_ibu,$telepon_ibu,$kk,$akte,$image);
                                $row -> execute($a);
                                header("location:index.php");
                                }else{
                                header("location:pendaftaran.php");
                                }
                        }else{
                            echo "GAGAL MENGUPLOAD FILE FOTO";
                        }
                    }else{
                        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
                    }
                }else{
                    echo "GAGAL MENGUPLOAD FILE FOTO";
                }
            }else{
                echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
            }
        }else{
            echo "GAGAL MENGUPLOAD FILE FOTO";
        }
    }else{
        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $jurusan=input($_POST["jenis_kelamin"]);
        $no_hp=input($_POST["program_studi"]);
        $alamat=input($_POST["keahlian"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (nama,sekolah,jurusan,no_hp,alamat) values
		('$nama','$sekolah','$jurusan','$no_hp','$alamat')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Tambah Data Mahasiswa</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan NIM" required />

        </div>
        <div class="form-group">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Mahasiswa" required/>
        </div>
       <div class="form-group">
            <label>Jenis Kelamin:</label>
            <input class="form-check-input"type="radio"name="jenis_kelamin" value="Pria">
            <label class="form-check-label">
                Pria
            </label>
            <input class="form-check-input"type="radio"name="jenis_kelamin"value="Wanita">
            <label class="form-check-label">
                Wanita
            </label>
        </div>
                </p>
        <div class="form-group">
            <label>Program Studi:</label>
            <select class="form-select"name="program_studi">
                <option selected>--Pilih Program Studi--</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keahlian:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="keahlian[]"value="Data Mining">
                <label class="form-check-label">
                    Data Mining
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"type="checkbox" name="keahlian[]"value="Software Enginner">
                <label class="form-check-label">
                    Software Enginner
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="keahlian[]"value="Enterprice Architecture">
                <label class="form-check-label">
                    Enterprice Aechitecture
                </label>
            </div>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
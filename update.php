<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);

        $sql="select * from mahasiswa where id=$id";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_peserta=htmlspecialchars($_POST["id_peserta"]);
        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $jurusan=input($_POST["jurusan"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

        //Query update data pada tabel anggota
        $sql="update peserta set
			nama='$nama',
			sekolah='$sekolah',
			jurusan='$jurusan',
			no_hp='$no_hp',
			alamat='$alamat'
			where id_peserta=$id_peserta";

        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan NIM" required />

        </div>
        <div class="form-group">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Mahasiswa" required/>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin :</label>
            <input class="form-check-input" type="radio" name="jenis_kelamin"value="Pria">
            <input class="form-check=label">
                Pria
            </label>    
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>

        <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
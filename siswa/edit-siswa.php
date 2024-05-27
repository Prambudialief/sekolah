<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Update Siswa - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$nis = $_GET['nis'];

$siswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis = '$nis'");
$data = mysqli_fetch_array($siswa);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"> <a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"> <a href="siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active">Update Siswa</li>
            </ol>
            <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Siswa</span>
                        <button type="submit" name="update" class="btn btn-primary"><i class="fa-solid fa-bookmark"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nis" required class="form-control" id="nis" value="<?= $nis ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" required class="form-control" id="nama" value="<?= $data['nama'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                                    <div class="col-sm-9">
                                        <select name="kelas" id="kelas" class="form-select" required>
                                            <?php
                                            $kelas = ["X", "XI", "XII"];
                                            foreach ($kelas as $kls) {
                                                echo '<option value="' . $kls . '"' . ($data['kelas'] == $kls ? ' selected' : '') . '>' . $kls . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                                    <div class="col-sm-9">
                                        <select name="jurusan" id="jurusan" class="form-select" required>
                                            <?php
                                            $jurusan = ["IPA", "IPS"];
                                            foreach ($jurusan as $jrs) {
                                                echo '<option value="' . $jrs . '"' . ($data['jurusan'] == $jrs ? ' selected' : '') . '>' . $jrs . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" placeholder="Isi Alamat" class="form-control" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center px-5">
                                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                                <img src="../asset/image/<?= $data['foto'] ?>" alt="Foto Siswa" class="mb-3 rounded-circle img-fluid" style="width: 50%;">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih Foto PNG, JPG atau JPEG Maksimal Ukuran 5 mb</small>
                                <div><small class="text-secondary">Ukuran Foto wajib sama / width = height</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php

require_once "../template/footer.php";

?>

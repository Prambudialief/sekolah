<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Tambah Siswa - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$queryNis = mysqli_query($koneksi, "SELECT max(nis) as maxnis FROM tbl_siswa");
$data = mysqli_fetch_array($queryNis);
$maxnis = $data["maxnis"];

$noUrut = (int) substr($maxnis, 3, 3);
$noUrut++;
$maxnis = "NIS" . sprintf("%03s", $noUrut);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"> <a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"> <a href="siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
            <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="h5 my-2"><i class="fa-solid fa-circle-plus"></i> Tambah Siswa</span>
                        <div>
                            <button type="reset" name="reset" class="btn btn-danger me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa-solid fa-bookmark"></i> Simpan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nis" required class="form-control" id="nis" value="<?= $maxnis ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" required class="form-control" id="nama">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
                                    <div class="col-sm-9">
                                        <select name="kelas" id="kelas" class="form-select" required>
                                            <option selected>---Pilih Kelas---</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan:</label>
                                    <div class="col-sm-9">
                                        <select name="jurusan" id="jurusan" class="form-select" required>
                                            <option selected>---Pilih Jurusan---</option>
                                            <option value="IPA">IPA</option>
                                            <option value="IPS">IPS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" placeholder="Isi Alamat" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-center">
                                <img src="../asset/image/default.png" alt="Foto Siswa" class="mb-3 img-fluid rounded-circle" style="max-width: 50%;">
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

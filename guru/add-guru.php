<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Tambah Guru - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
   $msg = $_GET['msg'];

} else {
    $msg = "";
}

$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah Guru Gagal, NIP sudah tersedia
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
$alert = '';
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah guru gagal, file yang di upload bukan gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah guru gagal, maximal ukuran gambar 5 mb
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah Guru Sukses
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"> <a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"> <a href="guru.php">Guru</a></li>
                <li class="breadcrumb-item active">Tambah Guru</li>
            </ol>
            <form action="proses-guru.php" method="POST" enctype="multipart/form-data">
                <?php if ($msg != '') { echo $alert; } ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-plus"></i> Tambah Guru</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-3 col-form-label">NIP :</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nip" pattern="[0-9]{18,}" title="Minimal 18 angka" class="form-control ps-2 border-0 border-bottom" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" title="Masukkan nama Anda" class="form-control ps-2 border-0 border-bottom" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-3 col-form-label">Telpon :</label>
                                    <div class="col-sm-9">
                                        <input type="tel" name="telpon" pattern="[0-9]{5,}" title="Minimal 5 angka" class="form-control ps-2 border-0 border-bottom" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-3 col-form-label">Agama :</label>
                                    <div class="col-sm-9">
                                        <select name="agama" id="agama" class="form-select border-0 border-bottom" required>
                                            <option value="" selected>--Pilih Agama--</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat :</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="../asset/image/default.png" class="mb-3 img-fluid" alt="Foto Default">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih foto PNG, JPG atau JPEG dengan ukuran maksimal 5 MB</small>
                                <div><small class="text-secondary">Ukuran foto wajib sama (width = height)</small></div>
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

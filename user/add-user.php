<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Tambah User - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Maaf tambah user gagal, Username sudah tersedia
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} elseif ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Maaf tambah user gagal, file yang di upload bukan gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} elseif ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Maaf tambah user gagal, maksimal ukuran gambar 5 mb
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} elseif ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah user sukses, segera ganti password
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
            </ol>
            <form action="proses-user.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-3"><i class="fa-regular fa-square-plus"></i> Tambah User</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-bookmark"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar, kecil dan angka" class="form-control" id="username" name="username" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <select name="jabatan" id="jabatan" class="form-select" required>
                                            <option value="" selected>Pilih Jabatan</option>
                                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                                            <option value="Staf Tu">Staf Tata Usaha</option>
                                            <option value="Guru Mapel">Guru Mapel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Domisili" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-center">
                                <img src="../asset/image/user.png" alt="gambar user" class="mb-3 img-fluid">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Foto PNG, JPG atau JPEG ukuran maksimal 5 mb</small>
                                <div><small class="text-secondary">Ukuran sama / width = height</small></div>
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

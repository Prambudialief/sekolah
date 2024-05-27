<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Profile Sekolah - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Update data sekolah gagal, file yang di upload bukan gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Update data sekolah gagal, maksimal ukuran gambar 5 mb
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data sekolah berhasil diperbaharui
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

$sekolah = mysqli_query($koneksi, "SELECT * FROM tbl_sekolah WHERE 1");
$data = mysqli_fetch_array($sekolah);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sekolah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Profile Sekolah</li>
            </ol>
            <form action="proses-sekolah.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h4"><i class="fa-solid fa-pen"></i> Data Sekolah</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-bookmark"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-notdef"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center px-3 mb-3">
                                <input type="hidden" name="gbrLama" value="<?= $data['gambar'] ?>">
                                <img src="../asset/image/<?= $data['gambar'] ?>" alt="gambar sekolah" class="mb-3 img-fluid">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih gambar PNG, JPG atau JPEG ukuran maksimal 5 MB</small>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="nama sekolah" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control border-0 border-bottom" id="email" name="email" value="<?= $data['email'] ?>" placeholder="email sekolah" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-select border-0 border-bottom" required>
                                            <?php
                                            $status = ['Negeri', 'Swasta'];
                                            foreach ($status as $stt) {
                                                if ($data['status'] == $stt) { ?>
                                                    <option value="<?= $stt ?>" selected><?= $stt ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $stt ?>"><?= $stt ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="akreditasi" class="col-sm-2 col-form-label">Akreditasi</label>
                                    <div class="col-sm-10">
                                        <select name="akreditasi" id="akreditasi" class="form-select border-0 border-bottom" required>
                                            <?php
                                            $akreditasi = ['A', 'B', 'C', 'D'];
                                            foreach ($akreditasi as $akre) {
                                                if ($data['akreditasi'] == $akre) { ?>
                                                    <option value="<?= $akre ?>" selected><?= $akre ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $akre ?>"><?= $akre ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="visimisi" class="col-sm-2 col-form-label">Visi dan Misi</label>
                                    <div class="col-sm-10">
                                        <textarea name="visimisi" id="visimisi" class="form-control" rows="3" required><?= $data['visimisi'] ?></textarea>
                                    </div>
                                </div>
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

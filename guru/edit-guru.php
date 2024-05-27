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

$id = $_GET['id'];

$queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
$data = mysqli_fetch_array($queryGuru);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="guru.php">Guru</a></li>
                <li class="breadcrumb-item active">Update Guru</li>
            </ol>
            <form action="proses-guru.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Guru</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-3 col-form-label">NIP :</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nip" pattern="[0-9]{18,}" title="Minimal 18 angka" class="form-control" value="<?= $data['nip'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" title="Masukkan nama Anda" class="form-control" value="<?= $data['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-3 col-form-label">Telpon :</label>
                                    <div class="col-sm-9">
                                        <input type="tel" name="telpon" pattern="[0-9]{5,}" title="Minimal 5 angka" class="form-control" value="<?= $data['telpon'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-3 col-form-label">Agama :</label>
                                    <div class="col-sm-9">
                                        <select name="agama" id="agama" class="form-select" required>
                                            <?php
                                            $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Khonghucu'];
                                            foreach($agama as $rlg){
                                                if ($data['agama'] == $rlg) { ?>
                                                    <option value="<?= $rlg ?>" selected><?= $rlg ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $rlg ?>"><?= $rlg ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat :</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                                <img src="../asset/image/<?= $data['foto'] ?>" class="mb-3 img-fluid rounded-circle" width="50%" alt="Foto Guru">
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

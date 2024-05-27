<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Mata Pelajaran - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE id = $id");
$data = mysqli_fetch_array($queryPelajaran);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Mata Pelajaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="pelajaran.php">Back</a></li>
            </ol>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa-solid fa-pen"></i> Edit Pelajaran
                        </div>
                        <div class="card-body">
                            <form action="proses-pelajaran.php" method="POST">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3">
                                    <label for="pelajaran" class="form-label">Pelajaran</label>
                                    <input type="text" class="form-control" id="pelajaran" name="pelajaran" placeholder="Nama pelajaran" value="<?= $data['pelajaran'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select" required>
                                        <?php
                                        $jurusan = ["IPA", "IPS"];
                                        foreach ($jurusan as $jrs) {
                                            $selected = ($data['jurusan'] == $jrs) ? 'selected' : '';
                                            echo "<option value='$jrs' $selected>$jrs</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="guru" class="form-label">Guru</label>
                                    <select name="guru" id="guru" class="form-select" required>
                                        <?php
                                        $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                        while ($dataGuru = mysqli_fetch_array($queryGuru)) {
                                            $selected = ($data['guru'] == $dataGuru['nama']) ? 'selected' : '';
                                            echo "<option value='{$dataGuru['nama']}' $selected>{$dataGuru['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                                <a href="pelajaran.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa-solid fa-table-list"></i> Data Pelajaran
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
                                            <th scope="col">Jurusan</th>
                                            <th scope="col">Guru</th>
                                            <th scope="col">Operasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><?= $data['pelajaran'] ?></td>
                                            <td><?= $data['jurusan'] ?></td>
                                            <td><?= $data['guru'] ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-warning rounded-0">Updating</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



<?php

require_once "../template/footer.php";



?>
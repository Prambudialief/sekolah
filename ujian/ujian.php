<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
   header("location:../auth/login.php");
   exit();
}

require_once "../config.php";
$title = "Data Ujian - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ujian</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Data ujian siswa</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-rectangle-list"></i> Data Ujian Siswa
                    <a href="nilai-ujian.php" class="btn btn-sm btn-primary float-end ms-1">
                        <i class="fa-solid fa-plus"></i> Tambah Data Ujian Siswa
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col"><center>No Ujian</center></th>
                                    <th scope="col"><center>NIS</center></th>
                                    <th scope="col"><center>Jurusan</center></th>
                                    <th scope="col"><center>Nilai Terendah</center></th>
                                    <th scope="col"><center>Nilai Tertinggi</center></th>
                                    <th scope="col"><center>Nilai Rata-Rata Siswa</center></th>
                                    <th scope="col"><center>Hasil Ujian</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $queryUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian");
                                while ($data = mysqli_fetch_array($queryUjian)) {
                                ?>
                                <tr>
                                    <td><?= $data['no_ujian'] ?></td>
                                    <td><?= $data['nis'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td align="center"><?= $data['nilai_terendah'] ?></td>
                                    <td align="center"><?= $data['nilai_tertinggi'] ?></td>
                                    <td align="center"><?= $data['nilai_rata2'] ?></td>
                                    <td align="center">
                                        <?php if ($data['hasil_ujian'] == 'LULUS') { ?>
                                            <button type="button" class="btn btn-success btn-sm rounded-0 fw-bold text-uppercase"><?= $data['hasil_ujian'] ?></button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-danger btn-sm rounded-0 fw-bold text-uppercase"><?= $data['hasil_ujian'] ?></button>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php

require_once "../template/footer.php";

?>


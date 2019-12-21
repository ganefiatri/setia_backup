<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Grapari Own</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data All Grapari</a></div>
                <div class="breadcrumb-item">Grapari Own</div>
            </div>
        </div>

        <div class="section-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name1</th>
                    <th>Name3</th>
                    <th>Jenis Grapari</th>
                    <th>Kategori Grapari</th>
                    <th>Area</th>
                    <th>Regional</th>
                    <th>Type Grapari</th>
                    <th>Jam Operasional</th>
                    <th>Alamat Lengkap</th>
                    <th>Longtitude</th>
                    <th>Latitude</th>
                    <th>Class</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Provinsi</th>
                    <th>Kode Pos</th>
                    <th>Kota / Kabupaten</th>
                    <th>Ketersedian Mygrapari</th>
                    <th>Interaksi Mygrapari Agustus</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($grapariall as $gp) { ?>
                    <tr>
                        <td><?= $gp ->name1 ?></td>
                        <td><?= $gp ->name3 ?></td>
                        <td><?= $gp ->jenis_grapari ?></td>
                        <td><?= $gp ->kategori_grapari ?></td>
                        <td><?= $gp ->area ?></td>
                        <td><?= $gp ->regional ?></td>
                        <td><?= $gp ->type_grapari ?></td>
                        <td><?= $gp ->jam_operasional ?></td>
                        <td><?= $gp ->alamat_lengkap ?></td>
                        <td><?= $gp ->longtitude ?></td>
                        <td><?= $gp ->latitude ?></td>
                        <td><?= $gp ->class ?></td>
                        <td><?= $gp ->kelurahan ?></td>
                        <td><?= $gp ->kecamatan ?></td>
                        <td><?= $gp ->provinsi ?></td>
                        <td><?= $gp ->kodepos ?></td>
                        <td><?= $gp ->kota ?></td>
                        <td><?= $gp ->persedian_mygrapari ?></td>
                        <td><?= $gp ->interaksi_mygrapari ?></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>
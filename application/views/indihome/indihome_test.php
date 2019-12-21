<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<style>
    tr>td {
        padding: 5px;
    }
    input[type='checkbox'] {
        /*-webkit-appearance:none;*/
        width:25px;
        height:25px;
        /*background:white;*/
        border-radius:15px;
        border:2px solid #555;
    }
    input[type='checkbox']:checked {
        background: #abd;
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Telkom</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Forms Telkom</div>
            </div>
        </div>
<div style="padding: 50px">
    <div>
        <img src="<?php echo base_url('assets/img/telkomlogo.png'); ?>" style="width: 150px; height: 120px; float: right" alt="">
        <p style="padding-top: 100px;font-size: 20px; text-align: center"><strong>FORMULIR PENGAJUAN BERHENTI BERLANGGANAN</strong> </p>
        <p style="font-size: 17px; padding-top: 15px"><i>Kami sampaikan terima kasih atas kepercayaan dan kesediaan Anda menjadi pelanggan Indihome. Jika Anda memutuskan untuk berhenti, mohon kesediaannya untuk mengisi beberapa pertanyaan berikut, guna peningkatan kualitas pelayanan kami.</i> </p>
        <form method="POST" action="<?php echo base_url('Tutupindihome'); ?>">
            <input type="text" name="lokasi_layanan1" style="display: none" value="<?php echo $this->ion_auth->user()->row()->lokasi_layanan ?>">
        <table class="">
            <tr>
                <td>Nama</td>
                <td><input style="margin-left: 100px;" class="form-control" type="text" name="nama_pemohon" required></td>
            </tr>
            <tr>
                <td>Nomor Indihome</td>
                <td><input style="margin-left: 100px" class="form-control" type="text" name="nomor_indihome" required></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input style="margin-left: 100px" class="form-control" type="text" name="nomor_hp" required> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input style="margin-left: 100px" class="form-control" type="text" name="email" required> </td>
            </tr>
            <tr>
                <td>status</td>
                <td>
                    <input style="margin-left: 100px" class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Penanggung Jawab Indihome"> Penanggung Jawab Indihome
                    <input class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Anak / Saudara"> Anak / Saudara
                    <input class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Suami / Istri"> Suami / Istri
                    <input class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Pekerja / Lainnya"> Pekerja / Lainnya
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>1. Bagaimana Kepuasan Anda terhadap layanan indihome ?
                    <br>&nbsp;&nbsp;&nbsp;
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Sangat Puas"> Sangat Puas
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Puas"> Puas
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Biasa Saja"> Biasa Saja
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Kecewa"> Kecewa
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Sangat Kecewa"> Sangat Kecewa
                </td>
            </tr>
            <tr>
                <td>2. Kenapa Anda Ingin Berhenti Berlangganan Indihome ?
                    <br>&nbsp;&nbsp;&nbsp;
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Pindah Alamat"> Pindah Alamat
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Jarang Tidak Digunakan Lagi"> Jarang Tidak Digunakan Lagi

                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Terlalu Mahal"> Terlalu Mahal
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Sudah Punya Indihome"> Sudah Punya Indihome

                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Sering Gangguan"> Sering Gangguan
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Ganti Operator"> Ganti Operator
<!--                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Lainnya"> Lainnya-->
                </td>
            </tr>
            <tr>
                <td>3. Pengembalian CPE ?
                    <br>&nbsp;&nbsp;&nbsp;
                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="ONT"> ONT
                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="STB"> STB

                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="PLC"> PLC
                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="Wifi Extender"> Wifi Extender

                </td>
            </tr>
            <tr>
<!--                <td style="padding-top: 10px">Medan,--><?php //echo date('m/d/Y');?><!-- <br>-->
<!--                    <p>PELANGGAN</p>-->
<!--                    <br><br><br>-->
<!--                    <p></p>-->
<!--                </td>-->

            </tr>
        </table>
            <table  class="table table-striped ">
                <p style="padding-top: 10px;font-size: 20px; text-align: center"><strong>PAKET PELANGGAN SETIA</strong> </p>
                <p style="font-size: 14px; padding-top: 15px"><i>Kami berharap Anda tidak berhenti berlangganan. Berikut kami tawarkan daftar paket hemat, khusus untuk Anda yang setia, dan bersedia berlangganan kembali.</i> </p>
                <thead>
                <tr>
                    <th style="padding:20px;">PAKET</th>
                    <th style="padding:20px;">LAYANAN</th>
                    <th style="padding:20px;">HARGA</th>
                    <th style="padding:20px;">HARGA + PPN</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="2"><input class="checkbox-inline" id="myCheck" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET KUOTA"> 2P INTERNET KUOTA</td>
                    <td>Internet kuota 5 GB Kecepatan 10 Mbps</td>
                    <td rowspan="1"><label style="font-size: 15px">65.000</label></td>
                    <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="71.500"> 71.500</label></td>
                </tr>

                <tr>
                    <td>Telepon Incoming Only</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET UNLIMITED"> 2P INTERNET UNLIMITED</td>
                    <td>Internet Kecepatan 10 Mbps</td>
                    <td><label style="font-size: 15px">240.000</label></td>
                    <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="267.000"> 267.000</label></td>
                </tr>
                <tr>
                    <td>Telepon Incoming Only</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET TELEPON"> 2P INTERNET TELEPON</td>
                    <td>Internet Kecepatan 10 Mbps</td>
                    <td rowspan="1"><label style="font-size: 15px">262.000</label></td>
                    <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="291.860"> 291.860</label></td>
                </tr>
                <tr>
                    <td>Telepon Incoming + outgoing</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET TV"> 2P INTERNET TV</td>
                    <td>Internet Kecepatan 10 Mbps</td>
                    <td rowspan="1"><label style="font-size: 15px">290.000</label></td>
                    <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="322.000"> 322.000</label></td>
                </tr>
                <tr>
                    <td>USETV 90 CHANNEL</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="3"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="3P INDIHOME"> 3P INDIHOME</td>
                    <td>Internet Kecepatan 10 Mbps</td>
                    <td rowspan="1"><label style="font-size: 15px">300.000</label></td>
                    <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="333.000"> 333.000</label></td>
                </tr>
                <tr>
                    <td>USETV 90 CHANNEL</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Telepon Incoming Only</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="3"><input class="checkbox-inline" type="checkbox" name="cabut" alt="Checkbox" value="Tetap Ingin Cabut"> Tetap Ingin Cabut</td>
                    <td></td>
                    <td rowspan="1"><label style="font-size: 15px"></label></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Keterangan: Jika kuota habis, dapat diisi dengan SMS ke 98108, format:</td>
                </tr>
                <tr>
                    <td>ADD [denominasi] IH [nomor internet], contoh: ADD 5000 IH 111802121xxx</td>
                </tr>
                <tr>
                    <td>Harga Kuota: Rp.5.000 (1GB), Rp.20.000 (5 GB), Rp.50.000 (13 GB), Rp.75.000 (20 GB)</td>
                </tr>
                <tr>
                    <td>Diisi Oleh Petugas</td>
                </tr>
                <tr>
                    <td>Kesimpulan :</td>
                </tr>
                <tr>
                    <td>
                        <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Paket lama"> Paket lama
                        <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Value Netizen"> Value Netizen
                        <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Kuota"> Kuota
                        <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Berhenti"> Berhenti
                        <br>
                        <textarea style="margin-top: 10px" class="" name="alasan_lain" id="" cols="80" rows="4" placeholder="Lainya"></textarea>
                    </td>
                </tr>
            </table>
            <input class="btn-primary" style="margin-left: 900px;" type="submit" value="Kirim">
        </form>
    </div>
    <hr>
</div>
    </section>
</div>
<?php $this->load->view('dist/_partials/js'); ?>

<!--<input type="submit"   name="tampil" value="Simpan">-->
    <?php //var_dump($indihomes);?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script>
    function printDiv() {
        var divContents = document.getElementById("indihomePrint").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body >');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<style>
    tr>td {
       padding: 5px;
    }
    input[type='checkbox'] {
        /*-webkit-appearance:none;*/
        width:30px;
        height:30px;
        /*background:white;*/
        border-radius:5px;
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
<div id="indihomePrint" style="padding: 50px">
    <div>
        <img src="<?php echo base_url('assets/img/telkomlogo.png'); ?>" style="width: 150px; height: 120px; float: right" alt="">
        <table class="">
            <p style="padding-top: 100px;font-size: 20px; text-align: center"><strong>FORMULIR PENGAJUAN BERHENTI BERLANGGANAN</strong> </p>
            <p style="font-size: 14px; padding-top: 15px"><i>Kami sampaikan terima kasih atas kepercayaan dan kesediaan Anda menjadi pelanggan Indihome. Jika Anda memutuskan untuk berhenti, mohon kesediaannya untuk mengisi beberapa pertanyaan berikut, guna peningkatan kualitas pelayanan kami.</i> </p>
            <?php foreach ($indihomes as $indihome){ ?>
            <tr>
                <td>Nama</td>
                <td><label style="margin-left: 100px" ><?php echo $indihome->nama_pemohon ?></label></td>
            </tr>
            <tr>
                <td>Nomor Indihome</td>
                <td><label style="margin-left: 100px" ><?php echo $indihome->nomor_indihome ?></label></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><label style="margin-left: 100px" ><?php echo  $indihome->nomor_hp ?></label></td>
            </tr>
            <tr>
                <td>status</td>
                <td>
                    <input style="margin-left: 100px" class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Penanggung Jawab Indihome" <?php if ($indihome->status == "Penanggung Jawab Indihome"){echo "checked";} ?> disabled> Penanggung Jawab Indihome
                    <input class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Anak / Saudara" <?php if ($indihome->status == "Anak / Saudara"){echo "checked";} ?> disabled> Anak / Saudara
                    <input class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Suami / Istri" <?php if ($indihome->status == "Suami / Istri"){echo "checked";} ?> disabled> Suami / Istri
                    <input class="checkbox-inline" type="checkbox" name="status[]" alt="Checkbox" value="Pekerja / Lainnya" <?php if ($indihome->status == "Pekerja / Lainnya"){echo "checked";} ?> disabled> Pekerja / Lainnya
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>1. Bagaimana Kepuasan Anda terhadap layanan indihome ?
                    <br>&nbsp;&nbsp;&nbsp;
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Sangat Puas" <?php if ($indihome->kepuasan == "Sangat Puas"){echo "checked";} ?> disabled> Sangat Puas
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Puas" <?php if ($indihome->kepuasan == "Puas"){echo "checked";} ?> disabled> Puas
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Biasa Saja" <?php if ($indihome->kepuasan == "Biasa Saja"){echo "checked";} ?> disabled> Biasa Saja
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Kecewa" <?php if ($indihome->kepuasan == "Kecewa"){echo "checked";} ?> disabled> Kecewa
                    <input class="checkbox-inline" type="checkbox" name="kepuasan[]" alt="Checkbox" value="Sangat Kecewa" <?php if ($indihome->kepuasan == "Sangat Kecewa"){echo "checked";} ?> disabled> Sangat Kecewa
                </td>
            </tr>
            <tr>
                <td>2. Kenapa Anda Ingin Berhenti Berlangganan Indihome ?
                    <br>&nbsp;&nbsp;&nbsp;
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Pindah Alamat" <?php if ($indihome->alasan == "Pindah Alamat"){echo "checked";} ?> disabled> Pindah Alamat
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Jarang Tidak Digunakan Lagi" <?php if ($indihome->alasan == "Jarang Tidak Digunakan Lagi"){echo "checked";} ?> disabled> Jarang Tidak Digunakan Lagi

                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Terlalu Mahal" <?php if ($indihome->alasan == "Terlalu Mahal"){echo "checked";} ?> disabled> Terlalu Mahal
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Sudah Punya Indihome" <?php if ($indihome->alasan == "Sudah Punya Indihome"){echo "checked";} ?> disabled> Sudah Punya Indihome

                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Sering Gangguan" <?php if ($indihome->alasan == "Sering Gangguan"){echo "checked";} ?> disabled> Sering Gangguan
                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Ganti Operator" <?php if ($indihome->alasan == "Ganti Operator"){echo "checked";} ?> disabled> Ganti Operator
<!--                    <input class="checkbox-inline" type="checkbox" name="alasan[]" alt="Checkbox" value="Lainnya" --><?php //if ($indihome->alasan == "Lainnya"){echo "checked";} ?><!-- disabled> Lainnya-->
                </td>
            </tr>
            <tr>
                <td>3. Pengembalian CPE ?
                    <br>&nbsp;&nbsp;&nbsp;
                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="ONT" <?php if ($indihome->perangkat == "ONT"){echo "checked";} ?> disabled> ONT
                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="STB" <?php if ($indihome->perangkat == "STB"){echo "checked";} ?> disabled> STB

                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="PLC" <?php if ($indihome->perangkat == "PLC"){echo "checked";} ?> disabled> PLC
                    <input class="checkbox-inline" type="checkbox" name="perangkat[]" alt="Checkbox" value="Wifi Extender" <?php if ($indihome->perangkat == "Wifi Extender"){echo "checked";} ?> disabled> Wifi Extender

                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px"><?php echo $indihome->witel ?>,<?php echo date('m/d/Y',  $indihome->date);?> <br>
                    <br>
                    <form method="POST" action="<?php echo site_url('Tutupindihome/restitusi_sign2') ?>">
                        <p>PELANGGAN</p>
                        <!--                <input style="display:none" name="author_sign" type="text" value="--><?php //echo $this->ion_auth->user()->row()->id ?><!--">-->
                        <p>( <?php echo $indihome->nama_pemohon ?> )</p>
                        <?php if ($indihome->author_sign2 != null OR $indihome->signature2 != null) { ?>

                            <?php if($indihome->signature_true2 == 0){ ?>
                            <div class="sigPad signed" style="margin-left:-100px;">
                                <div class="sigWrapper">
                                    <canvas class="pad" width="220px"></canvas>
                                </div>
                            </div>

                            <script>
                                var sig = <?php echo $indihome->author_sign ?>;
                                $(document).ready(function() {
                                    $('.sigPad').signaturePad({displayOnly: true}).regenerate(sig);
                                    const data = $('.sigPad').signaturePad.toDataURL();
                                    signaturePad.clear();
                                    signaturePad.fromDataURL(data);
                                });
                            </script>
                        <?php }else{ $indihome->signature2 ?>
                        <img class="pad" width="220px" src="<?= $indihome->author_sign2?>" />
                        <?php }?>
                        <?php } else { ?>
                            <div id="signature-pad2" class="signature-pad">
                                <div class="signature-pad--body">
                                    <canvas width="220px" style="padding: 10px;border:1px dotted;    height: 171.98px;"></canvas>
                                </div>
                                <div class="signature-pad--footer">
                                    <div class="signature-pad--actions">
                                        <div>
                                            <button type="button" class="button clear btn btn-sm btn-danger" data-action="clear">Clear</button>
                                            <input type="submit" id="signaturestore2" value="Ok" class="btn btn-sm btn-success" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
                            <script>
                                var wrapper = document.getElementById("signature-pad2");
                                var clearButton = wrapper.querySelector("[data-action=clear]");
                                var canvas = wrapper.querySelector("canvas");
                                var signaturePad = new SignaturePad(canvas, {
                                    // It's Necessary to use an opaque color when saving image as JPEG;
                                    // this option can be omitted if only saving as PNG or SVG
                                    backgroundColor: 'rgb(255, 255, 255)',
                                    penColor: 'blue',
                                    onEnd: function () {
                                        console.log(dataURL = signaturePad.toDataURL());
                                        if (signaturePad.isEmpty()) {

                                        }else{
                                            $("#signaturestore2").prop("disabled", false);
                                            $("#output").val(dataURL = signaturePad.toDataURL());
                                        }

                                    }
                                });
                                $("#signaturestore2").prop('disabled', true);
                                // Adjust canvas coordinate space taking into account pixel ratio,
                                // to make it look crisp on mobile devices.
                                // This also causes canvas to be cleared.
                                function resizeCanvas() {
                                    // When zoomed out to less than 100%, for some very strange reason,
                                    // some browsers report devicePixelRatio as less than 1
                                    // and only part of the canvas is cleared then.
                                    var ratio =  Math.max(window.devicePixelRatio || 1, 1);

                                    // This part causes the canvas to be cleared
                                    canvas.width = canvas.offsetWidth * ratio;
                                    canvas.height = canvas.offsetHeight * ratio;
                                    canvas.getContext("2d").scale(ratio, ratio);

                                    // This library does not listen for canvas changes, so after the canvas is automatically
                                    // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
                                    // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
                                    // that the state of this library is consistent with visual state of the canvas, you
                                    // have to clear it manually.
                                    signaturePad.clear();
                                }

                                // On mobile devices it might make more sense to listen to orientation change,
                                // rather than window resize events.
                                window.onresize = resizeCanvas;
                                resizeCanvas();


                                clearButton.addEventListener("click", function (event) {
                                    signaturePad.clear();
                                    $("#signaturestore2").prop('disabled', true);
                                });


                            </script>
                        <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">

                        <input type="hidden" id="output" name="output" class="output" value="" required="required">

                        <?php } ?>
                    </form>
                </td>

            </tr>
            <br>
        </table>
        <table class="table table-striped ">
            <p style="padding-top: 50px;font-size: 20px; text-align: center"><strong>PAKET PELANGGAN SETIA</strong> </p>
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
                <td rowspan="2"><input class="checkbox-inline" id="myCheck" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET KUOTA" <?php if ($indihome->paket == "2P INTERNET KUOTA"){echo "checked";} ?> disabled> 2P INTERNET KUOTA</td>
                <td>Internet kuota 5 GB Kecepatan 10 Mbps</td>
                <td rowspan="1"><label style="font-size: 15px">65.000</label></td>
                <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="71.500" <?php if ($indihome->harga == "71.500"){echo "checked";} ?> disabled> 71.500</label></td>
            </tr>

            <tr>
                <td>Telepon Incoming Only</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET UNLIMITED" <?php if ($indihome->paket == "2P INTERNET UNLIMITED"){echo "checked";} ?> disabled> 2P INTERNET UNLIMITED</td>
                <td>Internet Kecepatan 10 Mbps</td>
                <td><label style="font-size: 15px">240.000</label></td>
                <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="267.000" <?php if ($indihome->harga == "267.000"){echo "checked";} ?> disabled> 267.000</label></td>
            </tr>
            <tr>
                <td>Telepon Incoming Only</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET TELEPON" <?php if ($indihome->paket == "2P INTERNET TELEPON"){echo "checked";} ?> disabled> 2P INTERNET TELEPON</td>
                <td>Internet Kecepatan 10 Mbps</td>
                <td rowspan="1"><label style="font-size: 15px">262.000</label></td>
                <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="291.860" <?php if ($indihome->harga == "291.860"){echo "checked";} ?> disabled> 291.860</label></td>
            </tr>
            <tr>
                <td>Telepon Incoming + outgoing</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="2P INTERNET TV" <?php if ($indihome->paket == "2P INTERNET TV"){echo "checked";} ?> disabled> 2P INTERNET TV</td>
                <td>Internet Kecepatan 10 Mbps</td>
                <td rowspan="1"><label style="font-size: 15px">290.000</label></td>
                <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="322.000" <?php if ($indihome->harga == "322.000"){echo "checked";} ?> disabled> 322.000</label></td>
            </tr>
            <tr>
                <td>USETV 90 CHANNEL</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="3"><input class="checkbox-inline" type="checkbox" name="paket[]" alt="Checkbox" value="3P INDIHOME" <?php if ($indihome->paket == "3P INDIHOME"){echo "checked";} ?> disabled> 3P INDIHOME</td>
                <td>Internet Kecepatan 10 Mbps</td>
                <td rowspan="1"><label style="font-size: 15px">300.000</label></td>
                <td><label style="font-size: 15px"><input class="checkbox-inline" type="checkbox" name="harga[]" value="333.000" <?php if ($indihome->harga == "333.000"){echo "checked";} ?> disabled> 333.000</label></td>
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
                <td rowspan="3"><input class="checkbox-inline" type="checkbox" name="cabut" alt="Checkbox" value="Tetap Ingin Cabut" <?php if ($indihome->cabut == "Tetap Ingin Cabut"){echo "checked";} ?> disabled> Tetap Ingin Cabut</td>
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
                    <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Paket lama" <?php if ($indihome->petugas == "Paket lama"){echo "checked";} ?> disabled> Paket lama
                    <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Value Netizen" <?php if ($indihome->petugas == "Value Netizen"){echo "checked";} ?> disabled> Value Netizen
                    <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Kuota" <?php if ($indihome->petugas == "Kuota"){echo "checked";} ?> disabled> Kuota
                    <input class="checkbox-inline" type="checkbox" name="petugas[]" alt="Checkbox" value="Berhenti" <?php if ($indihome->petugas == "Berhenti"){echo "checked";} ?> disabled> Berhenti
                    <br>
                    <textarea style="margin-top: 10px" class="" name="alasan_lain" id="" cols="80" rows="4" placeholder="<?php $indihome->alasan_lain ?>" disabled></textarea>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">
                    <p>Nama & Ttd Petugas</p>
                    <img src="<?php echo base_url('sign/cs/' . $this->ion_auth->user($indihome->author)->row()->username . '.png') ?>" style="min-height: 150px; height: 150px;"/>
                    <p><?php echo sprintf('( %s )', $this->ion_auth->user($indihome->author)->row()->full_name) ?></p>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div>
            <p style="font-size: 12px"><i>NB : Untuk Pelanggan yang menggunakan metode pembayaran terjadwal pada Bank yang digunakan. Autodebet adalah persetujuan antara Pelanggan dengan Bank, bukan Pelanggan dengan Telkom.</i> </p>
        </div>
    </div>
    <hr>
</div>
<input style="float:right; margin-right:30px" type="submit" value="Print" onClick="printDiv()">
<a class="btn btn-primary" href="<?php echo base_url('Tutupindihome/indihome_list'); ?>" style="float:left; margin-left:50px">Back</a>
        </section>
    </div>
<?php $this->load->view('dist/_partials/js'); ?>
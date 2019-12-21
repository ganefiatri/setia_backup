<div style="padding: 20px;">
    <h2 style="text-align: center; margin-bottom: 20px">Form Berhenti Langganan</h2><br>
    <hr>
<!--    --><?php //echo //base_url('kwitansi'); ?>
    <form method="POST" action="<?php echo base_url('Tutupindihome'); ?>">
        <table class="">
            <tr>
                <td>Nama Pemohon</td>
                <td style="padding: 5px"><input style="margin-left: 100px;" class="form-control" type="text" name="nama_pemohon"></td>
            </tr>
            <tr>
                <td>Nomor Indihome</td>
                <td style="padding: 5px"><input style="margin-left: 100px" class="form-control" type="text" name="nomor_indihome"></td>
            </tr>
            <tr>
                <td>Nomor HP / WA</td>
                <td style="padding: 5px"><input style="margin-left: 100px" class="form-control" type="text" name="nomor_hp"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td style="padding: 5px">
                    <select style="margin-left: 100px" class="form-control" name="status">
                        <option value="Penanggung Jawab Indihome">Penanggung Jawab Indihome</option>
                        <option value="Anak / Saudara">Anak / Saudara</option>
                        <option value="Suami / Istri">Suami / Istri</option>
                        <option value="Pekerja / Lainnya">Pekerja / Lainnya</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kepuasan Layanan Indihome</td>
                <td style="padding: 5px">
                    <select style="margin-left: 100px" class="form-control" name="kepuasan">
                        <option value="Sangat Puas">Sangat Puas</option>
                        <option value="Puas">Puas</option>
                        <option value="Biasa Saja">Biasa Saja</option>
                        <option value="Kecewa">Kecewa</option>
                        <option value="Sangat Kecewa">Sangat Kecewa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alasan Berhenti</td>
                <td style="padding: 5px">
                    <select style="margin-left: 100px" class="form-control" name="alasan">
                        <option value="Pindah Alamat">Pindah Alamat</option>
                        <option value="Jarang Tidak Digunakan Lagi">Jarang Tidak Digunakan Lagi</option>
                        <option value="Terlalu Mahal">Terlalu Mahal</option>
                        <option value="Sudah Punya Indihome">Sudah Punya Indihome</option>
                        <option value="Sering Gangguan">Sering Gangguan</option>
                        <option value="Ganti Operator">Ganti Operator</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alasan Lainnya</td>
                <td style="padding: 5px">
                    <textarea style="margin-left: 100px" class="form-controller" name="alasan_lain" id="" cols="40" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="padding: 5px"></td>
            </tr>
        </table>
        <input class="btn-primary" style="margin-left: 700px;" type="submit" value="Kirim">
    </form>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<?php echo $error;?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Upload Sign Digital</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Upload</a></div>
                <div class="breadcrumb-item"><a href="#">Upload Sign</a></div>
                <div class="breadcrumb-item">Form Upload</div>
            </div>
        </div>
<?php echo form_open_multipart('upload/aksi_upload');?>
<div class="form-group">
    <p><span>Noted</span></p>
    <p>*Upload Sign Dengan Ext PNG</p>
    <label for="inputEmail3" class="col-sm-2 control-label">Sign</label>

    <div class="col-sm-10">
        <input type="file" name="berkas" class="form-control" id="gambar" placeholder="Sign">
    </div>

</div>
<br />
<button type="submit">Kirim</button>
<br><br>
<a href="<?= base_url().'Upload/view_upload' ?>">Lihat</a>

</form>
    </section>
</div>
<?php $this->load->view('dist/_partials/js'); ?>
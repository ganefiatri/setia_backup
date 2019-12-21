<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Sign Digital</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Upload</a></div>
                <div class="breadcrumb-item"><a href="#">List Upload Sign</a></div>
                <div class="breadcrumb-item">List View Upload</div>
            </div>
        </div>
<table class="table">
    <thead>
    <th>Nama</th>
    <th>Photo</th>
    <th>Aksi</th>
    </thead>
    <tbod>

        <?php foreach ($signdb as $item):?>
        <tr>
            <td><?php echo $this->ion_auth->user()->row()->username?></td>
            <td><img style="width: 100px; height: 100px" src="<?php echo base_url().'sign/cs/'.$this->ion_auth->user()->row()->username.'.png'?>" alt="Photo"></td>
            <td><a class="btn btn-danger" href="<?= base_url('Upload/hapus/'.$item->id) ?>" onClick="return doconfirm();">Delete</a></td>
        </tr>

        <?php endforeach; ?>
    </tbod>
</table>
<a href="<?= base_url()?>">Back</a>
        <script>
            function doconfirm()
            {
                job=confirm("Are you sure to delete permanently?");
                if(job!=true)
                {
                    return false;
                }
            }
        </script>
    </section>
</div>
<?php $this->load->view('dist/_partials/js'); ?>
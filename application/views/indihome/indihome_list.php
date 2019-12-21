<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
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
<div style="padding:40px">
<!--        <div class="form-group">-->
<!--            <label for="inputEmail3" class="col-sm-2 control-label">Witel</label>-->
<!---->
<!--            <div class="col-sm-10">-->
<!---->
<!--                <select name="plasa" class="form-control">-->
<!--                    --><?php //foreach ($plasa as $res) { ?>
<!--                        <option value="--><?php //echo $res->witel ?><!--">--><?php //echo $res->witel ?><!--</option>-->
<!--                    --><?php //} ?>
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
    <div id="accordion1"></div>
    <div class="accordion">
        <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
            <h4>Search By Witel ? </h4>
        </div>
        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion1" style="">
            <?php $group = $this->ion_auth->get_users_groups()->row();
                if ($group->name == "Super Admin") {?>
                <form action="<?php echo base_url().'Tutupindihome/addlist_witel_admin' ?>" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Witel</label>
    
                        <div class="col-sm-10">
                            <select name="witel" class="form-control">
                                <option value="Medan">Medan</option>
                                <option value="Aceh">Aceh</option>
                                <option value="Babel">Bangka Belitung</option>
                                <option value="Bengkulu">Bengkulu</option>
                                <option value="Jambi">Jambi</option>
                                <option value="Ridar">Riau Daratan</option>
                                <option value="Sumbar">Sumatera Barat</option>
                                <option value="Sumsel">Sumatera Selatan</option>
                                <option value="Sumut">Sumatera Utara</option>
                                <option value="Sumut">Riau Kepulauan</option>
                            </select>
                        </div>
                    </div>
                    <button style="float: right; margin-top: 10px" type="submit">Search</button>
                </form>
                <?php }else {?>
                    <form action="<?php echo base_url().'Tutupindihome/addlist_witel_cs' ?>" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Witel</label>

                            <div class="col-sm-10">
                                <select name="witel" class="form-control">
                                    <option value="Medan">Medan</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Babel">Bangka Belitung</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                    <option value="Jambi">Jambi</option>
                                    <option value="Ridar">Riau Daratan</option>
                                    <option value="Sumbar">Sumatera Barat</option>
                                    <option value="Sumsel">Sumatera Selatan</option>
                                    <option value="Sumut">Sumatera Utara</option>
                                    <option value="Sumut">Riau Kepulauan</option>
                                </select>
                            </div>
                        </div>
                        <button style="float: right; margin-top: 10px" type="submit">Search</button>
                    </form>
                <?php }?>
        </div>
    </div>

        <div id="accordion"></div>
        <div class="accordion">
            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                <h4>Search By Plasa ? </h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
            <?php $group = $this->ion_auth->get_users_groups()->row();
            if ($group->name == "Super Admin") {?>
                <form action="<?php echo base_url().'Tutupindihome/addlist_admin' ?>" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Plasa</label>

                    <div class="col-sm-10">
                        <select name="plasa" class="form-control">
                            <?php foreach ($plasa as $res) { ?>
                                <option value="<?php echo $res->id_plasa ?>"><?php echo $res->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button style="float: right; margin-top: 10px" type="submit">Search</button>
            </form>
            <?php }else {?>
                <form action="<?php echo base_url().'Tutupindihome/addlist_cs' ?>" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Plasa</label>

                        <div class="col-sm-10">
                            <select name="plasa" class="form-control">
                                <?php foreach ($plasa as $res) { ?>
                                    <option value="<?php echo $res->id_plasa ?>"><?php echo $res->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button style="float: right; margin-top: 10px" type="submit">Search</button>
            <?php } ?>
            </div>
        </div>

<!--    --><?php //foreach ($list as $lists) { ?>
<!--        --><?php //var_dump($lists); ?>
<!--    --><?php //} ?>
<!--    <div>-->
<!--        <button id="btnExport3" onclick="">Print</button>-->
<!--    </div>-->
    <div class="divclass3 box-body" style="display:none">
        <table class="table">
            <thead>
            <th>Date</th>
            <th>CSR</th>
            <th>Nama Pemohon</th>
            <th>Nomor Indihome</th>
            <th>Nomor HP / WA</th>
            <th>Status</th>
            <th>Kepuasan</th>
            <th>Alasan</th>
            <th>Alasan lainnya</th>
            </thead>
            <?php
            foreach ($list as $row) {?>
            <tbody>
            <td><?php echo $row->date  ?></td>
            <td><?php echo $this->ion_auth->user($row->author)->row()->full_name  ?></td>
            <td><?php echo $row->nama_pemohon  ?></td>
            <td><?php echo $row->nomor_indihome ?></td>
            <td><?php echo $row->nomor_hp ?></td>
            <td><?php echo $row->status ?></td>
            <td><?php echo $row->kepuasan ?></td>
            <td><?php echo $row->alasan ?></td>
            <td><?php echo $row->alasan_lain ?></td>
            <?php }?>
            </tbody>
        </table>
        <!-- <tr class="end"><td>Total</td><td></td><td></td><td><?php //echo $total ?></td></tr> -->
    </div>
    <script>
        $("#btnExport3").click(function(e) {
            let file = new Blob([$('.divclass3').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "TutupIndihome.xls"}).appendTo("body").get(0).click();
            e.preventDefault();
        });
    </script>

    <?php
    if (isset($list)) {

        echo sprintf('<div class="" style="">
        
            </div>');
        echo '</div><div class="">';
        $this->load->view('indihome/indihome_list2.php');
        echo '</div>';
    }
    ?>


</div>
</section>
</div>
<?php $this->load->view('dist/_partials/js'); ?>
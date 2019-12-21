<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script src="<?php echo base_url('assets/footable/js/footable.min.js') ?>"></script>
<script>

    $(function() {
        $('.footable').footable();
    });

</script>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User Telkom</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">User Management</a></div>
                <div class="breadcrumb-item">User Telkom</div>
            </div>
        </div>
        <div class="col-md-12">
            <?php
            /*
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */
            if ($this->ion_auth->get_users_groups()->row()->id != 1) {
                echo sprintf('<div class="box box-danger">
                <div class="box-body">
                %s
                </div>
                </div>', $no_permission);
            } else {
                ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user"></i> User management</h3>

                        <div class="box-tools" style="padding-bottom: 10px">
                            <a href="<?php echo site_url('user/unew') ?>" class="btn btn-success"/><span class="fa fa-plus"></span> Create New User</a>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                        <div id="accordion1"></div>
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
                                <h4>Search By Witel ? </h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion1" style="">
                                    <form action="<?php echo base_url().'User/ulist_witel' ?>" method="post">
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
                            </div>
                        </div>

                        <div id="accordion"></div>
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                <h4>Search By Plasa ? </h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                                    <form action="<?php echo base_url().'User/ulist_plasa' ?>" method="post">
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
                            </div>
                        </div>

                    </div>

                    <div class="box-body">

                        <table class="table table-responsive table-hover footable" data-sorting="true">
                            <tr style="    border-bottom: 3px solid #ddd;
                        /* background: #ddd; */
                        background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                                <th class="sorting">Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th>Lokasi</th>
                                <th>Act</th>
                            </tr>
                            <?php
                            foreach ($users as $user) {
                                $usergroup = $this->ion_auth->get_users_groups($user->id)->row();
                                echo sprintf('<tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>
                                        <a class="btn btn-primary btn-xs" href="%s"><span class="fa fa-pencil-square-o"></span> Edit</a>
                                        <a class="btn btn-danger btn-xs" onClick="return doconfirm();" href="%s"><span class="fa fa-pencil-square-o"></span> Delete</a>
                                        </td>
                                        </tr>', $user->username, $user->full_name, $user->email, $usergroup->name, $user->nama, site_url('user/uedit/' . $user->id), site_url('user/hapus/' . $user->id)
                                );
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <?php
            }

            $config['base_url'] = current_url();
            $config['total_rows'] = count($users);
            $config['per_page'] = 20;

            $this->pagination->initialize($config);

            echo $this->pagination->create_links();
            ?>

        </div>
    </section>
</div>

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
<?php $this->load->view('dist/_partials/js'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<?php //var_dump($test); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    // $(document).ready(function() {
    //     $('#tanggal-range').daterangepicker({
    //         "ranges": {
    //             'Mingguan': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
    //             'Bulanan': [moment().startOf('month'), moment().endOf('month')],
    //             '30 Hari': [moment().subtract(29, 'days'), moment()],
    //             'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //         },
    //         "alwaysShowCalendars": true,
    //         "opens": "center",
    //         startDate: moment().subtract(29, 'days'),
    //         endDate: moment()
    //     }, function(start, end, label) {
    //         console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
    //     });
    // });
</script>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Laporan All</a></div>
                <div class="breadcrumb-item">Laporan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="box">
                <div class="box-body">

                </div>
            </div>
            <script>
                $(function() {
                    $('input[name="tanggal_range"]').daterangepicker({
                        opens: 'center'
                    }, function(start, end, label) {
                        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    });
                });
            </script>

            <div id="accordion1"></div>
            <div class="accordion">
                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
                    <h4>Search By Witel ? </h4>
                </div>
                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion1" style="">
                    <form action="<?php echo base_url().'Laporan/indihome_laporan2' ?>" method="post">
                        <div class="form-group">
                            <label>Date Range Picker</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="text" name="tanggal_range" class="form-control daterange-cus">
                            </div>
                        </div>
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
                    <form method="post" action="<?php echo base_url().'Laporan/indihome_laporan' ?>">
                        <div class="form-group">
                            <label>Date Range Picker</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="text" name="tanggal_range" class="form-control daterange-cus">
                            </div>
                        </div>
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

            <div class="col-md-3 box">
                <!--    <h5>Noted</h5>-->
                <!--    <p>* Being repaired, please wait, this take a while, tq.</p>-->
            </div>
            <!--            test -->

            <div class="section-body">
                <?php
                if (isset($test)) {

                    echo sprintf('<div class="col-md-12" style="">
        <h4 align="center">Tanggal %s - %s </h4>
            </div>', $tanggal[0], $tanggal[1]);
                    echo '</div>';
                    $this->load->view('indihome/laporan_print.php');
                    echo '';
                }
                ?>
            </div>

            <!--            test-->
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<link href="<?= base_url('/assets/footable/css/footable.bootstrap.min.css') ?>" rel="stylesheet"/>
<script src="<?= base_url('/assets/footable/js/footable.min.js') ?>"></script>
<script>$(function() {
        $('.footable').footable();
    });</script>

<script>
    $(document).ready(function() {
        $('#tanggal-range').daterangepicker({
            "ranges": {
                'Mingguan': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
                'Bulanan': [moment().startOf('month'), moment().endOf('month')],
                '30 Hari': [moment().subtract(29, 'days'), moment()],
                'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
            "opens": "center",
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });
</script>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Rest Timer</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Laporan Rest Timer</a></div>
                <div class="breadcrumb-item">Laporan Rest Timer</div>
            </div>
        </div>

        <div class="section-body">
            <div class="box">
                <div class="box-body">
                    <form name="myFirstForm" method="post" action="">
                        <div class="form-group">
                            <label for="waktu" style="width: 100%;">Waktu</label>
                            <input name="tanggal_range" type="text" id="tanggal-range" class="form-control">
                        </div>
                        <hr>
                        <input type="submit" value="ok" class="btn btn-block btn-success">
                    </form>

                    <?php
                    if (isset($lap_breaktimeall)) {
                        echo '</div>';
                        $this->load->view('laporan/rekapaimer.php');
                        echo '';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>


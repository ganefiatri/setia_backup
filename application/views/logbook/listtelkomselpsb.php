<link href="<?php echo base_url('assets/css/datatablesfix.css') ?>" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css" type="text/css"/>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!--    test-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Logbook PSB TELKOMSEL</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">Logbook PSB TELKOMSEL</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Logbook PSB TELKOMSEL</h4>

                    </div>
                    <div><a href="<?php echo base_url('logbook/exportpsbtelkomsel') ?>" style="color:white; text-decoration:underline;">Export to excel (undercontruction)</a></div>
                    <div class="box-tools">
                        <input type="text" id="SearchTable" class="form-control" placeholder="Cari... (Tekan enter)">
                    </div>
                    <div id="artikel-list" class="card-body">
                        <table id="mytable" class="table">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Case</th>
                                <th>Date</th>
                                <th>CSR</th>
                                <th>AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- --><?php //echo $this->pagination->create_links(); ?>
<?php $this->load->view('dist/_partials/js'); ?>

<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<style>
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
        visibility: hidden;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var simple_checkbox = function(data, type, full, meta) {
            var is_checked = data == true ? "CLOSED" : "PENDING";
            return '<span>' + is_checked + '</span>';
        }


        var t = $("#mytable").DataTable({
            scrollY:        380,
            deferRender:    true,
            scroller:       true,
            fixedHeader: {
                header: true
            },
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                            }
                        });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?= site_url('json/logbooktelkomselpsb') ?>",
                "type": "POST"
            },

            columns: [
                {"data": "nama_plgn"},
                {"data": "case_type"},
                {"data": "waktu"},
                {"data": "full_name"},
                {"data": "aksi"}

            ],

            order: [[2, 'desc']],
        });

        oTable = $('#mytable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        $('#SearchTable').keyup(function(e) {
            if (e.keyCode == 13)
            {
                oTable.search($(this).val()).draw();
            }

        })

    });
</script>
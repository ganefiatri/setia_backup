<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<!--<section class="section">-->
<table id="table_id" class="table table-striped table-bordered">
    <thead>
    <th>Tanggal</th>
    <th>Nama Customer Service</th>
    <th>Nama Pemohon</th>
    <th>Nomor Indihome</th>
    <th>Plasa</th>
    <th>Witel</th>
    <th>Action</th>
    </thead>
    <?php
    $group_id = "admin";
    $user = $this->session->userdata('username');
    foreach ($list as $res) {?>
    <tbody>
    <td><?php echo date('d/m/y',$res->date) ?></td>
    <td><?php echo $this->ion_auth->user($res->author)->row()->full_name  ?></td>
    <td><?php echo $res->nama_pemohon ?></td>
    <td><?php echo $res->nomor_indihome ?></td>
    <td><?php echo $res->nama ?></td>
    <td><?php echo $res->witel ?></td>
    <td>
        <a href="<?= site_url('Tutupindihome/indihome_detail/'.$res->id) ?>" class="btn btn-success btn-xs">View</a>
        <?php
        $user = $this->session->userdata('username');
        if($this->ion_auth->in_group('Super Admin')) { ?>
            <a href="<?= site_url('Tutupindihome/hapus/'.$res->id) ?>" class="btn btn-danger btn-xs" onClick="return doconfirm();">Delete</a>
        <?php } ?>
    </td>

    <?php } ?>
    </tbody>
</table>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
<!--</section>-->
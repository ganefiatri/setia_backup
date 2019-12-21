<?php //foreach ($test as $ria){ ?>
<!--    --><?php //var_dump($ria); ?>
<?php //} ?>
<?php //var_dump($test); ?>
<div class="card">
    <div class="card-header" style="">DATA ALL PENUTUPAN INDIHOME</div>
    <div class="card-body">
        <table class="table">
            <thead>
            <th>Customer Name</th>
            <th>Plasa</th>
            <th>Total</th>
<!--            <th>Export</th>-->
            </thead>
            <tbody>
            <?php
            $menu = "To Excel";
            $total = null;
            $spaces = array('&nbsp;',' ');
            foreach ($test->result() as $row) { ?>
<!--            --><?php //var_dump($row); ?>
                <tr>
                    <td><?= $this->ion_auth->user($row->author)->row()->full_name ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->id ?></td>
                    <?php $total = $total + $row->id ?>
<!--                    <td><button>--><?//= $menu ?><!--</button></td>-->
                </tr>
            <?php } ?>
            </tbody>
            <tr class="end">
                <td>TOTAL</td><td></td><td><?php echo $total ?></td><td></td><br>
            </tr>
            <td><button id="btnExport2">Export to Excel ALL</button></td>
        </table>

        <div class="divclass3 box-body" style="display:">
            <table class="table">
                <thead>
                <th>Tanggal</th>
                <th>Customer Name</th>
                <th>Plasa</th>
                <th>Nama Pemohon</th>
                <th>Nomor Indihome</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Status</th>
                <th>Kepuasan</th>
                <th>Alasan</th>
                <th>Paket</th>
                <th>Harga</th>
                <th>Perangkat</th>
                <th>Cabut</th>
                </thead>
                <tbody>
                <?php

                foreach ($test2->result() as $row) {  ?>
                    <!--            --><?php //var_dump($row); ?>
                    <tr>
                        <td><?= date('m/d/Y', $row->date) ?></td>
                        <td><?= $this->ion_auth->user($row->author)->row()->full_name ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->nama_pemohon ?></td>
                        <td><?= $row->nomor_indihome ?></td>
                        <td><?= $row->nomor_hp ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->status_indihome ?></td>
                        <td><?= $row->kepuasan ?></td>
                        <td><?= $row->alasan ?></td>
                        <td><?= $row->paket ?></td>
                        <td><?= $row->harga ?></td>
                        <td><?= $row->perangkat ?></td>
                        <td><?= $row->cabut ?></td>
                        <!--                    <td><button>--><?//= $menu ?><!--</button></td>-->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- <tr class="end"><td>Total</td><td></td><td></td><td><?php echo $total ?></td></tr> -->
        </div>
    </div>
    <script>
        $("#btnExport2").click(function(e) {
            let file = new Blob([$('.divclass3').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "TutupIndihome.xls"}).appendTo("body").get(0).click();
            e.preventDefault();
        });
    </script>
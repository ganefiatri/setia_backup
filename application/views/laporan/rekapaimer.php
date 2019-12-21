<style>
    /*.telat{*/
    /*    background: red;*/
    /*}*/
    /*.ontime{*/
    /*    background: green;*/
    /*}*/

</style>
<div class="col-md-12" style="margin-top: 10px">
    <div class="box">
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                <th>CSR</th>
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Waktu istirahat</th>
                <th style="text-align: center">Aksi</th>
                <?php if ($this->ion_auth->get_users_groups()->row()->id == 1) { ?><th></th><?php } ?>
                </thead>
                <?php
                foreach ($lap_breaktimeall->result() as $row) {
                    $classbreak = null;
                    $act = null;
                    if ($this->ion_auth->get_users_groups()->row()->id == 1) {
                        $act = sprintf('<td><a class="btn btn-danger btn-xs" href="%s">Hapus</a></td>', site_url('breaktime/hapus/' . $row->id));
                    }
                    $break = $time = $start = $end = null;
                    if ($row->time > 0) {
                        $time = date('d-m-Y', $row->time);
                    }
                    if ($row->start > 0) {
                        $start = date('H:i:s', $row->start);
                    }
                    if ($row->end > 0) {
                        $breaktimestamp = $row->end - $row->start;
                        if ($breaktimestamp > 3600) {
                            $classbreak = 'btn btn-danger';
                        } else {
                            $classbreak = 'btn btn-success';
                        }
                        $end = date('H:i:s', $row->end);
                        $break = gmdate('H:i:s', $breaktimestamp);
                    }
                    echo sprintf('<tr>'
                            . '<td>%s</td>'
                            . '<td>%s</td>'
                            . '<td>%s</td>'
                            . '<td>%s</td>'
                            . '<td><button class="%s">%s</button></td>'
                            . '<td>%s</td>'
                            . '</tr>', $this->ion_auth->user($row->author)->row()->full_name, $time, $start, $end, $classbreak, $break, $act
                    );
                }
                ?>
            </table>
        </div>
    </div>
</div>

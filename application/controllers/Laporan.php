<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('Indihome_model');
        $this->load->model('Plasa_model');
    }

    function validateDate($date) {
        $d = DateTime::createFromFormat('m/d/Y', $date);
        return $d && $d->format('m/d/Y') === $date;
    }

    public function index() {
        $i = $this->input;

        if ($i->post() != null) {
            $tanggal = explode(" - ", $i->post('tanggal_range'));

            if ($this->validateDate($tanggal[0]) == true) {
                $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
            }
            if ($this->validateDate($tanggal[1]) == true) {
                $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
            }
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT count('id') as id, case_type, kronologis, status, date FROM `logbook` WHERE tipe = 2  %s GROUP BY case_type", $where);
            $data['lap_q'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT id,author,kronologis,date,status,case_type,internet_no,ndem_no,tiket_no,nama_plgn,msisdn,tipe FROM `logbook` WHERE tipe=2 %s", $where);
            $data['lap_qall'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT count('id') as id,jenis_product, case_type, kronologis, date FROM `logbook` WHERE tipe = 2  AND case_type = 'Croselling Product Telkom' %s GROUP BY jenis_product", $where);
            $data['lap_croselling'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT count('id') as id,author , case_type, date, kronologis FROM `logbook` WHERE tipe = 2 AND case_type = 'Pasang Baru / Migrasi' %s GROUP BY author", $where);
            $data['lap_psb'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select sum(revenuetelkom) as revenuetelkom, date, author, kronologis, date FROM `logbook` WHERE tipe = 2 AND (case_type= 'Pasang Baru / Migrasi' OR case_type='Ganti Paket Indihome (Non Upgrade) / Migrasi' OR case_type='Croselling Product Telkom')  %s GROUP BY AUTHOR", $where);
            $data['lap_revtelkom'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select revenuetelkom, date, author, kronologis, date, case_type, jenis_product FROM `logbook` WHERE tipe = 2 AND (case_type= 'Pasang Baru / Migrasi' OR case_type='Ganti Paket Indihome (Non Upgrade) / Migrasi' OR case_type='Croselling Product Telkom')  %s", $where);
            $data['lap_revtelkomall'] = $this->db->query($query);

            // ini tuntuk prepaid
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select sum(revenue) as revenue, date,author,kronologis FROM `logbook` WHERE tipe = 1 AND (case_type= 'PREPAID RECHARGE' OR case_type='AKTIVASI VAS PREPAID')  %s GROUP BY AUTHOR", $where);
            $data['lap_rev_prepaid'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select case_type,revenue, date,author,kronologis FROM `logbook` WHERE tipe = 1 AND (case_type= 'PREPAID RECHARGE' OR case_type='AKTIVASI VAS PREPAID')  %s", $where);
            $data['lap_rev_prepaidall'] = $this->db->query($query);
            // ini untuk postpaid
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select sum(revenue) as revenue, date,author,kronologis FROM `logbook` WHERE tipe = 1 AND (case_type= 'PSB HALO' OR case_type='GANTI PAKET TELKOMSEL')  %s GROUP BY AUTHOR", $where);
            $data['lap_rev_postpaid'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select revenue,case_type date,author,kronologis FROM `logbook` WHERE tipe = 1 AND (case_type= 'PSB HALO' OR case_type='GANTI PAKET TELKOMSEL')  %s", $where);
            $data['lap_rev_postpaidall'] = $this->db->query($query);

            $where = sprintf("time BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select * FROM `breaktime` WHERE %s", $where);
            $data['lap_breaktime'] = $this->db->query($query);
            
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT count('id') as id,author , case_type, kronologis, date FROM `logbook` WHERE tipe = 1 AND case_type = 'PSB HALO' %s GROUP BY author", $where);
            $data['lap_psbhalo'] = $this->db->query($query);

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT id,author , msisdn, nama_plgn,case_type, kronologis, date FROM `logbook` WHERE tipe = 1 AND case_type = 'PSB HALO' %s", $where);
            $data['lap_psbhaloall'] = $this->db->query($query);

            // here for case telkom print to excel
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM penutupan INNER JOIN logbook ON penutupan.id_workbook = logbook.id WHERE case_type= 'BAST PENUTUPAN INDIHOME' %s", $where);
            $data['print1'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Buka Isolir' %s", $where);
            $data['print2'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Croselling Product Telkom' %s", $where);
            $data['print3'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Gangguan' %s", $where);
            $data['print4'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Ganti Paket Indihome (Non Upgrade) / Migrasi' %s", $where);
            $data['print5'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Informasi Telkom' %s", $where);
            $data['print6'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Komplain Tagihan / Claim' %s", $where);
            $data['print7'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Pasang Baru / Migrasi' %s", $where);
            $data['print8'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Penutupan Telepon' %s", $where);
            $data['print9'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Penutupan WIFI-iD' %s", $where);
            $data['print10'] = $this->db->query($query);
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Pisah Billing / Gabung Billing' %s", $where);
            $data['print11'] = $this->db->query($query);

            $data['tanggal'] = $tanggal;
        }
//        $data['v'] = 'laporan/form_laporan';
//        $this->load->view('init', $data);
        $data['title'] = 'LAPORAN';
        $this->load->view('laporan/form_laporan', $data);
    }

    public function laporan_admin()
    {
        $i = $this->input;

        if ($i->post() != null) {
            $tanggal = explode(" - ", $i->post('tanggal_range'));

            if ($this->validateDate($tanggal[0]) == true) {
                $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
            }
            if ($this->validateDate($tanggal[1]) == true) {
                $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
            }
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT count('id') as id, case_type FROM `logbook` WHERE tipe = 2  %s GROUP BY case_type", $where);
            $data['lap_q'] = $this->db->query($query);
            // ini tuntuk prepaid
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select sum(revenue) as revenue, date,author FROM `logbook` WHERE tipe = 1 AND (case_type= 'PREPAID RECHARGE' OR case_type='AKTIVASI VAS PREPAID')  %s GROUP BY AUTHOR", $where);
            $data['lap_rev_prepaid'] = $this->db->query($query);
            // ini untuk postpaid
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("select sum(revenue) as revenue, date,author FROM `logbook` WHERE tipe = 1 AND (case_type= 'PSB HALO' OR case_type='GANTI PAKET TELKOMSEL')  %s GROUP BY AUTHOR", $where);
            $data['lap_rev_postpaid'] = $this->db->query($query);
            $data['tanggal'] = $tanggal;
        }
        $data['v'] = 'laporan/form_laporan_admin.php';
        $this->load->view('init', $data);
    }

    
// this is command for export data to excel

//data case telkom
public function printexcel(){
    $i = $this->input;

    if ($i->post() != null) {
        $tanggal = explode(" - ", $i->post('tanggal_range'));

        if ($this->validateDate($tanggal[0]) == true) {
            $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
        }
        if ($this->validateDate($tanggal[1]) == true) {
            $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
        }
       
        $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
        $query = sprintf("SELECT count('id') as id, case_type FROM `logbook` WHERE tipe = 2  %s GROUP BY case_type", $where);
        $data['lap_q'] = $this->db->query($query);            
        $data['tanggal'] = $tanggal;
    }
    $data['v'] = 'laporan/excelcasetelkom.php';
    $this->load->view('init_', $data);
}

//data revenue telkom
public function printexcelrevtelkom(){
    $i = $this->input;

    if ($i->post() != null) {
        $tanggal = explode(" - ", $i->post('tanggal_range'));

        if ($this->validateDate($tanggal[0]) == true) {
            $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
        }
        if ($this->validateDate($tanggal[1]) == true) {
            $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
        }
       
        $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
        $query = sprintf("select sum(revenuetelkom) as revenuetelkom, date,author FROM `logbook` WHERE tipe = 2 AND (case_type= 'Pasang Baru / Migrasi' OR case_type='Ganti Paket Indihome (Non Upgrade) / Migrasi' OR case_type='Croselling Product Telkom')  %s GROUP BY AUTHOR", $where);
        $data['lap_revtelkom'] = $this->db->query($query);            
        $data['tanggal'] = $tanggal;
    }
    $data['v'] = 'laporan/excelrevtelkom.php';
    $this->load->view('init_', $data);
}

//data crosseling product
public function printexcelcroselling(){
    $i = $this->input;

    if ($i->post() != null) {
        $tanggal = explode(" - ", $i->post('tanggal_range'));

        if ($this->validateDate($tanggal[0]) == true) {
            $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
        }
        if ($this->validateDate($tanggal[1]) == true) {
            $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
        }
       
        $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
        $query = sprintf("SELECT * FROM `logbook` WHERE case_type = 'Pasang Baru / Migrasi' %s", $where);
        $data['print8'] = $this->db->query($query);
    }
    $data['v'] = 'laporan/excelcroselling.php';
    $this->load->view('init_', $data);
    
}

//laporan rest timer
public function resttimer(){
    $i = $this->input;

    if ($i->post() != null) {
        $tanggal = explode(" - ", $i->post('tanggal_range'));

        if ($this->validateDate($tanggal[0]) == true) {
            $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
        }
        if ($this->validateDate($tanggal[1]) == true) {
            $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
        }
        $where = sprintf("time BETWEEN %s AND %s", $tanggalA, $tanggalB);
        $query = sprintf("select * FROM `breaktime` WHERE %s", $where);
        $data['lap_breaktimeall'] = $this->db->query($query);         
        $data['tanggal'] = $tanggal;
    }
    $data['title'] = 'resttimer';
    $this->load->view('laporan/dateaimer.php', $data);
    
}

public function test(){
    $data['test1'] = $this->Logbook_model->logbookbast();
    $this->load->view('test', $data);
}


// public function test(){
//     $where = $this->input->post('tanggal_range');
//     $query = sprintf("SELECT count('id') as id,jenis_product, case_type FROM `logbook` WHERE tipe = 2  AND case_type = 'Croselling Product Telkom' %s GROUP BY jenis_product", $where);
//     $data['lap_croselling'] = $this->db->query($query); 
//     $this->load->view('laporan/printcroselling.php', $data);
// }

// this is the end command for export data to excel 

//data revenue telkom
    public function indihome_laporan(){
        $i = $this->input;

        if ($i->post() != null) {
            $tanggal = explode(" - ", $i->post('tanggal_range'));

            if ($this->validateDate($tanggal[0]) == true) {
                $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
            }
            if ($this->validateDate($tanggal[1]) == true) {
                $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
            }
                $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
                $kobar = $i->post('plasa');
               // SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1='$kobar'
                $query = sprintf(" SELECT count('id') as id,author , nama_pemohon, date,nama, nomor_indihome, nomor_hp, email, status, kepuasan, alasan FROM `indihome` inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1='$kobar' %s GROUP BY AUTHOR", $where);
                $data['test'] = $this->db->query($query);
                $query = sprintf(" SELECT * FROM `indihome` inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1='$kobar' %s", $where);
                $data['test2'] = $this->db->query($query);
                $data['tanggal'] = $tanggal;
//           SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where witel ='$kobar'
        }
        $data['plasa'] = $this->Plasa_model->get_plasa();
        $data['title'] = 'LAPORAN';
        $this->load->view('indihome/laporan.php', $data);
    }

    public function indihome_laporan2(){
        $i = $this->input;

        if ($i->post() != null) {
            $tanggal = explode(" - ", $i->post('tanggal_range'));

            if ($this->validateDate($tanggal[0]) == true) {
                $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
            }
            if ($this->validateDate($tanggal[1]) == true) {
                $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
            }
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $kobar = $i->post('witel');
            // SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1='$kobar'
            $query = sprintf(" SELECT count('id') as id,author , nama_pemohon, date,nama, nomor_indihome, nomor_hp, email, kepuasan,status_indihome, alasan, paket, harga, perangkat, cabut FROM `indihome` inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where witel='$kobar' %s GROUP BY AUTHOR", $where);
            $data['test'] = $this->db->query($query);
            $query = sprintf(" SELECT * FROM `indihome` inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where witel='$kobar' %s", $where);
            $data['test2'] = $this->db->query($query);
            $data['tanggal'] = $tanggal;
//           SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where witel ='$kobar'
        }
        $data['plasa'] = $this->Plasa_model->get_plasa();
        $data['title'] = 'LAPORAN';
        $this->load->view('indihome/laporan.php', $data);
    }

}

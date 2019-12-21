<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tutupindihome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Logbook_model');
        $this->load->model('Mbanking_model');
        $this->load->model('Indihome_model');
        $this->load->model('Plasa_model');
        $this->load->model('Mbanking_model', '', TRUE);
        $this->load->helper(array('form', 'url'));

        function validateDate($date)
        {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function index() {
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;

            $status = $this->input->post('status[]');
            $kepuasan= $this->input->post('kepuasan[]');
            $alasan= $this->input->post('alasan[]');
            $petugas= $this->input->post('petugas[]');
            $paket= $this->input->post('paket[]');
            $harga= $this->input->post('harga[]');
            $perangkat = $this->input->post('perangkat[]');

            for ($j = 0; $j < count($alasan); $j++) {
                $data = array(
                    'nama_pemohon' => $i->post('nama_pemohon'),
                    'nomor_indihome' => $i->post('nomor_indihome'),
                    'nomor_hp' => $i->post('nomor_hp'),
                    'email' => $i->post('email'),
                    'author' => $this->ion_auth->user()->row()->id,
                    'status_indihome' => $status[$j],
                    'kepuasan' => $kepuasan[$j],
                    'petugas' => $petugas[$j],
                    'alasan' => $alasan[$j],
                    'paket' => $paket[$j],
                    'harga' => $harga[$j],
                    'alasan_lain' => $i->post('alasan_lain'),
                    'date' => time(),
                    'lokasi_layanan1' => $i->post('lokasi_layanan1'),
                    'perangkat' => $perangkat[$j],
                    'cabut' => $i->post('cabut'),
                );
                $this->db->insert('indihome', $data);
                redirect('Tutupindihome/indihome_list', $data);
            }

        }
    }

    public function indihome(){
//        $data['kwitansi'] = $this->Kwitansi_model->buat_kode();
        $data['v'] = 'indihome/indihome_view.php';
        $this->load->view('init', $data);
    }

    public function indihome_test(){
//        $data['kwitansi'] = $this->Kwitansi_model->buat_kode();
//        $data['v'] = '';
        $this->load->view('indihome/indihome_test.php');
    }

    public function indihome_list(){
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };
        $data['plasa'] = $this->Plasa_model->get_plasa();
//        $data['indihome'] = $this->Plasa_model->get_dataindihome();
//        $data['v'] = '.php';
        $this->load->view('indihome/indihome_list', $data);

    }


    public function indihome_aja() {
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

            $data['tanggal'] = $tanggal;
        }
        $data['v'] = 'laporan/form_laporan.php';
        $this->load->view('init', $data);
    }

    public function testlist(){
        $queryjoin = sprintf("SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa GROUP BY nama");
        $data['test'] = $this->db->query($queryjoin)->result();
        $data['v'] = 'indihome/indihome_list.php';
        $this->load->view('init', $data);
    }

    function addlist_admin(){
        $kobar  = $this->input->post('plasa');
        $data['plasa'] = $this->Plasa_model->get_plasa();
        $data['list'] = $this->Plasa_model->get_list_admin($kobar)->result();
//        $data['v'] = 'indihome/indihome_list.php';
        $this->load->view('indihome/indihome_list', $data);
//        redirect('Tutupindihome/indihome_list');
    }

    function addlist_cs(){
        $kobar  = $this->input->post('plasa');
        $author = $this->ion_auth->user()->row()->id;
        $data['plasa'] = $this->Plasa_model->get_plasa();
        $data['list'] = $this->Plasa_model->get_list_cs($kobar, $author)->result();
//        $data['v'] = 'indihome/indihome_list.php';
        $this->load->view('indihome/indihome_list', $data);
//        redirect('Tutupindihome/indihome_list');
    }
//    public function test_addlist(){
//        $group = $this->ion_auth->get_users_groups()->row();
//        if($group->name == "Super Admin"){
//            redirect('Tutupindihome/addlist_witel_admin', 'refresh');
//        }else{
//            redirect('Tutupindihome/addlist_witel_cs', 'refresh');
//        }
//    }

    function addlist_witel_admin(){
        $kobar=$this->input->post('witel');
        $data['plasa'] = $this->Plasa_model->get_plasa();
        $data['list'] = $this->Plasa_model->get_list_witel_admin($kobar)->result();
//        $data['v'] = 'indihome/indihome_list.php';
        $this->load->view('indihome/indihome_list', $data);
//        redirect('Tutupindihome/indihome_list');
    }

    function addlist_witel_cs(){
        $kobar=$this->input->post('witel');
        $author = $this->ion_auth->user()->row()->id;
        $data['plasa'] = $this->Plasa_model->get_plasa();
        $data['list'] = $this->Plasa_model->get_list_witel_cs($kobar, $author)->result();
//        $data['v'] = 'indihome/indihome_list.php';
        $this->load->view('indihome/indihome_list', $data);
//        redirect('Tutupindihome/indihome_list');
    }

    public function indihome_detail(){
        $id = $this->uri->segment(3, 0);
//        $where = array('id' => $id);
        $data['indihomes'] = $this->Indihome_model->get_list($id)->result();
//        $logbook = $data['indihome'] = $this->db->get_where('indihome', $where)->result()[0];
//        $data['v'] = 'indihome/indihome_detail.php';
        $this->load->view('indihome/indihome_detail', $data);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('indihome');
            redirect(site_url('Tutupindihome/indihome_list'));
        }
    }

    public function restitusi_sign2(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;
            $this->db->where('id', $i->post('id'));
            $this->db->update('indihome', array('signature_true2' => 1,'author_sign2' => $i->post('output')));
            redirect(site_url('Tutupindihome/indihome_detail/' . $i->post('id')));
        }
    }

}
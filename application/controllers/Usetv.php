<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usetv extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Logbook_model');
        $this->load->model('Mbanking_model');
        $this->load->model('Restitusi_model');
        $this->load->model('Usetv_model');
        $this->load->model('Mbanking_model', '', TRUE);
        $this->load->helper(array('form', 'url'));

        function validateDate($date) {
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

            $data = array(
                'nama_pemilik' => $i->post('nama_pemilik'),
                'alamat_pemilik' => $i->post('alamat_pemilik'),
                'no_product' => $i->post('no_product'),
                'nama_kuasa' => $i->post('nama_kuasa'),
                'alamat_kuasa' => $i->post('alamat_kuasa'),
                'no_identitas' => $i->post('no_identitas'),
                'no_handphone' => $i->post('no_handphone'),
                'email' => $i->post('email'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'nominal' => $i->post('nominal'),
                'nominal_text' => $i->post('nominal_text'),
            );

            $this->db->insert('db_usetv', $data);
            redirect('usetv/usetv_list', $data);
        } }

    public function usetv(){
        $data['v'] = 'usetv/usetv_view.php';
        $this->load->view('init', $data);
    }

    public function usetv_list(){
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };
        $data['usetv'] = $this->Usetv_model->get_usetv();
        $data['v'] = 'usetv/usetv_list.php';
        $this->load->view('init', $data);

    }

    public function usetv_detail(){
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['usetv'] = $this->db->get_where('db_usetv', $where)->result()[0];
        $data['v'] = 'usetv/usetv_detail.php';
        $this->load->view('init', $data);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('db_usetv');
            redirect(site_url('usetv/usetv_list'));
        }
    }

    public function restitusi_sign2(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;
            $this->db->where('id', $i->post('id'));
            $this->db->update('db_usetv', array('signature_true2' => 1,'author_sign2' => $i->post('output')));
            redirect(site_url('usetv/usetv_detail/' . $i->post('id')));
        }
    }

}
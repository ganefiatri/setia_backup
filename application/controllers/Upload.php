<?php 

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('Upload_model');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('pagination');
	}

	public function index(){
		$this->load->view('upload/v_upload', array('error' => ' ' ));
	}

    public function aksi_upload(){
        $config['upload_path']          = './sign/cs';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; //1 mb
        $config['file_name']            = $this->ion_auth->user()->row()->username;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('berkas')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload', $error);
        }else{
            $data = array('upload_data' => $this->upload->data("file_name"));
            redirect('Upload/view_upload', $data);
        }
        $data = array(
            'photo' => $this->upload->data("file_name")
        );
        $this->Upload_model->insert($data);
    }

    public function view_upload(){
        $data['signdb'] = $this->Upload_model->get_upload();
        $this->load->view('upload/v_upload_sukses', $data);
    }

    public function hapus_path(){
        $uri = $this->ion_auth->user()->row()->username;
        $path = $this->config->base_url().'sign/cs/'.$uri.'.png';
        $this->load->helper("file"); // load codeigniter file helper
        delete_files($path, true , false, 1);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('upload');
            redirect(site_url('upload/view_upload'));
        }
    }

//	public function aksi_upload(){
//		$config['upload_path']          = './gambar/';
//		$config['allowed_types']        = 'gif|jpg|png';
//		$config['max_size']             = 100;
//		// $config['max_width']            = 1024;
//		// $config['max_height']           = 768;
//
//		$this->load->library('upload', $config);
//
//		if ( ! $this->upload->do_upload('berkas')){
//			$error = array('error' => $this->upload->display_errors());
//			$this->load->view('upload/v_upload', $error);
//		}else{
//			$data = array('upload_data' => $this->upload->data());
//			$this->load->view('upload/v_upload_sukses', $data);
//		}
//	}
	
}
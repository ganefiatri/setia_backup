<?php
class Upload_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert('upload', $data);
    }

    public function get_upload(){
        $this->db->select('*');
        $this->db->from('upload');
        $query = $this->db->get()->result();
        return $query;
    }

//    public function delete($id, $photo){
//        $this->db->where('id', $id);
//        $filename = explode(".", $photo->berkas)[0];
//        unlink("sign/cs/".$filename);
//
//        $this->db->delete('upload', array('id' => $id));
//    }
}

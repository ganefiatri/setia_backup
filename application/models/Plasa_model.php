<?php

class Plasa_model extends CI_Model{

    public function get_plasa()
    {
        $this->db->select('*');
        $this->db->from('plasa');
        $query = $this->db->get()->result();
        return $query;
    }
    public function json_listindihome(){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $this->datatables->select('*');
        $this->datatables->from('indihome');
//        $this->datatables->query("SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa");
        $return = $this->datatables->generate();
        return $return;
    }

    public function get_list_admin($kobar){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $hsl=$this->db->query("SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1='$kobar' ORDER BY date DESC");
        return $hsl;
    }
    
    public function get_list_cs($kobar, $author){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $hsl=$this->db->query("SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1='$kobar' AND author='$author' ORDER BY date DESC LIMIT 10;");
        return $hsl;
    }

    public function get_list_witel_admin($kobar){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $hsl=$this->db->query("SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where witel ='$kobar' ORDER BY date DESC;");
        return $hsl;
    }

    public function get_list_witel_cs($kobar, $author){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $hsl=$this->db->query("SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where witel ='$kobar' AND author='$author' ORDER BY date DESC LIMIT 10;");
        return $hsl;
    }

    public function get_all_data(){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $hsl=$this->db->query("SELECT count('id') as id, nama FROM `indihome` inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where lokasi_layanan1=id_plasa GROUP BY id");
        return $hsl;
    }


    public function get_userplasa() {
        $this->db->select('*');
        $this->db->from('plasa');
        $this->db->join('users','users.id=plasa.id_plasa');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_data() {
        $this->db->select('*');
        $this->db->from('plasa');
        $this->db->join('users','users.lokasi_layanan=plasa.id_plasa');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_data_plasa($kobar) {
        $this->db->select('*');
        $this->db->from('plasa');
        $this->db->join('users','users.lokasi_layanan=plasa.id_plasa');
        $this->db->where("lokasi_layanan = '$kobar'");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_data_witel($kobar) {
        $this->db->select('*');
        $this->db->from('plasa');
        $this->db->join('users','users.lokasi_layanan=plasa.id_plasa');
        $this->db->where("witel = '$kobar'");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_dataindihome() {
        $this->db->select('*');
        $this->db->from('plasa');
        $this->db->join('users','users.lokasi_layanan=plasa.id_plasa');
        $this->db->join('indihome','indihome.lokasi_layanan1=plasa.id_plasa','left');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_all_users(){
        $hsl=$this->db->query("SELECT count(id) FROM users");
        return $hsl;
    }

}
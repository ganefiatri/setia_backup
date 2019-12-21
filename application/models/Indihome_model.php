<?php

class Indihome_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_indihome()
    {
        $this->db->select('*');
        $this->db->from('indihome');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_list($id){
//        SELECT  nama_pemohon , nomor_indihome, lokasi_layanan1, date, id_plasa, nama  FROM indihome INNER JOIN plasa ON indihome.lokasi_layanan1 = plasa.id_plasa
        $hsl=$this->db->query("SELECT * FROM indihome inner join plasa on indihome.lokasi_layanan1 = plasa.id_plasa where id ='$id'");
        return $hsl;
    }

//    function buat_kode()   {
//        $this->db->select('RIGHT(db_kwitansi.no_kode,4) as kode', FALSE);
//        $this->db->order_by('no_kode','DESC');
//        $this->db->limit(1);
//        $query = $this->db->get('db_kwitansi');      //cek dulu apakah ada sudah ada kode di tabel.
//        if($query->num_rows() <> 0){
//            //jika kode ternyata sudah ada.
//            $data = $query->row();
//            $kode = intval($data->kode) + 1;
//        }
//        else{
//            //jika kode belum ada
//            $kode = 1;
//        }
//        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
//        $kodejadi = "GTG".$kodemax;
//        return $kodejadi;
//    }

}
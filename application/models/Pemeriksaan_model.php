<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_pemeriksaan_umum_all($id_pasien = ''){
        $this->db->select('*');
        $this->db->from('pemeriksaan_klinis_umum');

        if ($id_pasien) {
            $this->db->where('id_pasien', $id_pasien);
        }

        return $this->db->get();
    }

    function get_pemeriksaan_penunjang_all($id_pasien = ''){
        $this->db->select('*');
        $this->db->from('pemeriksaan_penunjang');

        if ($id_pasien) {
            $this->db->where('id_pasien', $id_pasien);
        }

        return $this->db->get();
    }

    function get_pemeriksaan_khusus_all($id_pasien = ''){
        $this->db->select('*');
        $this->db->from('pemeriksaan_klinis_khusus');

        if ($id_pasien) {
            $this->db->where('id_pasien', $id_pasien);
        }

        return $this->db->get();
    }

    function get_rekam_pasien($id_pasien){
        $this->db->select('*');
        $this->db->from('rekam_medis a');
        $this->db->where('a.status', '3');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->order_by('a.tanggal_periksa', 'DESC');
        $this->db->limit(1);

        return $this->db->get();
    }    
             
    function get_pemeriksaan_umum($id_pasien){
        $this->db->select('*');
        $this->db->from('rekam_medis a');
        $this->db->join('pemeriksaan_klinis_umum b' ,'a.id_rekam_medis=b.id_rekam_medis');
        $this->db->where('a.status', '3');
        $this->db->where('b.id_pasien', $id_pasien);
        $this->db->order_by('a.tanggal_periksa', 'DESC');
        $this->db->limit(1);

        return $this->db->get();
    }


    function get_pemeriksaan_khusus($id_pasien){
        $this->db->select('*');
        $this->db->from('rekam_medis a');
        $this->db->join('pemeriksaan_klinis_khusus b' ,'a.id_rekam_medis=b.id_rekam_medis');
        $this->db->where('a.status', '3');
        $this->db->where('b.id_pasien', $id_pasien);
        $this->db->order_by('a.tanggal_periksa', 'DESC');
        $this->db->limit(1);

        return $this->db->get();
    }

    function get_pemeriksaan_penunjang($id_pasien){
        $this->db->select('*');
        $this->db->from('rekam_medis a');
        $this->db->join('pemeriksaan_penunjang b' ,'a.id_rekam_medis=b.id_rekam_medis');
        $this->db->where('a.status', '3');
        $this->db->where('b.id_pasien', $id_pasien);
        $this->db->order_by('a.tanggal_periksa', 'DESC');
        $this->db->limit(1);

        return $this->db->get();
    }
    function update_rekam($id, $data) {
        $this->db->where("id_rekam_medis", $id);
        $this->db->update("rekam_medis", $data);
    }
    function update_booking($id, $data) {
        $this->db->where("id_booking", $id);
        $this->db->update("booking", $data);
    }    
    function update_pasien($id, $data) {
        $this->db->where("id_pasien", $id);
        $this->db->update("pasien", $data);
    }
    function insert_pemeriksaan_umum($data) {
        $query = $this->db->insert("pemeriksaan_klinis_umum", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }
    function insert_pemeriksaan_khusus($data) {
        $query = $this->db->insert("pemeriksaan_klinis_khusus", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }
    function insert_pemeriksaan_penunjang($data) {
        $query = $this->db->insert("pemeriksaan_penunjang", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }
    function insert_pilih_layanan($data) {
        $query = $this->db->insert("pilih_layanan", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }
}
/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-29 06:10:02 */
/* http://harviacode.com */


    // get all
    
    

     
    
    
    
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Jenisdok_model extends CI_Model
{
    /**
     * Fungsi ini digunakan untuk mendapatkan jumlah data jenis dokumen
     * @param string $searchText : ini optional untuk pencarian
     * @return number $count : ini untuk menghitung jumlah baris
     */
    function DaftarJenisDokCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_jenisdok');
        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('terhapus', 0);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * Fungsi ini digunakan untuk mendapatkan jumlah data jenis dokumen
     * @param string $searchText : ini optional untuk pencarian
     * @param number $page : Ini untuk halaman (jumlah data)
     * @param number $segment : Ini untuk membatasi jumlah data yang akan ditampilkan
     * @return array $result : Ini adalah hasil
     */

    function DaftarJenisDok($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenisdok');
        if(!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('terhapus', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        

        return $result;
    }
    
    /**
     * Fungsi ini untuk menambahkan jenis dokumen baru
     * @return number $insert_id : Ini ID tambahan terakhir
     */
    function addNewJenisDok($jenisdokInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_jenisdok', $jenisdokInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * Fungsi ini digunakan untuk mendapatkan informasi jenis dokumen berdasarkan id
     * @param number $jenisdokId : Ini jenis dokumen id
     * @return array $result : Ini informasi jenis dokumen
     */
    function getJenisDokInfo($jenisdokId)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenisdok');
        $this->db->where('jenisdokId', $jenisdokId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * Fungsi ini digunakan untuk memperbaharui informasi jenis dokumen
     * @param array $jenisdokInfo : Ini informasi jenis dokumen yang telah diperbaharui
     * @param number $jenisdokId : Ini jenis dokumen id
     */
    function editJenisDok($jenisdokInfo, $jenisdokId)
    {
        $this->db->where('jenisdokId', $jenisdokId);
        $this->db->update('tbl_jenisdok', $jenisdokInfo);
        
        return TRUE;
    }
    

    /**
     * Fungsi ini digunakan untuk menghapus informasi jenis dokumen
     * @param number $jenisdokId : Ini jenis dokumen id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteJenisDok($jenisdokId, $jenisdokInfo)
    {
        $this->db->where('jenisdokId', $jenisdokId);
        $this->db->update('tbl_jenisdok', $jenisdokInfo);
        
        return $this->db->affected_rows();
    }

}
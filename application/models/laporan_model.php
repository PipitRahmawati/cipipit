<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    function cetakBasedPost($searchText = '', $dt1 , $dt2, $jenismutasi)
    {
        $this->db->select('*');
        $this->db->from('tbl_bioadm as bio');
        $this->db->join('tbl_digitalisasi as dgt', 'dgt.nik = bio.NIK');
        $this->db->group_by("dgt.nik");

        if(!empty($searchText)) {
            $likeCriteria = "(bio.NIK  LIKE '%".$searchText."%' or bio.NAMA_LGKP LIKE '%".$searchText."%' or bio.TMPT_LHR LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($dt1) && !empty($dt2)){
            $dt1 = date('Y-m-d',strtotime($dt1));
            $dt2 = date('Y-m-d',strtotime($dt2));
            
            $likeCriteria = "dgt.lastupload between '".$dt1."' and '".$dt2."' ";
            $this->db->where($likeCriteria);
        }
        if(!empty($jenismutasi)){
            $likeCriteria = "dgt.jenismutasi='".$jenismutasi."'";
            $this->db->where($likeCriteria);
        }

        $this->db->where('bio.terhapus', 0);
        $query = $this->db->get();
        
        $result = $query->result();

        return $result;
    }

    /**
     * Fungsi ini digunakan untuk mendapatkan jumlah data biodata adminduk
     * @param string $searchText : ini optional untuk pencarian
     * @return number $count : ini untuk menghitung jumlah baris
     */
    function DaftarBioAdmCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_bioadm');
        if(!empty($searchText)) {
            $likeCriteria = "(NIK  LIKE '%".$searchText."%'
                            OR  NAMA_LGKP  LIKE '%".$searchText."%'
                            OR  JENIS_KLMIN  LIKE '%".$searchText."%'
                            OR  TMPT_LHR  LIKE '%".$searchText."%'
                            OR  NO_AKTA_LHR  LIKE '%".$searchText."%'
                            OR  AGAMA  LIKE '%".$searchText."%'
                            OR  STAT_KWN  LIKE '%".$searchText."%'
                            OR  NO_AKTA_KWN  LIKE '%".$searchText."%'
                            OR  NO_AKTA_CRAI  LIKE '%".$searchText."%'
                            OR  STAT_HBKEL  LIKE '%".$searchText."%'
                            OR  JENIS_PKRJN  LIKE '%".$searchText."%'
                            OR  NAMA_LGKP_IBU  LIKE '%".$searchText."%'
                            OR  NAMA_LGKP_AYAH  LIKE '%".$searchText."%'
                            OR  NO_KK  LIKE '%".$searchText."%'
                        )";
            $this->db->where($likeCriteria);
        }
        $this->db->where('terhapus', 0);
        $query = $this->db->get();
        
        return count($query->result());
    }

    /**
     * Fungsi ini digunakan untuk mendapatkan jumlah data biodata adminduk
     * @param string $searchText : ini optional untuk pencarian
     * @param number $page : Ini untuk halaman (jumlah data)
     * @param number $segment : Ini untuk membatasi jumlah data yang akan ditampilkan
     * @return array $result : Ini adalah hasil
     */

    function DaftarBioAdm($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_bioadm');
        if(!empty($searchText)) {
            $likeCriteria = "(NIK  LIKE '%".$searchText."%'
                            OR  NAMA_LGKP  LIKE '%".$searchText."%'
                            OR  JENIS_KLMIN  LIKE '%".$searchText."%'
                            OR  TMPT_LHR  LIKE '%".$searchText."%'
                            OR  NO_AKTA_LHR  LIKE '%".$searchText."%'
                            OR  AGAMA  LIKE '%".$searchText."%'
                            OR  STAT_KWN  LIKE '%".$searchText."%'
                            OR  NO_AKTA_KWN  LIKE '%".$searchText."%'
                            OR  NO_AKTA_CRAI  LIKE '%".$searchText."%'
                            OR  STAT_HBKEL  LIKE '%".$searchText."%'
                            OR  JENIS_PKRJN  LIKE '%".$searchText."%'
                            OR  NAMA_LGKP_IBU  LIKE '%".$searchText."%'
                            OR  NAMA_LGKP_AYAH  LIKE '%".$searchText."%'
                            OR  NO_KK  LIKE '%".$searchText."%'
                        )";
            $this->db->where($likeCriteria);
        }
        $this->db->where('terhapus', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        

        return $result;
    }
    
    /**
     * Fungsi ini untuk menambahkan biodata adminduk baru
     * @return number $insert_id : Ini ID tambahan terakhir
     */
    function addNewBioAdm($bioadmInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_bioadm', $bioadmInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * Fungsi ini digunakan untuk mendapatkan informasi biodata adminduk berdasarkan id
     * @param number $bioadmId : Ini biodata adminduk id
     * @return array $result : Ini informasi biodata adminduk
     */
    function getBioAdmInfo($bioadmId)
    {
        $this->db->select('*');
        $this->db->from('tbl_bioadm');
        $this->db->where('bioadmId', $bioadmId);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getBioAdmInfoByNIK($nik)
    {
        $this->db->select('*');
        $this->db->from('tbl_bioadm');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * Fungsi ini digunakan untuk memperbaharui informasi biodata adminduk
     * @param array $bioadmInfo : Ini informasi biodata adminduk yang telah diperbaharui
     * @param number $bioadmId : Ini biodata adminduk id
     */
    function editBioAdm($bioadmInfo, $bioadmId)
    {
        $this->db->where('bioadmId', $bioadmId);
        $this->db->update('tbl_bioadm', $bioadmInfo);

        return TRUE;
    }
    

    /**
     * Fungsi ini digunakan untuk menghapus informasi biodata adminduk
     * @param number $bioadmId : Ini biodata adminduk id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBioAdm($bioadmId, $bioadmInfo)
    {
        $this->db->where('bioadmId', $bioadmId);
        $this->db->update('tbl_bioadm', $bioadmInfo);
        
        return $this->db->affected_rows();
    }
}
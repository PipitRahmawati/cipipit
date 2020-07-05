<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    /**
     * Fungsi ini digunakan untuk simpan ke database file upload dokumen
     */
    function FileDBproses($nik,$data,$type,$user)
    {   
        date_default_timezone_set("Asia/Jakarta");
        foreach($data as $k=>$v){
            $this->db->where('nik', $nik);
            $this->db->where('namafile', $v['filename']);
            $this->db->delete('tbl_digitalisasi');

            $dt = array(
                'nik' => $nik,
                'namafile' => $v['filename'],
                'filesize' => $v['filesize'],
                'jenismutasi' => $type,
                'jenisdokId' => $v['jenisdokId'],
                'userId' => $user,
                'lastupload' => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_digitalisasi', $dt);
        }
        
        return TRUE;
    }
}
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model
{
    /**
     * Fungsi ini digunakan untuk mendapatkan informasi jenis dokumen berdasarkan id
     * @param number $jenisdokId : Ini jenis dokumen id
     * @return array $result : Ini informasi jenis dokumen
     */
    function getConfigInfo()
    {
        $this->db->select('*');
        $this->db->from('config');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * Fungsi ini digunakan untuk memperbaharui informasi jenis dokumen
     * @param array $jenisdokInfo : Ini informasi jenis dokumen yang telah diperbaharui
     * @param number $jenisdokId : Ini jenis dokumen id
     */
    function editConfig($configInfo)
    {
        $this->db->where('conf_key', 'mutasidatang');
        $this->db->update('config', $configInfo['mutasidatang']);

        $this->db->where('conf_key', 'mutasikeluar');
        $this->db->update('config', $configInfo['mutasikeluar']);
        
        return TRUE;
    }
}
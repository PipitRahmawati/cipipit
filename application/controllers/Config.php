<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Config (ConfigController)
 * Class Config untuk mengendalikan semua jenis dokumen yang berkaitan dengan operasi.
 * @author : Pipit
 */

class Config extends BaseController
{
    /**
     * Ini dasar konstruksi pada Class 
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('config_model');
        $this->load->model('jenisdok_model');
        $this->isLoggedIn();
    }
    
    /**
     * Fungsi ini digunakan menampilkan awal halaman pada jenis dokumen
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Adminduk : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

    function editConfigXX($configId = NULL)
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['configInfo'] = $this->config_model->getConfigInfo();
            $data['jenis'] = $this->jenisdok_model->ListJenisDok();
            $this->global['pageTitle'] = 'Adminduk : Ubah Konfigurasi';
            $this->loadViews("config/editConfig", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * Fungsi ini digunakan untuk merubah data jenis dokumen
     */
    function editConfig()
    {
        if($this->isForAll() == TRUE)
        {

            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $listdokdatang = $this->input->post('listdokdatang');
            $syaratdatang = $this->input->post('syaratdatang');
            $listdokkeluar = $this->input->post('listdokkeluar');
            $syaratkeluar = $this->input->post('syaratkeluar');

            $this->form_validation->set_rules('SUPDATE','','trim|required|xss_clean');
            
            if($this->form_validation->run() == FALSE){
                $this->editConfigXX();
            }
            else{

                $resdatang = array();
                foreach($listdokdatang as $k=>$v){
                    if(isset($syaratdatang[$k])) $resdatang[$v] = $syaratdatang[$k];
                    else $resdatang[$v] = 0;
                }

                $reskeluar = array();
                foreach($listdokkeluar as $k=>$v){
                    if(isset($syaratkeluar[$k])) $reskeluar[$v] = $syaratkeluar[$k];
                    else $reskeluar[$v] = 0;
                }

                $configInfo['mutasidatang'] = array('conf_val'=>json_encode($resdatang));
                $configInfo['mutasikeluar'] = array('conf_val'=>json_encode($reskeluar));
                
                $result = $this->config_model->editConfig($configInfo);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Konfigurasi berhasil diubah !');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Konfigurasi gagal Diubah');
                }
                redirect('editConfig');
            }
            
        }
    }
}

?>
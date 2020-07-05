<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : JenisDok (JenisDokController)
 * Class JenisDok untuk mengendalikan semua jenis dokumen yang berkaitan dengan operasi.
 * @author : Pipit
 */

class JenisDok extends BaseController
{
    /**
     * Ini dasar konstruksi pada Class 
     */
    public function __construct()
    {
        parent::__construct();
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
    
    /**
     * Fungsi ini digunakan untuk menampilkan daftar jenis dokumen
     */
    function DaftarJenisDok()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('jenisdok_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->jenisdok_model->DaftarJenisDokCount($searchText);

			$returns = $this->paginationCompress ( "DaftarJenisDok/", $count, 10000 );
            
            $data['jenisdokRecords'] = $this->jenisdok_model->DaftarJenisDok($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Adminduk : Daftar Jenis Dokumen';
            
            $this->loadViews("jenisdok/viewList", $this->global, $data, NULL);
        }
    }

    /**
     * Fungsi ini digunakan untuk menampilkan form tambah jenis dokumen
     */
    function addJenisDok()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('jenisdok_model');
            
            $this->global['pageTitle'] = 'Adminduk : Buat Jenis Dokumen Baru';

            $this->loadViews("jenisdok/addJenisDok", $this->global, '', NULL);
        }
    }

    /**
     * Fungsi ini digunakan untuk menambah jenis dokumen baru ke dalam sistem.
     */
  
    function addNewJenisDok()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('kodeDok','Kode','trim|required|max_length[10]|xss_clean');
            $this->form_validation->set_rules('nama','Nama Jenis Dokumen','trim|required|max_length[50]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addJenisDok();
            }
            else
            {
                $kode = $this->input->post('kodeDok');
                $nama = $this->input->post('nama');

                $jenisdokInfo = array('kodeDok'=>$kode,'nama'=>$nama, 'dibuatOleh'=>$this->vendorId, 'waktuDibuat'=>date('Y-m-d H:i:s'));
                
                $this->load->model('jenisdok_model');
                $result = $this->jenisdok_model->addNewJenisDok($jenisdokInfo);
                
                if($result > 0)
                    $this->session->set_flashdata('success', 'Jenis Dokumen Baru Berhasil Dibuat');
                else
                    $this->session->set_flashdata('error', 'Jenis Dokumen Baru Gagal Dibuat');
                
                redirect('jenisdok/addJenisDOk');
            }
        }
    }

    
    /**
     * Fungsi ini digunakan untuk menampilkan informasi jenis dokumen yang akan diubah
     */
    function editOldJdk($jenisdokId = NULL)
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($jenisdokId == null)
            {
                redirect('DaftarJenisDok');
            }
            
            $data['jenisdokInfo'] = $this->jenisdok_model->getJenisDokInfo($jenisdokId);
            
            $this->global['pageTitle'] = 'Adminduk : Ubah Jenisd Dokumen';
            
            $this->loadViews("jenisdok/editOldJdk", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * Fungsi ini digunakan untuk merubah data jenis dokumen
     */
    function editJenisDok()
    {
        if($this->isForAll() == TRUE)
        {

            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $jenisdokId = $this->input->post('jenisdokId');

            $this->form_validation->set_rules('kodeDok','Kode','trim|required|max_length[10]|xss_clean');
            $this->form_validation->set_rules('nama','Nama Jenis Dokumen','trim|required|max_length[50]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOldJdk($jenisdokId);
            }
            else
            {
                $kode = $this->input->post('kodeDok');
                $nama = $this->input->post('nama');
                
                $jenisdokInfo = array('kodeDok'=>$kode, 'nama'=>$nama, 'diubahOleh'=>$this->vendorId, 'waktuDiubah'=>date('Y-m-d H:i:s'));
                
                $result = $this->jenisdok_model->editJenisDok($jenisdokInfo, $jenisdokId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Data Jenis Dokumen Berhasil Diubah !');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Data Jenis Dokumen Gagal Diubah');
                }
                
                redirect('DaftarJenisDok');
            }
        }
    }

    /**
     * Fungsi ini digunakan untuk menghapus data jenis dokumen menggunakan jenisdokId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteJenisDok()
    {
        if($this->isForAll() == TRUE)
        {       
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $jenisdokId = $this->input->post('jenisdokId');
            $jenisdokInfo = array('terhapus'=>1,'diubahOleh'=>$this->vendorId, 'waktuDiubah'=>date('Y-m-d H:i:s'));
            
            $result = $this->jenisdok_model->deleteJenisDok($jenisdokId, $jenisdokInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
}

?>
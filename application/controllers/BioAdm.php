<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Biodata Adminduk (BioAdmController)
 * Class Biodata Adminduk untuk mengendalikan semua biodata adminduk yang berkaitan dengan operasi.
 * @author : Pipit
 */

class BioAdm extends BaseController
{
    /**
     * Ini dasar konstruksi pada Class 
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bioadm_model');
        $this->isLoggedIn();   
    }
    
    /**
     * Fungsi ini digunakan menampilkan awal halaman pada biodata adminduk
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Adminduk : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * Fungsi ini digunakan untuk menampilkan daftar biodata adminduk
     */
    function DaftarBioAdm()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('bioadm_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->bioadm_model->DaftarBioAdmCount($searchText);

			$returns = $this->paginationCompress ( "DaftarBioAdm/", $count, 5 );
            
            $data['bioadmRecords'] = $this->bioadm_model->DaftarBioAdm($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Adminduk : Daftar Biodata Adminduk';
            
            $this->loadViews("bioadm/viewList", $this->global, $data, NULL);
        }
    }

    /**
     * Fungsi ini digunakan untuk menampilkan form tambah biodata adminduk
     */
    function addBioAdm()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('bioadm_model');
            
            $this->global['pageTitle'] = 'Adminduk : Buat Biodata Adminduk Baru';

            $this->loadViews("bioadm/addBioAdm", $this->global, '', NULL);
        }
    }

    /**
     * Fungsi ini digunakan untuk menambah biodata adminduk baru ke dalam sistem.
     */
  
    function addNewBioAdm()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('NIK','NIK','trim|required|max_length[16]|xss_clean');
            $this->form_validation->set_rules('NAMA_LGKP','Nama Lengkap','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('JENIS_KLMIN','Jenis Kelamin','trim|required|xss_clean');
            $this->form_validation->set_rules('TMPT_LHR','Tempat Lahir','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('TGL_LHR', 'Tanggal Lahir', 'trim|required|xss_clean');
            $this->form_validation->set_rules('NO_AKTA_LHR','No Akta Lahir','trim|required|max_length[16]|xss_clean');
            $this->form_validation->set_rules('GOL_DRH','Golongan Darah','trim|required|xss_clean');
            $this->form_validation->set_rules('AGAMA','Agama','trim|required|xss_clean');
            $this->form_validation->set_rules('STAT_KWN','Status Kawin','trim|required|xss_clean');
            $this->form_validation->set_rules('NO_AKTA_KWN','No Akta Kawin','trim|max_length[16]|xss_clean');
            $this->form_validation->set_rules('TGL_KWN', 'Tanggal Kawin', 'trim|xss_clean');
            $this->form_validation->set_rules('NO_AKTA_CRAI','No Akta Cerai','trim|max_length[16]|xss_clean');
            $this->form_validation->set_rules('TGL_CRAI', 'Tanggal Cerai', 'trim|xss_clean');
            $this->form_validation->set_rules('STAT_HBKEL','Status HBKEL','trim|required|xss_clean');
            $this->form_validation->set_rules('PDDK_AKH','Pendidikan Akhir','trim|required|xss_clean');
            $this->form_validation->set_rules('JENIS_PKRJN','Jenis Pekerjaan','trim|required|xss_clean');
            $this->form_validation->set_rules('NAMA_LGKP_IBU','Nama Lengkap Ibu','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('NAMA_LGKP_AYAH','Nama Lengkap Ayah','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('NO_KK','No KK','trim|required|max_length[16]|xss_clean');
            

            if($this->form_validation->run() == FALSE)
            {
                $this->addBioAdm();
            }
            else
            {
                $nik = $this->input->post('NIK');
                $nama = $this->input->post('NAMA_LGKP');
                $jk = $this->input->post('JENIS_KLMIN');
                $tempatlahir = $this->input->post('TMPT_LHR');
                $tgllahir = date('Y-m-d', strtotime($this->input->post('TGL_LHR')));
                $noaktalhr = $this->input->post('NO_AKTA_LHR');
                $goldrh = $this->input->post('GOL_DRH');
                $agama = $this->input->post('AGAMA');
                $statkwn = $this->input->post('STAT_KWN');

                $noaktakwn = $this->input->post('NO_AKTA_KWN');

                if($this->input->post('TGL_KWN')!='')
                    $tglkwn = date('Y-m-d', strtotime($this->input->post('TGL_KWN')));
                else 
                    $tglkwn = '';

                $noaktacrai = $this->input->post('NO_AKTA_CRAI');

                if($this->input->post('TGL_CRAI')!='')
                    $tglcrai = date('Y-m-d', strtotime($this->input->post('TGL_CRAI')));
                else 
                    $tglcrai = '';

                $stathbkel = $this->input->post('STAT_HBKEL');
                $pddkakh = $this->input->post('PDDK_AKH');
                $jnspkrjn = $this->input->post('JENIS_PKRJN');
                $namaibu = $this->input->post('NAMA_LGKP_IBU');
                $namaayah = $this->input->post('NAMA_LGKP_AYAH');
                $nokk = $this->input->post('NO_KK');

                $bioadmInfo = array('NIK'=>$nik, 'NAMA_LGKP'=>$nama, 'JENIS_KLMIN'=>$jk, 'TMPT_LHR'=>$tempatlahir, 'TGL_LHR'=>$tgllahir, 'NO_AKTA_LHR'=>$noaktalhr, 'GOL_DRH'=>$goldrh, 'AGAMA'=>$agama, 'STAT_KWN'=>$statkwn, 'NO_AKTA_KWN'=>$noaktakwn, 'TGL_KWN'=>$tglkwn, 'NO_AKTA_CRAI'=>$noaktacrai, 'TGL_CRAI'=>$tglcrai, 'STAT_HBKEL'=>$stathbkel, 'PDDK_AKH'=>$pddkakh, 'JENIS_PKRJN'=>$jnspkrjn, 'NAMA_LGKP_IBU'=>$namaibu, 'NAMA_LGKP_AYAH'=>$namaayah, 'NO_KK'=>$nokk, 'dibuatOleh'=>$this->vendorId, 'waktuDibuat'=>date('Y-m-d H:i:s'));
                
                $this->load->model('bioadm_model');
                $result = $this->bioadm_model->addNewBioAdm($bioadmInfo);
                
                if($result > 0)
                    $this->session->set_flashdata('success', 'Biodata Adminduk Baru Berhasil Dibuat');
                else
                    $this->session->set_flashdata('error', 'Biodata Adminduk Baru Gagal Dibuat');
                
                redirect('bioadm/addBioAdm');
            }
        }
    }

    
    /**
     * Fungsi ini digunakan untuk menampilkan informasi biodata adminduk yang akan diubah
     */
    function editOldBam($bioadmId = NULL)
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($bioadmId == null)
            {
                redirect('DaftarBioAdm');
            }
            
            $data['bioadmInfo'] = $this->bioadm_model->getBioAdmInfo($bioadmId);
            
            $this->global['pageTitle'] = 'Adminduk : Ubah Biodata Adminduk';
            
            $this->loadViews("bioadm/editOldBam", $this->global, $data, NULL);
        }
    }

    function detailBam($bioadmId = NULL)
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($bioadmId == null)
            {
                redirect('DaftarBioAdm');
            }
            
            $data['bioadmInfo'] = $this->bioadm_model->getBioAdmInfo($bioadmId);
            
            $this->global['pageTitle'] = 'Adminduk : Detail Biodata Adminduk';
            
            $this->loadViews("bioadm/detailBam", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * Fungsi ini digunakan untuk merubah data biodata adminduk
     */
    function editBioAdm()
    {
        if($this->isForAll() == TRUE)
        {

            $this->loadThis();
        }
        else
        {

            $this->load->library('form_validation');
            
            $bioadmId = $this->input->post('bioadmId');

            $this->form_validation->set_rules('NIK','NIK','trim|required|max_length[16]|xss_clean');
            $this->form_validation->set_rules('NAMA_LGKP','Nama Lengkap','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('JENIS_KLMIN','Jenis Kelamin','trim|required|xss_clean');
            $this->form_validation->set_rules('TMPT_LHR','Tempat Lahir','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('TGL_LHR', 'Tanggal Lahir', 'trim|required|xss_clean');
            $this->form_validation->set_rules('NO_AKTA_LHR','No Akta Lahir','trim|required|max_length[16]');
            $this->form_validation->set_rules('GOL_DRH','Golongan Darah','trim|required|xss_clean');
            $this->form_validation->set_rules('AGAMA','Agama','trim|required|xss_clean');
            $this->form_validation->set_rules('STAT_KWN','Status Kawin','trim|required|xss_clean');
            $this->form_validation->set_rules('NO_AKTA_KWN','No Akta Kawin','trim|max_length[16]|xss_clean');
            $this->form_validation->set_rules('TGL_KWN', 'Tanggal Kawin', 'trim|xss_clean');
            $this->form_validation->set_rules('NO_AKTA_CRAI','No Akta Cerai','trim|max_length[16]|xss_clean');
            $this->form_validation->set_rules('TGL_CRAI', 'Tanggal Cerai', 'trim|xss_clean');
            $this->form_validation->set_rules('STAT_HBKEL','Status Hubungan Keluarga','trim|required|xss_clean');
            $this->form_validation->set_rules('PDDK_AKH','Pendidikan Akhir','trim|required|xss_clean');
            $this->form_validation->set_rules('JENIS_PKRJN','Jenis Pekerjaan','trim|required|xss_clean');
            $this->form_validation->set_rules('NAMA_LGKP_IBU','Nama Lengkap Ibu','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('NAMA_LGKP_AYAH','Nama Lengkap Ayah','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('NO_KK','No KK','trim|required|max_length[16]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOldBam($bioadmId);
            }
            else
            {

                $nik = $this->input->post('NIK');
                $nama = $this->input->post('NAMA_LGKP');
                $jk = $this->input->post('JENIS_KLMIN');
                $tempatlahir = $this->input->post('TMPT_LHR');
                $tgllahir = date('Y-m-d', strtotime($this->input->post('TGL_LHR')));
                $noaktalhr = $this->input->post('NO_AKTA_LHR');
                $goldrh = $this->input->post('GOL_DRH');
                $agama = $this->input->post('AGAMA');
                $statkwn = $this->input->post('STAT_KWN');

                $noaktakwn = $this->input->post('NO_AKTA_KWN');

                if($this->input->post('TGL_KWN')!='')
                    $tglkwn = date('Y-m-d', strtotime($this->input->post('TGL_KWN')));
                else 
                    $tglkwn = '';

                $noaktacrai = $this->input->post('NO_AKTA_CRAI');

                if($this->input->post('TGL_CRAI')!='')
                    $tglcrai = date('Y-m-d', strtotime($this->input->post('TGL_CRAI')));
                else 
                    $tglcrai = '';

                $stathbkel = $this->input->post('STAT_HBKEL');
                $pddkakh = $this->input->post('PDDK_AKH');
                $jnspkrjn = $this->input->post('JENIS_PKRJN');
                $namaibu = $this->input->post('NAMA_LGKP_IBU');
                $namaayah = $this->input->post('NAMA_LGKP_AYAH');
                $nokk = $this->input->post('NO_KK');

                $bioadmInfo = array('NIK'=>$nik, 'NAMA_LGKP'=>$nama, 'JENIS_KLMIN'=>$jk, 'TMPT_LHR'=>$tempatlahir, 'TGL_LHR'=>$tgllahir, 'NO_AKTA_LHR'=>$noaktalhr, 'GOL_DRH'=>$goldrh, 'AGAMA'=>$agama, 'STAT_KWN'=>$statkwn, 'NO_AKTA_KWN'=>$noaktakwn, 'TGL_KWN'=>$tglkwn, 'NO_AKTA_CRAI'=>$noaktacrai, 'TGL_CRAI'=>$tglcrai, 'STAT_HBKEL'=>$stathbkel, 'PDDK_AKH'=>$pddkakh, 'JENIS_PKRJN'=>$jnspkrjn, 'NAMA_LGKP_IBU'=>$namaibu, 'NAMA_LGKP_AYAH'=>$namaayah, 'NO_KK'=>$nokk, 'diubahOleh'=>$this->vendorId, 'waktuDiubah'=>date('Y-m-d H:i:s'));

                $result = $this->bioadm_model->editBioAdm($bioadmInfo, $bioadmId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Data Biodata Adminduk Berhasil Diubah !');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Data Biodata Adminduk Gagal Diubah');
                }
                
                redirect('DaftarBioAdm');
            }
        }
    }


    /**
     * Fungsi ini digunakan untuk menghapus data biodata adminduk menggunakan bioadmId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBioAdm()
    {
        if($this->isForAll() == TRUE)
        {       
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $bioadmId = $this->input->post('bioadmId');
            $bioadmInfo = array('terhapus'=>1,'diubahOleh'=>$this->vendorId, 'waktuDiubah'=>date('Y-m-d H:i:s'));
            
            $result = $this->bioadm_model->deleteBioAdm($bioadmId, $bioadmInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    function import(){
        date_default_timezone_set("Asia/Jakarta");
        if (isset($_POST['import'])){

            $file = $_FILES['impbioadm']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['impbioadm']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                echo 'File tidak boleh kosong!';
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["impbioadm"]["size"] > 0) {

                    $i = 0; $dataxx = array();
                    $handle = fopen($file, "r");
                    while (($row = fgetcsv($handle, 2048))) {
                        $i++;
                        if ($i == 1) continue;

                        $dataxx[] = explode(';',$row[0]);

                    }

                    foreach($dataxx as $k=>$row){
                        if($row[5]!=''){
                            $tgllahir = date('Y-m-d',strtotime($row[5]));
                        }
                        else{
                            $tgllahir = '';
                        }

                        if($row[11]!=''){
                            $tglkawin = date('Y-m-d',strtotime($row[11]));
                        }
                        else{
                            $tglkawin = '';
                        }

                        if($row[13]!=''){
                            $tglcerai = date('Y-m-d',strtotime($row[13]));
                        }
                        else{
                            $tglcerai = '';
                        }
                        
                        $bioadmInfo = [
                            'NIK' => $row[1],
                            'NAMA_LGKP' => $row[2],
                            'JENIS_KLMIN' => $row[3],
                            'TMPT_LHR' => $row[4],
                            'TGL_LHR' => $tgllahir,
                            'NO_AKTA_LHR' => $row[6],
                            'GOL_DRH' => $row[7],
                            'AGAMA' => $row[8],
                            'STAT_KWN' => $row[9],
                            'NO_AKTA_KWN' => $row[10],
                            'TGL_KWN' => $tglkawin,
                            'NO_AKTA_CRAI' => $row[12],
                            'TGL_CRAI' => $tglcerai,
                            'STAT_HBKEL' => $row[14],
                            'PDDK_AKH' => $row[15],
                            'JENIS_PKRJN' => $row[16],
                            'NAMA_LGKP_IBU' => $row[17],
                            'NAMA_LGKP_AYAH' => $row[18],
                            'NO_KK' => $row[19],
                            'dibuatOleh' => $this->vendorId,
                            'waktuDibuat' => date('Y-m-d H:i:s'),
                        ];

                        // Simpan data ke database.
                        $this->bioadm_model->addNewBioAdm($bioadmInfo);
                    }

                    fclose($handle);
                    redirect('DaftarBioAdm');
                } else {
                    echo 'Format file tidak valid!';
                }
            }
        }
    }
}

?>
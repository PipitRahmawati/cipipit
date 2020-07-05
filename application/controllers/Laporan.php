<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Register Legaisir (LaporanController)
 * Class Laporan untuk mengendalikan semua register legalisir yang berkaitan dengan operasi.
 * @author : Fani Fatina
 */

class Laporan extends BaseController
{
    /**
     * Ini dasar konstruksi pada Class 
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('laporan_model');
        $this->load->model('bioadm_model');
        $this->isLoggedIn();
    }
    
    /**
     * Fungsi ini digunakan menampilkan awal halaman pada register legalisir
     */

    public function index()
    {
        $this->global['pageTitle'] = 'Adminduk : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

    function lapcetakpdf(){
        //2 (tglawal) 3 (tglakhir) 4 (searchText)

        $this->load->model('laporan_model');

        $tgl1 = $tgl2 = $searchText = '';

        if($this->uri->segment('2')!='-') $tgl1 = date('d-m-Y',$this->uri->segment('2'));
        else $tgl1 = '';

        if($this->uri->segment('3')!='-') $tgl2 = date('d-m-Y',$this->uri->segment('3'));
        else $tgl2 = '';

        if($this->uri->segment('4')!='-') $jmutasi = $this->uri->segment('4');
        else $jmutasi = '';

        if($this->uri->segment('5')!='-') $searchText = $this->uri->segment('5');
        else $searchText = '';

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'LAPORAN MUTASI',0,1,'C');
        $pdf->SetFont('Arial','B',12);

        if($tgl1!='' && $tgl2!=''){
            $pdf->Cell(190,6,'Tanggal '.$tgl1.' s/d '.$tgl2,0,1,'C');
        }
        if($jmutasi!=''){
            $pdf->Cell(190,6,'Jenis Mutasi : '.ucwords($jmutasi),0,1,'');
        }



        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No.',1,0);
        $pdf->Cell(35,6,'NIK',1,0);
        $pdf->Cell(45,6,'Nama',1,0);
        $pdf->Cell(35,6,'Jenis Kelamin',1,0);
        $pdf->Cell(25,6,'Tempat Lahir',1,0);
        $pdf->Cell(25,6,'Tanggal Lahir',1,1);
        $pdf->SetFont('Arial','',10);

        $laporanData = $this->laporan_model->cetakBasedPost($searchText,$tgl1,$tgl2,$jmutasi);

        $i=1;
        foreach ($laporanData as $row){
            if($row->JENIS_KLMIN=='L') $jk = 'Laki-Laki'; else if($row->JENIS_KLMIN=='P') $jk = 'Perempuan';
            if($row->TGL_LHR!='0000-00-00') $dtx= date('d-m-Y',strtotime($row->TGL_LHR)); else $dtx= '-';

            $pdf->Cell(10,6,$i,1,0);
            $pdf->Cell(35,6,$row->NIK,1,0);
            $pdf->Cell(45,6,$row->NAMA_LGKP,1,0);
            $pdf->Cell(35,6,$jk,1,0);
            $pdf->Cell(25,6,$row->TMPT_LHR,1,0);
            $pdf->Cell(25,6,$dtx,1,1);
            $i++;
        }

        $pdf->Output();
    }


    /**
     * Fungsi ini digunakan untuk menampilkan daftar pejabat di combobox
     */
    function CbxPejabat()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('pejabat_model');
            $data['pejabatRecords'] = $this->pejabat_model->DaftarPejabat('', '', '');
            return $data['pejabatRecords'];

            
        //  $this->loadViews("pejabat/viewList", $this->global, $data, NULL);
        }
    }

    /**
     * Fungsi ini digunakan untuk menampilkan daftar jenis dokumen di combobox
     */
    function CbxJenis()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('jenisdok_model');
            $data['jenisdokRecords'] = $this->jenisdok_model->DaftarJenisDok('', '', '');
            return $data['jenisdokRecords'];

            
        //  $this->loadViews("pejabat/viewList", $this->global, $data, NULL);
        }
    }


    
    /**
     * Fungsi ini digunakan untuk menampilkan daftar biodata adminduk
     */
    function HookBioAdmList()
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
            
            $this->loadViews("laporan/viewBioAdmList", $this->global, $data, NULL);
        }
    }

    /**
     * Fungsi ini digunakan untuk menampilkan daftar register legalisir
     */

    function DaftarLaporan()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('bioadm_model');
        
            $searchText = $this->input->post('searchText');
            $dt1 = $this->input->post('date1');
            $dt2 = $this->input->post('date2');
            $jenismutasi = $this->input->post('jenismutasi');

            $data['searchText'] = $searchText;
            $data['dt1'] = $dt1;
            $data['dt2'] = $dt2;
            $data['jenismutasi'] = $jenismutasi;

            $this->load->library('pagination');
            
            $count = $this->bioadm_model->DaftarBioAdmJoinDigitalCount($searchText, $dt1, $dt2, $jenismutasi);

            $returns = $this->paginationCompress ( "DaftarBioAdm/", $count, 5 );
            
            $data['bioadmRecords'] = $this->bioadm_model->DaftarBioAdmJoinDigital($searchText, $dt1, $dt2, $jenismutasi, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Adminduk : Laporan';
            
            $this->loadViews("laporan/viewList", $this->global, $data, NULL);
        }
    }

    /**
    * Fungsi ini digunakan untuk menampilkan form tambah register legalisir
    */

    function setDate()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->model('laporan_model');
            $this->global['pageTitle'] = 'Tentukan Tanggal';
            $this->loadViews("laporan/setDate", $this->global, '', NULL);

        }
    }

    function setDateNew()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('tanggal','Tanggal','trim|required|max_length[25]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->setDate();
            }
            else
            {
                $tanggal = $this->input->post('tanggal');
                $y__ = date('Y', strtotime($tanggal));
                $this->load->model('laporan_model');

                $chckstat = $this->laporan_model->checkstatbyyear($y__);

                $THEID = '';
                if(count($chckstat)==0){
                    // insert baru
                    $DATANOBARU = $this->laporan_model->getnewnoreg($y__);

                    $GETNOREGBARU = '';
                    if(count($DATANOBARU)==0) $GETNOREGBARU = 1;
                    else $GETNOREGBARU = $DATANOBARU[0]->noregakhir+1;

                    $laporanInfo = array('tanggal'=>$tanggal, 'no_reg'=>$GETNOREGBARU, 'dibuatOleh'=>$this->vendorId, 'waktuDibuat'=>date('Y-m-d H:i:s'));
                    $result = $this->laporan_model->setNewNoReg($laporanInfo);
                    $THEID = $result;
                }
                else{
                    // update yang lama
                    $laporanId = $chckstat[0]->laporanId;
                    $laporanInfo = array('tanggal'=>$tanggal);   
                    $result = $this->laporan_model->editDateforNoReg($laporanInfo,$laporanId);
                    $THEID = $laporanId;
                }
                
                // if($result > 0)
                //     $this->session->set_flashdata('success', 'Laporan Baru Berhasil Dibuat');
                // else
                //     $this->session->set_flashdata('error', 'Laporan Baru Gagal Dibuat');
                
                redirect('laporan/editOldRlg/'.$THEID);
            }
        }
    }


    function addLaporan()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->model('laporan_model');
            $data['cbxPejabat'] = $this->CbxPejabat();
            $data['cbxJenis'] = $this->CbxJenis();
            
            $this->global['pageTitle'] = 'Adminduk : Buat Laporan Baru';

            $this->loadViews("laporan/addLaporan", $this->global, $data, NULL);

        }
    }

    /**
     * Fungsi ini digunakan untuk menambah register legalisir baru ke dalam sistem.
     */
  
    function addNewLaporan()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('tanggal','Tanggal','trim|required|max_length[25]|xss_clean');
            $this->form_validation->set_rules('pejabatId','Pejabat','trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('jenisdokId','Jenis Dokumen','trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('nik','Nomor Identitas Kependudukan','trim|required|max_length[16]|xss_clean');


            if($this->form_validation->run() == FALSE)
            {
                $this->addLaporan();
            }
            else
            {
                $tanggal = $this->input->post('tanggal');
                $pejabat = $this->input->post('pejabatId');
                $jenis = $this->input->post('jenisdokId');
                $nodok = $this->input->post('nik');
                $badmId = $this->input->post('bioadmId');

                $laporanInfo = array('tanggal'=>$tanggal, 'pejabatId'=>$pejabat, 'jenisdokId'=>$jenis, 'nik'=>$nik, 'bioadmId'=>$badmId, 'dibuatOleh'=>$this->vendorId, 'waktuDibuat'=>date('Y-m-d H:i:s'));
                
                $this->load->model('laporan_model');
                $result = $this->laporan_model->addNewLaporan($laporanInfo);
                
                if($result > 0)
                    $this->session->set_flashdata('success', 'Laporan Baru Berhasil Dibuat');
                else
                    $this->session->set_flashdata('error', 'Laporan Baru Gagal Dibuat');
                
                redirect('laporan/addLaporan');
            }
        }
    }

    
    /**
     * Fungsi ini digunakan untuk menampilkan informasi register legalisir yang akan diubah
     */
    function editOldRlg($laporanId = NULL)
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            // if($laporanId == null)
            // {
            //     redirect('DaftarLaporan');
            // }

            $this->load->model('laporan_model');
            $data['cbxPejabat'] = $this->CbxPejabat();
            $data['cbxJenis'] = $this->CbxJenis();
            $data['laporanInfo'] = $this->laporan_model->getLaporanInfo($laporanId);

            $this->global['pageTitle'] = 'Adminduk : Ubah Laporan';
            
            $this->loadViews("laporan/editOldRlg", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * Fungsi ini digunakan untuk merubah data register legalisir
     */
    function editLaporan()
    {
        if($this->isForAll() == TRUE)
        {

            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            

            $this->form_validation->set_rules('pejabatId','Pejabat','trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('jenisdokId','Jenis Dokumen','trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('nik','Nomor Induk Kependudukan','trim|required|max_length[16]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->editOldRlg($laporanId);
            }
            else
            {   

                $pejabat = $this->input->post('pejabatId');
                $jenis = $this->input->post('jenisdokId');
                $nik = $this->input->post('nik');
                $badmId = $this->input->post('bioadmId');
                $tanggal = $this->input->post('tanggal');
                $y__ = date('Y', strtotime($tanggal));

                $DATANOBARU = $this->laporan_model->getnewnoreg($y__,$jenis);
                $GETNOREGBARU = '';
                if(count($DATANOBARU)==0) $GETNOREGBARU = 1;
                else $GETNOREGBARU = $DATANOBARU[0]->noregakhir+1;

                $laporanInfo = array('tanggal'=>$tanggal, 'no_reg'=>$GETNOREGBARU, 'pejabatId'=>$pejabat, 'jenisdokId'=>$jenis, 'nik'=>$nik, 'bioadmId'=>$badmId, 'dibuatOleh'=>$this->vendorId,'waktuDibuat'=>date('Y-m-d H:i:s'));
    
                $result = $this->laporan_model->insertLaporan($laporanInfo);
                // if($result == true)
                // {
                //     $this->session->set_flashdata('success', 'Data Laporan Berhasil Disimpan !');
                // }
                // else
                // {
                //     $this->session->set_flashdata('error', 'Data Laporan Gagal Disimpan');
                // }
                
                redirect('viewTemplate/'.$result);
            }
        }
    }

    function ViewTemplate()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $id =  $this->uri->segment('2');
            $this->load->model('laporan_model');
            $this->load->model('jenisdok_model');
            $data['template'] = $this->laporan_model->getlaporanInfo($id);
            $data['jenisdok'] = $this->jenisdok_model->getJenisDokInfo($data['template'][0]->jenisdokId);

            $this->global['pageTitle'] = 'Adminduk : Template Laporan';
            
            $this->loadViews("laporan/viewTemplate", $this->global, $data, NULL);
        }
    }



    /**
     * Fungsi ini digunakan untuk menghapus data register legalisir menggunakan laporanId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteReglLeg()
    {
        if($this->isForAll() == TRUE)
        {       
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $laporanId = $this->input->post('laporanId');
            $laporanInfo = array('terhapus'=>1,'diubahOleh'=>$this->vendorId, 'waktuDiubah'=>date('Y-m-d H:i:s'));
            
            $result = $this->laporan_model->deleteLaporan($laporanId, $laporanInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
}

?>
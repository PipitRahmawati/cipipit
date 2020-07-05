<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Upload (UploadController)
 * Class Upload untuk mengendalikan semua dokumen yang berkaitan dengan operasi.
 * @author : Pipit
 */

class Upload extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
    }

    public function index()
    {

        $this->load->model('upload_model');
        $this->load->model('jenisdok_model');
        $this->load->model('config_model');
        $this->global['pageTitle'] = 'Adminduk : Dokumen Upload';
        $this->loadViews("upload/v_upload", $this->global, array('error' => ' ' ) , NULL);
//        $this->loadViews("v_upload", $this->global, array('error' => ' ' ) , NULL);

//        $this->load->view('v_upload', array('error' => ' ' ));
    }

    function ReadFileX(){
        $type = $_GET['type'];
        $nik = $_GET['nik'];
        $filename = $_GET['filename'];
        
//        echo $path = './dokumen/mutasi/'.$type.'/'.$nik.'/'.$filename;
        if($type!='' && $nik!='' && $filename!=''){
            $path = './dokumen/mutasi/'.$type.'/'.$nik.'/'.$filename;
            header('Content-Type: application/pdf');
//            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            readfile($path);
        }
        else die();
    }

    function cariBioAdm()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->model('bioadm_model');
            $this->global['pageTitle'] = 'Cari Biodata Adminduk';
            $this->loadViews("upload/cariBioAdm", $this->global, '', NULL);
        }
    }

        function cariBioAdm2()
    {
        if($this->isForAll() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->model('bioadm_model');
            $this->global['pageTitle'] = 'Cari Biodata Adminduk';
            $this->loadViews("upload/cariBioAdm2", $this->global, '', NULL);
        }
    }

    function HookBioAdmList2()
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
            
            $this->loadViews("upload/viewBioAdmList", $this->global, $data, NULL);
        }
    }

    // public function loadImage(){
        
    //     $filename="./dokumen/".$_GET['id']."/".$_GET['img']; //<-- specify the image  file
        
    //     if(file_exists($filename)){ 
    //         $mime = mime_content_type($filename); //<-- detect file type
    //         header('Content-Length: '.filesize($filename)); //<-- sends filesize header
    //         header("Content-Type: $mime"); //<-- send mime-type header
    //         header('Content-Disposition: inline; filename="'.$filename.'";'); //<-- sends filename header
    //         readfile($filename); //<--reads and outputs the file onto the output buffer
    //         die(); //<--cleanup
    //         exit; //and exit
    //     }
    //     else{
    //         echo'maaf file tidak ditemukan';
    //     }

    // }
    
    public function set_upload_options($nik,$nmfile,$type){
        $config = array();
        $nmfile = str_replace(' ', '_', $nmfile);

        if(!is_dir('./dokumen')) mkdir('./dokumen');
        if(!is_dir('./dokumen/mutasi')) mkdir('./dokumen/mutasi');
        if(!is_dir('./dokumen/mutasi/'.$type)) mkdir('./dokumen/mutasi/'.$type);
        if(!is_dir('./dokumen/mutasi/'.$type.'/'.$nik)) mkdir('./dokumen/mutasi/'.$type.'/'.$nik);
        
        $config['upload_path']          = './dokumen/mutasi/'.$type.'/'.$nik;
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['file_name']           = $nmfile;

        $arrfile = array();
        if(is_dir('./dokumen/mutasi/'.$type.'/'.$nik)){
            if($handle = opendir('./dokumen/mutasi/'.$type.'/'.$nik))
            {
                while(($file = readdir($handle)) !== false)
                {
                    if($file != '.' && $file != '..')
                    {
                        $arrfile[] = $file;
                    }
                }
                closedir($handle);
            }
        }

        foreach($arrfile as $k=>$v){
            if(preg_match("/".$nmfile."/i", $v)){
                if(file_exists('./dokumen/mutasi/'.$type.'/'.$nik.'/'.$v)) unlink('./dokumen/mutasi/'.$type.'/'.$nik.'/'.$v);
            }
        }

        return $config;
    }

    public function aksi_upload(){
        date_default_timezone_set("Asia/Jakarta");

        $nik = $this->input->post('nik');
        $type = $this->uri->segment('2');
        $this->load->model('upload_model');
        $this->load->model('jenisdok_model');
        $this->load->model('config_model');
        
        $this->global['pageTitle'] = 'Adminduk : Upload Dokumen';
        $this->load->model('bioadm_model');
        $databioadm = $this->bioadm_model->getBioAdmInfoByNIK($nik);
        $dataconfig = $this->config_model->getConfigInfo();
        $datajenis = $this->jenisdok_model->ListJenisDok();

        $valx = array();
        foreach($dataconfig as $k=>$v){
            if($type=='datang'){
                if($v->conf_key=='mutasidatang'){
                    $valx[] = $v->conf_val;
                }
            }
            if($type=='keluar'){
                if($v->conf_key=='mutasikeluar'){
                    $valx[] = $v->conf_val;
                }
            }
        }

        $newvalx = json_decode($valx[0],true);

        $this->load->library('upload');

        $files = $_FILES;

        $error= array();
        if(is_array($files) && count($files)>0){
            $nmfile = $this->input->post('nmfile');

            $errx = array();
            foreach($newvalx as $k=>$v){
                if($files['berkas']['name'][$k]!=''){
                    if($v==1){
                        $errx[$k] = 0;
                    }
                    else{
                        $errx[$k] = 0;
                    }
                }
                else{
                    if($v==1){
                        $errx[$k] = 1;
                    }
                    else{
                        $errx[$k] = 0;    
                    }
                }
            }

            if(in_array('1',$errx)){
                ?>
                <script>
                    alert('Maaf, mohon perhatikan wajib isi pada setiap field');
                </script>
                <?php
            }
            else{
                foreach($_FILES['berkas']['name'] as $k=>$v)
                {
                    $_FILES['berkas']['name']= $files['berkas']['name'][$k];
                    $_FILES['berkas']['type']= $files['berkas']['type'][$k];
                    $_FILES['berkas']['tmp_name']= $files['berkas']['tmp_name'][$k];
                    $_FILES['berkas']['error']= $files['berkas']['error'][$k];
                    $_FILES['berkas']['size']= $files['berkas']['size'][$k];

    //                echo $_FILES['berkas']['name'].'<br>';
                    if($_FILES['berkas']['name']!=''){
                        //$this->upload->deletedatafile($databioadm[0]->NIK,$_FILES['berkas']['name']);
                        $dr_[$k]['filename'] = $nmfile[$k];
                        $dr_[$k]['filesize'] = $_FILES['berkas']['size'];
                        $dr_[$k]['jenisdokId'] = $k;

                        $this->upload->initialize($this->set_upload_options($databioadm[0]->NIK,$nmfile[$k],$type));
                        $tes = $this->upload->do_upload('berkas');

                        if(!$tes){
                            //echo $_FILES['berkas']['name'].'no upload <br>';
                            $error[] = $this->upload->display_errors();
                        }
                    }
                }
                
                $lct = './dokumen/mutasi/'.$type.'/'.$nik;
                if(!file_exists($lct.'/waktu.txt')){
                    $filex = fopen($lct."/waktu.txt","w");  
                    fwrite($filex,strtotime(date('d-m-Y H:i:s')));
                    fclose($filex);
                }
                $this->upload_model->FileDBproses($databioadm[0]->NIK,$dr_,$type,$this->vendorId);

                ?>
                <script>
                    alert('Berhasil Upload Data !');
                </script>
                <?php
            }
        }

        $data['config'] = $dataconfig;
        $data['jenis'] = $datajenis;
        $data['error'] = $error;
        $data['bioadm'] = $databioadm;
        $data['type'] = $type;
        $this->loadViews("upload/v_upload", $this->global, $data, NULL);

    }
}
?>
<?php

$bioadmId = '';
$nik = '';
$nama = '';
$jk = '';
$tempatlahir = '';
$tgllahir = '';
$noaktalhr = '';
$goldrh = '';
$agama = '';
$statkwn = '';
$noaktakwn = '';
$tglkwn = '';
$noaktacrai = '';
$tglcrai = '';
$stathbkel = '';
$pddkakh = '';
$jnspkrjn = '';
$namaibu = '';
$namaayah = '';
$nokk = '';



if(!empty($bioadmInfo))
{
    foreach ($bioadmInfo as $k=>$uf)
    {
        $bioadmId = $uf->bioadmId;
        $nik = $uf->NIK;
        $nama = $uf->NAMA_LGKP;
        $jk = $uf->JENIS_KLMIN;
        $tempatlahir = $uf->TMPT_LHR;
        $tgllahir = date('d/m/Y',strtotime($uf->TGL_LHR));
        $noaktalhr = $uf->NO_AKTA_LHR;
        $goldrh = $uf->GOL_DRH;
        $agama = $uf->AGAMA;
        $statkwn = $uf->STAT_KWN;
        $noaktakwn = $uf->NO_AKTA_KWN;
        $tglkwn = date('d-m-Y',strtotime($uf->TGL_KWN));
        $noaktacrai = $uf->NO_AKTA_CRAI;
        $tglcrai = date('d-m-Y',strtotime($uf->TGL_CRAI));;
        $stathbkel = $uf->STAT_HBKEL;
        $pddkakh = $uf->PDDK_AKH;
        $jnspkrjn = $uf->JENIS_PKRJN;
        $namaibu = $uf->NAMA_LGKP_IBU;
        $namaayah = $uf->NAMA_LGKP_AYAH;
        $nokk = $uf->NO_KK;
    }
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Manajemen Biodata Adminduk
        <small>Tambah / Ubah Biodata Adminduk</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Biodata Adminduk</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editBioAdm" method="post" id="editBioAdm" role="form">
                        <input type="hidden" class="form-control" id="bioadmId" name="bioadmId" value="<?php echo $bioadmId; ?>" maxlength="25">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NIK">NIK</label>
                                        <input type="text" class="form-control required" id="NIK" name="NIK" value="<?php echo $nik; ?>" maxlength="25">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NAMA_LGKP">Nama Lengkap</label>
                                        <input type="text" class="form-control required" id="NAMA_LGKP" name="NAMA_LGKP" value="<?php echo $nama; ?>" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="JENIS_KLMIN">Jenis Kelamin</label>
                                        <select id="JENIS_KLMIN" class="form-control required" name="JENIS_KLMIN">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <?php
                                            $arrjk = array('L'=>'Laki-Laki','P'=>'Perempuan');
                                            foreach($arrjk as $k=>$v){
                                                if($jk==$k) $sel='selected';
                                                else $sel = '';
                                                ?>
                                                <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                                                <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TMPT_LHR">Tempat Lahir</label>
                                        <input type="text" class="form-control required" id="TMPT_LHR" name="TMPT_LHR" value="<?php echo $tempatlahir; ?>" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_LHR">Tanggal Lahir</label>
                                        <input type="date" class="form-control required" id="TGL_LHR" name="TGL_LHR" value="<?php echo $tgllahir; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_LHR">No. Akta Lahir</label>
                                        <input type="text" class="form-control required" id="NO_AKTA_LHR" name="NO_AKTA_LHR" maxlength="25" value="<?php echo $noaktalhr; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="GOL_DRH">Golongan Darah</label>
                                        <select id="GOL_DRH" class="form-control required" name="GOL_DRH">
                                            <option value="">-- Pilih Golongan Darah --</option>
                                            <?php
                                            $arrgol = array('AB'=>'AB','A'=>'A','B'=>'B','O'=>'O');
                                            foreach($arrgol as $k=>$v){
                                                if($goldrh==$k) $sel='selected';
                                                else $sel = '';
                                                ?>
                                                <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="AGAMA">Agama</label>
                                        <select id="AGAMA" class="form-control required" name="AGAMA">
                                            <option value="">-- Pilih Agama --</option>
                                            <?php
                                            $arragama = array('ISLAM'=>'Islam','KRISTEN'=>'Kristen','HINDU'=>'Hindu','BUDHA'=>'Budha');
                                            foreach($arragama as $k=>$v){
                                                if($agama==$k) $sel='selected';
                                                else $sel = '';
                                                ?>
                                                <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="STAT_KWN">Status Kawin</label>
                                        <select id="STAT_KWN" class="form-control required" name="STAT_KWN">
                                            <option value="">-- Pilih Status Kawin --</option>
                                            <?php
                                            $arrkwn = array('BELUM_NIKAH'=>'Belum Menikah','NIKAH'=>'Nikah','CERAI'=>'Cerai');
                                            foreach($arrkwn as $k=>$v){
                                                if($statkwn==$k) $sel='selected';
                                                else $sel = '';

                                                ?>
                                                <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_KWN">No. Akta Kawin</label>
                                        <input type="text" class="form-control" id="NO_AKTA_KWN" name="NO_AKTA_KWN" maxlength="25" value="<?php echo $noaktakwn; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_KWN">Tanggal Kawin</label>
                                        <input type="date" class="form-control" id="TGL_KWN" name="TGL_KWN" value="<?php echo $tglkwn; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_CRAI">No. Akta Cerai</label>
                                        <input type="text" class="form-control" id="NO_AKTA_CRAI" name="NO_AKTA_CRAI" maxlength="25" value="<?php echo $noaktacrai; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_CRAI">Tanggal Cerai</label>
                                        <input type="date" class="form-control" id="TGL_CRAI" name="TGL_CRAI" value="<?php echo $tglcrai; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="STAT_HBKEL ">Status Hubungan Keluarga</label>
                                        <select id="STAT_HBKEL " class="form-control required" name="STAT_HBKEL">
                                            <option value="">-- Pilih Status Hubungan Keluarga --</option>
                                            <?php
                                            $arrhbkel = array('AYAH'=>'Ayah','IBU'=>'Ibu','SUAMI'=>'Suami','ISTRI'=>'Istri','ANAK'=>'Anak');
                                            foreach($arrhbkel as $k=>$v){
                                                if($stathbkel==$k) $sel='selected';
                                                else $sel = '';

                                                ?>
                                                <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PDDK_AKH ">Pendidikan Akhir</label>
                                        <select id="PDDK_AKH " class="form-control required" name="PDDK_AKH">
                                            <option value="">-- Pilih Pendidikan Akhir --</option>
                                            <?php
                                            $arrpddk = array('SD'=>'SD','SMP'=>'SMP','SMA'=>'SMA','D1'=>'D1','D3'=>'D3','D4'=>'D4','S1'=>'S1');
                                            foreach($arrpddk as $k=>$v){
                                                if($pddkakh==$k) $sel='selected';
                                                else $sel = '';

                                                ?>
                                                <option value="<?php echo $k; ?>" <?php echo $sel; ?>><?php echo $v; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="JENIS_PKRJN">Jenis Pekerjaan</label>
                                        <input type="text" class="form-control required" id="JENIS_PKRJN" name="JENIS_PKRJN" maxlength="25" value="<?php echo $jnspkrjn; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NAMA_LGKP_IBU">Nama Lengkap Ibu</label>
                                        <input type="text" class="form-control required" id="NAMA_LGKP_IBU" name="NAMA_LGKP_IBU" maxlength="50" value="<?php echo $namaibu; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NAMA_LGKP_AYAH">Nama Lengkap Ayah</label>
                                        <input type="text" class="form-control required" id="NAMA_LGKP_AYAH" name="NAMA_LGKP_AYAH" maxlength="25" value="<?php echo $namaayah; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NO_KK">No. Kartu Keluarga</label>
                                        <input type="text" class="form-control required" id="NO_KK" name="NO_KK" maxlength="25" value="<?php echo $nokk; ?>">
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>../assets/js/editBioAdm.js" type="text/javascript"></script>
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
        $tgllahir = date('d-m-Y',strtotime($uf->TGL_LHR));
        $noaktalhr = $uf->NO_AKTA_LHR;
        $goldrh = $uf->GOL_DRH;
        $agama = $uf->AGAMA;
        $statkwn = $uf->STAT_KWN;
        $noaktakwn = $uf->NO_AKTA_KWN;
        if($uf->TGL_KWN=='0000-00-00') $tglkwn = '-';
        else $tglkwn = date('d-m-Y',strtotime($uf->TGL_KWN));
        $noaktacrai = $uf->NO_AKTA_CRAI;
        if($uf->TGL_CRAI=='0000-00-00')  $tglcrai = '-';
        else $tglcrai = date('d-m-Y',strtotime($uf->TGL_CRAI));;
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
                                        <label for="NIK">NIK</label><br>
                                        <?php echo $nik; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NAMA_LGKP">Nama Lengkap</label><br>
                                        <?php echo $nama; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="JENIS_KLMIN">Jenis Kelamin</label><br>
                                        <?php
                                            $arrjk = array('L'=>'Laki-Laki','P'=>'Perempuan');
                                            foreach($arrjk as $k=>$v){
                                                if($jk==$k){ echo $v; } else {}
                                                
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TMPT_LHR">Tempat Lahir</label><br>
                                        <?php echo $tempatlahir; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_LHR">Tanggal Lahir</label><br>
                                        <?php echo $tgllahir; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_LHR">No. Akta Lahir</label><br>
                                        <?php echo $noaktalhr; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="GOL_DRH">Golongan Darah</label><br>
                                            <?php
                                            $arrgol = array('AB'=>'AB','A'=>'A','B'=>'B','O'=>'O');
                                            foreach($arrgol as $k=>$v){
                                                if($goldrh==$k){ echo $v; }
                                                else {}
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="AGAMA">Agama</label><br>
                                            <?php
                                            $arragama = array('ISLAM'=>'Islam','KRISTEN'=>'Kristen','HINDU'=>'Hindu','BUDHA'=>'Budha');
                                            foreach($arragama as $k=>$v){
                                                if($agama==$k) { echo $v; }
                                                else {}
                                            }
                                            ?>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="STAT_KWN">Status Kawin</label><br>
                                            <?php
                                            $arrkwn = array('BELUM_NIKAH'=>'Belum Menikah','NIKAH'=>'Nikah','CERAI'=>'Cerai');
                                            foreach($arrkwn as $k=>$v){
                                                if($statkwn==$k) {echo $v;}
                                                else {};
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_KWN">No. Akta Kawin</label><br>
                                        <?php echo $noaktakwn; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_KWN">Tanggal Kawin</label><br>
                                        <?php echo $tglkwn; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_CRAI">No. Akta Cerai</label><br>
                                        <?php echo $noaktacrai; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_CRAI">Tanggal Cerai</label><br>
                                        <?php echo $tglcrai; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="STAT_HBKEL ">Status Hubungan Keluarga</label><br>
                                        <?php
                                        $arrhbkel = array('AYAH'=>'Ayah','IBU'=>'Ibu','SUAMI'=>'Suami','ISTRI'=>'Istri','ANAK'=>'Anak');
                                        foreach($arrhbkel as $k=>$v){
                                            if($stathbkel==$k){ echo $v; }
                                            else {}
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="PDDK_AKH ">Pendidikan Akhir</label><br>
                                        <?php
                                        $arrpddk = array('SD'=>'SD','SMP'=>'SMP','SMA'=>'SMA','D1'=>'D1','D3'=>'D3','D4'=>'D4','S1'=>'S1');
                                        foreach($arrpddk as $k=>$v){
                                            if($pddkakh==$k){echo $v;}
                                            else {}
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="JENIS_PKRJN">Jenis Pekerjaan</label><br>
                                        <?php echo $jnspkrjn; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NAMA_LGKP_IBU">Nama Lengkap Ibu</label><br>
                                        <?php echo $namaibu; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NAMA_LGKP_AYAH">Nama Lengkap Ayah</label><br>
                                        <?php echo $namaayah; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NO_KK">No. Kartu Keluarga</label><br>
                                        <?php echo $nokk; ?>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="button" onclick="window.location='<?php echo base_url() ?>DaftarBioAdm'" class="btn btn-default" value="Kembali" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
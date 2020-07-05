<?php

$jenisdokId = '';
$kodeDok = '';
$nama = '';

if(!empty($jenisdokInfo))
{
    foreach ($jenisdokInfo as $uf)
    {
        $jenisdokId = $uf->jenisdokId;
        $kodeDok = $uf->kodeDok;
        $nama = $uf->nama;
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Konfigurasi
        <small>Ubah Konfigurasi</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <?php
                $cfg = array();
                foreach($configInfo as $k=>$v){
                    if($v->conf_key=='mutasidatang') $cfg['mutasidatang'] = json_decode($v->conf_val,true);
                    if($v->conf_key=='mutasikeluar') $cfg['mutasikeluar'] = json_decode($v->conf_val,true);
                }
                ?>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Konfigurasi</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url() ?>editConfig" method="post" id="editConfig" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="mutasi_datang">Mutasi Datang</label><br>
                                        <table width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Syarat Dokumen</th>
                                                    <th>Wajib ?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach($jenis as $k=>$v){
                                                if(isset($cfg['mutasidatang'][$v->jenisdokId])){
                                                    $chck='checked';
                                                    if($cfg['mutasidatang'][$v->jenisdokId]=='1') $chck2 = 'checked';
                                                    else $chck2 = '';
                                                }
                                                else{
                                                    $chck = '';
                                                    $chck2 = '';
                                                }

                                                echo'<tr>';
                                                echo'<td><input type="checkbox" name="listdokdatang['.$v->jenisdokId.']" value="'.$v->jenisdokId.'" '.$chck.' /> '.$v->nama.'</td>';
                                                echo'<td><input type="checkbox" name="syaratdatang['.$v->jenisdokId.']" value="1" '.$chck2.' /> Ya</td>';
                                                echo'</tr>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mutasi_datang">Mutasi Keluar</label><br>
                                        <table width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Syarat Dokumen</th>
                                                    <th>Wajib ?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach($jenis as $k=>$v){
                                                if(isset($cfg['mutasikeluar'][$v->jenisdokId])){
                                                    $chck = 'checked';
                                                    if($cfg['mutasikeluar'][$v->jenisdokId]=='1') $chck2 = 'checked';
                                                    else $chck2 = '';
                                                }
                                                else{
                                                    $chck='';
                                                    $chck2='';
                                                }

                                                echo'<tr>';
                                                echo'<td><input type="checkbox" name="listdokkeluar['.$v->jenisdokId.']" value="'.$v->jenisdokId.'" '.$chck.'/> '.$v->nama.'</td>';
                                                echo'<td><input type="checkbox" name="syaratkeluar['.$v->jenisdokId.']" value="1" '.$chck2.' /> Ya</td>';
                                                echo'</tr>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           </div>
                        </div><!-- /.box-body -->

    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="SUPDATE" value="Submit" />
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
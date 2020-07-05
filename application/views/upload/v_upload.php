<?php
error_reporting(0);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Dokumen Mutasi <?php echo ucwords(strtolower($type)); ?>
        <small>Kelola Dokumen</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Upload Dokumen</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form name="frm2" method="post" action="<?php echo base_url() ?>aksi_upload/<?php echo $type; ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input class="form-control" type="text" name="nik" value="<?php echo $bioadm[0]->NIK; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button style="margin-top:5px;" type="submit" class="btn btn-primary"><span class="fa fa-search"></span> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['nik']) && count($bioadm)==0 && !isset($_POST['SUPDATE'])){
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Maaf data tidak ditemukan !
                        </div>
                        <?php
                    }
                    if(isset($_POST['nik']) && count($bioadm)>0 && !isset($_POST['SUPDATE'])){
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Data ditemukan !
                        </div>
                        <?php
                    }
                    ?>
                    
                    <form role="form" action="<?php echo base_url() ?>aksi_upload/<?php echo $type; ?>" method="post" enctype="multipart/form-data" role="form">
                        <input type="hidden" name="bioadmId" value="<?php echo $bioadm[0]->bioadmId; ?>" />
                        <input type="hidden" name="type" value="<?php echo $type; ?>" />
                        <input type="hidden" name="nik" value="<?php echo $bioadm[0]->NIK; ?>" />
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="dok">Nama Lengkap</label>
                                        <input class="form-control" type="text" disabled value="<?php echo $bioadm[0]->NAMA_LGKP; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="dok">Jenis Kelamin</label>
                                        <input class="form-control" type="text" disabled value="<?php if($bioadm[0]->JENIS_KLMIN=='P') echo 'Perempuan'; if($bioadm[0]->JENIS_KLMIN=='L') echo 'Laki-Laki' ; ?>" />
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="dok">Tempat Lahir</label>
                                        <input class="form-control" type="text" disabled value="<?php echo $bioadm[0]->TMPT_LHR; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="dok">Tanggal Lahir</label>
                                        <input class="form-control" type="text" disabled value="<?php if(isset($bioadm[0]->TGL_LHR)) echo date('d-m-Y',strtotime($bioadm[0]->TGL_LHR)); ?>" />
                                    </div>
                                </div>
                            </div>                            
                            
                            <?php
                            $arrfile = $lfile = array();
                            if(is_dir('./dokumen/mutasi/'.$type.'/'.$bioadm[0]->NIK)){
                                if($handle = opendir('./dokumen/mutasi/'.$type.'/'.$bioadm[0]->NIK))
                                {
                                    while(($file = readdir($handle)) !== false)
                                    {
                                        if($file != '.' && $file != '..')
                                        {
                                            $x = explode('.',$file);
                                            $wxy = str_replace('_',' ',$x[0]);
                                            $arrfile[] = $wxy;
                                            $lfile[$wxy] = $file;
                                        }
                                    }
                                    closedir($handle);
                                }
                            }

                            $valx = array();
                            foreach($config as $k=>$v){
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

                            $newjenis = array();
                            foreach($jenis as $k=>$v){
                                $newjenis[$v->jenisdokId] = $v->nama;
                            }
                            
                            if(file_exists('./dokumen/mutasi/'.$type.'/'.$bioadm[0]->NIK.'/waktu.txt')){
                                $timex = file_get_contents('./dokumen/mutasi/'.$type.'/'.$bioadm[0]->NIK.'/waktu.txt');
                            }

                            if(isset($timex)){ 
                                if(strtotime(date('d-m-Y H:i:s'))>($timex+86400)){
                                    $dsbx = 'disabled';
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Anda tidak bisa merubah data setelah 24 jam !
                                    </div>
                                    <?php
                                }
                                else{
                                    $dsbx = '';
                                }
                            }else{
                                $dsbx = '';
                            }

                            ?>
                            <div class="box-body table-responsive no-padding">
                              <table width="100%" class="table table-hover">
                                <tr>
                                  <th>No</th>
                                  <th>Jenis</th>
                                  <th>Upload</th>
                                  <th>Dokumen</th>
                                  <th>Status</th>
                                </tr>
                                <?php
                                $i=0;
                                foreach($newvalx as $k=>$v){
                                    $z = $i+1;
                                    if($v=='1'){
                                        $rqrd = 'required';
                                        $star = '<label style="color:red;">(*)</label>';
                                    }
                                    else{ 
                                        $rqrd = $star = '';
                                    }
                                    ?>
                                    <tr>
                                      <td width="5%"><?php echo $z; ?></td>
                                      <td width="30%"><?php echo $newjenis[$k].' '.$star; ?></td>
                                      <td width="45%">
                                        <input class="form-control <?php echo $rqrd; ?>" type="file" name="berkas[<?php echo $k; ?>]" <?php echo $dsbx; ?>/>
                                        <input type="hidden" name="nmfile[<?php echo $k; ?>]" value="<?php echo $newjenis[$k]; ?>" />
                                      </td>
                                      <td width="10%" align="center">
                                        <?php
                                        if(in_array($newjenis[$k],$arrfile)) echo'<button type="button" onclick="_ReadFile(\''.$type.'\',\''.$bioadm[0]->NIK.'\',\''.$lfile[$newjenis[$k]].'\');" >Lihat</button>';
                                        else echo'<button type="button" disabled >Kosong</button>';
                                        ?>
                                      </td>
                                      <td width="10%" align="center">
                                        <?php
                                        if(in_array($newjenis[$k],$arrfile)) echo'<span class="label label-success">Ada</span>';
                                        else echo'<span class="label label-danger">Tidak</span>';
                                        ?>
                                      </td>
                                    </tr>

                                    <?php
                                    $i++;
                                }
                                ?>
                              </table>
                              <label style="color:red;">(*)</label> <i>wajib diisi</i>
                            </div><!-- /.box-body -->
                        <?php
                        if(is_array($bioadm) && count($bioadm)>0){
                            if(isset($timex)){
                                if(strtotime(date('d-m-Y H:i:s'))>($timex+86400)){
                                }
                                else{
                                    ?>
                                    <div class="box-footer">
                                        <input type="submit" name="SUPDATE" class="btn btn-primary" value="Submit" />
                                    </div>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <div class="box-footer">
                                    <input type="submit" name="SUPDATE" class="btn btn-primary" value="Submit" />
                                </div>
                                <?php
                            }
                        }
                        ?>
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

<script>
    function _ReadFile() { 
        var args = _ReadFile.arguments;
        var type  = args[0];
        var nik  = args[1];
        var filename  = args[2];
        var x = screen.width/2 - 200;
        var y = screen.height/2 - 300;
        var win = window.open("<?php echo base_url(); ?>ReadFileX?type="+type+"&nik="+nik+"&filename="+filename,"_blank","height=300,width=500,left="+x+",top="+y+", status=yes,toolbar=no,menubar=no,location=center"); 
        win.focus();
    } 
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Dokumen Mutasi Keluar
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
                        <h3 class="box-title">Cari Biodata Adminduk</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <?php // echo  $error; ?>

                    <?php // echo form_open_multipart('upload/aksi_upload'); ?>

                    <form role="form" action="<?php echo base_url() ?>aksi_upload" method="post" enctype="multipart/form-data" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik_">Nomor Identitas Kependudukan</label>
                                        <input type="text" disabled class="form-control required" id="nik_" name="nik_" maxlength="50" value="">
                                        <input type="hidden" class="form-control required" id="nik" name="nik" maxlength="50" value="">
                                        <span class="fa fa-search"><a href="javascript:openWindow();">Cari Data</a></span>
                                        <input type="hidden" class="form-control" id="bioadmId" name="bioadmId"  value="">
                                        <input type="hidden" class="form-control" id="type" name="type"  value="keluar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="GO" />
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
<script>
    function openWindow() { 
       var x = screen.width/2 - 200;
       var y = screen.height/2 - 150;
       var win = window.open("<?php echo base_url(); ?>HookBioAdmList2?layout=free","_blank","height=300,width=500,left="+x+",top="+y+", status=yes,toolbar=no,menubar=no,location=center"); 
       win.focus();
    } 
</script>
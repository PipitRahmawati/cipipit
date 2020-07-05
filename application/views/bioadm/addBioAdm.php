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
                    
                    <form role="form" id="addBioAdm" action="<?php echo base_url() ?>addNewBioAdm" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NIK">NIK</label>
                                        <input type="text" class="form-control required" id="NIK" name="NIK" maxlength="25">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NAMA_LGKP">Nama Lengkap</label>
                                        <input type="text" class="form-control required" id="NAMA_LGKP" name="NAMA_LGKP" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="JENIS_KLMIN">Jenis Kelamin</label>
                                        <select id="JENIS_KLMIN" class="form-control required" name="JENIS_KLMIN">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TMPT_LHR">Tempat Lahir</label>
                                        <input type="text" class="form-control required" id="TMPT_LHR" name="TMPT_LHR" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_LHR">Tanggal Lahir</label>
                                        <input type="date" class="form-control required" id="TGL_LHR" name="TGL_LHR">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_LHR">No. Akta Lahir</label>
                                        <input type="text" class="form-control required" id="NO_AKTA_LHR" name="NO_AKTA_LHR" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="GOL_DRH">Golongan Darah</label>
                                        <select id="GOL_DRH" class="form-control required" name="GOL_DRH">
                                            <option value="">-- Pilih Golongan Darah --</option>
                                            <option value="AB">AB</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
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
                                            <option value="ISLAM">Islam</option>
                                            <option value="KRISTEN">Kristen</option>
                                            <option value="HINDU">Hindu</option>
                                            <option value="BUDHA">Budha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="STAT_KWN">Status Kawin</label>
                                        <select id="STAT_KWN" class="form-control required" name="STAT_KWN">
                                            <option value="">-- Pilih Status Kawin --</option>
                                            <option value="BELUM_NIKAH">Belum Menikah</option>
                                            <option value="NIKAH">Nikah</option>
                                            <option value="CERAI">Cerai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_KWN">No. Akta Kawin</label>
                                        <input type="text" class="form-control" id="NO_AKTA_KWN" name="NO_AKTA_KWN" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_KWN">Tanggal Kawin</label>
                                        <input type="date" class="form-control" id="TGL_KWN" name="TGL_KWN">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NO_AKTA_CRAI">No. Akta Cerai</label>
                                        <input type="text" class="form-control" id="NO_AKTA_CRAI" name="NO_AKTA_CRAI" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TGL_CRAI">Tanggal Cerai</label>
                                        <input type="date" class="form-control" id="TGL_CRAI" name="TGL_CRAI">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="STAT_HBKEL ">Status Hubungan Keluarga</label>
                                        <select id="STAT_HBKEL " class="form-control required" name="STAT_HBKEL">
                                            <option value="">-- Pilih Status Hubungan Keluarga --</option>
                                            <option value="AYAH">Ayah</option>
                                            <option value="IBU">Ibu</option>
                                            <option value="SUAMI">Suami</option>
                                            <option value="ISTRI">Istri</option>
                                            <option value="ANAK">Anak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="PDDK_AKH ">Pendidikan Akhir</label>
                                        <select id="PDDK_AKH " class="form-control required" name="PDDK_AKH">
                                            <option value="">-- Pilih Pendidikan Akhir --</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D1">D1</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="JENIS_PKRJN">Jenis Pekerjaan</label>
                                        <input type="text" class="form-control required" id="JENIS_PKRJN" name="JENIS_PKRJN" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NAMA_LGKP_IBU">Nama Lengkap Ibu</label>
                                        <input type="text" class="form-control required" id="NAMA_LGKP_IBU" name="NAMA_LGKP_IBU" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="NAMA_LGKP_AYAH">Nama Lengkap Ayah</label>
                                        <input type="text" class="form-control required" id="NAMA_LGKP_AYAH" name="NAMA_LGKP_AYAH" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NO_KK">No. Kartu Keluarga</label>
                                        <input type="text" class="form-control required" id="NO_KK" name="NO_KK" maxlength="25">
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
<script src="<?php echo base_url(); ?>assets/js/addBioAdm.js" type="text/javascript"></script>
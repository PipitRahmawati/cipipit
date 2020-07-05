<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Manajemen Biodata Adminduk
        <small>Tambah, Ubah, Hapus</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
<!--                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addBioAdm"><i class="fa fa-plus"></i> Add New</a>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Biodata Adminduk</h3>
                    <div class="box-tools">
                        <?php if(isset($_GET['import']) && $_GET['import']=='1' ){?>
                        <div>
                        <form action="<?php echo base_url() ?>import" enctype="multipart/form-data" method="POST" >
                            <div class="input-group">
                              <input type="file" name="impbioadm" value="" class="form-control" />
                              <div class="input-group-btn">
                                  <input type="submit" class="btn btn-primary" name="import" value="IMPORT" />
                              </div>
                            </div>
                        </form>
                        </div>
                        <br>
                        <?php } ?>
                        <div>
                        <form action="<?php echo base_url() ?>DaftarBioAdm" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <?php if(isset($_GET['import']) && $_GET['import']=='1' ){?> <br><br><br> <?php } ?>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($bioadmRecords)){
                        $no = 1;
                        foreach($bioadmRecords as $record){
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $record->NIK ?></td>
                          <td><?php echo $record->NAMA_LGKP ?></td>
                          <td><?php if($record->JENIS_KLMIN=='L') echo'Laki-Laki'; else if($record->JENIS_KLMIN=='P') echo'Perempuan'; ?></td>
                          <td><?php echo $record->TMPT_LHR ?></td>
                          <td><?php echo $record->TGL_LHR ?></td>
                          
                          <td class="text-center">
                              <a class="btn btn-sm btn-info" href="<?php echo base_url().'detailBam/'.$record->bioadmId; ?>"><i class="fa fa-info"></i></a>
                          </td>
                        </tr>
                        <?php
                        $no++;
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "DaftarBioAdm/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
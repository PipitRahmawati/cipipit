<div class="content-wrapper" style="margin-left:0px !important;">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Biodata Adminduk</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>HookBioAdmList?layout=free" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <form name="frm">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>No Akta Lahir</th>
                      <th>Golongan Darah</th>
                      <th>Agama</th>
                      <th>Status Kawin</th>
                      <th>No. Akta Kawin</th>
                      <th>Tanggal Kawin</th>
                      <th>No. Akta Cerai</th>
                      <th>Tanggal Cerai</th>
                      <th>Status Hubungan Keluarga</th>
                      <th>Pendidikan Akhir</th>
                      <th>Jenis Pekerjaan</th>
                      <th>Nama Ibu</th>
                      <th>Nama Ayah</th>
                      <th>No. KK</th>
                    </tr>
                    <?php
                    if(!empty($bioadmRecords)){
                        $no = 1;
                        foreach($bioadmRecords as $record){
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td>
                            <?php echo '<a href="javascript:_PassValue(\''.$record->bioadmId.'\',\''.$record->NIK.'\')">'.$record->NIK.'</a>
                                <input id="nik-'.$record->bioadmId.'" type="hidden" value="'.$record->NIK.'" />
                                <input id="bioAdm-'.$record->bioadmId.'" type="hidden" value="'.$record->bioadmId.'" />
                            '; ?>
                          </td>
                          <td><?php echo $record->NAMA_LGKP ?></td>
                          <td><?php echo $record->JENIS_KLMIN ?></td>
                          <td><?php echo $record->TMPT_LHR ?></td>
                          <td><?php echo $record->TGL_LHR ?></td>
                          <td><?php echo $record->NO_AKTA_LHR ?></td>
                          <td><?php echo $record->GOL_DRH ?></td>
                          <td><?php echo $record->AGAMA ?></td>
                          <td><?php echo $record->STAT_KWN ?></td>
                          <td><?php echo $record->NO_AKTA_KWN ?></td>
                          <td><?php echo $record->TGL_KWN ?></td>
                          <td><?php echo $record->NO_AKTA_CRAI ?></td>
                          <td><?php echo $record->TGL_CRAI ?></td>
                          <td><?php echo $record->STAT_HBKEL ?></td>
                          <td><?php echo $record->PDDK_AKH ?></td>
                          <td><?php echo $record->JENIS_PKRJN ?></td>
                          <td><?php echo $record->NAMA_LGKP_IBU ?></td>
                          <td><?php echo $record->NAMA_LGKP_AYAH ?></td>
                          <td><?php echo $record->NO_KK ?></td>
                        </tr>
                        <?php
                        $no++;
                        }
                    }
                    ?>
                </table>
                </form>
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
            jQuery("#searchList").attr("action", baseURL + "HookBioAdmList/" + value + "?layout=free");
            jQuery("#searchList").submit();
        });
    });
</script>
<script>
    function _PassValue(bioadmId,nik){
//        console.log('bioadmId = '+document.getElementById("nik-"+bioadmId).value);
//        console.log('wew='+window.opener.document.getElementById("nik-"+bioadmId).value);

        window.opener.document.getElementById("bioadmId").value = document.getElementById("bioAdm-"+bioadmId).value;
        window.opener.document.getElementById("nik").value = document.getElementById("nik-"+bioadmId).value;
        window.opener.document.getElementById("nik_").value = document.getElementById("nik-"+bioadmId).value;
        window.close();
    }

    // function _PassValue2(bioadmId,nik){
    //   parent.passvaluex(bioadmId,nik);
    // }
</script>
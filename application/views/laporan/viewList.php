<?php

$dt1str = '';
$dt2str = '';
$searchText1 = '';

if($dt1!='') $dt1str = strtotime($dt1);
else $dt1str = '-';

if($dt2!='') $dt2str = strtotime($dt2);
else $dt2str = '-';

if($searchText!='') $searchText1 = $searchText;
else $searchText1 = '-';

if($jenismutasi!='') $jmutasi = $jenismutasi;
else $jmutasi = '-';


if($dt1!='') $dx1 = date('d-m-Y',$dt1str);
else $dx1 = '';

if($dt2!='') $dx2 = date('d-m-Y',$dt2str);
else $dx2 = '';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Laporan
      </h1>
    </section>
    <section class="content">
<!--         <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>editOldRlg"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <form name="frm" action="<?php echo base_url() ?>DaftarLaporan" method="POST" id="searchList">
                            <div class="input-group" style="padding:10px;">
                              Tanggal <input type="date" name="date1" value="" />
                              &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                              Tanggal <input type="date" name="date2" value="" />
                              &nbsp;&nbsp;&nbsp;
                              Jenis Mutasi &nbsp;&nbsp;
                              <select style="height:42px;" name="jenismutasi" >
                                <option value="">--Pilih--</option>
                                <option value="datang">Datang</option>
                                <option value="keluar">Keluar</option>
                              </select>
                              &nbsp;&nbsp;&nbsp;
                              <a class="btn btn-primary" href="javascript:document.frm.submit();"><i class="fa fa-search"></i> GO</a>
                              &nbsp;&nbsp;
                              <a class="btn btn-primary" href="<?php echo base_url() ?>lapcetakpdf/<?php echo $dt1str; ?>/<?php echo $dt2str; ?>/<?php echo $jmutasi; ?>/<?php echo $searchText1; ?>"><i class="fa fa-print"></i> CETAK</a>
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;margin-top:6px;" placeholder="Cari "/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <br><br><br>

                <?php 
                if($dx1!='') echo '<label style="width:100%;text-align:center;font-size:16px;">Tanggal : '.$dx1.' s/d '.$dx2.' </label>'; 
                if($jenismutasi!='') echo '<label style="width:100%;text-align:center;font-size:16px;">Jenis Mutasi : '.ucwords($jmutasi).'</label>'; 

                ?> 


                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($bioadmRecords))
                    {
                        $no = 1;
                        foreach($bioadmRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $record->NIK ?></td>
                      <td><?php echo $record->NAMA_LGKP ?></td>
                      <td><?php if($record->JENIS_KLMIN=='L') echo'Laki-Laki'; else if($record->JENIS_KLMIN=='P') echo'Perempuan'; ?></td>
                      <td><?php echo $record->TMPT_LHR ?></td>
                      <td><?php if($record->TGL_LHR!='0000-00-00') echo date('d-m-Y',strtotime($record->TGL_LHR)); else echo '-'; ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'detailBam/'.$record->bioadmId; ?>"><i class="fa fa-search"></i></a>
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
            jQuery("#searchList").attr("action", baseURL + "DaftarRegLeg/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
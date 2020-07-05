<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Data Dokumen
        <small>daftar dokumen</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
<!--                 <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>a"><i class="fa fa-plus"></i> Add New</a>
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Coba aja</h3>
                    <div class="box-tools"><!-- 
                        <form action="<?php echo base_url() ?>DaftarPejabat" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form> -->
                    </div>
                </div><!-- /.box-header -->
                <h1>Contoh Aja</h1>

                <ul>
                  <?php foreach ($upload_data as $item => $value):?>
                    <li><?php echo $item;?>: <?php echo $value;?></li>
                  <?php endforeach; ?>
                </ul> 
                <!-- <div class="row align-items-center">  
                    <div class="col">
                        <div id="uploaded_file"></div>
                    </div>
                </div>   
                <form id="upload-form" class="upload-form" method="post">
                     <div class="row align-items-center">  
                      <div class="form-group col-md-9">
                        <label for="inputEmail4">Choose a file:</label>
                        <input type="file" class="form-control" id="upl-file" name="upl_file">  
                        <span id="chk-error"></span>
                      </div>
                      <div class="col">
                            <button type="submit" class="btn btn-primary mt-3 float-left" id="upload-file"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                        </div>
                    </div>
                </form>
                 -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/filestyle.js" type="text/javascript"></script>

<script>

function uploadFile() {
    var file = document.getElementById("fileku").files[0];
    var formdata = new FormData();
    formdata.append("file_nya", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressUpload, false);
    ajax.open("POST", "<?php echo site_url('upload/do_upload');?>", true);
    ajax.send(formdata);
}

function progressUpload(event){
    var percent = (event.loaded / event.total) * 100;
    document.getElementById("progress-bar").style.width = Math.round(percent)+'%';    
    document.getElementById("status").innerHTML = Math.round(percent)+"% kumplit bro";
  if(event.loaded==event.total){
    window.location.href = '<?php echo base_url();?>';
  }
}

</script> -->
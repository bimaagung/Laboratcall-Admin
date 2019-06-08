
<style type="text/css">
    img{
        max-width:120px;
        max-height: 150px;
    }
    input[type=file]{
        padding:10px;
        background:white;}
    
    .label_image{
        width: 100%;
    }

    .upload_image{
        width: 65%;
        border: 1px solid #DBDBDB;
        padding: 1%;
    }

    .image_profil{
        width: 120px;
        height: 150px;
    }
    </style>

    <script>
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                    $('#viewupdate')
                        .attr('hidden',e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    
<div class="span9" id="content">
  <!-- morris stacked chart -->
  <div class="row-fluid">


   <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $labelpasien;?></div>
      </div>
      <div class="block-content collapse in">
        <div class="span12">
        <?php 
            $peringatan = $this->session->flashdata('peringatan');
            if(isset($peringatan))
            {
          ?>
              <div class="alert alert-error">
              <button class="close" data-dismiss="alert">&times;</button>
              <strong>Berhasil</strong>
                <?php echo $peringatan; ?>
              </div>
          <?php
              }
          ?>
          <form  method="post" action="<?php echo base_url();?>index.php/admin/page_pengguna/save_pasien" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
          <div class="control-group" style="margin-top:50px;" align="center">
                    <?php
                        if($foto == ''){
                    ?>
                            <img id="blah"/>
                            <img id="viewupdate" src="<?php echo base_url(); ?>assets/images/blankimage.png" class="image_profil"/>
                            <br>
                            <div class="col-lg-12 col-sm-12 col-12">
                              <label class="btn btn-default" style="width:10.2%;">
                                  Pilih Foto&hellip; <input type="file" style="display: none;" name="foto" onchange="readURL(this);">
                              </label>
                            </div>
                    <?php
                        }else{
                    ?>
                            <img id="blah"/> 
                            <img id="viewupdate" src="<?php echo base_url(); ?>assets/img/anggota/<?php echo $foto?>" class="image_profil"/> 
                            <br>
                            <div class="col-lg-12 col-sm-12 col-12">
                              <label class="btn btn-default" style="width:10.2%;">
                                  Pilih Foto&hellip; <input type="file" style="display: none;" name="foto" onchange="readURL(this);">
                              </label>
                            </div>


                    <?php
                        }
                      ?>    
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="typeahead">Nama Lengkap</label>
                <div class="controls">
                  <input type="text" name="nama" id="typeahead" value="<?php echo $nama?>" required>
                   <!-- hidden input -->
                  <input type="text" class="hidden" name="id" value="<?php echo $id?>">
                  <input type="text" class="hidden" name="foto_lm" value="<?php echo $foto?>">
                  <!-- // -->
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="optionsCheckbox">Jenis Kelamin</label>
                <div class="controls">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn">
                  <input type="radio" name="jenis_kelamin" value="L" <?php if($jenis_kelamin == "L") {echo "checked";} ?> id="option1" autocomplete="off"> L
                </label>
                <label class="btn">
                  <input type="radio" name="jenis_kelamin" value="P" <?php if($jenis_kelamin == "P") {echo "checked";} ?> id="option2" autocomplete="off"> P
                </label>
              </div>
                </div>
            </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Tempat / Tanggal Lahir</label>
                <div class="controls">
                  <!-- <input type="date" class="input-xlaxrge datepicker" id="date01" value="02/16/12"> -->
                  <input type="text" name="tmp_lahir" class="input-xlarge datepicker span2" id="date01" value="<?php echo $tmp_lahir?>" required>
                  <input type="date" name="tanggal_lahir" class="input-xlarge datepicker span3" id="date01" value="<?php echo $tanggal_lahir?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="textarea2">Alamat</label>
                <div class="controls">
                  <textarea name="alamat" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 45%; height: 80px"><?php echo $alamat?></textarea>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Username</label>
                <div class="controls">
                  <input type="text" name="username" value="<?php echo $username?>" required>
                </div>
              </div>      
              <hr>       
              <div class="control-group">
                <label class="control-label" for="date01">Password</label>
                <div class="controls">
                  <input type="password" name="password" value="<?php echo $password?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Retype Password</label>
                <div class="controls">
                  <input type="password" name="retype_password" value="<?php echo $retype_password?>" required>
                </div>
              </div>
              <hr>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a type="button" class="btn" href="<?php echo base_url(); ?>index.php/admin/page_pengguna">Kembali</a>
              </div>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
    <!-- /block -->
  </div>
</div>


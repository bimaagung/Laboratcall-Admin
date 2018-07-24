<style type="text/css">
    img{
        max-width:150px;
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
        width: 150px;
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
        <div class="muted pull-left"></div>
      </div>
      <div class="block-content collapse in">
        <div class="span12">
          <form  method="post" action="<?php echo base_url();?>index.php/admin/page_fungsionaris/save_fungsionaris" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
            <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Insert Data Fungsionaris</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
              <div class="control-group">
                <label class="control-label" for="typeahead">* Nama Lengkap</label>
                <div class="controls">
                  <input type="text" name="nama" id="typeahead" value="<?php echo $nama?>" required>
                  <input type="text" class="hidden" name="id" value="<?php echo $id?>">
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="typeahead">* NIM</label>
                <div class="controls">
                  <input type="number" name="nim" id="typeahead" value="<?php echo $nim?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="typeahead">Prodi/Jurusan/Fakultas</label>
                <div class="controls">
                  <input type="text" name="prodi" id="typeahead" value="<?php echo $prodi?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">TTL</label>
                <div class="controls">
                  <!-- <input type="date" class="input-xlaxrge datepicker" id="date01" value="02/16/12"> -->
                  <input type="date" name="ttl" class="input-xlarge datepicker span3" id="date01" value="<?php echo $ttl?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="textarea2">Alamat Kos</label>
                <div class="controls">
                  <textarea name="alamatkos" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 65%; height: 80px"><?php echo $alamatkos?></textarea>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="textarea2">Alamat Rumah</label>
                <div class="controls">
                  <textarea name="alamatrumah" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 65%; height: 80px"><?php echo $alamatrumah?></textarea>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="select01">Bidang di Riptek</label>
                <div class="controls">
                  <select id="select01" name="posisiriptek" class="chzn-select span3" value="<?php echo $posisiriptek?>" required>
                    <option>Select Bidang</option>
                    <option>PH</option>
                    <option>PSDM</option>
                    <option>PTI</option>
                    <option>Robotik</option>
                    <option>Technopreneur</option>
                    <option>Kominfo</option>
                  </select>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Tahun Masuk</label>
                <div class="controls">
                  <input type="number" name="thn_masuk" value="<?php echo $thn_masuk?>" required>
                </div>
              </div>      
              <hr>       
              <div class="control-group">
                <label class="control-label" for="textarea2">Motto</label>
                <div class="controls">
                  <textarea name="motto" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 65%; height: 80px"><?php echo $motto?></textarea>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Hobi</label>
                <div class="controls">
                  <input type="text" name="hobi" value="<?php echo $hobi?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">E-mail</label>
                <div class="controls">
                  <input type="email" name="email" value="<?php echo $email?>" required>
                </div>
              </div> 
              <hr>           
              <div class="control-group">
                <label class="control-label" for="date01">Nomor HP</label>
                <div class="controls">
                  <input type="number" name="nomorhp" value="<?php echo $nomorhp?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Nomor Whatsapp</label>
                <div class="controls">
                  <input type="number" name="nomorwa" value="<?php echo $nomorwa?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="date01">Sosial Media</label>
                <div class="controls">
                  <input type="text" name="sosmed" value="<?php echo $sosmed?>" required>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="textarea2">Hal yang disukai</label>
                <div class="controls">
                  <textarea name="disukai" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 65%; height: 80px"><?php echo $disukai?></textarea>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label" for="textarea2">Hal yang tidak disukai</label>
                <div class="controls">
                  <textarea name="tdksuka" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 65%; height: 80px"><?php echo $tdksuka?></textarea>
                </div>
              </div>
              <hr>    
              <div class="control-group">
                <label class="control-label" for="date01">Cita - Cita</label>
                <div class="controls">
                  <input type="text" name="citacita" value="<?php echo $citacita?>" required>
                </div>
              </div>
              <hr>                       
              <div class="control-group">
                <label class="control-label" for="textarea2">Pesan</label>
                <div class="controls">
                  <textarea name="pesan" class="input-xlarge textarea" required placeholder="Enter text ..." style="width: 65%; height: 80px"><?php echo $pesan?></textarea>
                </div>
              </div>
              <div class="control-group" style="margin-top:20px; margin-left:180px;" align="left">
                        <?php
                            if($foto == ''){
                        ?>
                                <img id="blah"/>
                                <img id="viewupdate" src="<?php echo base_url(); ?>assets/images/blankimage.png" class="image_profil"/>
                                <br>
                                <div class="col-lg-12 col-sm-12 col-12">
                                  <label class="btn btn-default" style=" margin-top:2%;">
                                      Pilih Foto&hellip; <input type="file" style="display: none;" name="foto" onchange="readURL(this);">
                                  </label>
                                </div>
                        <?php
                            }else{
                        ?>
                                <img id="blah"/> 
                                <img id="viewupdate" src="<?php echo base_url(); ?>assets/img/<?php echo $foto ?>" class="image_profil"/> 
                                <br>
                                <div class="col-lg-12 col-sm-12 col-12">
                                  <label class="btn btn-default" style="margin-top:2%;">
                                      Pilih Foto&hellip; <input type="file" style="display: none;" name="foto" onchange="readURL(this);">
                                  </label>
                                </div>


                        <?php
                            }
                         ?>    
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn" onclick="window.location='http://localhost/silari/index.php/admin/page_fungsionaris'">Kembali</button>
              </div>
            
            </fieldset>
          </form>

        </div>
      </div>
    </div>
    <!-- /block -->
  </div>
</div>


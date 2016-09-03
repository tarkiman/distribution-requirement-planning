<?php
	foreach ($results as $object) {
		$id_karyawan = $object->id_karyawan;
		$id_jabatan = $object->id_jabatan;
		$email = $object->email;
		$nama_karyawan = $object->nama_karyawan;
    $telepon = $object->telepon;
    $alamat = $object->alamat;
    $tempat_lahir = $object->tempat_lahir;
    $tanggal_lahir = $object->tanggal_lahir;
    $foto = $object->foto;
	}
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Karyawan
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-xs-12">
              <!-- general form elements disabled -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Data</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php').'/karyawan/insert';?>">
                    <!-- text input -->
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Nama Karyawan</label>
                      <input type="text" name="nama_karyawan" value="<?php echo $nama_karyawan;?>" class="form-control" placeholder="Enter Full Name" required/>
                    </div>
                    <div class="form-group has-success">
                      <label for="inputError">Tempat & Tanggal Lahir</label>
                      <div class="row">
                        <div class="col-xs-5">
                          <input type="text" name="tempat_lahir" value="<?php echo $tempat_lahir;?>" class="form-control" placeholder="Tempat Lahir">
                        </div>
                        <div class="col-xs-7">
                          <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" class="form-control" placeholder="yyyy-mm-dd">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class='form-group has-success'>
                        <label for='nama_jabatan'>Jabatan</label>
                        <select name='id_jabatan' class='form-control' required><option value=''>--Pilih Jabatan--</option>";
                        <?php
                            foreach ($jabatan as $j) {
                                if($id_jabatan == $j->id_jabatan ){

                                    echo "<option value='".$j->id_jabatan."' selected>".$j->nama_jabatan."</option>";
                                
                                }else{

                                    echo "<option value='".$j->id_jabatan."'>".$j->nama_jabatan."</option>";
                               
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group"><div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Alamat</label>
                      <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Karyawan"><?php echo $alamat;?></textarea>
                    </div>
                    <div class="form-group has-success">
                      <label for="inputWarning">Email</label>
                      <input type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder="Email Karyawan"/>
                    </div> 
                    <div class="form-group has-success">
                      <label for="inputError">Telepon</label>
                      <input type="text" name="telepon" value="<?php echo $telepon;?>" class="form-control" placeholder="Nomor Telepon"/>
                    </div>




                  <div class='form-group has-success'>                        
                      <label for='inputFotoBendung' class='control-label' align='center'>Foto</label>
                        <div class='fileinput fileinput-new' data-provides='fileinput'>
                          <div class='fileinput-new thumbnail' style='width: 300px;' data-trigger='fileinput'>
                            <img src='<?php echo base_url();?>/uploads/default.jpg' alt='...' style='width:300px;'>
                          </div>
                          <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 300px; '>

                          </div>
                          <div>
                            <span class='btn btn-default btn-file'>
                              <span class='fileinput-new'>Select image</span>
                                <span class='fileinput-exists'>Change</span>
                                  <input id='inputFotoBendung' type='file' class='btn btn-default' name='userfile'>
                            </span>
                              <a href='#' class='btn btn-orange fileinput-exists' data-dismiss='fileinput'>Remove</a>
                          </div>
                      </div>
                  </div>




                    <!-- <div class="form-group">
                      <label for="exampleInputFile">Upload Gambar</label>
                      <input type="file" name="userfile">
                      <p class="help-block">Format file .JPG</p>
                    </div> -->
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>                                     
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script type="text/javascript">
      $(function () {
        $('#tanggal_lahir').datepicker({
              format: 'yyyy-mm-dd'
          });
      });
</script>
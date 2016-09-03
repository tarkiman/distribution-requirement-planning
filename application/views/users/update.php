<?php
	foreach ($results as $object) {
		$id = $object->id;
		$username = $object->username;
		$password = $object->password;
		$nama_lengkap = $object->nama_lengkap;
    $email = $object->email;
    $foto = $object->foto;
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Users
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
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Update Data</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('index.php').'/users/update/'.$id;?>">
                <!-- text input -->
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap;?>" class="form-control" placeholder="Enter Full Name" required/>
                </div>
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Email</label>
                  <input type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder="Enter Full Name" required/>
                </div>
                <div class="form-group has-success">
                  <label for="inputWarning">Username</label>
                  <input type="text" name="username" value="<?php echo $username;?>" class="form-control" placeholder="Enter Username" required/>
                </div> 
                <div class="form-group has-success">
                  <label for="inputError">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                </div>
                <div class="form-group">
                      <label for="exampleInputFile">Upload Gambar</label>
                      <img src="<?php echo base_url().'uploads/'.$foto;?>">
                      <input type="file" name="userfile">
                      <p class="help-block">Format file .JPG</p>
                </div>
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


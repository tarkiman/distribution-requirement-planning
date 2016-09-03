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
                  <h3 class="box-title">Tambah Data</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php').'/users/insert';?>">
                    <!-- text input -->
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Enter Full Name" required/>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="Enter Full Name" required/>
                    </div>
                    <div class="form-group has-success">
                      <label for="inputWarning">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Enter Username" required/>
                    </div> 
                    <div class="form-group has-success">
                      <label for="inputError">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password" required/>
                    </div>



<div class='form-group'>                        
    <label for='inputFotoBendung' class='control-label' align='center'>Foto Bendungan</label>
      <div class='fileinput fileinput-new' data-provides='fileinput'>
        <div class='fileinput-new thumbnail' style='width: 1400px;' data-trigger='fileinput'>
          <img src='assets/images/login.png' alt='...' style='width: 1400px;'>
        </div>
        <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 1400px; '>
        </div>
        <div>
          <span class='btn btn-default btn-file'>
            <span class='fileinput-new'>Select image</span>
              <span class='fileinput-exists'>Change</span>
                <input id='inputFotoBendung' type='file' class='btn btn-default' name='fupload'>
          </span>
            <a href='#' class='btn btn-orange fileinput-exists' data-dismiss='fileinput'>Remove</a>
        </div>
    </div>
</div>




                    <div class="form-group">
                      <label for="exampleInputFile">Upload Gambar</label>
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

<?php
	foreach ($results as $object) {
      $id_driver = $object->id_driver;
      $nama_driver = $object->nama_driver;
      $alamat = $object->alamat;
      $telepon = $object->telepon;
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Driver
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
              <form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('index.php').'/driver/update/'.$id_driver;?>">
                <!-- text input -->
                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">ID Driver</label>
                    <input type="text" name="id_driver" value="<?php echo $id_driver;?>" class="form-control" placeholder="ID Driver" readonly required/>
                  </div>

                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nama Driver</label>
                  <input type="text" name="nama_driver" value="<?php echo $nama_driver;?>" class="form-control" placeholder="Nama Driver" required/>
                </div>
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control" placeholder="Alamat Driver" required/>
                </div>
                <div class="form-group has-warning">
                  <label for="inputWarning"><i class="fa fa-bell-o"></i>Telepon</label>
                  <input type="number" name="telepon" value="<?php echo $telepon;?>" class="form-control" placeholder="Telepon Driver" required/>
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


<?php
	foreach ($results as $object) {
      $id_supplier = $object->id_supplier;
      $nama_supplier = $object->nama_supplier;
      $alamat = $object->alamat;
      $telepon = $object->telepon;
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Supplier
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
        <div class="col-md-6">
          <!-- general form elements disabled -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Update Data</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('index.php').'/supplier/update/'.$id_supplier;?>">
                <!-- text input -->
                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">ID Supplier</label>
                    <input type="text" name="id_supplier" value="<?php echo $id_supplier;?>" class="form-control" placeholder="ID Supplier" readonly required/>
                  </div>

                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Nama Supplier</label>
                  <input type="text" name="nama_supplier" value="<?php echo $nama_supplier;?>" class="form-control" placeholder="Nama Supplier" required/>
                </div>
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control" placeholder="Alamat Supplier" required/>
                </div>
                <div class="form-group has-warning">
                  <label for="inputWarning">Telepon</label>
                  <input type="number" name="telepon" value="<?php echo $telepon;?>" class="form-control" placeholder="Telepon Supplier" required/>
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


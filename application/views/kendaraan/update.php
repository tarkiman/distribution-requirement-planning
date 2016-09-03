<?php
	foreach ($results as $object) {
      $no_kendaraan = $object->no_kendaraan;
      $merek = $object->merek;
      $tahun = $object->tahun;
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kendaraan
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
              <form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('index.php').'/kendaraan/update/'.$no_kendaraan;?>">
                <!-- text input -->
                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Nomor Kendaraan</label>
                    <input type="text" name="no_kendaraan" value="<?php echo $no_kendaraan;?>" class="form-control" placeholder="Nomor Kendaraan" readonly required/>
                  </div>

                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Nama Kendaraan</label>
                  <input type="text" name="merek" value="<?php echo $merek;?>" class="form-control" placeholder="Nama kendaraan" required/>
                </div>
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Tahun</label>
                  <input type="text" name="tahun" value="<?php echo $tahun;?>" class="form-control" placeholder="tahun kendaraan" required/>
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


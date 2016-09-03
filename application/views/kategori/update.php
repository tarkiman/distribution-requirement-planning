<?php
	foreach ($results as $object) {
		$id_kategori = $object->id_kategori;
		$nama_kategori = $object->nama_kategori;
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kategori
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
              <form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('index.php').'/kategori/update/'.$id_kategori;?>">
                <!-- text input -->
                <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nama Kategori</label>
                  <input type="text" name="nama_kategori" value="<?php echo $nama_kategori;?>" class="form-control" placeholder="Nama Kategori" required/>
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


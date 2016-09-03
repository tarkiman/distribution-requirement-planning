<?php
    foreach ($supplier as $object) {
        $id_supplier  = $object->id_supplier;
    }
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Supplier
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
                  <h3 class="box-title">Tambah Supplier</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php').'/supplier/insert';?>">
                    <!-- text input -->
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">ID Supplier</label>
                      <input type="text" name="id_supplier" value="<?php echo $id_supplier;?>" class="form-control" placeholder="ID supplier" readonly required/>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Nama Supplier</label>
                      <input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" required/>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Alamat</label>
                      <input type="text" name="alamat" class="form-control" placeholder="Alamat" required/>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Telepon</label>
                      <input type="text" name="telepon" class="form-control" placeholder="Telepon" required/>
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

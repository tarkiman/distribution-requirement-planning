      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Produk
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
                  <h3 class="box-title">Tambah Produk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php').'/produk/insert';?>">
                    <!-- text input -->
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess"></i> ID Produk</label>
                      <input type="text" name="id_produk" class="form-control" placeholder="ID Produk" required/>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess"></i> Nama Produk</label>
                      <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required/>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess"></i>Stok</label>
                      <input type="number" name="stok" class="form-control" placeholder="Stok Produk" required/>
                    </div>
                    <div class="form-group has-success">
                      <label for="inputWarning"></i>Satuan</label>
                      <input type="text" name="satuan" class="form-control" placeholder="Satuan Produk" required/>
                    </div> 
                    <div class="form-group has-success">
                      <label for="inputSuccess"></i> Harga</label>
                      <input type="number" name="harga" class="form-control" placeholder="Harga Produk" required/>
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Produk
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <a class="btn btn-success" href="<?php echo base_url();?>produk/add">Tambah Produk</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

				        <?php
                $no=1;
							foreach ($results as $object) {
								echo "
								<tr>
									<td>".$no."</td>
									<td>".$object->id_produk."</td>
									<td>".$object->nama_produk."</td>
									<td>".$object->stok."</td>
									<td>".$object->satuan."</td>
									<td align='center'>  
										<a href=".base_url()."produk/show/".$object->id_produk."><i class='fa fa-edit'></i> Edit </a> | 
										<a href=".base_url()."produk/delete/".$object->id_produk." onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='fa fa-trash-o'></i> Delete </a>
									</td>
								</tr>
								";
                $no++;
							}
						?>                     
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

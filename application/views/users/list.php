      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management Users
            <small>List User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> List User</a></li>
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
                  <a class="btn btn-success" href="<?php echo base_url();?>users/add">Tambah User</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
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
									<td>".$object->username."</td>
									<td>".$object->nama_lengkap."</td>
									<td>".$object->email."</td>
									<td align='center'>  
										<a href=".base_url()."users/show/".$object->id."><i class='fa fa-edit'></i> Edit </a> | 
										<a href=".base_url()."users/delete/".$object->id." onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" id='notification-trigger'><i class='fa fa-trash-o'></i> Delete </a>
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

      <!-- Modal Konfirmasi Hapus Data-->
      <form role="form" method=POST action="<?php echo base_url('index.php').'/users/delete/'.$object->id; ?>">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" > <!--data-backdrop="static"-->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesan</h4>
              </div>
              <div class="modal-body">
                <p>Anda yakin akan menghapus data <?php echo $object->nama_lengkap ?>?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ya, Lanjutkan</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div>
      </form>

      <script>
        $(document).ready(function(){
        // $(function(){

            $(document).on('click','#modal-data-user',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                var title = 'Pesan';
                $.post('modal-logout.php',
                    function(html){
                        $(".modal-body").html(html);
                        $(".modal-title").html(title);                        
                    }   
                );
            });
        });

      </script>



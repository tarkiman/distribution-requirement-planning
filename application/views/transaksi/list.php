<?php $f = new Formatter_model(); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Transaksi Penjualan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Transaksi</a></li>
            <li class="active">Penjualan</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>ID Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Total</th>
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
                  <td>".$object->id_penjualan."</td>                  
                  <td>".$object->nama_pelanggan."</td>
                  <td align='center'>".$f->format_tanggal_lengkap($object->tgl_pemesanan)."</td>
                  <td align='right'>".$f->format_rupiah($object->total)."</td>
                  <td align='center'>  
                    <a href=".base_url()."transaksi/print_data/".$object->id_penjualan."><i class='fa fa-file-o'></i> View </a>
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

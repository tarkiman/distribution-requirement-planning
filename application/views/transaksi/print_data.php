<?php
	foreach ($penjualan as $object) {
      $id_penjualan = $object->id_penjualan;
      $id_pengiriman = $object->id_pengiriman;
      $tgl_pemesanan = $object->tgl_pemesanan;
      $nama_pelanggan = $object->nama_pelanggan;
      $telepon = $object->telepon;
      $alamat = $object->alamat;
	}

	foreach ($invoice as $r) { $invoice = $r->invoice; }
	foreach ($grand_total as $r) { $grand_total = $r->total; }
	foreach ($jatuh_tempo as $r) { $jatuh_tempo = $r->jatuh_tempo; }

	$f = new Formatter_model();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Penjualan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Print Data</li>
      </ol>
    </section>

		<!-- Main content -->
		<section class="content invoice">
		    <!-- title row -->
		    <div class="row">
		        <div class="col-xs-12">
		            <h2 class="page-header">
		                <i><img src="<?php echo base_url();?>assets/images/logo.png" width="75px"></i> PT. Gypsum Griya Indah
		                <small class="pull-right"><?php echo $f->hari_ini().", ".$f->tanggal_sekarang();?></small>
		            </h2>
		        </div><!-- /.col -->
		    </div>
		    <!-- info row -->
		    <div class="row invoice-info">
		        <div class="col-sm-4 invoice-col">
		            Dari :
		            <address>
		                <strong>Tarkiman</strong><br>
		                Dsn.Krajan 2 No.17 Ds.Cigugur Kidul, <br>
		                Pusakajaya - Subang, Jawa Barat<br>
		                Telp. 0852-2224-1987<br/>
		                Email : tarkiman@codelogics.net
		            </address>
		        </div><!-- /.col -->
		        <div class="col-sm-4 invoice-col">
		            Kepada Yth :
		            <address>
		                <strong><?php echo $nama_pelanggan; ?></strong><br>
		                <?php echo $alamat; ?><br>
		                Telp. <?php echo $telepon; ?><br/>
		            </address>
		        </div><!-- /.col -->
		        <div class="col-sm-4 invoice-col">
		            <b>Invoice       : #<?php echo $invoice;?></b><br/>
		            <br/>
		            <b>No. Nota      :</b> <?php echo $id_penjualan; ?><br/>
		            <b>Tanggal Order :</b> <?php echo $f->format_tanggal($tgl_pemesanan); ?><br/>
		            <b>Jatuh Tempo   :</b> <?php echo $f->format_tanggal($jatuh_tempo); ?> <br/>
		        </div><!-- /.col -->
		    </div><!-- /.row -->

		    <!-- Table row -->
		    <div class="row">
		        <div class="col-xs-12 table-responsive">
		            <table class="table table-striped">
		                <thead>
		                    <tr>
		                        <th>No.</th>
		                        <th>Nama Barang</th>
		                        <th>Harga</th>
		                        <th>Jumlah</th>
		                        <th>Satuan</th>
		                        <th>Subtotal</th>
		                    </tr>
		                </thead>
		                <tbody>

		                <?php
		                	$no=1;
							foreach ($penjualan as $object) {
						     echo"<tr>
			                        <td>".$no."</td>
			                        <td>".$object->nama_produk."</td>
			                        <td>".$f->format_rupiah($object->harga_jual)."</td>                                        
			                        <td>".$object->jumlah."</td>
			                        <td>".$object->satuan."</td>
			                        <td>".$f->format_rupiah($object->harga_jual * $object->jumlah)."</td>
			                      </tr>";
			                    $no++;
							}
						?>    
		                </tbody>
		            </table>
		        </div><!-- /.col -->
		    </div><!-- /.row -->

		    <div class="row">
		        <!-- accepted payments column -->
		        <div class="col-xs-6">
		            <p class="lead">Metode Pembayaran :</p>
		            <img src="<?php echo base_url();?>assets/images/bni.jpg" alt="Bank BNI" style="margin-right:10px; height:30px"/> 
		            <img src="<?php echo base_url();?>assets/images/bca.jpg" alt="Bank BCA" style="margin-right:10px; height:30px"/> 
		            <img src="<?php echo base_url();?>assets/images/mandiri.jpg" alt="Bank Mandiri" style="margin-right:10px; height:30px"/> 
		            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
		                Rek. Bank BNI &emsp;&emsp;: 02152222 A/N Tarkiman <br/>
		                Rek. Bank BCA &emsp;&emsp;: 02152222 A/N Tarkiman <br/>
		                Rek. Bank MANDIRI : 02152222 A/N Tarkiman <br/>
		            </p>
		        </div><!-- /.col -->
		        <div class="col-xs-6">
		            <p class="lead">Jatuh Tempo : <?php echo $f->format_tanggal($jatuh_tempo);?></p>
		            <div class="table-responsive">
		                <table class="table">
		                    <tr>
		                        <th style="width:50%">Subtotal&emsp;&emsp;:</th>
		                        <td><?php echo $f->format_rupiah($grand_total);?></td>
		                    </tr>
		                    <tr>
		                        <th>Pajak (0%) &emsp;:</th>
		                        <td><?php echo $f->format_rupiah(0);?></td>
		                    </tr>
		                    <tr>
		                        <th>Biaya Pengiriman :</th>
		                        <td><?php echo $f->format_rupiah(0);?></td>
		                    </tr>
		                    <tr>
		                        <th>Total:</th>
		                        <td><?php echo $f->format_rupiah($grand_total);?></td>
		                    </tr>
		                </table>
		            </div>
		        </div><!-- /.col -->
		    </div><!-- /.row -->

		    <!-- this row will not appear when printing -->
		    <div class="row no-print">
		        <div class="col-xs-12">
		            <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
		            <a href="<?php echo base_url();?>transaksi/add" class='btn btn-success'><i class='fa fa-credit-card'></i> Tambah Transaksi</a>
		        </div>
		    </div>
		</section><!-- /.content -->
</div><!-- /.content-wrapper -->

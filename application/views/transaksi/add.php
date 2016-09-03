<?php
    foreach ($transaksi as $object) {
        $tgl_pemesanan = $object->tgl_pemesanan;
        $id_penjualan  = $object->id_penjualan;
    }

    //$minggu= date('W');
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
            <li class="active">Transaksi Penjualan</li>
          </ol>
        </section>
        <!-- Main content -->
            <section class='content'>
                <div class='row'>
                    <div class='col-xs-12'>                 

                        <div class='box box-primary' >
                            <div class='box-header'>
                                <h3 class='box-title'></h3>
                                <!--

                        switch($_GET['stat']){
                            case "succeed": echo"
                                        <div class='alert alert-success alert-dismissable'>
                                            <i class='fa fa-check'></i>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <b>Alert!</b> Data baru berhasil disimpan.
                                        </div>";
                                        break;
                            case "updated": echo"
                                        <div class='alert alert-info alert-dismissable'>
                                            <i class='fa fa-info'></i>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <b>Alert!</b> Data berhasil diupdate.
                                        </div>";
                                        break;
                            case "deleted": echo"
                                        <div class='alert alert-warning alert-dismissable'>
                                            <i class='fa fa-warning'></i>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <b>Alert!</b> Data baru berhasil dihapus.
                                        </div>";
                                        break;
                            case "failed": echo"
                                        <div class='alert alert-danger alert-dismissable'>
                                            <i class='fa fa-ban'></i>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <b>Alert!</b> Data baru gagal disimpan.
                                        </div>";
                                        break;                      
                            }
                        echo"
                        -->
                            <input type='hidden' id='id_karyawan' value='5'>
                            <input type='hidden' id='minggu' value='$minggu'> 

                            </div><!-- /.box-header -->
                            <div class='col-xs-12'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='id_penjualan'>No.Nota</label>
                                        <input type='text' class='form-control' id='id_penjualan' name='id_penjualan' value='<?php echo $id_penjualan;?>' readonly>
                                    </div>
                                    <div class='form-group'>
                                        <label for='nama_pelanggan'>Nama Pelanggan</label>
                                        <select id='id_pelanggan' class='form-control' required><option value=''>--Pilih Pelanggan--</option>";
                                        <?php
                                            foreach ($pelanggan as $p) {
                                                echo "<option value='".$p->id_pelanggan."'>".$p->nama_pelanggan."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>                                            
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='tgl_pemesanan'>Tanggal Pemesanan</label>
                                        <input type='text' class='form-control' id='tgl_pemesanan' name='tgl_pemesanan' value='<?php echo $tgl_pemesanan;?>' placeholder='Tanggal Pemesanan' disabled>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12'>
                                <!--
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input type='text' class='form-control' id='nama_barang' name='nama_barang' placeholder='Nama Barang' disabled>
                                    </div>
                                </div>
                                -->
                                <legend></legend>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label for='id_produk'>Nama Produk</label>
                                        <select id='id_produk' class='form-control' required><option value=''>--Pilih Produk--</option>";
                                        <?php
                                            foreach ($produk as $p) {
                                                echo "<option value='".$p->id_produk."'>".$p->nama_produk."</option>";
                                            }
                                        ?>
                                        </select>
                                        <input type='hidden' id='nama_produk' placeholder='Nama Produk' readonly>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <label for='harga_jual'>Harga</label>
                                        <input type='text' class='form-control' id='harga_jual' name='harga_jual' placeholder='Harga' readonly>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <label for='stok'>Stok</label>
                                        <input type='text' class='form-control' id='stok' name='stok' placeholder='Stok' readonly>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <label for='jumlah'>Jumlah</label>
                                        <input type='text' class='form-control' id='jumlah' name='jumlah' placeholder='Jumlah'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <label for=''> </label><br/>                                       
                                        <button class='btn btn-primary' id='tambah'>Tambah</button>
                                    </div>
                                </div>                                
                            
                                <span id='status'></span>

                                
                            </div>
                            <div class='col-xs-12'>                                       
                                <div class='box-body table-responsive'>
                                    <!-- link ke file PK.PHP -->
                                    <table id='produk' class='table table-bordered table-striped'></table>                                    
                                </div><!-- /.box-body -->                                
                            </div>
                            <div class='box-footer'>
                                    <a class='btn btn-warning' onclick=self.history.back()>Kembali</a>  <a class='btn btn-success' id='proses'>Simpan dan Cetak</a>
                            </div>
                                
                        </div><!-- /.box -->
                    </div>
                </div>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

<script src="<?php echo base_url();?>assets/plugins/format-currency/js/jquery.formatCurrency-1.4.0.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(){

        $("#produk").load("<?php echo base_url();?>transaksi/transaksi_tmp");

        $("#id_produk").change(function(){
            id_produk=$("#id_produk").val();

            //alert(id_produk);
            
            //tampilkan status loading dan animasinya
            //$("#status").html("loading. . .");
            //$("#loading").show();

            if(id_produk!=""){
            
                //lakukan pengiriman data
                $.ajax({
                    url:"<?php echo base_url();?>transaksi/product_change/"+id_produk,
                    cache:false,
                    success:function(data){
                   
                        //masukan isi data ke masing - masing field
                        //data = JSON.parse(data);
                        //alert(data.harga_jual);
                        // $("#harga_jual").val(data.harga_jual);
                        // $("#stok").val(data.stok);
                        // $("#jumlah").focus();
                        //hilangkan status animasi dan loading
                        // $("#status").html("");
                        // $("#loading").hide();

                        data = JSON.parse(data);
                        $.each(data.produk, function(i,p){
                            $("#nama_produk").val(p.nama_produk);
                            $("#harga_jual").val(p.harga_jual);
                            $("#harga_jual").formatCurrency();
                            $("#stok").val(p.stok);
                            $("#jumlah").focus();
                        });  




                    },
                    error:function(jqXHR,textStatus,errorThrown){
                        alert("Error get data from ajax");
                    }
                });
            }
            else{
                $("#nama_produk").val("");
                $("#harga_jual").val("");
                $("#stok").val("");
                $("#jumlah").val("");
                $("#id_produk").focus();
            }
        });

        //jika tombol tambah di klik
        $("#tambah").click(function(){

                
                id_produk=$("#id_produk").val();
                nama_produk=$("#nama_produk").val();
                harga_jual=$("#harga_jual").asNumber();//$("#harga_jual").val();
                stok=parseInt($("#stok").val());
                jumlah=parseInt($("#jumlah").val());


                if(id_produk==""){
                    alert("Maaf, produk belum dipilih")
                    return false;
                } 
                if(jumlah > stok){
                    alert("Maaf, Stok tidak terpenuhi..");
                    $("#jumlah").val(stok);
                    $("#jumlah").focus();
                    return false;
                }

                if(isNaN(jumlah)){
                    alert("Maaf, Jumlah beli tidak boleh kosong..");
                    $("#jumlah").focus();
                    return false;
                }
                                       
            //     //$("#status").html("sedang diproses. . .");
            //     //$("#loading").show();
                
                $.ajax({
                    url:"<?php echo base_url();?>transaksi/tambah",
                    data:"id_produk="+id_produk+"&nama_produk="+nama_produk+"&harga_jual="+harga_jual+"&jumlah="+jumlah,
                    cache:false,
                    success:function(msg){
                        if(msg=="sukses"){
                            //$("#status").html("Berhasil disimpan. . .");
                        }else{
                            //$("#status").html("");//ERROR...
                        }
                        //$("#loading").hide();
                        $("#nama_produk").val("");
                        $("#harga_jual").val("");
                        $("#jumlah").val("");
                        $("#stok").val("");
                        $("#id_produk").val("");
                        $("#produk").load("<?php echo base_url();?>transaksi/transaksi_tmp");
                    }
                });
        });

        //jika tombol proses diklik
        $("#proses").click(function(){
            nota=$("#id_penjualan").val();
            tgl_pemesanan=$("#tgl_pemesanan").val();
            id_pelanggan=$("#id_pelanggan").val();
            id_karyawan=$("#id_karyawan").val();
            minggu=$("#minggu").val();
            total=$("#total").val();
            
            if(id_pelanggan=='')
            {
                alert("Maaf, Pelanggan belum dipilih..");
                $("#id_pelanggan").focus();
            }
            $.ajax({
                url:"<?php echo base_url();?>transaksi/insert",
                data:"nota="+nota+"&tgl_pemesanan="+tgl_pemesanan+"&id_pelanggan="+id_pelanggan+"&id_karyawan="+id_karyawan+"&minggu="+minggu+"&total="+total,
                cache:false,
                success:function(msg){
                    if(msg != "sukses"){
                        //nagmbil data dari <span id='status'>
                        //$("#status").html('Transaksi Penjualan berhasil');
                        alert("Transaksi Berhasil..");
                        window.location='<?php echo base_url();?>transaksi/print_data/'+nota;
                    }
                    else{
                        //$("#status").html('Transaksi Gagal');
                        alert("Transaksi Gagal..");
                    }
                    $("#produk").load("<?php echo base_url();?>transaksi/transaksi_tmp");
                    $("#loading").hide();
                    $("#nama_barang").val("");
                    $("#harga_jual").val("");
                    $("#jumlah").val("");
                    $("#stok").val("");
                }
            })
        });


       
    });
</script>


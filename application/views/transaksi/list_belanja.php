<thead>
    <tr>
        <th>No.</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>

<?php

    $f = new Formatter_model();

	$modOrder = new Transaksi_model();
    $listOrder = $modOrder->getListOrder();
    $no = 0;
    $total = 0;        
    foreach ($listOrder as $key => $value) {
    echo"
	      <tr>
		      <td>" . ++$no . "</td>
		      <td>" . $value->id_produk . "<input type='hidden' name='txtID_" . $key . "' value='" . $value->id_produk . "'></td>
		      <td>" . $value->nama_produk . "</td>
		      <td align='right'>" . $f->format_rupiah($value->harga_jual) . "</td>
		      <td align='center'><input type='text' name='txtQty_" . $key . "' value='" . $value->jumlah . "' style='border:0; width:40px' /></td>
		      <td align='right'>" . $f->format_rupiah($value->sub_total) . "</td>
		      <td><a href='#' id='button_delete_" . $key . "'><i class='fa fa-trash-o'></i> Hapus</a></td>
	      </tr>";
	 ?>
       <script type='text/javascript'>
            $('input[name^=txtQty_<?php echo $key ?>]').on('keyup',function () {
                    var id_produk = $('input[name^=txtID_<?php echo $key ?>]').val();
                    var jumlah = $('input[name^=txtQty_<?php echo $key ?>]').val();
                    $.ajax({
                        url:'<?php echo base_url()?>transaksi/update',
                        data:'id_produk='+id_produk+'&jumlah='+jumlah,
                        cache:false,
                        success:function(msg){
                            if(msg!='sukses'){                                    
                                //alertShow('Update Berhasil..');
                                //window.location='media.php?module=transaksi-penjualan';
                               
                            }else{
                                //$('#status').html('Transaksi Gagal');
                                //alertShow('Update Gagal..');
                                
                            }
                            //$('#id_produk').load('modul/transaksi-penjualan/ambil-simpan-data.php','op=ambilbarang');
                            $('#produk').load('<?php echo base_url()?>transaksi/transaksi_tmp');
                        }
                    })
            });

            $('#button_delete_<?php echo $key ?>').on('click',function () {

                    $.ajax({
                        url:'<?php echo base_url()?>transaksi/delete/<?php echo $key ?>',
                        cache:false,
                        success:function(msg){
                            if(msg!='sukses'){                                    
                                //alertShow('Hapus Berhasil..');
                                //window.location='media.php?module=transaksi-penjualan';
                               
                            }else{
                                //$('#status').html('Transaksi Gagal');
                                //alertShow('Update Gagal..');
                                
                            }
                            //$('#id_produk').load('modul/transaksi-penjualan/ambil-simpan-data.php','op=ambilbarang');
                            //$('#barang').load('modul/transaksi-penjualan/ambil-simpan-data.php','op=barang');
                            $('#produk').load('<?php echo base_url()?>transaksi/transaksi_tmp');
                        }
                    })
            });

            $('input[name^=txtQty_<?php echo $key ?>]').keypress(function (e) {

                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //alert('Maaf, hanya inputkan angka..');            
                    return false;
                    $('input[name^=txtQty_<?php echo $key ?>]').focus();
                }

            });

        </script>
        <?php

      $total+= $value->sub_total;
    } //tutup looping

    

    echo "</tbody></tfooter><tr>
    	  <td colspan='5' style='text-align:right'>Total</td>
		  <td align='right'>" .$f->format_rupiah($total) . "<input type='hidden' id='total' value='".$total."'></td>
		  <td>&nbsp;</td>
		  </tr></tfooter>";

?>
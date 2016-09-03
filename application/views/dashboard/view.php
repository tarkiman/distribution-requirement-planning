<?php
    foreach ($dashboard as $r) {
        $pemesanan_baru    = $r->pemesanan_baru;
        $jumlah_pengiriman = $r->jumlah_pengiriman;
        $omset             = $r->omset;
        $keuntungan        = $r->keuntungan;
    }
    $f = new Formatter_model();
    //$minggu= date('W');
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h4>
                                        <?php echo $pemesanan_baru; ?>
                                    </h4>
                                    <p>
                                        Pemesanan Baru
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo base_url();?>/transaksi" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->    
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h4>
                                        <?php echo $jumlah_pengiriman; ?>
                                    </h4>
                                    <p>
                                        Pengiriman Hari Ini
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-cart-outline"></i>
                                </div>
                                <a href="<?php echo base_url();?>/transaksi" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h4>
                                        <?php echo $f->format_rupiah($omset); ?>
                                    </h4>
                                    <p>
                                        Omset Bulan Ini
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?php echo base_url();?>/transaksi" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h4>
                                        <?php echo $f->format_rupiah($keuntungan); ?>
                                    </h4>
                                    <p>
                                        Keuntungan Bulan Ini
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?php echo base_url();?>/transaksi" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
          </div><!-- /.row -->







          <!-- Chart Line box -->
          <div class="box box-primary">
              <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                      <!-- <button class="btn btn-primary btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button> -->
                      <button class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-primary btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                  <i class="fa fa-inbox"></i>
                  <h3 class="box-title">Penjualan dan Purchasing</h3>
              </div><!-- /.box-header -->
              <div class="box-body no-padding">

                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="nav-tabs-custom">
                      <!-- Tabs within a box -->
                      <ul class="nav nav-tabs pull-right">
                          <li class="active"><a href="#revenue2-chart" data-toggle="tab">Penjualan & Purchasing</a></li>
                          <li><a href="#drp" data-toggle="tab">Distribution Requirement Planning</a></li>
                          <li><a href="#bar2-chart1" data-toggle="tab">Stok Produk</a></li>
                          <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
                      </ul>
                      <div class="tab-content no-padding">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="revenue2-chart" style="position: relative; height: 400px;"></div>
                          <div class="chart tab-pane" id="drp" style="position: relative; height: 400px;">
                              <center>
                              <table class="list">
                                  <tbody><tr>
                                      <td class="hitam">Project On Hand</td>
                                      <td class="biru">11723</td>
                                      <td colspan="8" rowspan="3"></td>
                                      <td colspan="2" align="left" class="biru">Lead Time</td>
                                      <td colspan="2" align="left" class="biru">1 Minggu</td>
                                  </tr>
                                  <tr>
                                      <td class="hitam">Order Quantity</td>
                                      <td class="biru">4125</td>
                                      <td colspan="2" align="left" class="biru">Satuan</td>
                                      <td colspan="2" align="left" class="biru">Lembar</td>
                                  </tr>
                                  <tr>
                                      <td class="hitam">Safety Stock</td>
                                      <td class="biru">1267</td>
                                      <td colspan="2" align="center" class="biru"></td>
                                      <td colspan="2" align="center" class="biru"></td>
                                  </tr>
                                  <tr>
                                      <td rowspan="2" class="hitam">Periode</td>
                                      <td rowspan="2" class="biru">Past Due</td>
                                      <td align="center" colspan="12" class="hitam">Periode</td>
                                      <!--<td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>
                                      <td align="center"></td>-->
                                  </tr>
                                  <tr class="biru">
                                      <td>Minggu 4</td>
                                      <td>Minggu 5</td>
                                      <td>Minggu 6</td>
                                      <td>Minggu 7</td>
                                      <td>Minggu 8</td>
                                      <td>Minggu 9</td>
                                      <td>Minggu 10</td>
                                      <td>Minggu 11</td>
                                      <td>Minggu 12</td>
                                      <td>Minggu 13</td>
                                      <td>Minggu 14</td>
                                      <td>Minggu 15</td>
                                  </tr>
                                  <tr align="center">
                                      <td align="left" class="hitam">Gross Requirement</td>
                                      <td class="biru"></td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td><td class="abu">2881</td>
                                  </tr>
                                  <tr align="center">
                                      <td align="left" class="hitam">Scheduled Receipts</td>
                                      <td class="biru"></td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                  </tr>
                                  <tr align="center">
                                      <td align="left" class="hitam">Project On Hand</td><td class="biru">11723</td><td class="langit">8842</td><td class="langit">5961</td><td class="langit">3080</td><td class="langit">4324</td><td class="langit">1443</td><td class="langit">2687</td><td class="langit">3931</td><td class="langit">5175</td><td class="langit">2294</td><td class="langit">3538</td><td class="langit">4782</td><td class="langit">1901</td> 
                                  </tr>
                                  <tr align="center">
                                      <td align="left" class="hitam">Net Requirements</td>
                                      <td class="biru"></td><td>0</td><td>0</td><td>0</td><td class="kuning">1068</td><td>0</td><td class="kuning">2705</td><td class="kuning">1461</td><td class="kuning">217</td><td>0</td><td class="kuning">1854</td><td class="kuning">610</td><td>0</td>
                                  </tr>
                                  <tr align="center">
                                      <td align="left" class="hitam">Planned Order Receipts</td>
                                      <td class="biru"></td><td>0</td><td>0</td><td>0</td><td class="hijau">4125</td><td>0</td><td class="hijau">4125</td><td class="hijau">4125</td><td class="hijau">4125</td><td>0</td><td class="hijau">4125</td><td class="hijau">4125</td><td>0</td>      
                                  </tr>
                                  <tr align="center">
                                      <td align="left" class="hitam">Planned Order Releases</td><td class="biru">0</td><td>0</td><td>0</td><td class="merah">4125</td><td>0</td><td class="merah">4125</td><td class="merah">4125</td><td class="merah">4125</td><td>0</td><td class="merah">4125</td><td class="merah">4125</td><td>0</td><td class="merah">4125</td>
                                  </tr>
                                </tbody>
                            </table>
                          </center>
                          </div>
                          <div class="chart tab-pane" id="bar2-chart1" style="position: relative; height: 400px;"></div>
                      </div>
                  </div><!-- /.nav-tabs-custom -->
              </div>     
          </div>
          <!-- /.box --> 

          <!-- Box (with bar chart) -->
          <div class="box box-danger" id="loading-example">
              <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                      <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
                      <button class="btn btn-danger btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                  <i class="fa fa-cloud"></i>

                  <h3 class="box-title">Data Stok Produk</h3>
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                  <div class="row">
                      <div class="col-sm-12">
                          <!-- bar chart -->
                          <div class="chart" id="bar2-chart" style="height: 250px;"></div>
                      </div>                                        
                  </div><!-- /.row - inside box -->
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <div class="row">
                      <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="75" data-width="60" data-height="60" data-fgColor="#f56954"/>
                          <div class="knob-label">A</div>
                      </div><!-- ./col -->
                      <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                          <input type="text" class="knob" data-readonly="true" value="37" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                          <div class="knob-label">B</div>
                      </div><!-- ./col -->
                      <div class="col-xs-4 text-center">
                          <input type="text" class="knob" data-readonly="true" value="59" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                          <div class="knob-label">C</div>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div><!-- /.box-footer -->
          </div><!-- /.box -->




          <!-- Main row -->
          <div class="row">
            <!-- Left col -->




            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">

              <!-- solid sales graph -->
              <div class="box box-solid bg-teal-gradient">
                <div class="box-header">
                  <i class="fa fa-th"></i>
                  <h3 class="box-title">Sales Graph</h3>
                  <div class="box-tools pull-right">
                    <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body border-radius-none">
                  <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div><!-- /.box-body -->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
                      <div class="knob-label">Mail-Orders</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
                      <div class="knob-label">Online</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
                      <div class="knob-label">In-Store</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box --> 

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>-->

    <script type="text/javascript">

        function grafikStokBarang(){
            //GRAFIK
            $.ajax({
                url:"<?php echo base_url();?>home/stok_barang",
                cache:false,
                success:function(jsonData){
                    //alertShow(jsonData);

                    Morris.Bar({
                        element: 'bar2-chart',
                        resize: true,
                        data:JSON.parse(jsonData),
                        xkey: 'nama_produk',
                        ykeys: ['stok'],
                        labels: ['Stok'],
                        hideHover: 'auto',
                        barColors: function (row, series, type) {
                            if (type === 'bar') {
                              var red = Math.ceil(255 * row.y / this.ymax);
                              return 'rgb(' + red + ',0,0)';
                            }
                            else {
                              return '#000';
                            }
                        }
                    });                        
                }                
            });
        }

        function grafikTransaksi(){
            //GRAFIK
            $.ajax({
                url:"<?php echo base_url();?>home/data_transaksi",
                cache:false,
                success:function(jsonData){
                    //alertShow(jsonData);

                    Morris.Area({
                        element: 'revenue2-chart',
                        behaveLikeLine: true,
                        resize: true,
                        data:JSON.parse(jsonData),
                        barColors: ['#f56954','#00a65a'],
                        xkey: 'minggu',
                        ykeys: ['total_penjualan', 'total_pembelian'],
                        labels: ['Penjualan', 'Pembelian'],
                        hideHover: 'auto',
                        parseTime: false
                    });                        
                }                
            });                
        }

        // function presentasePenjualan(){
        //     //GRAFIK
        //     $.ajax({
        //         url:"modul/dashboard/grafik.php",
        //         data:"op=presentasePenjualan",
        //         cache:false,
        //         success:function(jsonData){
        //             //alertShow(jsonData);

        //             Morris.Donut({
        //                   element: 'presentasePenjualan-chart',
        //                   data:JSON.parse(jsonData),
        //                   formatter: function (x) { return x + "%"}
        //                 }).on('click', function(i, row){
        //                   console.log(i, row);
        //             });                        
        //         }                
        //     });                
        // }

        $(document).ready(function(){

            grafikStokBarang();
            grafikTransaksi();
            //presentasePenjualan();

        });

        

    </script>
       
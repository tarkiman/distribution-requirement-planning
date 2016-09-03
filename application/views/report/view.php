      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Report Transaksi Penjualan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Report</a></li>
            <li class="active">Transaksi Penjualan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">



                <div class="box-body">
                  <!-- Date range -->
                  <div class='col-md-6'>
                    <div class="form-group">
                      <label>Rentang Waktu :</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="rentang_waktu" id="rentang_waktu">
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>

                </div><!-- /.box-body -->

                <!-- this row will not appear when printing -->
                <div class="box-body">
                  <div class="col-md-6">
                    <a id="printReport" class='btn btn-success'><i class="fa fa-print"></i> Print Report</a>
                  </div>
                </div>

              </div><!-- /.box-body -->
              <div class="box-footer">
                *Silahkan inputkan rentang waktu data
              </div>
            </div><!-- /.box -->

          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
      <!-- date-range-picker -->
      <script src="<?php echo base_url();?>assets/download/moment.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>




      <!-- Page script -->
      <script type="text/javascript">
        $(function () {
        //Date range picker
        $('#rentang_waktu').daterangepicker({
         timePicker: false,
         timePickerIncrement: 30,
         dateFormat: 'yy-mm-dd',
         locale: {
           format: 'YYYY-MM-DD'
         }
       });

        function converDateFormat(stringDate){
          var dateAr = stringDate.split('/');
          var newDate = dateAr[2] + '-' + dateAr[0] + '-' + dateAr[1];
          return newDate;
        }

        // $('#rentang_waktu').change(function(){
        // 	var startDate = converDateFormat(document.getElementsByName("daterangepicker_start")[0].value);
        // 	var endDate = converDateFormat(document.getElementsByName("daterangepicker_end")[0].value);
        // });


        $(document).ready(function(){

        	$('#printReport').click(function(e){

            if($('#rentang_waktu').val()===""){
              alert("Rentang waktu tidak boleh kosong");
              return false;
            }

            var startDate = converDateFormat(document.getElementsByName("daterangepicker_start")[0].value);
            var endDate = converDateFormat(document.getElementsByName("daterangepicker_end")[0].value);


            window.location.href = "<?php echo base_url();?>report/print_pdf/"+startDate+"/"+endDate;

	       //  	e.preventDefault();
	       //      $("#myModal").modal('show');

	       //      $.ajax({
	       //          url:"<?php echo base_url();?>report/print_pdf",
	       //          data:"start="+startDate+"&end="+endDate,
	       //          cache:false,
	       //          success: function(data){
				    //     $(".modal-body").html(data);
	       //              $(".modal-title").html("Test");   
				    // }                
	       //      });


	            // $('#tambah_satuan').click(function(e){
	            //     e.preventDefault();
	            //     $("#myModal").modal('show');
	            //     var title = 'Pesan';
	            //     $.post('<?php echo base_url();?>login/logout',
	            //         function(html){
	            //             $(".modal-body").html(html);
	            //             $(".modal-title").html(title);                        
	            //         }   
	            //     );
	            // });

           });
        	

        });


        



      });
      </script>
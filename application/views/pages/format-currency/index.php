<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>JQuery FormatCurrency Sample</title>
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/format-currency/js/jquery.formatCurrency-1.4.0.js"></script>
        <style type="text/css">
            body, div  { margin:0px auto; padding:0px; }

            .main { margin:40px; }
            
            .sample { float:left; margin:10px; padding:4px; border:1px solid #888; width:350px; }
            
            .sample h3 { margin:-4px; margin-bottom:10px; padding:4px; background:#555; color:#eee; }
            
            .currencyLabel { display:block; }        
        </style>

        <script type="text/javascript">
            
            $(document).ready(function()
            {
                // Sample 1
                $('#currencyButton').click(function()
                {
                    $('#currencyField').formatCurrency();
                    $('#currencyField').formatCurrency('.currencyLabel');
                });
            
            
                // Sample 2
                $('.currency').blur(function()
                {
                    $('.currency').formatCurrency();
                });


            
                // Sample 3
                $('#currencyFieldKeyUp').change(function()
                {
                    $('#currencyFieldKeyUp').formatCurrency();

                    //Conversi to Number
                    $('#currencyToNumber').val($('#currencyFieldKeyUp').asNumber());

                });


            
                // Test Inputan
                $('#test').keyup(function()
                {
                    $('#currencyFieldKeyUp').val($('#test').val());
                });

                // Sample 3
                $('#formatuang').click(function(){

                    if($('#formatuang').val()==""){
                        $('#formatuang').val("");
                    }
                    else{
                        //Conversi to Number
                        $('#formatuang').val($('#formatuang').asNumber());
                    }
                });

            });
        </script>

    </head>
<body>
    <div class="main">
        <div class="formPage">
            <h1>Contoh Format Currency</h1>
            
            <div class="sample">
                <h3>Format Currency menggunakan Event Button Click</h3>
                <input type="textbox" id="currencyField" value="Rp. 1,220.00" />
                <input type="button" id="currencyButton" value="Convert" />
                
                <div>
                    Format Currency ke HTML dengan Tag Span.
                    <span class="currencyLabel">Rp. 1,220.00</span>
                </div>
            </div>
            


            <div class="sample">
                <h3>Format Currency menggunakan Event Change</h3>
                
                <input type="textbox" id="currencyFieldKeyUp" class='currency' value="Rp. 1,220.00" />
            </div>

            <div class="sample">
                <h3>Kalau di klik jadi Angka, kalau di tinggalin format currency</h3>                
                <input type="textbox" id="formatuang" class='currency' value="" />
            </div>

            <div class="sample">
                <h3>Konversi dari Format Currency ke Number</h3>
                
                <input type="textbox" id="currencyToNumber" />
            </div>


            
        </div>
    </div>
</body>
</html>
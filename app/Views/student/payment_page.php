<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment</title>
<?=view('includes/student_header.php')?>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/adminlte.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/cart.js"></script>
    <script>
        var baseUrl = "<?=base_url()?>";
    </script>
</head>
<body style="background:#e9ecef">
    <input id="order_date" value="<?=date('Ymdhis')?>" type="hidden">
    <input type="hidden" id="admin_upi_id" value="<?=UPI_ID?>">
    <input type="hidden" id="admin_upi_ac_name" value="<?=UPI_AC_NAME?>">
    <div style="height:100vh; width:100%;" class="d-flex justify-content-center align-items-center">
        <div class="card" style="width: 30rem;height:310px !important">
 
              <!--  <div class="col-md-12 border text-center mt-5 mb-2">
                    <a href="javascript:void(0)" class="btn payInstamojoBtn"><img src="<?=base_url()?>images/instamojo_image.jpg" style="height:100px;width:200px"></a>
                </div> -->
                <div class="col-md-12 border text-center mt-5 mb-2">
                 <a href="javascript:void(0)" class="btn payPhonePeBtn"><img src="<?=base_url()?>images/phonepe.jpg" style="height:100px;width:200px"></a>
                </div>
        <!--   <div class="row py-3 pl-4 pr-2">
                <div class="col-md-12 border text-center">
                    <a href="javascript:void(0)" class="btn payManualScanBtn"><img src="<?=base_url()?>images/upi_image.jpg" style="height:100px;width:100%"></a>
                </div>  -->





            </div> 
        </div> 
    </div>  


</body>
</html>

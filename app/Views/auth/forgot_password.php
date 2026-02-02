<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/custom_css/login_page.css?v=1.0.1">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/cdn/bootstrap.min.css">
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 480px)">
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
    <script type="text/javascript">
    var pageType = "student_auth_page";
    var baseUrl = "<?=base_url()?>";
    </script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/design.js?v=1.0.0"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/student_auth.js?v=1.0.1"></script>
    <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
    <div class="forgotPasswordContainer">
        <div class="registration-form">
            <h1 class="text-center pb-3">Forgot Password</h1>
            <form id="forgot_pass_form">
                <div class="inputBox">
                    <input type="text" required name="email" id="email" class="item">
                    <span>Email</span>
                </div>
                <div class="inputBox otp_section" style="display: none;">
                    <input type="text" required name="otp" id="otp" class="item">
                    <span>OTP</span>
                </div>
            </form>
            <button class="btn btn-block forgotPassBtn mb-2 authButton"><span></span> OTP</button>
            <button class="btn btn-block verifyOTP mb-2 authButton" style="display:none;">Verify OTP</button>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?=($addClass=='sign_up') ? 'Create your CS MTP account' : 'Sign in to CS MTP account' ?>">
    <title><?=($addClass=='sign_up') ? 'Create Account' : 'Sign In' ?> | CS Test Series - MY CS MTP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:system-ui,-apple-system,sans-serif;background:#f5f5f5;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:10px;font-size:11px;color:#333}
        .auth-box{background:#fff;border-radius:6px;box-shadow:0 1px 4px rgba(0,0,0,0.08);width:100%;max-width:260px;border:1px solid #e5e5e5}
        .auth-header{background:#1ab79c;color:#fff;text-align:center;padding:10px 15px;border-radius:6px 6px 0 0}
        .auth-header h2{font-size:14px;font-weight:600;margin:0}
        .auth-header p{font-size:10px;margin:2px 0 0;opacity:.9}
        .auth-body{padding:12px 15px}
        .form-group{margin-bottom:8px}
        .form-label{font-size:10px;font-weight:500;color:#555;margin-bottom:2px;display:block}
        .form-control{width:100%;padding:6px 8px;font-size:11px;border:1px solid #ddd;border-radius:4px;outline:none}
        .form-control:focus{border-color:#1ab79c}
        .pwd-wrap{position:relative}
        .pwd-toggle{position:absolute;right:6px;top:50%;transform:translateY(-50%);background:none;border:none;color:#888;cursor:pointer;font-size:12px}
        .pwd-wrap input{padding-right:28px}
        .btn-login{width:100%;padding:6px;background:#1ab79c;color:#fff;border:none;border-radius:4px;font-size:11px;cursor:pointer}
        .btn-login:hover{background:#15967d}
        .btn-login:disabled{background:#bbb}
        .divider{display:flex;align-items:center;margin:10px 0;color:#999;font-size:9px}
        .divider span{padding:0 8px;background:#fff}
        .divider::before,.divider::after{content:'';flex:1;height:1px;background:#eee}
        .auth-footer{text-align:center;padding:10px 15px;background:#fafafa;border-radius:0 0 6px 6px;border-top:1px solid #eee;font-size:10px;color:#666}
        .auth-footer a{color:#1ab79c;text-decoration:none}
        .auth-footer a:hover{text-decoration:underline}
        .terms{font-size:9px;color:#999;text-align:center;margin-bottom:8px}
        .terms a{color:#777}
        .cf-turnstile{margin:0 0 10px;justify-content:center;max-width:100%}
        .cf-turnstile iframe{width:100%!important;max-width:100%;height:auto!important}
        @media(max-width:320px){.auth-box{max-width:100%}}
    </style>
</head>
<body>
    <div class="auth-box">
        <!-- Sign In -->
        <div class="signin_container" style="display:<?=($addClass=='sign_up')?' none':' block'?>">
            <div class="auth-header">
                <h2>Sign In</h2>
                <p>CS Test Series</p>
            </div>
            <div class="auth-body">
                <form id="sign_in_form">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="pwd-wrap">
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                            <button type="button" class="pwd-toggle"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <button type="button" class="btn-login loginBtn">Sign In</button>
                </form>
                <div class="divider"><span>or</span></div>
            </div>
            <div class="auth-footer">
                New? <a href="<?=base_url()?>register">Create account</a>
            </div>
        </div>
        
        <!-- Sign Up -->
        <div class="signup_container" style="display:<?=($addClass=='sign_in')?' none':' block'?>">
            <div class="auth-header">
                <h2>Create Account</h2>
                <p>Join CS Test Series</p>
            </div>
            <div class="auth-body">
                <form id="sign_up_form">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="student_name" required placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile</label>
                        <input type="tel" class="form-control" name="mobile_no" required placeholder="Mobile">
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city_name" required placeholder="City">
                    </div>
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <input type="text" class="form-control" name="state_name" required placeholder="State">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Level</label>
                        <select class="form-control" name="current_level" required>
                            <option value="">Select</option>
                            <?php if(!empty($level_list)):foreach($level_list as $l):?>
                                <option value="<?=$l['level_id']?>"><?=$l['level_name']?></option>
                            <?php endforeach;endif?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="pwd-wrap">
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                            <button type="button" class="pwd-toggle"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="cf-turnstile" data-sitekey="0x4AAAAAAARPAQYMac4ULvRa" data-callback="onTurnstileSuccess"></div>
                    </div>
                    <p class="terms">By signing up, you agree to <a href="<?=base_url()?>terms-and-conditions">Terms</a> & <a href="<?=base_url()?>privacy-policy">Privacy</a></p>
                    <button type="button" class="btn-login signUpBtn" disabled>Create Account</button>
                </form>
                <div class="divider"><span>or</span></div>
            </div>
            <div class="auth-footer">
                Already have an account? <a href="<?=base_url()?>sign-in">Sign in</a>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script>
        var baseUrl="<?=base_url()?>";
        window.onTurnstileSuccess=function(){document.querySelector('.signUpBtn').disabled=false};
        $(function(){
            $(document).on('click','.pwd-toggle',function(){
                var i=$(this).find('i'),p=$(this).siblings('input');
                p.attr('type',p.attr('type')==='password'?'text':'password');
                i.toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>
    <script src="<?=base_url()?>assets/js/custom_js/student_auth.js?v=1.0.6"></script>
</body>
</html>

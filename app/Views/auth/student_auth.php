<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>User <?=($addClass=='sign_up') ? ' Signup':' Login'; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            -webkit-tap-highlight-color: transparent;
        }
        
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            font-size: 13px;
            line-height: 1.4;
            padding: 15px;
        }
        
        .registration-form {
            background: white;
            padding: 25px 20px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            margin: auto;
            position: relative;
        }
        
        h1 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #2c3e50;
            text-align: center;
        }
        
        .inputBox {
            position: relative;
            margin-bottom: 15px;
        }
        
        .inputBox input, .inputBox select {
            width: 100%;
            padding: 10px 35px 10px 8px;
            font-size: 13px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
            background: transparent;
            transition: all 0.3s;
        }
        
        .inputBox input:focus, .inputBox select:focus {
            border-color: #18ab91;
        }
        
        .inputBox span {
            position: absolute;
            left: 8px;
            top: 10px;
            padding: 0 4px;
            color: #777;
            font-size: 13px;
            transition: all 0.3s;
            pointer-events: none;
        }
        
        .inputBox input:valid ~ span,
        .inputBox input:focus ~ span,
        .inputBox select:valid ~ span,
        .inputBox select:focus ~ span {
            top: -7px;
            left: 8px;
            font-size: 11px;
            background: white;
            color: #18ab91;
        }
        
        .viewPassWord {
            cursor: pointer;
            color: #777;
            font-size: 16px;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
        }
        
        .pass {
            text-align: right;
            margin-bottom: 12px;
        }
        
        .pass a {
            color: #18ab91;
            text-decoration: none;
            font-size: 12px;
        }
        
        .pass a:hover {
            text-decoration: underline;
        }
        
        .authButton {
            width: 100%;
            padding: 10px;
            background: #18ab91;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.3s;
            margin-bottom: 12px;
        }
        
        .authButton:hover {
            background: #148f77;
        }
        
        .authButton:disabled {
            background: #95a5a6;
            cursor: not-allowed;
        }
        
        .signup_link {
            text-align: center;
            font-size: 12px;
            color: #555;
        }
        
        .signup_link a {
            color: #18ab91;
            text-decoration: none;
        }
        
        .signup_link a:hover {
            text-decoration: underline;
        }
        
        .form-icon {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .form-icon span {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: #18ab91;
            border-radius: 50%;
            line-height: 50px;
            color: white;
            font-size: 20px;
        }
        
        .cf-turnstile {
            margin: 10px 0 15px;
            display: flex;
            justify-content: center;
        }
        
        .home-link {
            margin-top: 10px;
            display: block;
            text-align: center;
        }
        
        /* Bootbox modal fixes */
        .bootbox.modal {
            z-index: 1060 !important;
        }
        .bootbox-body {
            font-size: 14px;
            padding: 15px;
        }
        .bootbox-close-button {
            font-size: 24px;
            opacity: 0.6;
        }
        .modal-backdrop {
            z-index: 1050 !important;
        }
        
        @media (max-width: 480px) {
            body {
                padding: 10px;
                display: flex;
                align-items: center;
            }
            
            .registration-form {
                padding: 20px 15px;
                margin-top: 0;
            }
            
            h1 {
                font-size: 16px;
            }
            
            .inputBox input, .inputBox select {
                padding: 8px 30px 8px 6px;
                font-size: 12px;
            }
            
            .inputBox span {
                font-size: 12px;
            }
            
            .viewPassWord {
                font-size: 14px;
                top: 8px;
                right: 8px;
            }
            
            .authButton {
                padding: 8px;
                font-size: 12px;
            }
        }
        
        @media (max-width: 360px) {
            .registration-form {
                padding: 15px 12px;
            }
            
            .inputBox {
                margin-bottom: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="signin_container" style="display: <?=($addClass=='sign_up') ? 'none':''; ?>">
        <div class="registration-form">
            <h1 class="text-center pb-3">Sign In</h1>
            <form id="sign_in_form">
                <div class="inputBox">
                    <input type="text" class="item" name="email" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <input type="password" class="item" name="password" required="required">
                    <ion-icon name="eye-off-outline" class="viewPassWord"></ion-icon>
                    <span>Password</span>
                </div>
                <div class="pass"><a href="<?=base_url()?>forgot-password">Forgot Password?</a></div>
            </form>
            <button class="authButton loginBtn">Sign In</button>
            <div class="signup_link">
                Not a member? <a href="javascript:void(0)" id="signup_link">Sign Up</a>
                <div class="home-link"><a href="<?=base_url()?>"><i class="fas fa-undo-alt"></i> Return to Home</a></div>
            </div>
        </div>
    </div>
    <div class="signup_container" style="display: <?=($addClass=='sign_in') ? 'none':''; ?>">
        <div class="registration-form">
            <h1 class="text-center pb-3">Sign Up</h1>
            <form id="sign_up_form">
                <div class="inputBox">
                    <input type="text" class="item" name="student_name" required="required">
                    <span>Student Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" class="item" name="email" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <input type="text" class="item" name="mobile_no" required="required">
                    <span>Mobile No</span>
                </div>
                <div class="inputBox">
                    <input type="text" class="item" name="city_name" required="required">
                    <span>City</span>
                </div>
                <div class="inputBox">
                    <input type="text" class="item" name="state_name" required="required">
                    <span>State</span>
                </div>
                <div class="inputBox">
                    <select class="item" name="current_level" required style="appearance: none; padding-top: 10px; padding-bottom: 10px;">
                        <?php 
                        if(!empty($level_list)){
                            foreach($level_list as $levelsRow){
                                ?>
                                    <option value="<?=$levelsRow['level_id']?>"><?=$levelsRow['level_name']?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="inputBox">
                    <input type="password" class="item" name="password" required="required">
                    <ion-icon name="eye-off-outline" class="viewPassWord"></ion-icon>
                    <span>Password</span>
                </div>
                <div class="inputBox">
                    <input type="password" class="item" name="confirm_password" required="required">
                    <ion-icon name="eye-off-outline" class="viewPassWord"></ion-icon>
                    <span>Confirm Password</span>
                </div>
                <div class="cf-turnstile"
                 data-sitekey="0x4AAAAAAARPAQYMac4ULvRa"
                 data-callback="onTurnstileSuccess"
                ></div>
            </form>
            <p>By clicking "Sign Up", you agree to our Terms and Conditions, Privacy Policy, and Disclaimer.</p>
            <button type="button" class="authButton signUpBtn">Sign Up</button>
            <div class="signup_link">
                Already a member? <a href="javascript:void(0)" id="signin_link">Sign In</a>
                <div class="home-link"><a href="<?=base_url()?>"><i class="fas fa-undo-alt"></i> Return to Home</a></div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    
    <script type="text/javascript">
        var pageType = "student_auth_page";
        var baseUrl = "<?=base_url()?>";
        
        window.onTurnstileSuccess = function (code) {
            document.querySelector('.signUpBtn').disabled = false;
        }
        
        // Toggle password visibility
        function togglePasswordVisibility(icon) {
            const input = icon.parentElement.querySelector('input');
            if (input.type === 'password') {
                input.type = 'text';
                icon.name = 'eye-outline';
            } else {
                input.type = 'password';
                icon.name = 'eye-off-outline';
            }
        }
        
        $(document).ready(function() {
            // Setup password toggles
            const viewPasswordIcons = document.querySelectorAll('.viewPassWord');
            viewPasswordIcons.forEach(icon => {
                // Click handler
                icon.addEventListener('click', function() {
                    togglePasswordVisibility(this);
                });
                
                // Touch handler for mobile
                icon.addEventListener('touchstart', function(e) {
                    e.preventDefault(); // Prevent touch scroll
                    togglePasswordVisibility(this);
                }, {passive: false});
            });
            
            // Toggle between sign in and sign up forms
            $('#signup_link').on('click', function() {
                $('.signin_container').hide();
                $('.signup_container').show();
                window.scrollTo(0, 0);
            });
            
            $('#signin_link').on('click', function() {
                $('.signup_container').hide();
                $('.signin_container').show();
                window.scrollTo(0, 0);
            });
        });
    </script>  
    <script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/design.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/student_auth.js?v=1.0.3"></script>
</body>
</html>

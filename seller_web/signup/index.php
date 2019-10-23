<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <style>
        .container
        {
            width:95% !important;
        }
        .fa-arrow-down 
        {
            font-size:30px !important;
        }
        .fa-arrow-up 
        {
            font-size:30px !important;
        }
    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background:navy;">

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="https://images.unsplash.com/photo-1564749210719-3aafef9af5fe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1536&q=80" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="add_user.php" enctype="multipart/form-data">
                        <h2>seller registration form</h2>
                        <h4 style="line-height:50px;background:#000080;color:white;padding:15px;">Basic Information<span style="float:right;"><i id="basic_toggle" class="fa fa-arrow-down" aria-hidden="true"></i></span></h4>
                        <div class="basic_wrapper" style="display:none;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">First Name :</label>
                                    <input type="text" name="fname" required/>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name :</label>
                                    <input type="text" name="lname" id="last_name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address :</label>
                                <input type="text" name="address" required/>
                            </div>
                            <div class="form-radio">
                                <label for="gender" class="radio-label">Gender :</label>
                                <div class="form-radio-item">
                                    <input type="radio" name="gender" id="male" checked value="male">
                                    <label for="male">Male</label>
                                    <span class="check"></span>
                                </div>
                                <div class="form-radio-item">
                                    <input type="radio" name="gender" id="female" value="female">
                                    <label for="female">Female</label>
                                    <span class="check"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="state">State :</label>
                                    <div class="form-select">
                                        <input type="text" name="state" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">City :</label>
                                    <div class="form-select">
                                        <input type="text" name="city" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pincode">Pincode :</label>
                                <input type="number" name="pincode" id="pincode" required>
                            </div>
                        </div>
                        <h4 style="line-height:50px;background:#000080;color:white;padding:15px;">Account Information<span style="float:right;"><i id="account_toggle" class="fa fa-arrow-down" aria-hidden="true"></i></span></h4>
                        <div class="account_wrapper" style="display:none;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Account Holder's Name :</label>
                                    <input type="text" name="acc_holder_name" required/>
                                </div>
                                <div class="form-group">
                                <label for="name">Account Type :</label>
                                    <select name="acc_type" required>
                                        <option value="Savings">Savings</option>
                                        <option value="Current">Current</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Account Number :</label>
                                <input type="text" name="acc_number" id="acc_number" required/>
                            </div>
                            <div class="form-group">
                                <label for="address">Re-enter Account Number :</label>
                                <input type="text" name="re_acc_number" id="re_acc_number" required/>
                            </div>
                            <div class="form-group">
                                <label for="state">IFSC Code :</label>
                                    <div class="form-select">
                                        <input type="text" name="ifsc" required>
                                    </div>
                            </div>
                        </div>
                        <h4 style="line-height:50px;background:#000080;color:white;padding:15px;">Tax Information<span style="float:right;"><i id="tax_toggle" class="fa fa-arrow-down" aria-hidden="true"></i></span></h4>
                        <div class="tax_wrapper" style="display:none;">
                            
                                <div class="form-group">
                                    <label for="name">PAN Number :</label>
                                    <input type="text" name="pan" required/>
                                </div>
                            
                            <div class="form-group">
                                <label for="address">Provisional GSTIN:</label>
                                <input type="text" name="gstin" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" name="pwd" id="pwd" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Upload Signature (For Bill issue) :</label>
                            <input type="file" name="sign_image" required/>
                        </div>
                        <div class="form-group" style="display:flex;">
                        <input type="checkbox" id="check" required/>
                        <label for="check">Accept the terms and conditions click <a href="../tnc.php">here</a> to read or check the box to move ahead</label>
                        </div>
                        <div class="form-submit">
                        <button class="submit" id="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function()
        {
            var basic = 0;
            var account = 0;
            var tax = 0;
            $("#basic_toggle").on("click",function()
            {
                if(basic == 0)
                {
                    $(".basic_wrapper").slideDown("fast");
                    $("#basic_toggle").removeClass("fa-arrow-down");
                    $("#basic_toggle").addClass("fa-arrow-up");
                    basic = 1;
                }
                else
                {
                    $(".basic_wrapper").slideUp("fast");
                    $("#basic_toggle").addClass("fa-arrow-down");
                    $("#basic_toggle").removeClass("fa-arrow-up");
                    basic=0;
                }
            });
            $("#account_toggle").on("click",function()
            {
                if(account == 0)
                {
                    $(".account_wrapper").slideDown("fast");
                    $("#account_toggle").removeClass("fa-arrow-down");
                    $("#account_toggle").addClass("fa-arrow-up");
                    account = 1;
                }
                else
                {
                    $(".account_wrapper").slideUp("fast");
                    $("#account_toggle").addClass("fa-arrow-down");
                    $("#account_toggle").removeClass("fa-arrow-up");
                    account=0;
                }
            });
            $("#tax_toggle").on("click",function()
            {
                if(tax == 0)
                {
                    $(".tax_wrapper").slideDown("fast");
                    $("#tax_toggle").removeClass("fa-arrow-down");
                    $("#tax_toggle").addClass("fa-arrow-up");
                    tax = 1;
                }
                else
                {
                    $(".tax_wrapper").slideUp("fast");
                    $("#tax_toggle").addClass("fa-arrow-down");
                    $("#tax_toggle").removeClass("fa-arrow-up");
                    tax=0;
                }
            });
        });
    </script>
</body>
</html>
<?php include 'code.php'; ?>
<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/finwallapp/HTML/form.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 22:39:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Finwallapp - Mobile HTML template</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="img/favicon180.png" sizes="180x180">
    <link rel="icon" href="img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- swiper CSS -->
    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" id="style">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post("kyc.php", formValues, function(data){
            // Display the returned data in browser
            if(data == "success"){
                window.location.replace("welcome_agent.php");
            } else{
                $("#result").html(data);
            }
        });
    });
});
</script>
  
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">
    <!-- screen loader -->
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 mb-4 rounded-circle">
                        <img src="img/favicon144.png" alt="" class="w-100">
                    </div>
                    <h4 class="text-default">Finwallapp</h4>
                    <p class="text-secondary">Mobile HTML template</p>
                    <div class="loader-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Begin page content -->
    <main class="flex-shrink-0 main">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">
                    <a class="navbar-brand" href="#">
                        <h5 class="mb-0">KYC</h5>
                    </a>
                </div>
                <div class="ml-auto col-auto">
                    <a href="profile.html" class="avatar avatar-30 shadow-sm rounded-circle ml-2">
                        <figure class="m-0 background">
                            <img src="img/user1.png" alt="">
                        </figure>
                    </a>
                </div>
            </div>
        </header>

        <!-- page content start -->

        <div class="main-container">
            <div class="container">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Business KYC</h6>
                    </div>
                    <div class="card-body">
                        <form>
                        <div id="result"></div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Bank Name<span style="color: red;">*</span></label>
                                <input type="text" name="search" id="search" class="form-control is-valid" id="exampleFormControlInput1" placeholder="coded bank" required>
                                <p class="form-text valid-feedback">Please choose your bank</p>
                                
                            </div>
                            <ul class="list-group" id="result"></ul>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Account Number<span style="color: red;">*</span></label>
                                <input type="text" class="form-control is-valid" name="account_number" placeholder="0987654322" required>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput2">Business Name<span style="color: red;">*</span></label>
                                <input type="text" class="form-control is-valid" name="business_name" placeholder="business name" required>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput2">Agent Name (Optional)</label>
                                <input type="text" class="form-control is-valid" name="business_contact" value="<?php echo $fullname; ?>">
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Country<span style="color: red;">*</span></label>
                                <input type="text" name="country" id="find" class="form-control is-valid" placeholder="Country" required>
                                <p class="form-text valid-feedback">Please choose your country</p>
                                
                            </div>
                            <ul class="list-group" id="outcome"></ul>

                            <div class="form-group">
                                <input type="hidden" class="form-control is-valid" value="0.021" name="split_value" id="exampleFormControlInput2" placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput2">Agent Contact (Optional)</label>
                                <input type="text" class="form-control is-valid" value="<?php echo $_SESSION['phone_number'];?>" name="business_contact_mobile" id="exampleFormControlInput2" placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput2">Business Email (Optional)</label>
                                <input type="text" class="form-control is-valid" name="business_email" id="exampleFormControlInput2" value="<?php echo $_SESSION['user_email'];?>" placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput2">Business Address (Optional)</label>
                                <textarea type="text" class="form-control is-valid" name="business_address"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control is-valid" value="percentage" name="split_type" id="exampleFormControlInput2" >
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <input type="submit" value="Sign up" class="btn btn-default rounded btn-block">
                                </div>
                                <br><br><br> 
                            </div>
                        </form>
                    </div>
                </div>
           
            </div>
        </div>
    </main>


    <script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#search').keyup(function(){
  $('#result').html('');
  $('#state').val('');
  var searchField = $('#search').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('try.json', function(data) {
   $.each(data, function(key, value){
    if (value.code.search(expression) != -1 || value.name.search(expression) != -1)
    {
     $('#result').append('<li class="list-group-item link-class"><img src="'+value.img+'" height="40" width="40" class="img-thumbnail" /> '+value.name+'-'+value.code+'| <span class="text-muted">'+value.name+'</span></li>');
    }
   });   
  });
 });
 
 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#search').val($.trim(click_text[0]));
  $("#result").html('');
 });
});
</script>

<script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#find').keyup(function(){
  $('#outcome').html('');
  $('#state').val('');
  var searchField = $('#find').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('country_code.json', function(data) {
   $.each(data, function(key, value){
    if (value.code.search(expression) != -1 || value.name.search(expression) != -1)
    {
     $('#outcome').append('<li class="list-group-item link-class"><img src="'+value.img+'" height="40" width="40" class="img-thumbnail" /> '+value.name+'-'+value.code+'| <span class="text-muted">'+value.code+'</span></li>');
    }
   });   
  });
 });
 
 $('#outcome').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#find').val($.trim(click_text[0]));
  $("#outcome").html('');
 });
});
</script>
<?php include 'footer.php'; ?>
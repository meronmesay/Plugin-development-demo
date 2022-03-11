<!DOCTYPE html>
<html>
<head>
<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>

<?php 
	// Background color
	$mycontact_bg_color = get_option('mycontact_settings_bg_color_field'); //getting the value from options.php
	// button color
	$mycontact_txt_font = get_option('mycontact_settings_txt_font_field');
	// font type
	$mycontact_btn_color = get_option('mycontact_settings_btn_color_field');
	// button txt color
	$mycontact_btn_txt_color = get_option('mycontact_settings_btn_txt_color_field');
	
?>

	<div class="container" style="background-color: <?php echo isset($mycontact_bg_color) ? esc_attr( $mycontact_bg_color ) : ''; ?>;">
    <div class="contact-box" style="font-family: <?php echo isset($mycontact_txt_font) ? esc_attr( $mycontact_txt_font ) : ''; ?> !important; " >  
	<h2 style="text-align:center;">Contact Us</h2>
	<form id="myForm" action="<?php echo isset($mycontact_redirect) ? esc_attr( $mycontact_redirect ) : ''; ?>" id="myForm">
      <div class="form-group">
       
        <label for="fname">First Name</label>
        <input class="form-control" type="text" id="fname" name="firstname" placeholder="Your name..">
        <div hidden class="alert alert-danger" role="alert"></div>
      </div>
  
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input class="form-control" type="text" id="lname" name="lastname" placeholder="Your last name..">
        <div hidden class="alert alert-danger" role="alert"></div>
      </div>
  
      <div class="form-group">
        <label for="email">Email </label>
        <input class="form-control" type="email" id="email" name="email" placeholder="Your email..">
        <div hidden class="alert alert-danger" role="alert"></div>
      </div>
  
      <div class="form-group">
        <label for="subject">Subject</label>
        <div hidden class="alert alert-danger" role="alert"></div>
        <textarea class="form-control" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      </div>
      </div>
  
      <br>
      <input class="btn btn-lg btn-primary" type="submit" value="Submit">
    </form>
  </div>
  <script src="./assets/js/script.js"></script>
</body>
</html>
<?php include 'inc/header.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $fm->validation($_POST['name']);
	$email = $fm->validation($_POST['email']);
	$contact = $fm->validation($_POST['contact']);
	$message = $fm->validation($_POST['message']);
	

	$name = mysqli_real_escape_string($db->link, $name);
	$email = mysqli_real_escape_string($db->link, $email);
	$contact = mysqli_real_escape_string($db->link, $contact);
	$message = mysqli_real_escape_string($db->link, $message);

	$error = "";

	if (empty($name)) {
		$error = "Name must not be empty !";
	} elseif (empty($email)) {
		$error = "Email must not be empty !";
	} elseif (empty($contact)) {
		$error = "Contact field must not be empty !";

	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Invalid Email Address !";
	} elseif (empty($message)) {
		$error = "Subject field not be empty !";

	} else {
 $query = "INSERT INTO tbl_contact(name,email,contact,message) VALUES('$name','$email','$contact','$message')";

    $inserted_rows = $db->insert($query);

    if ($inserted_rows) {
     $msg = "Message Sent Successfully.";

    }else {
    $error = "Message not sent!";
    }
	}

	}

	?>





 <div class="main">
    <div class="content">
    	<div class="support">
		<div class="support_desc">
    <h3>Amalia Shopping Service</h3>
    <p><span>Available 24/7 | 365 Days a Year</span></p>
    <p>At Amalia, we are committed to providing seamless shopping experiences with round-the-clock customer assistance. Our team is always here to help with any inquiries, technical support, or guidance you may need. Whether you’re shopping for the latest trends or need assistance with an order, we ensure a smooth and hassle-free experience. Your satisfaction is our priority.</p>
</div>

  				<img src="images/contact 2.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>

				  <?php 
				if (isset($error)) {
					echo "<span style = 'color:red'>$error</span>";
				}

				if (isset($msg)) {
					echo "<span style = 'color:green'>$msg</span>";
				}


				?>
					    <form action="" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="contact" value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="message"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>Location : Tiaret </p>
						   		<p>Location : Tiaret</p>
						   		<p>Location : Tiaret</p>
				   		<p>Mobile:+213000000000</p>
				   		<p>Phone: +213000000000</p>
				 	 	<p>Email: <span>amalia@gmial.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Instgram</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include 'inc/footer.php';?>
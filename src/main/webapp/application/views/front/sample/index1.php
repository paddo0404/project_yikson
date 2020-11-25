

<!DOCTYPE html>
				<html lang="en">
  		  			<head>
						<title>Sign in &middot; Yikson</title>
    					<meta charset="utf-8">
    					<meta name="viewport" content="width=device-width, initial-scale=1.0">
    					<meta name="description" content="">
    					<meta name="author" content="">
    					<link rel="shortcut icon" href="images/favicon.png">

					    <link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet">
 					    <link href="<?php echo base_url(); ?>assets/front/css/signin.css" rel="stylesheet">
						<style>
						.form-control
						{
							margin-bottom:10px;
						}
						</style>
 			  		</head>	
							
	  			  	<body>
						<div class="container">
							<form class="form-signin" id="formu" method="post" action="<?php echo site_url('check_login'); ?>">
								<h2 class="form-signin-heading">Please sign in</h2>
								<?php  if($error_message['message']!=""){ ?>
								  <div class="alert alert-danger">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>
											<?php  echo $error_message['message'];?>
											<br />
										</div>
                        
							     <?php } ?>
								
								<div class="form-group">
    				  	  		<input type="text" class="form-control" name="txtUserName" placeholder="Email ID">
								</div>
								<div class="form-group">
    				  	  		<input type="password" class="form-control"  name="txtPassword" placeholder="Password">
								</div>
    				  	  		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    				  	  		<input type="hidden"  id="forgot" name="forgot" value="">
					  	  		<h6><a href="<?php echo site_url('forgot_pwd'); ?>" >forgot password</a></h6>
  							</form>



                           <form class="form-signin" id="formu" method="post" action="<?php echo site_url('register_member'); ?>">
								<h2 class="form-signin-heading">Member Register</h2>
							    <?php if($error_message['error']!=""){ ?>
								  <div class="alert alert-danger">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>
											<?php  echo $error_message['error']; ?>
											<br />
										</div>
								<?php }?>
								<div class="form-group">
    				  	  		<input type="text" class="form-control" name="txtFullName" placeholder="Full Name">
								</div>
								
								<div class="form-group">
    				  	  		<input type="text" class="form-control" name="txtUserName" placeholder="Email ID">
								</div>
								<div class="form-group">
    				  	  		<input type="password" class="form-control"  name="txtPassword" placeholder="Password">
								</div>
								<div class="form-group">
    				  	  			<select name="month" id="month" class="form-control" style="color:#777777;width:25%;"> 
								 <option value="0">Month</option>
							  <option value="01">January&nbsp;&nbsp;</option><option value="02">February&nbsp;&nbsp;</option><option value="03">March&nbsp;&nbsp;</option><option value="04">April&nbsp;&nbsp;</option><option value="05">May&nbsp;&nbsp;</option><option value="06">June&nbsp;&nbsp;</option><option value="07">July&nbsp;&nbsp;</option><option value="08">August&nbsp;&nbsp;</option><option value="09">September&nbsp;&nbsp;</option><option value="10">October&nbsp;&nbsp;</option><option value="11">November&nbsp;&nbsp;</option><option value="12">December&nbsp;&nbsp;</option> </select>

                              &nbsp;&nbsp; 
							  <select name="day" id="day"  class="form-control" style="margin-left:5px;color:#777777;width:25%;">
				 		<option value="0"> Day</option>
																										<option value="01">01</option>
																										<option value="02">02</option>
																										<option value="03">03</option>
																										<option value="04">04</option>
																										<option value="05">05</option>
																										<option value="06">06</option>
																										<option value="07">07</option>
																										<option value="08">08</option>
																										<option value="09">09</option>
																										<option value="10">10</option>
																										<option value="11">11</option>
																										<option value="12">12</option>
																										<option value="13">13</option>
																										<option value="14">14</option>
																										<option value="15">15</option>
																										<option value="16">16</option>
																										<option value="17">17</option>
																										<option value="18">18</option>
																										<option value="19">19</option>
																										<option value="20">20</option>
																										<option value="21">21</option>
																										<option value="22">22</option>
																										<option value="23">23</option>
																										<option value="24">24</option>
																										<option value="25">25</option>
																										<option value="26">26</option>
																										<option value="27">27</option>
																										<option value="28">28</option>
																										<option value="29">29</option>
																										<option value="30">30</option>
																										<option value="31">31</option>
																	  </select>

								&nbsp;&nbsp;<input type="text" class="form-control" style="width:25%;"  name="txtYear" placeholder="YYYY">

								</div>
    				  	  		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    				  	  		<input type="hidden"  id="forgot" name="forgot" value="">
					  	  		
  							</form>


	    			  	</div> <!-- /container -->
				  </body>
				</html>
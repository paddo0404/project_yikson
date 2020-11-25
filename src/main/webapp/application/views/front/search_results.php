<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>All Feeds | Welcome to YIKSON </title>
	<?php include("include/header_css.php"); ?>
</head>
<body>

<!-- Body Start here -->
<div class="wrap">
	
<?php include('include/inner_header.php');?>
	
	<!-- body start -->
	<section class="clearfix main_page">
		<div class="container mbl_padd">
		<div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12 mbl_padd">


				        <?php
					if(isset($_GET['ferr'])){  ?>
						
                        <div class="alert alert-danger" style="font-size:12px;">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>

											<?php echo $_GET['ferr']; ?>
											<br />
										</div>
				<?php }  if(isset($_GET['fsuccess'])) {?>		
                      <div class="alert alert-block alert-success" style="font-size:12px;"> 
												<strong>
													<i class="icon-ok"></i>
													Success!
												</strong>
												<?php echo $_GET['fsuccess']; ?>
											</div>
						<?php } ?>



			<div class="">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 tb_pad hidden-xs">
					<div class="row">
					<?php include("include/left_menu.php");?>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					 <!-- Middle content -->
					 <?php if(count($all_users)>0){ for($i=0;$i<count($all_users);$i++){$user_url='';
					 if($all_users[$i]->member_photo!='')
					 {
						 $user_url=base_url()."assets/uploads/profiles/".$all_users[$i]->member_photo;
					 }
					 else
					 {
						 $user_url=base_url()."assets/front/images/page_2/profile_pic_left.png";
					 }
					  $friend_url=site_url('edit_profile');

                     if($all_users[$i]->mid!=$this->session->userdata('user_id'))
					 {
						$friend_url=site_url('friend_profile/'.$all_users[$i]->mid);
					 }
					 ?>
					 <div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="menu_list">
									<li class="pad_tp3_px"><a href="<?php echo $friend_url; ?>"><img src="<?php echo $user_url;?>" alt="Profile Pic"></a></li>
									<li class="postwidth"><a href="<?php echo $friend_url; ?>" class="font_16 postwidth"><?php echo $all_users[$i]->full_name;?> </a>
									</li>
								</ul>
							</div>
						</div>
						
					</div>	
					<?php } }else{ ?>
						<div class="error">No user details available</div>
					<?php } ?>
					 <!-- End Middle content -->
				</div>
				<div class="col-lg-3  col-md-3  col-sm-4 col-xs-12 col-lg-offset-0 col-sm-offset-0">
					<?php include 'include/right_advertisements.php';?>
				</div>
				
			</div>
			</div>
		</div>
	</section>
	<!-- body start -->
	<section class="clearfix copyright">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</section>
							
	
								<!-- Image Zoom Start -->
								
								<?php include 'include/zoom_image.php' ?>
								<!-- Image Zoom End -->
								
								<!-- Add Post Start -->
								
								<?php include 'include/add_post.php' ?>
								<!-- Add Post End -->
	
										  </div>
										  
										</div>
									  </div>
									</div>
</div>


<!-- JavaScripts -->
<?php include("include/inner_footer.php"); ?>
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>


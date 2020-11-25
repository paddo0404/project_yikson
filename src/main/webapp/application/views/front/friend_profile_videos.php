<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designingmedia.com/html/estate-plus/ by HTTrack Website Copier/3.x [XR&CO'2005], Fri, 15 Jul 2016 04:18:49 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Friend Profile | Welcome to YIKSON </title>
	<?php include("include/header_css.php"); ?>



</head>
<body>

<!-- Body Start here -->
<div class="wrap">
	<!-- header start -->
	<?php include("include/inner_header.php"); ?>
	<!-- header end -->
	<section class="clearfix main_page">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
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
				<div class="row">
					<div class="col-lg-7 col-lg-offset-2 col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 profile_details" style="background: url('posted_img.jpg')">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile_pic">
									<?php
									 $user_url='';
									 if($user_data['0']->member_photo!='')
									 {
										 $user_url=base_url()."assets/uploads/profiles/".$user_data['0']->member_photo;
									 }
									 else
									 {
										 $user_url=base_url()."assets/front/images/page_2/profile_pic_left.png";
									 }
								 ?>
										<a href="<?php echo site_url('friend_profile/'.$user_data['0']->mid); ?>" class=" font_19 ash"> <img src="<?php echo $user_url;?>"> <?php echo $user_data['0']->full_name;?></a>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile_pic_lft">
										<ul class="profile_acc pull-right">
										   <?php $uid=$this->uri->segment('2'); $myid=$this->session->userdata('user_id');
										   if($myid!=$uid){ ?>
											<li><a class="btn add_friend_btn" href="<?php echo site_url('add_friend/'.$user_data['0']->mid); ?>"> Add friend </a></li>
											<li><a class="btn following_btn" href="<?php echo site_url('add_following/'.$user_data['0']->mid); ?>"> Following </a></li>
											<?php } ?>
											<li class="information"><a href="<?php echo site_url('profile_information'); ?>"></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 secnd_main2 mrg_tp5_px">
								<div class="row">
									<ul class=" profile_option">
										<li><a href="<?php echo site_url('friend_profile/'.$user_data['0']->mid); ?>" class="posters"></a></li>
										<li><a href="<?php echo site_url('profile_pictures/'.$user_data['0']->mid); ?>" class="return_pic"></a></li>
										<li  class="active"><a href="<?php echo site_url('profile_videos/'.$user_data['0']->mid); ?>" class="video"></a></li>
										<li><a href="<?php echo site_url('profile_friends/'.$user_data['0']->mid); ?>" class="friends"></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								 <!-- Middle content -->
							 <?php 
					 
					
					 
					 if(count($all_videos)>0){ for($i=0;$i<count($all_videos);$i++){
					  ?>
					
					
					<?php } }else{ ?>
						<div class="error">No video details available</div>
					<?php } ?>

								 <!-- End Middle content -->
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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

<!-- JavaScripts -->
<?php include("include/inner_footer.php"); ?>
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>
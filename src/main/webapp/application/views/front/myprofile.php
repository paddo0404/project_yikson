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
										
											 <li class="information"><a href="<?php echo site_url('profile_information'); ?>"></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 secnd_main2 mrg_tp5_px">
								<div class="row">
									<ul class=" profile_option">
										<li   class="active"><a href="<?php echo site_url('friend_profile/'.$user_data['0']->mid); ?>" class="posters"></a></li>
										<li><a href="<?php echo site_url('profile_pictures/'.$user_data['0']->mid); ?>" class="return_pic"></a></li>
										<li><a href="<?php echo site_url('profile_videos/'.$user_data['0']->mid); ?>" class="video"></a></li>
										<li><a href="<?php echo site_url('profile_friends/'.$user_data['0']->mid); ?>" class="friends"></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-10 col-lg-offset-1 mrg_tp5_px col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
								 <!-- Middle content -->
					 <?php 
					 
					
					 
					 if(count($all_posts)>0){ for($i=0;$i<count($all_posts);$i++){

					 $uid=$all_posts[$i]['posted_by'];
					 ?>
					 <div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="menu_list">
									<li class="pad_tp3_px"><a href=""><img src="<?php echo $user_url;?>" alt="Profile Pic"></a></li>
									<li class="postwidth" style="vertical-align:middle !important;"><div ><a href="<?php echo $user_url;?>" class="font_16 postwidth"><?php echo $user_data['0']->full_name;?> </a></div><div style='clear:both;'></div>
									<div><small>11 mins</small></div></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<h2 class="title ash"><?php echo stripslashes($all_posts[$i]['message']); ?></h2>
								<?php if($all_posts[$i]['extension']=='gif' || $all_posts[$i]['extension']=='jpg' || $all_posts[$i]['extension']=='png' || $all_posts[$i]['extension']=='jpeg'){?>
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1">
								<img src="<?php echo base_url(); ?>assets/uploads/posts/<?php echo $all_posts[$i]['file_name']; ?>" alt="poster"   class="img_middle  img-responsive cursr">
								</div>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="extra_options">
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-left.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-right.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-down.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-up.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a id="commnets_tag3"><img src="<?php echo base_url(); ?>assets/front/images/page_2/comment.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/view.png"></a><br/><small class="font_9 balck">486k</small></li>
								</ul>
								<div class="comment_back" id="comments3" style="display:none;">
									<div class="row">
										<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
											<div class="row">
												<div class="col-lg-1 col-xs-3">
													<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic">
												</div>
												<div class="col-lg-11">
													<p class="comment_p"><a href="#">Tanisha Mademinetti</a> Hii suma I admire u as a good anchor well u r a good home maker too well a coincidence naa Peru kuda Suma u r inspiror to me to handle profession and family equal</p>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-1 col-xs-3">
													<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic">
												</div>
												<div class="col-lg-11">
													<p class="comment_p"><a href="#">Tanisha Mademinetti</a> Hii suma I admire u as a good anchor well u r a good home maker too well a coincidence naa Peru kuda Suma u r inspiror to me to handle profession and family equal</p>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-1 col-xs-1">
													<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic">
												</div>
												<div class="col-lg-9 col-xs-8 ">
													<input class="form-control pull-left form-custom1" type="text" placeholder="Write A Comment..." >
												</div>
												<div class="col-lg-2 row col-xs-1">
													<a href="#" class="btn comment_send_btn"> SEND </a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
					<?php } }else{ ?>
						<div class="error">No feed details available</div>
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
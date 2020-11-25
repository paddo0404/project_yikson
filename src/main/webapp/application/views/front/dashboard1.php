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
			<div class="">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 tb_pad hidden-xs">
					<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 tb_pad">
						<div class="row">
							<div class="col-lg-3 col-xs-2 col-md-3 col-sm-4">
							<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic"> 
							</div>
							<div class="col-lg-9 col-xs-10 col-md-9 col-sm-8">
								<p class="user_name"><?php echo $this->session->userdata('full_name');?></p>
							</div>
						</div>
						<p class="switch pull-left hidden-xs"><a href="#" class="ash">Switch Profile &nbsp; <i class="fa fa-caret-right" style="vertical-align: sub"></i></a></p>
					</div>
					<!-- desktop following -->
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 hidden-xs tb_pad">
						<h2 class="ash fol"><b>Following : </b></h2>
						<ul class="following">
							<li><a href="" ><span class="glyphicon glyphicon-user user_img"></span>  User01 </a></li>
							<li><a href="" ><span class="glyphicon glyphicon-user user_img"></span>  User01 </a></li>
							<li><a href="" ><span class="glyphicon glyphicon-user user_img"></span>  User01 </a></li>
							<li><a href="" ><span class="glyphicon glyphicon-user user_img"></span>  User01 </a></li>
							<li><a href="" ><span class="glyphicon glyphicon-user user_img"></span>  User01 </a></li>
						</ul>
					</div>
					</div>
					</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="menu_list">
									<li class="pad_tp3_px"><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic"></a></li>
									<li><a href="" class="font_16"> Yeswolf </a><br/><small>11 mins</small></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<h2 class="title ash">Title/Post</h2>
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1">
								<img src="<?php echo base_url(); ?>assets/front/images/page_2/posted_img.jpg" alt="poster"   class="img_middle  img-responsive cursr">
								</div>
								
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="extra_options">
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-left.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-right.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-down.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-up.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a id="commnets_tag"><img src="<?php echo base_url(); ?>assets/front/images/page_2/comment.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/view.png"></a><br/><small class="font_9 balck">486k</small></li>
								</ul>
								<div class="comment_back" id="comments" style="display:none;">
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
					
					<div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="menu_list">
									<li class="pad_tp3_px"><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic"></a></li>
									<li><a href="" class="font_16"> Yeswolf </a><br/><small>11 mins</small></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<h2 class="title ash">Title/Post</h2>
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1">
								<img src="<?php echo base_url(); ?>assets/front/images/page_2/posted_img.jpg" alt="poster"   class="img_middle  img-responsive cursr">
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="extra_options">
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-left.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-right.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-down.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-up.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a id="commnets_tag1"><img src="<?php echo base_url(); ?>assets/front/images/page_2/comment.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/view.png"></a><br/><small class="font_9 balck">486k</small></li>
								</ul>
								<div class="comment_back" id="comments1" style="display:none;">
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
					<div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="menu_list">
									<li class="pad_tp3_px"><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic"></a></li>
									<li><a href="" class="font_16"> Yeswolf </a><br/><small>11 mins</small></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<h2 class="title ash">Title/Post</h2>
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1">
								<img src="<?php echo base_url(); ?>assets/front/images/page_2/posted_img.jpg" alt="poster"   class="img_middle  img-responsive cursr">
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="extra_options">
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-left.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-right.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-down.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-up.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a id="commnets_tag2"><img src="<?php echo base_url(); ?>assets/front/images/page_2/comment.png"></a><br/><small class="font_9 balck">486k</small></li>
									<li><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/view.png"></a><br/><small class="font_9 balck">486k</small></li>
								</ul>
								<div class="comment_back" id="comments2" style="display:none;">
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
					<div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="menu_list">
									<li class="pad_tp3_px"><a href=""><img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic"></a></li>
									<li><a href="" class="font_16"> Yeswolf </a><br/><small>11 mins</small></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<h2 class="title ash">Title/Post</h2>
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1">
								<img src="<?php echo base_url(); ?>assets/front/images/page_2/posted_img.jpg" alt="poster"   class="img_middle  img-responsive cursr">
								</div>
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
				</div>
				<div class="col-lg-3  col-md-3  col-sm-4 col-xs-12 col-lg-offset-0 col-sm-offset-0">
					<ul class="right_side ">
						<li>
							<p><img src="<?php echo base_url(); ?>assets/front/images/page_2/right_pic.jpg" alt=""  class="img-responsive"></p>
							<a href=""> Title</a>
						</li>
						
						<li>
							<p><img src="<?php echo base_url(); ?>assets/front/images/page_2/right_pic.jpg" alt=""  class="img-responsive"></p>
							<a href=""> Title</a>
						</li>
						
						<li>
							<p><img src="<?php echo base_url(); ?>assets/front/images/page_2/right_pic.jpg" alt=""  class="img-responsive"></p>
							<a href=""> Title</a>
						</li>
						
						<li>
							<p><img src="<?php echo base_url(); ?>assets/front/images/page_2/right_pic.jpg" alt=""  class="img-responsive"></p>
							<a href=""> Title</a>
						</li>
					</ul>
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
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>
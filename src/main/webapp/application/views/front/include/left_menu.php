						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 tb_pad">
							<div class="row">
								<div class="col-lg-3 col-xs-2 col-md-3 col-sm-4">
								<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic"> 
								</div>
								<div class="col-lg-9 col-xs-10 col-md-9 col-sm-8">
									<p class="user_name"><?php echo $this->session->userdata('full_name');?></p>
								</div>
							</div>
							<p class="switch pull-left hidden-xs"><a href="#" class="ash">Log Out &nbsp; <i class="fa fa-caret-right font_19" style="vertical-align: sub"></i></a></p>
						
						</div>
						<!-- desktop following -->
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 hidden-xs tb_pad">
							<h2 class="ash fol"><b>Following : </b></h2>
							<ul class="following">
							<?php 
							 if(count($all_followings)>0)
							 { 
								 for($ij=0;$ij<count($all_followings);$ij++)
								 {
							?>
								<li><a href="<?php echo site_url('friend_profile/'.$all_followings[$ij]['mid']); ?>" ><img src="assets/front/images/page_2/request.png">&nbsp;&nbsp;<?php echo $all_followings[$ij]['full_name'];?> </a></li>
							<?php } } ?>	
							</ul>
						</div>

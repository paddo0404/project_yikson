<!-- Modal -->

<script src="<?php echo base_url(); ?>assets/front/js/jquery.validate.min.js"></script>
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog add_post_model" role="document">
										<div class="modal-content text-center">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">IMAGE UPLOAD</h4>
										  </div>
										  <div class="modal-body">
											<div class="middle_div " style="float:none;">
							<div class="row">
								<!-- Post form -->
                                 
								<div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 ">
									<div class="row">
									<form id="newpost_frm" method="post" action="<?php echo site_url('submit_post'); ?>" enctype="multipart/form-data">
										<div class="col-lg-8 col-md-8 col-xs-8 col-sm-9">
										<div class="row">
											<div class="col-lg-2 col-xs-3 col-sm-2 col-md-2">
											<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="">
											</div>
											<div class="col-lg-10 col-sm-10 col-md-10 col-xs-9">
												<a class="add_name" href="<?php echo site_url('edit_profile'); ?>"><?php echo $this->session->userdata('full_name');?> </a>
											</div>
											</div>
										</div>
										<div class="col-lg-3 col-xs-4 col-sm-3  col-md-4">
											<span  id="public_post" class="btn btn_public btn-sm btn-default pull-right"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp; Public &nbsp;<i class="fa fa-sort-desc vertl_tp" aria-hidden="true"></i></span>
											<div class="post_ty" id="public_view" style="display:none;">
												<ul class="post_type">
													<li >
														<span class="common who"><span class="fsm">Who should see this?</span></span>
													</li>
													<li class="select_li">
														<a href="" class="who common pad_tp5_px"><span><b><i class="fa fa-globe" aria-hidden="true"></i> &nbsp; Public</b></span>
															<div class="any">
																Anyone on or off Yikson
															</div>
														</a>
													</li>
													<li class="select_li active">
														<a href="" class="who common pad_tp5_px"><span><b><i class="fa fa-users" aria-hidden="true"></i> &nbsp; Friends</b></span>
															<div class="any">
																Your friends on Yikson
															</div>
														</a>
													</li>
													<li class="select_li">
														<a href="" class="who common pad_tp5_px"><span><b><i class="fa fa-lock" aria-hidden="true"></i> &nbsp; Only Me</b></span>
															<div class="any">
																Only Me
															</div>
														</a>
													</li>
													
												</ul>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mrg_tp5_px">
											<textarea class="form-control" name="your_message" id="your_message" rows="4"></textarea>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
											<div class="row">
											<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" >
													<label class="myLabel tag">
														<input type="file" name="post_file" id="post_file" />
														<span>ADD PHOTO/VIDEO</span>
													</label>
												</div>
												<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
												<input type="button" class="pull-right tag" name="btnPost" value="Tag">
													<input type="submit" class="pull-right tag" name="btnPost" value="Post">
												</div>
											</div>
										</div>
									
										</form>
									</div>
								</div>

								 
								<!-- End post form -->

								<div class="col-lg-1 hidden-xs col-sm-12 col-md-1">
									<div class="divider"></div>
								</div>
								<div class="col-lg-4 col-xs-12 col-sm-12 col-md-4  text-center">
									<div class="crator">CONTENT CREATOR</div>
									<button type="button" data-toggle="modal" data-target="#myModala" class="tag upload">IMAGE</button><br/>
									<!-- Modal -->
									<div class="modal fade" id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog togmdl" role="document">
										<div class="modal-content">
										<form id="newpost_frm" method="post" action="<?php echo site_url('submit_image_post'); ?>" enctype="multipart/form-data">
										 <!-- Upload Image -->
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">IMAGE UPLOAD</h4>
										  </div>
										  <div class="modal-body">
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
												<label class="myLabel pop_add">
													<input type="file" name="upload_image" id="upload_image"/>
													<span class="glyphicon glyphicon-plus"> UPLOAD IMAGE </span>
												</label>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
												<input type="text" name="image_title" id="image_title" class="form-control form-custom pop_add mrg_lft20_px" placeholder="TITLE">
											</div>
											<div class="col-lg-12 mrg_tp5_px col-xs-12 col-sm-12 col-md-12">
												<textarea type="text" name="image_desc" id="image_desc" rows="6" class="form-control form-custom pop_add mrg_lft20_px" placeholder="DESCRIPTION"></textarea>
											</div>
											<div class="col-lg-12 mrg_tp5_px col-xs-12 col-sm-12 col-md-12">
												<div class="col-lg-12 text-left">
													<h4><b class="blue">Select Category</b></h4>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" >
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FUNNY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">GEEKY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TECH</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TV&MOVIES</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FOOD</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">NATURE</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">CARS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TRAVELS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">MUSIC</a></li>
														</ul>
													</div>
												</div>
											</div>
										  </div>
										  <div class="modal-footer">
											
											<input type="submit" class="tag" name="btnPost" value="POST">
										  </div>
                                         </form>
										  <!--End Upload Image -->
										</div>
									  </div>
									</div>
									<button type="button" data-toggle="modal" data-target="#myModal1" class="tag upload">GIF</button><br/>
									<!-- Modal -->
									<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog togmdl" role="document">
										<div class="modal-content">
										<form id="newgif_frm" method="post" action="<?php echo site_url('submit_gif_post'); ?>" enctype="multipart/form-data">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">GIF UPLOAD</h4>
										  </div>
										  <div class="modal-body">
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
												<label class="myLabel pop_add">
													<input type="file" name="upload_gif_image" id="upload_gif_image"/>

													<span class="glyphicon glyphicon-plus"> UPLOAD GIF </span>
												</label>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
												<input type="text" name="gif_title" id="gif_title" class="form-control form-custom pop_add mrg_lft20_px" placeholder="TITLE">
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mrg_tp5_px">
												<textarea type="text" name="gif_desc" id="gif_desc" rows="6" class="form-control form-custom pop_add mrg_lft20_px" placeholder="DESCRIPTION"></textarea>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mrg_tp5_px">
												<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 text-left">
													<h4><b class="blue">Select Category</b></h4>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FUNNY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">GEEKY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TECH</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TV&MOVIES</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FOOD</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">NATURE</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">CARS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TRAVELS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">MUSIC</a></li>
														</ul>
													</div>
												</div>
											</div>
										  </div>
										  <div class="modal-footer">
											<input type="submit" class="tag" name="btnPost" value="POST">
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<button type="button" data-toggle="modal" data-target="#myModal2" class="tag upload">VIDEO</button><br/>
									<!-- Modal -->
									<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog togmdl" role="document">
										<div class="modal-content">
										<form id="newvideo_frm" method="post" action="<?php echo site_url('submit_video_post'); ?>" enctype="multipart/form-data">
										 <!-- Upload Image -->
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">VIDEO UPLOAD</h4>
										  </div>
										  <div class="modal-body">
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
												<label class="myLabel pop_add">
													<input type="file" name="upload_video" id="upload_video"/>
													<span class="glyphicon glyphicon-plus"> UPLOAD VIDEO </span>
												</label>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
												<input type="text" name="video_title" id="video_title" class="form-control form-custom pop_add mrg_lft20_px" placeholder="TITLE">
											</div>
											<div class="col-lg-12 mrg_tp5_px col-xs-12 col-sm-12 col-md-12">
												<textarea type="text" name="video_desc" id="video_desc" rows="6" class="form-control form-custom pop_add mrg_lft20_px" placeholder="DESCRIPTION"></textarea>
											</div>
											<div class="col-lg-12 mrg_tp5_px col-xs-12 col-sm-12 col-md-12">
												<div class="col-lg-12 text-left">
													<h4><b class="blue">Select Category</b></h4>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" >
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FUNNY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">GEEKY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TECH</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TV&MOVIES</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FOOD</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">NATURE</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">CARS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TRAVELS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">MUSIC</a></li>
														</ul>
													</div>
												</div>
											</div>
										  </div>
										  <div class="modal-footer">
											
											<input type="submit" class="tag" name="btnPost" value="POST">
										  </div>
                                         </form>
										  <!--End Upload Image -->
										</div>
									</div>
									</div>
									<button type="button" data-toggle="modal" data-target="#myModal3" class="tag upload">ARTICLE</button><br/>
									<!-- Modal -->
									<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog model_widt" role="document">
										<div class="modal-content pull-left">
										  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
										  <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 mbl_padd">
											  <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">ARTICLE</h4>
										  </div>
										  <div class="modal-body">
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mbl_padd">
												<input type="text" class="form-control form-custom pop_add mrg_lft20_px" placeholder="TITLE">
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mbl_padd">
												<label class="myLabel pop_add">
													<input type="file" required/>
													<span class="glyphicon glyphicon-plus "> UPLOAD COVER </span>
												</label>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mrg_tp5_px mbl_padd">
												<textarea type="text" rows="6" class="form-control form-custom pop_add mrg_lft20_px" placeholder="DESCRIPTION"></textarea>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mbl_padd">
												<div class="add_txt mrg_tp5_px">
													<input type="text" class="form-control form-custom pop_add mrg_lft20_px" placeholder="ADD TEXT">
												</div>
												<div class="phot">
													<label class="myLabel pop_add">
														<input type="file" required/>
														<span class="glyphicon glyphicon-plus"> PHOTO </span>
													</label>
												</div>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mbl_padd">
												<div class="add_txt mrg_tp5_px">
													<input type="text" class="form-control form-custom pop_add mrg_lft20_px" placeholder="ADD TEXT">
												</div>
												<div class="phot">
													<label class="myLabel pop_add">
														<input type="file" required/>
														<span class="glyphicon glyphicon-plus"> PHOTO </span>
													</label>
												</div>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mbl_padd">
												<a class="tag" href="#">ADD MORE</a>
											</div>
											<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 mrg_tp5_px mbl_padd">
												<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 text-left">
													<h4><b class="blue">Select Category</b></h4>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FUNNY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">GEEKY</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TECH</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TV&MOVIES</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">FOOD</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">NATURE</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
														<ul class="selc_catgry">
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">CARS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">TRAVELS</a></li>
															<li><a name="sec" href="javascript:void(0);" onclick="this.style.color='red';">MUSIC</a></li>
														</ul>
													</div>
												</div>
											</div>
										  </div>
										  <div class="modal-footer">
											<a class="tag" href="#">POST</a>
										  </div>
										   </div>
											<div class="col-lg-1 hidden-xs hidden-sm col-md-1">
												<div class="ppp_brdr" Style="height: 500px;"></div>
											</div>
										   <div class="col-lg-5 col-sm-12 col-md-5 col-xs-12 mbl_padd">
											 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 
										  <div class="modal-body mrg_tp30_px">
											<img src="<?php echo base_url(); ?>assets/front/images/add_post/article.png" class="img-responsive">
										   </div>
										 
										</div>
									  </div>
									</div>
									</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			</div>



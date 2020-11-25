<?php
 $current_page=$this->uri->segment(2);
?>
<ul class="nav nav-list">

<li <?php if($current_page=='dashboard'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/dashboard'); ?>"> <i class="icon-dashboard"></i> 
<span class="menu-text"> Dashboard </span> </a> </li>

<li <?php if($current_page=='change_pwd'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/change_pwd'); ?>"> <i class="icon-text-width"></i> <span class="menu-text"> Change password </span> </a> </li>


<li <?php if($current_page=='myprofile'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/myprofile'); ?>"> <i class="icon-text-width"></i> <span class="menu-text">  
My Profile </span> </a> </li>
<li <?php if($current_page=='settings'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/settings'); ?>"> <i class="icon-dashboard"></i> 
<span class="menu-text"> Site Settings </span> </a> </li>

<li <?php if($current_page=='admin_users' || $current_page=='admin_info' || $current_page=='new_admin'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/admin_users'); ?>" > <i class="icon-text-width"></i> <span class="menu-text"> 
Admin Users </span> </a> </li>


<li <?php if($current_page=='categories' || $current_page=='new_category'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/categories'); ?>" > <i class="icon-text-width"></i> <span class="menu-text"> 
Categories </span> </a> </li>

<li <?php if($current_page=='members' || $current_page=='new_member'){echo 'class="active"';} ?>> <a href="<?php echo site_url('administrator/members'); ?>" > <i class="icon-text-width"></i> <span class="menu-text"> 
Registered Members </span> </a> </li>


 <li> <a href="<?php echo site_url('administrator/logout'); ?>" > <i class="icon-text-width"></i> <span class="menu-text"> 
Logout </span> </a> </li>         
 
      </ul>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "front";
$route['404_override'] = '';
$route['check_login'] = "front/checklogin";
$route['logout'] = "front/log_out";
$route['dashboard'] = "front/user_dashboard";
$route['index?(:any)'] = "front/index";
$route['forgot_pwd'] = "front/forgot_pwd";
$route['forgot_pwd?(:any)'] = "front/forgot_pwd";
$route['forgot_password'] = "front/send_forgot_password";
$route['register_member'] = "front/member_register";
$route['edit_profile'] = "front/edit_profile";
$route['profile_information'] = "front/profile_information";
$route['submit_post'] = "front/submit_new_post";
$route['search_users'] = "front/search_all_users";
$route['friend_profile/(:any)'] = "front/friend_profile_details/$1";
$route['add_friend/(:any)'] = "front/add_friend_data/$1";
$route['add_following/(:any)'] = "front/add_following_data/$1";
$route['profile_pictures/(:any)'] = "front/profile_pictures/$1";
$route['profile_videos/(:any)'] = "front/profile_videos/$1";
$route['all_images'] = "front/all_images";
$route['all_videos'] = "front/all_videos";
$route['all_articals'] = "front/all_articals";
$route['all_images_category/(:any)'] = "front/all_images_category/$1";

$route['submit_image_post'] = "front/submit_image_post";

$route['submit_gif_post'] = "front/submit_gif_post";
$route['submit_video_post'] = "front/submit_video_post";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
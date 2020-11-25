<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class administrator extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('email');
        $this->load->helper('url');
        //$this->load->helper('user_helper');
        //$this->load->library('encrypt');
        $this->load->library('session');
        $this->load->model('adminmodel');
        $this->load->model('upload_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $this->load->view('administrator/dashboard', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    private function check_login() {
        if ($this->session->userdata('isLoggedIn')) {
            redirect('/administrator/dashboard');
        } else {
            redirect('/administrator/login');
        }
    }

    public function forgot_pwd() {
        $data['site_settings'] = $this->adminmodel->getSettingInformation();
        $this->load->view('administrator/forgot_pwd', $data);
    }

    public function send_mail($from_name, $from_email, $to_mail, $subject, $body) {
        //Load email library 
        $this->load->library('email');
        $this->email->from($from_email, $from_name);
        $this->email->to($to_mail);
        $this->email->subject($subject);
        $this->email->message($body);
        //Send mail 
        if ($this->email->send())
            return "success";
        else
            return "failed";
    }

    public function login() {
        $data['site_settings'] = $this->adminmodel->getSettingInformation();
        $this->load->view('administrator/login', $data);
    }

    public function checkLogin() {
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('pwd', 'Password', 'required');
        $this->form_validation->set_message('required', ' %s is Required');

        if ($this->form_validation->run() == FALSE) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $this->load->view('administrator/login', $data);
        } else {
            $username = $this->input->post('uname');
            $usr_pwd = $this->input->post('pwd');
            $password = $this->adminmodel->pwdEncrypt($usr_pwd);
            $result = array();
            $result['login_data'] = $this->adminmodel->checkLoginInformation($username, $password);
            $count = count($result['login_data']);
            if ($count == 0) { //check  login from db
                redirect('administrator/login/fail');
                exit();
            } else {
                if ($count != "" && $count > 0)
                    $session = array(
                        'admin_id' => $result['login_data'][0]->user_id,
                        'admin_username' => $result['login_data'][0]->user_name,
                        'admin_email' => $result['login_data'][0]->email,
                        'isLoggedIn' => true
                    );

                $this->session->set_userdata($session);

                redirect('administrator/dashboard');
            }
        }
    }

    public function dashboard() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $this->load->view('administrator/index', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    public function change_pwd() {
        if ($this->session->userdata('isLoggedIn')) {
            if (isset($_POST['submit'])) {
                $username = $this->session->userdata("admin_username");
                $newpwd = $this->input->post('new_pwd');
                $oldpwd = $this->input->post('old_pwd');
                $password = $this->adminmodel->pwdEncrypt($oldpwd);
                $result = array();
                $result['login_data'] = $this->adminmodel->checkLoginInformation($username, $password);
                $count = count($result['login_data']);
                if ($count == 0) { //check  login from db
                    redirect("administrator/change_pwd?ferr=Old password is incorrect.");
                    exit();
                } else {
                    $data = array(
                        "usr_pwd" => $this->adminmodel->pwdEncrypt($newpwd)
                    );
                    $this->adminmodel->change_pwd($data);
                    redirect("administrator/change_pwd?fsuccess=You have successfully changed your password.");
                }
            } else {
                $data['site_settings'] = $this->adminmodel->getSettingInformation();
                $this->load->view('administrator/change_pwd', $data);
            }
        } else {
            redirect('/administrator/login');
        }
    }

    public function settings() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $this->load->view('administrator/settings', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    public function update_settings() {
        if ($this->session->userdata('isLoggedIn')) {
            $c_name = $this->input->post('c_name');
            $title = $this->input->post('title');
            $received_email = $this->input->post('received_email');
            $footer_txt = $this->input->post('footer_txt');
            $data = array(
                "c_name" => $c_name,
                "title" => $title,
                "received_email" => $received_email,
                "footer_txt" => $footer_txt
            );
            $this->adminmodel->updateSettings($data);
            redirect("administrator/settings?fsuccess=You have successfully updated your settings");
        } else {
            redirect('/administrator/login');
        }
    }

    // Admin users //
    public function myprofile() {
        if ($this->session->userdata('isLoggedIn')) {
            if (isset($_POST['btnSubmit'])) {
                $data = array(
                    "first_name" => $this->input->post('firstname'),
                    "last_name" => $this->input->post('lastname'),
                    "email" => $this->input->post('email')
                );

                $this->adminmodel->update_myprofile($data);
                redirect("administrator/myprofile?fsuccess=You have successfully updated your profile information");
            } else {
                $data['site_settings'] = $this->adminmodel->getSettingInformation();
                $uid = $this->session->userdata("admin_id");
                $data['get_data'] = $this->adminmodel->getAdminData($uid);
                $this->load->view('administrator/myprofile', $data);
            }
        } else {
            redirect('/administrator/login');
        }
    }

    public function admin_users() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $data['all_admins'] = $this->adminmodel->getAllAdminUsers();
            $this->load->view('administrator/all_admins', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    public function admin_info() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();

            $data['get_data'] = $this->adminmodel->getAdminData($this->uri->segment(3));
            $this->load->view('administrator/view_admin', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    function new_admin() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $id = $this->uri->segment(3);
            if ($id != '')
                $data['get_data'] = $this->adminmodel->getAdminData($this->uri->segment(3));
            else {
                $value = (object) array(
                            'user_id' => '',
                            'first_name' => '',
                            'last_name' => '',
                            'email' => '',
                            'user_name' => '',
                            'usr_pwd' => '',
                            'utype' => '',
                            'status' => ''
                );

                $data['get_data'][] = $value;
            }


            $this->load->view('administrator/new_admin', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    function add_edit_users() {
        if ($this->session->userdata('isLoggedIn')) {
            $id = $this->input->post('hdn_id');
            $data = (object) array(
                        'first_name' => $this->input->post('firstname'),
                        'last_name' => $this->input->post('lastname'),
                        'email' => $this->input->post('email'),
                        'user_name' => $this->input->post('uname'),
                        'usr_pwd' => $this->adminmodel->pwdEncrypt($this->input->post('pwd')),
                        'utype' => $this->input->post('utype'),
                        'status' => $this->input->post('status')
            );

            if ($id == '') {
                $this->adminmodel->add_admin($data);
                redirect("administrator/admin_users?fsuccess=You have successfully added new admin users");
            } else {
                $this->adminmodel->edit_admin($data, $id);
                redirect("administrator/admin_users?fsuccess=You have successfully updated admin user information");
            }
        } else {
            redirect('/administrator/login');
        }
    }

    function delete_user() {
        if ($this->session->userdata('isLoggedIn')) {
            $id = $_GET['id'];
            $this->adminmodel->delete_admin_users($id);
            redirect("administrator/admin_users?fsuccess=You have successfully deleted admin user information");
        } else {
            redirect('/administrator/login');
        }
    }

    // End Admin Users //
    // Categories list //



    public function categories() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $data['all_category'] = $this->adminmodel->getAllCategorieslist();
            $this->load->view('administrator/categories_list', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    function new_category() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $id = $this->uri->segment(3);
            if ($id != '')
                $data['get_data'] = $this->adminmodel->getCategoryData($this->uri->segment(3));
            else {
                $value = (object) array(
                            'cid' => '',
                            'cname' => '',
                            'status' => ''
                );

                $data['get_data'][] = $value;
            }


            $this->load->view('administrator/category_new', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    function add_edit_category() {
        if ($this->session->userdata('isLoggedIn')) {
            $id = $this->input->post('hdn_id');
            $data = (object) array(
                        'cname' => $this->input->post('name'),
                        'status' => $this->input->post('status')
            );

            if ($id == '') {
                $this->adminmodel->add_category($data);
                redirect("administrator/categories?fsuccess=You have successfully added new category");
            } else {
                $this->adminmodel->edit_category($data, $id);
                redirect("administrator/categories?fsuccess=You have successfully updated category information");
            }
        } else {
            redirect('/administrator/login');
        }
    }

    function delete_category() {
        if ($this->session->userdata('isLoggedIn')) {
            $id = $_GET['id'];
            $this->adminmodel->delete_category($id);
            redirect("administrator/categories?fsuccess=You have successfully deleted category information");
        } else {
            redirect('/administrator/login');
        }
    }

    // End categories list //
    // Members list //



    public function members() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $data['all_category'] = $this->adminmodel->getAllMemberslist();
            $this->load->view('administrator/members_list', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    function new_member() {
        if ($this->session->userdata('isLoggedIn')) {
            $data['site_settings'] = $this->adminmodel->getSettingInformation();
            $id = $this->uri->segment(3);
            if ($id != '')
                $data['get_data'] = $this->adminmodel->getMemberData($this->uri->segment(3));
            else {
                $value = (object) array(
                            'mid' => '',
                            'full_name' => '',
                            'email_id' => '',
                            'date_of_birth' => '',
                            'user_pwd' => '',
                            'gender' => '',
                            'member_photo' => '',
                            'status' => ''
                );

                $data['get_data'][] = $value;
            }


            $this->load->view('administrator/new_member', $data);
        } else {
            redirect('/administrator/login');
        }
    }

    public function main() {
        $this->load->view('administrator/main', '');
    }

    function do_upload1() {
        $config = array(
            'upload_path' => "uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload()) {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('file_view', $error);
        }
    }

    function do_upload() {
        $upload_conf = array(
            'upload_path' => realpath('./uploads/original/'),
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => '300000',
            'encrypt_name' => true,
        );

        //$this->load->library('upload');
        $this->upload->initialize($upload_conf);
        $field_name = 'userfile';

        if (!$this->upload->do_upload('ProfilePic', '')) {
            $error['upload'] = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $resize_conf = array(
                'upload_path' => realpath('./uploads/thumbs/'),
                'source_image' => $upload_data['full_path'],
                'new_image' => $upload_data['file_path'] . '/thumbs/' . $upload_data['file_name'],
                'width' => 250,
                'height' => 250);

            $this->load->library('image_lib');
            $this->image_lib->initialize($resize_conf);

            // do it!
            if (!$this->image_lib->resize()) {
                // if got fail.
                $error['resize'] = $this->image_lib->display_errors();
            } else {
                $data_to_store['ProfilePic'] = $upload_data['file_name'];
                $data1['ProfilePic'] = $upload_data['file_name'];
                $this->session->set_userdata($data1);
            }
        }
    }

    function add_edit_member() {
        if ($this->session->userdata('isLoggedIn')) {
            $id = $this->input->post('hdn_id');
            $data = (object) array(
                        'full_name' => $this->input->post('name'),
                        'email_id' => $this->input->post('email'),
                        'user_pwd' => $this->adminmodel->pwdEncrypt($this->input->post('user_pwd')),
                        'date_of_birth' => $this->input->post('dob'),
                        'gender' => $this->input->post('gender'),
                        'status' => $this->input->post('status')
            );
            if ($id == '') {
                $this->adminmodel->add_member($data);
                redirect("administrator/members?fsuccess=You have successfully added new member");
            } else {
                $this->adminmodel->edit_member($data, $id);
                redirect("administrator/members?fsuccess=You have successfully updated member information");
            }
        } else {
            redirect('/administrator/login');
        }
    }

    function delete_member() {
        if ($this->session->userdata('isLoggedIn')) {
            $id = $_GET['id'];
            $this->adminmodel->delete_member($id);
            redirect("administrator/members?fsuccess=You have successfully deleted member information");
        } else {
            redirect('/administrator/login');
        }
    }

    //End Members list //






    function logout() {
        $session = array(
            'admin_id' => '',
            'admin_username' => '',
            'admin_email' => '',
            'isLoggedIn' => false
        );

        $this->session->unset_userdata($session);
        redirect('administrator/login');
    }

}

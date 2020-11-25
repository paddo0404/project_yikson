<?php

class adminmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

// checking for admin login


    function pwdEncrypt($pwd) {
        return base64_encode(base64_encode($pwd));
    }

    function pwdDecrypt($pwd) {
        return base64_decode(base64_decode($pwd));
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

    function checkLoginInformation($username, $password) {
        $where = array('user_name' => $username, 'usr_pwd' => $password, 'status' => 'Active');
        $this->db->select("*");
        $this->db->from("tb_admin");
        $this->db->where($where);
        $data = $this->db->get()->result();
        return $data;
    }

// storing the admin data in session

    function getSettingInformation() {
        $this->db->select("*");
        $this->db->from("tb_sitesettings");
        $data = $this->db->get()->result();
        return $data;
    }

    function getAdminData($id) {
        $this->db->select("*");
        $this->db->from("tb_admin");
        $this->db->where('user_id', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    function change_pwd($data) {
        $this->db->where('user_id', $this->session->userdata("admin_id"));
        $this->db->update('tb_admin', $data);
    }

    function update_myprofile($data) {
        $this->db->where('user_id', $this->session->userdata("admin_id"));
        $this->db->update('tb_admin', $data);
    }

// for hashcode 

    function updateSettings($data) {
        $this->db->where('id', '1');
        $this->db->update('tb_sitesettings', $data);
    }

// for admin email sending forgot password

    function admin_forgot_password($data) {

        $value = $data['user_name'];
        $where = "(user_name='$value' OR email='$value')";
        $record = array();
        $this->db->select('id,user_name,email');
        $this->db->from('tbl_users');
        $this->db->where($where);
        $result = $this->db->get()->result();
        // $count=count($result);
        // return $count;
        if (count($result) > 0) {
            $id = $result[0]->id;
            $forgot_password_key1 = callto_randomkey($id);
            $data1 = array(
                'forgot_password_key' => $forgot_password_key1
            );
            $this->table_name = "tbl_users";
            $this->db->update($this->table_name, $data1, array('id' => $id));
        }
        $email = $result[0]->email;
        $user = $result[0]->user_name;
        $id = $result[0]->id;
        $forgot_password_key = $forgot_password_key1;

        //for sending email
        $subject = "Password Recovery";
        $from = "Support@hasbeenused.com";
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from('hasbeenused.com', $from);
        $this->email->to($email);
        $this->email->subject($subject);
        $html = '<html><body>
			    <div>Dear ' . $user . ',<br> </div>
			    <p>Please click on the link given below to reset your password .</p>
			    <div><a href=' . base_url() . 'user/password_recovery/' . $forgot_password_key . '>Change Password</a></div>
			    <br/>
			    <div></div><br/><div>Thank You,</div><br/><div>HBU Team</div>
			    </body></html>';
        $this->email->message($html);
        $this->email->send();
        $record = DisplayMsg("An Email sent to you ,please click on the link to change Password", "success");
        return $record;
        // end of the email sending	
    }

// for all admin userslist

    function getAllAdminUsers() {

        $this->db->select("*");
        $this->db->from("tb_admin");
        $this->db->order_by("createdon", 'DESC');
        return $this->db->get()->result();
    }

// for adding new admoin user

    function all_admin_useradd($data) {
        $this->table_name = "tbl_admin_users";
        $count = $this->db->insert($this->table_name, $data);
        //$results=$query->result();
        // echo  $str=$sql = $this->db->last_query();
        //print_r($count);
        return $count;
    }

// for adding new admoin user

    function add_admin($data) {
        $this->table_name = "tb_admin";
        $count = $this->db->insert($this->table_name, $data);
        return $count;
    }

    function edit_admin($data, $id) {
        $this->db->where('user_id', $id);
        $this->db->update('tb_admin', $data);
    }

    function delete_admin_users($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('tb_admin');
    }

    // categories list //


    function getAllCategorieslist() {

        $this->db->select("*");
        $this->db->from("tb_categories");
        $this->db->order_by("createdon", 'DESC');
        return $this->db->get()->result();
    }

    function add_category($data) {
        $this->table_name = "tb_categories";
        $count = $this->db->insert($this->table_name, $data);
        return $count;
    }

    function edit_category($data, $id) {
        $this->db->where('cid', $id);
        $this->db->update('tb_categories', $data);
    }

    function delete_category($id) {
        $this->db->where('cid', $id);
        $this->db->delete('tb_categories');
    }

    function getCategoryData($id) {
        $this->db->select("*");
        $this->db->from("tb_categories");
        $this->db->where('cid', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    //End categories list //
    // Members list //


    function getAllMemberslist() {
        $this->db->select("*");
        $this->db->from("tb_members");
        $this->db->order_by("createdon", 'DESC');
        return $this->db->get()->result();
    }

    function add_member($data) {
        $this->table_name = "tb_members";
        $count = $this->db->insert($this->table_name, $data);
        return $count;
    }

    function edit_member($data, $id) {
        $this->db->where('mid', $id);
        $this->db->update('tb_members', $data);
    }

    function delete_member($id) {
        $this->db->where('mid', $id);
        $this->db->delete('tb_members');
    }

    function getMemberData($id) {
        $this->db->select("*");
        $this->db->from("tb_members");
        $this->db->where('mid', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    //End members list //
// end of model class	
}

?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin(); 

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Adminlogin {
    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($adminUser, $adminPass) {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        if(empty($adminUser) || empty($adminPass)) {
            $msg = "<p class='text-danger'>Username / Password cannot be empty.</p>";
            return $msg;
        }

        $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' ";
        $result = $this->db->select($query);
        if($result) {
            $value = $result->fetch();
            Session::set('adminlogin', true);
            Session::set('adminId', $value['adminId']);
            Session::set('adminName', $value['adminName']);
            header('Location: catList.php');
        }else {
            $msg = "<p class='text-danger'>Username or Password not correct</p>";
            return $msg;
        }

    }
}
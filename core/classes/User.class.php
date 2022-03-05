<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class User {
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

        
    // --------------------------- new Customer registration
    public function registration($data) {
        // customer table
        $name     = $this->fm->validation($data['name']);
        $phone    = $this->fm->validation($data['phone']);
        $email    = $this->fm->validation($data['email']);
        $password = $this->fm->validation(md5($data['password']));
        // address table
        $address  = $this->fm->validation($data['address']);
        $city     = $this->fm->validation($data['city']);
        $country  = $this->fm->validation($data['country']);
        $zip      = $this->fm->validation($data['zip']);

        if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $password == "") {
            $msg = "<span class='text-danger d-block'>All fields must be filled !</span>";
            return $msg;
        }
        
        // PHONE validation regex (French number format)
        if(!$this->fm->validate_phone($phone)) {
            $msg = "<span class='text-danger d-block'>Please enter a correct phone number !</span>";
            return $msg;
        }
        // EMAIL validation 
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $msg = "<span class='text-danger d-block'>Please enter a correct email !</span>";
            return $msg;
        }


        // email already registered or not
        $mailQuery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
        $mailCheck = $this->db->select($mailQuery);
        if($mailCheck) {
            $msg = "<span class='text-danger d-block'>Email already registered !</span>";
            return $msg;
        }else {
            // 1. entering data to tbl_address first
            $addressTableQuery = "INSERT INTO tbl_address(`address`, `zip`, `city`, `country`)
             VALUES('$address', '$zip', '$city', '$country')";
            $addressInsert = $this->db->insert($addressTableQuery);

            //2.  fetch tbl_adress for addressId for foreign key
            $addIdQuery = "SELECT * FROM tbl_address ORDER BY addressId DESC";
            $result = $this->db->select($addIdQuery)->fetch();
            $addId = $result['addressId'];

            // 3. entering data into tbl_customer with addressId
            $customerTableQuery = "INSERT INTO tbl_customer(`customerName`, `email`, `phone`, `password`, `addressId`)
             VALUES('$name', '$email', '$phone', '$password', '$addId')";
            $customerInsert = $this->db->insert($customerTableQuery);

            if($addressInsert && $customerInsert) {
                $msg = "<span class='text-success d-block'>Account successfully created !</span>";
                return $msg;
            }else {
                $msg = "<span class='text-danger d-block'>Account could not be created. Please try again !</span>";
                return $msg;
            }
        }
    }

    // --------------------------- for loggin in existing customer
    public function customerLogin($data) {
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);

        if(empty($email) || empty($password)) {
            $msg = "<span class='text-danger d-block'>Please fill both fields</span>";
            return $msg;
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $msg = "<span class='text-danger d-block'>Please enter a correct email !</span>";
            return $msg;
        }

        // $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND `password` = md5('$password') ";
        $query = "SELECT tbl_customer.*, tbl_address.* 
                    FROM tbl_customer 
                    INNER JOIN tbl_address 
                    ON tbl_customer.addressId = tbl_address.addressId 
                    WHERE email = '$email' 
                    AND `password` = md5('$password')"; 
        $result = $this->db->select($query);
        if($result) {
            $value = $result->fetch();
            Session::set('cusLogin', true);
            Session::set('cusId', $value['clientId']);
            Session::set('cusName', $value['customerName']);
            Session::set('addId', $value['addressId']);
            echo "<script>location.href='profile.php'</script>";
        } else {
            $msg = "<span class='text-danger d-block'>Email or password not correct !</span>";
            return $msg;
        }
    }

    // --------------------------- get all customer details from two tables (tbl_customer and tbl_address)
    public function getCustomerDetails($id) {
        $query = "SELECT tbl_customer.*, tbl_address.*
         FROM tbl_customer 
         INNER JOIN tbl_address 
         ON tbl_customer.addressId = tbl_address.addressId
         WHERE clientId = '$id'";

        $result = $this->db->select($query);
        return $result;
    }


    // ---------------------------- Updating customer information from profile.php
    public function updateCustomerInfo($data, $cusId, $addId) {
        // customer table
        $name     = $this->fm->validation($data['name']);
        $phone    = $this->fm->validation($data['phone']);
        $email    = $this->fm->validation($data['email']);
        // address table
        $address  = $this->fm->validation($data['address']);
        $city     = $this->fm->validation($data['city']);
        $country  = $this->fm->validation($data['country']);
        $zip      = $this->fm->validation($data['zip']);

        if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "") {
            $msg = "<span class='text-danger d-block'>All fields must be filled !</span>";
            return $msg;
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $msg = "<span class='text-danger d-block'>Please enter a correct email !</span>";
            return $msg;
        }

        
        // 1. updating tbl_address data 
        $addressUpdateQuery = "UPDATE tbl_address SET 
                                `address`        = '$address',
                                `zip`            = '$zip',
                                `city`           = '$city',
                                `country`        = '$country'
                              WHERE addressId  = '$addId' ";
        $addressUpdate = $this->db->update($addressUpdateQuery);

        // 2. updating customer table 
        $customerUpdateQuery = "UPDATE tbl_customer SET
                                `customerName` = '$name',
                                `email` = '$email',
                                `phone` = '$phone' 
                               WHERE clientId = '$cusId' ";
        $customerUpdate = $this->db->update($customerUpdateQuery);

        if($addressUpdate && $customerUpdate) {
            $msg = "<span class='text-success d-block'>Information successfully updated !</span>";
            return $msg;
        }else {
            $msg = "<span class='text-danger d-block'>Information failed to updated. Please try again !</span>";
            return $msg;
        }
    }
}
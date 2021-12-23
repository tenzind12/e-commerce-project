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

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $msg = "<span class='text-danger d-block'>Please enter a correct email !</span>";
            return $msg;
        }

        // email already register or not
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
}
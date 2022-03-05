<?php
class Format {

    // validation of all data input from user
    public function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // shortening the text
    public function shortenText($text, $length = 400) {
        $text = substr($text, 0, $length);
        if(strlen($text) >= $length) $text = $text."...";
        return $text;   
    }

    // French phone number validation regex
    // public function validate_phone_number($phone) {
    //     $filtered_num = preg_match('/^[0-9]{10}+$/', $phone);
    //     if($filtered_num) {
    //         return $phone;
    //     }else {
    //         return false;
    //     }
    // }

    // French phone number validation regex
    public function validate_phone($phone) {
        $isValidated = preg_match('/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/', $phone);
        if($isValidated) return $phone;
        else return false;
    }
}
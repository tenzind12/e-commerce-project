<?php
class Format {
    public function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function shortenText($text, $length = 400) {
        $text = substr($text, 0, $length);
        if(strlen($text) >= $length) $text = $text."...";
        return $text;   
    }
}
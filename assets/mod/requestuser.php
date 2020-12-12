<?php
if($_COOKIE["PHPSESSID"] != ""){
    if (isset($_COOKIE["__chgn"])&&isset($_COOKIE["__efbr"])) {
        require("encryption.php");
        $password = $_COOKIE["PHPSESSID"];
        $user = encryption::decrypt($_COOKIE["__chgn"], $password);
        $pass = encryption::decrypt($_COOKIE["__efbr"], $password);
    }else{
        $user = "";
        $pass = "";
    }
}else{
    $user = "";
    $pass = "";
}
?>
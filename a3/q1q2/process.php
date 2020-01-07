<?php
// ------------------------------------------------------------------------------
// Assignment 3 Question 1 and 2
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------

// handle the submit action
if (!isset($_POST['submit']))
{
    include("signup.php");
    return;
}
else
{    
    if (!check_all())
    {
        include("signup.php");
        return;
    }
        
    $user_name = trim($_POST['user_name']);    
    if (!sign_up_user($user_name)) {
        include("signup.php");
        return;
    }
    
    echo "Sign up successfully!<br/>";
    
    session_id(md5(time().rand().$_SERVER['REMOTE_ADDR'])); 
    session_start();
    $sid = session_id();
    echo "Session started. (ID: $sid)";
}

// The password must contain at least 1 uppercase character, 1 lowercase character, 1 digit, 
// 1 special character and a minimum length of 8 characters.
function check_password($password) 
{ 
    $msg = "The password must contain at least 1 uppercase character, 1 lowercase character, 1 digit," 
           ."1 special character and a minimum length of 8 characters.";
           
    if ((strlen($password) < 8) || (preg_match_all('/[A-Z]/', $password) < 1) 
    || (preg_match_all('/[a-z]/', $password) < 1) || (preg_match_all('/[0-9]/', $password) < 1) 
    || (preg_match_all('/[~!@#$%^&*()\-_=+{};:<,.>?]/', $password) < 1)) 
    {
        $GLOBALS['err_info'] = $msg;
        return FALSE;
    }
    return TRUE;
}  

// Check all parameters in the form
function check_all()
{    
    $full_name = trim($_POST['full_name']);
    $email_addr = trim($_POST['email_addr']);
    $user_name = trim($_POST['user_name']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $agree_terms = "";
    if (isset($_POST['agree_terms']))
        $agree_terms = $_POST['agree_terms'];
    
	// var_dump($_POST);
	if ($full_name == "") {
        $GLOBALS['err_info'] = "The full name can't be empty.";
        return FALSE;
    }
    else if (!filter_var($email_addr, FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['err_info'] = "The email isn't valid.";
        return FALSE;
    } 
    else if (!stristr($email_addr, "@gmail") && !stristr($email_addr, "@hotmail")) {
        $GLOBALS['err_info'] = "The email must be from gmail or hotmail.";
        return FALSE;
    }
    else if(!preg_match("/^[a-zA-Z_][a-zA-Z\d_]*$/", $user_name)) {
        $GLOBALS['err_info'] = "The username can only contain alpha-numeric characters"
                ." and underscores (A-z, 0-9, and _ ) and can't start with a number";
        return FALSE;
    }
    else if ($password != $password2) {
        $GLOBALS['err_info'] = "The repeated password must be same as the first password.";
        return FALSE;
    }
    else if (!check_password($password)) {
        return FALSE;
    }
	else if ($agree_terms != "on") {
        $GLOBALS['err_info'] = "You must agree to the terms of User.";
        return FALSE;
    }
    return TRUE;
}

function sign_up_user($user_name)
{
    $filename = "users.txt";
    if (file_exists($filename)) {
        $lines = file($filename);
        foreach ($lines as $line_num => $line) {
            $line = trim($line);
            if ($line == $user_name) {
                $GLOBALS['err_info'] = "User <b>$user_name</b> exists already.";
                return FALSE;
            }
        }
        return TRUE;
    } else {
        $GLOBALS['err_info'] = "The file <b>$filename</b> does not exist.";
        return FALSE;
    }
}

?>

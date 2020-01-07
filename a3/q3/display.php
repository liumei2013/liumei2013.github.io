<?php
// ------------------------------------------------------------------------------
// Assignment 3 Question 3 --Display.php
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------

    session_start();
    //var_dump($_SESSION);
    $body_color = "royalblue";
    $email_color = "white";
    $email_size = "16px";
    $email_show = "visible";
    $pin_color = "white";
    $pin_size = "16px";
    $pin_show = "visible";
    $login_color = "orange";
    $login_size = "16px";
    $login_show = "visible";
    
    if (isset($_SESSION['which'])) 
    {  
        if ($_SESSION['which'] == "body") {
            if (isset($_SESSION['color'])) {
                $body_color = $_SESSION['color'];
            }
        } else if ($_SESSION['which'] == "email") {
            if (isset($_SESSION['color'])) {
                $email_color = $_SESSION['color'];
            } 
            if (isset($_SESSION['size'])) {
                $email_size = $_SESSION['size']."px";
            } 
            if (isset($_SESSION['show'])) {
                $email_show = $_SESSION['show'];
            }
        } else if ($_SESSION['which'] == "pin") {
            if (isset($_SESSION['color'])) {
                $pin_color = $_SESSION['color'];
            } 
            if (isset($_SESSION['size'])) {
                $pin_size = $_SESSION['size']."px";
            } 
            if (isset($_SESSION['show'])) {
                $pin_show = $_SESSION['show'];
            }
        } else if ($_SESSION['which'] == "login") {
            if (isset($_SESSION['color'])) {
                $login_color = $_SESSION['color'];
            } 
            if (isset($_SESSION['size'])) {
                $login_size = $_SESSION['size']."px";
            } 
            if (isset($_SESSION['show'])) {
                $login_show = $_SESSION['show'];
            }
        }
    }
    
    // for refill email input field
    $email_addr="";
    if (isset($_POST['email_addr'])) {
        $email_addr = $_POST['email_addr'];
    }
?>
<!DOCTYPE html>
<html>
<html lang="en">

<head><meta charset="utf-8"/>
<title>Question 3 Display</title>

<style type="text/css">

body {
    background-color: <?php echo $body_color; ?>;
}

table#t1 { 
	font-size:16px; 
	border-collapse:collapse;
    margin:200px auto; 
	text-align: center;
}

table#t2 {
    border-collapse:collapse;
	text-align: center;
    width: 300px;
}

h2 {
    text-align: center;
    font-style: italic;
}

td#login {
    background-color: #EEEEEE;
    border-radius:20px;
}

td#email {
    padding-top: 10px;
    width: 50%;
    border-right-style: solid;
    border-right-color: #CCCCCC;
}

#email_addr {
    background-color: <?php echo $email_color; ?>;
    font-size: <?php echo $email_size; ?>;
    visibility: <?php echo $email_show; ?>;
}

#pin {
    background-color: <?php echo $pin_color; ?>;
    font-size: <?php echo $pin_size; ?>;
    visibility: <?php echo $pin_show; ?>;
}

td#phone {
    padding-top: 10px;
}

.mytextinput { 
    font-size:16px;
    border-style:solid none solid none;
    border-color: #CCCCCC;
    border-width: 1px;
    background-color: white;
    width: 100%;
    height: 30px;
}

input#submit {
	border-radius:10px; 
	padding-top:5px;
	padding-bottom:5px;
    margin: 10px;
    width: 90%;
    background-color: <?php echo $login_color; ?>;
    font-size: <?php echo $login_size; ?>;
    visibility: <?php echo $login_show; ?>;
}

span.outside {
    color: white;
}

</style>

</head>
<body>

<form action="" method="POST">
        
<table id="t1">
<tr><td><h2><span class="outside">PayPal</span></h2></td></tr>
<tr>
    <td id="login">
    <table id="t2">
        <tr><td id="email">Email</td><td id="phone">Phone</td></tr>
        <tr><td colspan="2">
        <input id="email_addr" class="mytextinput" type="text" name="email_addr" placeholder="Email address..." value="<?php echo $email_addr; ?>"/>
        <input id="pin" class="mytextinput" type="password" name="mypin" placeholder="PIN"/>
        </td></tr>
        <tr><td colspan="2">
        <input id="submit" type="submit" name="submit" value="Log in"/><br/>
        </td></tr>
    </table>
    </td>
</tr>
<tr><td><span class="outside">New to PayPal? Sign Up</span></td></tr>
</table>

</form>
        
</body>
</html>
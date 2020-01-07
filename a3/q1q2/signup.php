<?php
// ------------------------------------------------------------------------------
// Assignment 3 Question 1 and 2
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------

if (!isset($err_info))
	$err_info = "";

$full_name = "";
if (isset($_POST['full_name']))
    $full_name = $_POST['full_name'];
    
$email_addr = "";
if (isset($_POST['email_addr']))
    $email_addr = $_POST['email_addr'];
    
$user_name = "";
if (isset($_POST['user_name']))
    $user_name = $_POST['user_name'];

?>

<!DOCTYPE html>
<html>
<html lang="en">

<head><meta charset="utf-8"/>
<title>Question 1 and 2</title>

<style type="text/css">
table { 
	font-size:16px; 
	border-collapse:collapse;
	border: 1px solid gray;
}

td#signup {
	padding-left:20px;
	padding-right:20px;
	width:400px;
}

.myinput
{ 
    font-size:16px;
	width:350px;
    border-style:none;
}

input#submit {
	font-size:18px;
	width:150px;
	border-radius:20px; 
	background-color:orange;
	padding-top:5px;
	padding-bottom:5px;
}

span#errinfo {
	font-size:15px;
	color:red;
}
</style>

</head>
<body>

<table>
<tr>
    <td>
    <img height="700px" src="http://www.concordia.ca/news/stories/2019/08/08/concordia-improves-its-international-standing-in-2-world-rankings.img.png/1565278051238.jpg"/>
    </td>
    
    <td id="signup">
        <h2>Sign Up</h2>
        <span id="errinfo"><?php echo $err_info; ?></span>
        <br/><br/>
        <form action="process.php" method="POST">
            Full Name: <br/>
            <input class="myinput" type="text" name="full_name" placeholder="Name..." value="<?php echo $full_name; ?>"/>
            <hr/>
            Email: <br/><input class="myinput" type="text" name="email_addr" placeholder="Email address..." value="<?php echo $email_addr; ?>"/>
            <hr/>
            Username: <br/>
            <input class="myinput" type="text" name="user_name" placeholder="User name..." value="<?php echo $user_name; ?>"/>
            <hr/>
            Password: <br/>
            <input class="myinput" type="password" name="password" placeholder="********"/>
            <hr/>
            Repeat Password: <br/>
            <input class="myinput" type="password" name="password2" placeholder="********"/>
            <hr/>
            <br/>
            <label><input type="checkbox" name="agree_terms" />I agree to the <b>Terms of User</b></label>
            <br/>
            <br/>
            <input id="submit" type="submit" name="submit" value="Sign Up"/>&nbsp;&nbsp;&nbsp;&nbsp;Sign in ->
        </form>
    </td>
</tr>
</table>

</body>
</html>
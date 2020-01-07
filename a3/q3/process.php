<?php
// ------------------------------------------------------------------------------
// Assignment 3 Question 3 --Process.php
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------

    // Some default values
    $footer = "";
    $opt_body = "";
    $opt_email = "";
    $opt_pin = "";
    $opt_login = "";
    $color = "#000080";
    $size = 16;
    $show = "checked";
    
    if (!isset($_POST['submit'])) {
        if (isset($_SESSION['which'])) {
        	session_destroy();
        }
        $footer = "Please press <Apply> after style was modified.";
    } else {
        // Save values to session
        session_start();
        $_SESSION['which'] = $_POST['which'];
        $_SESSION['color'] = $_POST['color'];
        $_SESSION['size'] = $_POST['size'];
        
        $select = $_POST['which'];
        if ($select == "email") 
            $opt_email = "selected";
        else if ($select == "pin") 
            $opt_pin = "selected";
        else if ($select == "login") 
            $opt_login = "selected";
        else 
            $opt_body = "selected";
        
        $color = $_POST['color'];
        $size = $_POST['size'];
        
        $_SESSION['show'] = "visible";
        if (!isset($_POST['show']) || $_POST['show'] != "on") {
            $show = "unchecked";
            $_SESSION['show'] = "hidden";
        }
        $footer = "Style applied.<br/>Please open display page.";
    }
    //var_dump($_POST);
    //echo "<br/>";
    //var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<html lang="en">

<head><meta charset="utf-8"/>
<title>Question 3 Process</title>

<style type="text/css">

body {
    background-color: lightyellow;
}

table#t1 { 
	font-size:16px; 
	border-collapse:collapse;
    margin:200px auto 10px auto; 
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

td.col1 {
    padding-top: 10px;
    width: 40%;
    text-align: right;
}

td.col2 {
    padding-top: 10px;
    padding-left: 10px;
    text-align: left;
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
	font-size:18px;
	border-radius:10px; 
	background-color:gray;
	padding-top:5px;
	padding-bottom:5px;
    margin: 10px;
    width: 90%;
}

span.outside {
    color: black;
}

</style>

</head>
<body>

<form action="" method="POST">
        
<table id="t1">
<tr><td><h2><span class="outside">Process</span></h2></td></tr>
<tr>
    <td id="login">
    <table id="t2">    
        <tr><td class="col1">Select</td>
        <td class="col2">
            <select name="which">
              <option value="body"  <?php echo $opt_body; ?> >Background</option>
              <option value="email" <?php echo $opt_email; ?> >Email</option>
              <option value="pin"   <?php echo $opt_pin; ?> >PIN</option>
              <option value="login" <?php echo $opt_login; ?> >Login</option>
            </select>
        </td>
        <tr><td class="col1">Color</td>
        <td class="col2"><input type="color" name="color" value="<?php echo $color; ?>"/></td>
        <tr><td class="col1">Size</td>
        <td class="col2"><input type="range" name="size" min="3" max="30" value="<?php echo $size; ?>"/></td>
        <tr><td class="col1">Visiblity</td>
        <td class="col2"><input type="checkbox" name="show" <?php echo $show; ?> /> 
        </td></tr>
        <tr><td colspan="2">
        <input id="submit" type="submit" name="submit" value="Apply"/><br/>
        </td></tr>
    </table>
    </td>
</tr>
<tr><td><span class="outside">
    <?php echo $footer; ?>
</span></td></tr>
</table>

</form>
        
</body>
</html>
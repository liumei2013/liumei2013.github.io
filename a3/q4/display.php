<?php
// ------------------------------------------------------------------------------
// Assignment 3 Question 4 --Display.php
// Written by: Mei Liu 40060940
// For SOEN 287 Section CC 2191 – Summer 2019
// -----------------------------------------------------------------------------
?>

<html>
<html lang="en">

<head>
<meta charset="utf-8"/>
<meta http-equiv="refresh" content="1">
<title>Question 4</title>
</head>
<body style="font-size:24px;">

<?php

if (isset($_COOKIE["expiry"])) 
{
    $expiry = $_COOKIE["expiry"];
    $counter = $_COOKIE["counter"];
    // echo "Increase counter from $counter";
    $counter = $counter + 1;
    // echo " to $counter<br/>";
    setcookie("counter", $counter);
    echo "The page was visited $counter times.<br/>";
    $left = $expiry - time();
    echo "Cookie will expire after $left seconds.<br/>";
}
else
{
    if (isset($_COOKIE["counter"])) {
        setcookie("counter", '');
        echo "The cookies have been deleted.<br/>";
        $counter = 0;
    }
    else {
        $counter = 1;
        echo "The page was first visited.<br/>";
    }
    // echo "Initilize counter to $counter<br/>";
    setcookie("counter", $counter);
    setcookie("expiry", time() + 60, time() + 60);
}

?>

</body>
</html>

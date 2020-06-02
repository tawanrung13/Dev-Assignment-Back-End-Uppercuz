<?php

function check_phone_number($number)
{

    /*
        pattern for phone number 
        ref. http://oknation.nationtv.tv/blog/Pasakorn/2010/11/04/entry-1
        0 x xxx xxxx    +66 x xxx xxxx
        0xx-xxx-xxxx    +66xx-xxx-xxxx

        0 xx xx xxxx    +66 xx xx xxxx
        0x xxxx xxxx    +66x xxxx xxxx

        0xxxxxxxxx      +66xxxxxxxxx
        0xxxxxxxx       +66xxxxxxxx
        0xx-xxx-xxx     +66xx-xxx-xxx
*/
    // $pattern = "/^(0|[+](66))(\d{9}|\d{8}|\d{2}(\s|[-])\d{3}(\s|[-])\d{3}|((\s|[-])+\d+\d(\s|[-])\d{3}|\d+(\s|[-])+\d{2}(\s|[-])+\d{2}|\d{2}(\s|[-])+\d{3})(\s|[-])+\d{4})$/";
    $pattern = "/^(0|[+](66))((\s|[-])+\d(\s|[-])+\d{3}(\s|[-])+\d{4}|\d{2}(\s|[-])+\d{3}(\s|[-])+\d{4}|(\s|[-])+\d{2}(\s|[-])+\d{2}(\s|[-])+\d{4}|\d(\s|[-])+\d{4}(\s|[-])+\d{4}|\d{8}|\d{9}|\d{2}(\s|[-])+\d{3}(\s|[-])+\d{3})$/";
    if (preg_match($pattern, $number, $match)) {
        echo "This is phone number";
    } else {
        echo "This isn't phone number";
    }
}

if (isset($_GET["text"]) && $_GET["text"] != "")
    check_phone_number($_GET["text"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <form method="GET">
        <p>Enter your phone number</p>
        <input type="text" name="text">
        <input type="submit">
    </form>

</body>

</html>
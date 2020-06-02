<?php


function check_text_lowercase($text)
{
    if (ctype_lower($text)) {
        echo "Text is lowercase";
    } else {
        echo "Text isn't lowercase";
    }
}

if (isset($_GET["text"]) && $_GET["text"] != "")
    check_text_lowercase($_GET["text"]);
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
    <p>Intput some text</p>
        <input type="text" name="text">
        <input type="submit">
    </form>

</body>

</html>
<?php

include_once 'autoload.php';

$aElements = json_decode(file_get_contents('data.json'), true);

$oFactory = ElementFactory::getInstance($aElements['type'], $aElements['payload'], $aElements['children'], $aElements['parameters']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Test work</title>
</head>
<body>
    <?=$oFactory->getHTMLContent();?>
</body>
</html>

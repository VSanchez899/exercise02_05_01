<!DOCTYPE html>
<html lang="en">
<head>
<!--
    Author: Vincent Sanchez
    Date: 10.17.18
    File name: ViewFile2.php
-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>View File</h2>
    <?php
    $dir = "../exercise02_01_01";
    $dirEntries = scandir($dir);

    
    foreach($dirEntries as $entry){
        if (strcmp($entry, '.') !== 0 && strcmp($entry,'..') !== 0) {
            echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
        }
    }
    ?>
</body>
</html>
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
//this creates a table that organizes the files that it pulls and tell the file information requested
    echo "<table border='1' width='100%'>";
    echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "<storng></th></tr>\n";
    echo "<tr>";
    echo "<th><strong><em>name</em></strong></th>";
    echo "<th><strong><em>owner</em></strong></th>";
    echo "<th><strong><em>permissions</em></strong></th>";
    echo "<th><strong><em>Size</em></strong></th>";
    echo "</tr<\n";
    //this is the fill path it must use in order to grap the folder needed
    foreach($dirEntries as $entry){
        if (strcmp($entry, '.') !== 0 && strcmp($entry,'..') !== 0) {
            $fullEntryName = $dir . "/" . $entry;
            echo "<tr><td>";
            if (is_file($fullEntryName)) {
                //this creates hyperlink to the file that the interpreter finds
                echo "<a href=\"FileDownloader.php?fileName=$entry\">" . htmlentities($entry) . "</a><br>\n";
            }
            else {
                echo htmlentities($entry);
            }
            //this tells the file size and keeps the file centered
            echo "</td><td align='center'>" . fileowner($fullEntryName);
            if (is_file($fullEntryName)) {
                $perms = fileperms($fullEntryName);
                $perms = decoct($perms % 01000);
                echo "</td><td align='center'>0$perms";
                echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
            }
            else {
                echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
            }
            
            echo "</td></tr>";
        }
    }
    echo "</table>"
    ?>
</body>
</html>
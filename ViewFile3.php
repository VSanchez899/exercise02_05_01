<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>View File</h2>
    <?php
    $dir = "../exercise02_01_01";
    $dirEntries = scandir($dir);

    echo "<table border='1' width='100%'";
    echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "<storng></th></tr>\n";
    echo "<tr>";
    echo "<th><strong><em>name</em></strong></th>";
    echo "<th><strong><em>owner</em></strong></th>";
    echo "<th><strong><em>permissions</em></strong></th>";
    echo "<th><strong><em>Siza</em></strong></th>";
    echo "</tr<\n";
    foreach($dirEntries as $entry){
        if (strcmp($entry, '.') !== 0 && strcmp($entry,'..') !== 0) {
            $fullEntryName = $dir . "/" . $entry;
            echo "<tr><td>";
            if (is_file($fullEntryName)) {
                echo "<a href=\"$fullEntryName\">$entry</a><br>\n";
            }
            else {
                echo htmlentities($entry);
            }
            if (is_file($fullEntryName)) {
                $perms = fileperms($fullEntryName);
                $perms = decoct($perms % 01000);
                echo "</td><td align='center'>0$perms";
                echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
            }
            
            echo "</td></tr>";
        }
    }
    echo "</table>"
    ?>
</body>
</html>
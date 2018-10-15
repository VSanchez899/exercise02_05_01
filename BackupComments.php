<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $source = "./comments";
    $destination = "./backups";
    if (!is_dir($destination)) {
        mkdir($destination);
        chmod($destination, 0757);
    }
    if (is_dir($source)) {
        $totalFiles = 0;
        $filesCopied = 0;
        $dirEntries = scandir($source);
        foreach ($dirEntries as $entry) {
            if ($entry !== "." && $entry !== "..") {
                ++$totalFiles;
                if (copy("$source/$entry", "$destination/$entry")) {
                    ++$filesCopied;
                } else {
                    echo "Could not copy file \"".htmlentities($entry) . "\".<br>\n";
                    echo "The source directory  \"$source\" does not exist, nothing to backup.\n";
                }
                
            }
        }
    }else {
        echo "The source directory \"$source\" does not exist, nothing to backup\n"; 
    }
    
    ?>
</body>
</html>
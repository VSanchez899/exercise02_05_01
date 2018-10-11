<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitior Feedback</title>
</head>
<body>
<h2>Visitior Feedback</h2>
    <?php
    $dir = "./comments";
    if (is_dir($dir)) {
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName) {
            if ($fileName !== "." && $fileName !== "..") {
                echo "From <strong>$fileName<strong><br>";
                echo "<pre>\n";
                $comments = file_get_contents($dir . "/" . $fileName);
                echo "</pre>\n";
                echo "<hr>\n";
            }
        }
    } else {
        echo "Folder \"$dir\" does not exist.<br>\n";
    }
    
    ?>
    
</body>
</html>
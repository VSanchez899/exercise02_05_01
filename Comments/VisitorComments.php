<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Comments</title>
</head>
<body>

    <?php
    $dir = "./comments";
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['name'])) {
                echo "Unknown visitor\n";
            } else {
                $saveString = stripslashes($_POST['name']) . "\n";
                $saveString .= stripslashes($_POST['email']) . "\n";
                $saveString .= date('r') . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                echo "\$saveString: $saveString<br>";
                $currentTime = microtime();
                echo "\$currentTime: $currentTime<br>";
                $timeArray = explode(" ", $currentTime  );
                echo var_dump($timeArray) . "<br>";
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                echo "\$timeStamp: $timeStamp<br>";
                $saveFileName = "$dir/comment.$timeStamp.txt";
                echo "\$saveFileName: $saveFileName<br>";
                if (file_put_contents($saveFileName, $saveString) > 0) {
                    echo "File \"" . htmlentities($saveFileName) . "\"successfully saved<br>\n";
                } else {
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
                
            }
            
        }
        
    } else {
        mkdir($dir);
        chmod($dir, 0757);
    }
    
    ?>
    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="post">
        Your Name: <input type="text" name="name"><br>
        Your Email: <input type="email" name="email"><br>
        <textarea name="comment" cols="100" rows="6"></textarea><br>
        <input type="submit" name="save" value="Submit your comment">
    </form>
</body>
</html>
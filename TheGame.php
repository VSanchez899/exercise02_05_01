<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Registration</title>
    <link rel="stylesheet" href="game.css">
</head>
<body>
<h2>Registration</h2>
        <form action="TheGame.php" method="post"><br>
        <p style=text-align='center'>
        Username: <input type="text" name="Uname" required><br>
        password: <input type="text" name="pass" required><br>
        Screen Name: <input type="text" name="Sname" required><br>
        Your full name: <input type="text" name="name" required><br>
        Your Email: <input type="text" name="email" required><br>
        Your Age : <input type="select" name="age" min="13" max="85" required>Must Be 13 or above<br>
        <textarea name="comment" cols="100" rows="6"></textarea><br>
        <input type="submit" name="submit" value="Submit Your Comment"><br>
        </p>
        </form>
    <?php
         $dir = "./TheGamers.txt";
         if (is_dir($dir)) {
             if (isset($_POST['submit'])) {
                 
                     $gameString = stripslashes($_POST['Uname']) . "\n";
                     $gameString .= stripslashes($_POST['pass']) . "\n";
                     $gameString .= stripslashes($_POST['name']) . "\n";
                     $gameString .= stripslashes($_POST['Sname']) . "\n";
                     $gameString .= stripslashes($_POST['email']) . "\n";
                     $gameString .= stripslashes($_POST['age']) . "\n";
                     $gameString .= stripslashes($_POST['comment']) . "\n";
                     echo "\$gameSting: $gameString<br>";
                     $saveFileName = "$dir/TheGame.txt";
                     echo "\$saveFileName: $saveFileName<br>";
                     if (file_put_contents($saveFileName, $gameString) > 0) {
                         echo "Name \"" . htmlentities($saveFileName) . "\"successfully saved<br>\n";
                     } else {
                         echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                     }
                    }
        }else {
             mkdir($dir);
             chmod($dir, 0757);
        }
         
    ?>
</body>
</html>
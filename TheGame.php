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
        <h3 style="color: white; text-align: center; border: 2px solid red; background-color: black;">Leaderboard</h3>
    <?php
         $dir = "./TheGamers.txt";
         if (is_dir($dir)) {
             if (isset($_POST['submit'])) {
                 //this takes the information from the form and writes it into a text file that was chosen
                     $gameString = stripslashes($_POST['Uname']) . " Username" . "\n";
                     $gameString .= stripslashes($_POST['pass']) . " Password" . "\n";
                     $gameString .= stripslashes($_POST['name']) . " Full name" . "\n";
                     $gameString .= stripslashes($_POST['Sname']) ." Screenname" . "\n";
                     $gameString .= stripslashes($_POST['email']) . " Email" . "\n";
                     $gameString .= stripslashes($_POST['age']) . " Age" . "\n";
                     $gameString .= stripslashes($_POST['comment']) . " Comment" . "\n";
                     $saveFileName = "$dir/TheGame.txt";
                     $Sname = $_POST['Sname'];
                     if (file_put_contents($saveFileName, $gameString) > 0) {
                         echo "<p>Info was successfully saved<br><p>\n";
                         echo "<p>$Sname";
                     } else {
                         echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                     }
                    }
        }else {
             mkdir($dir);
             //this changes the mode of the server to allow certain permissions like writing or creating a file on a server
             chmod($dir, 0757);
        }
         
    ?>
</body>
</html>
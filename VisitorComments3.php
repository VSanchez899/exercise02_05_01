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
    <title>Visitior Feedback</title>
</head>
<body>
<h2>Visitor Comments 3</h2>
    <?php
        $dir = "./comments";
        if(is_dir($dir)){
            if(isset($_POST['submit'])){
                if(empty($_POST['name'])){
                    echo "<h2 style='color: red;'>Unkown Visitor</h2><br>\n";
                }
                else{
                    //this writes a file that pulls all of the information from the form
                    $saveString = stripcslashes($_POST['name']). "\n";
                    $saveString .= stripcslashes($_POST['email']). "\n";
                    $saveString .= date('r') . "\n";
                    $saveString .= stripcslashes($_POST['comment']). "\n";
                    echo "\$saveString: $saveString<br>";
                    $currentTime = microtime();
                    echo "\$currentTime: $currentTime<br>";
                    $timeArray = explode(" ", $currentTime);
                    echo var_dump($timeArray) . "<br>";
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    echo "\$timeStamp: $timeStamp<br>";
                    $saveFileName = "$dir/Comment.$timeStamp.txt";
                    echo "\$saveFileName: $saveFileName<br>";
                    $fileHandle = fopen($saveFileName, "wb");
                    if($fileHandle === false){
                        echo "There was an error creating \"". htmlentities($saveFileName). "\". <br>\n";
                    }
                    else{
                        if(flock($fileHandle, LOCK_EX)){//
                            if(fwrite($fileHandle, $saveString) > 0){
                                echo "Successfully wrote to \"". htmlentities($saveFileName). "\". <br>\n";
                                
                            }
                            else{
                                echo "there was an error writing \"". htmlentities($saveFileName). "\".<br>\n";
                            }
                            if(file_put_contents($saveFileName, $saveString) > 0){
                                echo "File \"". htmlentities($saveFileName). "\"successfully saved.<br>\n";
                            }
                            else{
                                echo "There was an error creating \"". htmlentities($saveFileName). "\". <br>\n";
                                
                            }
                            flock($fileHandle, LOCK_UN);
                        }
                        else{//
                            echo "There was an error locking \"". htmlentities($saveFileName). "\". <br>\n";
                        }
                        fclose($fileHandle);
                    }
                }
            }
        }
        else{
            mkdir($dir);
            chmod($dir, 0757);
        }
    ?>
    <form action="VisitorComments3.php" method="post"><br>
    Your Name: <input type="text" name="name"><br>
    Your Email: <input type="text" name="email"><br>
    <textarea name="comment" cols="100" rows="6"></textarea><br>
    <input type="submit" name="submit" value="SUbmit Your Comment"><br>
    </form>
</body>
</html>
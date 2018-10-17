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
<h2>Visitor Feedback 3</h2>
    <?php
    //this uses a alternative way to get files and read them using fgets
        $dir = "./comments";
        if(is_dir($dir)){
            $commentFiles = scandir($dir);
            foreach($commentFiles as $fileName){
                if($fileName !== "." && $fileName !== ".."){
                    echo "In file <strong>$fileName</strong><br>";
                    $fileHandle = fopen($dir . "/" . $fileName, "rb");
                    if ($fileHandle === false) {
                        echo "There was an error reading file \"$fileName\".<br>\n";
                    } else {
                        $from = fgets($fileHandle);
                        echo "From: ". htmlentities($from). "<br>\n";
                        $email = fgets($fileHandle);
                        echo "Email address: ". htmlentities($email). "<br>\n";
                        $date = fgets($fileHandle);
                        echo "Date: ". htmlentities($date). "<br>\n";
                        $comment = "";
                        while (!feof($fileHandle)) {
                            $comment = fgets($fileHandle);
                            echo htmlentities($comment). "<br>\n";    
                        }
                        echo "<hr>\n";
                        fclose($fileHandle);
                    }
                    

                    
                    
                        
                    
                    
                }
            }
        }
        else{
           echo "Folder \"$dir\" does not exist.<br>\n";
        }
    ?>
</body>
</html>
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
<h2>Visitor Feedback 2</h2>
    <?php
        $dir = "./comments";
        if(is_dir($dir)){
            $commentFiles = scandir($dir);
            foreach($commentFiles as $fileName){
                if($fileName !== "." && $fileName !== ".."){
                    echo "From <strong>$fileName</strong><br>";
                    echo "<pre>\n";
                    readfile($dir. "/". $fileName);
                    echo "</pre>\n";
                    echo "<hr>";
                }
            }
        }
        else{
           echo "Folder \"$dir\" does not exist.<br>\n";
        }
    ?>
    
</body>
</html>
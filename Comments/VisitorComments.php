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
        
    } else {
        mkdir($dir);
        chmod($dir, 0666);
    }
    
    ?>
    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="post">
        Your Name: <input type="text" name="name"><br>
        Your Email: <input type="email" name="email"><br>
        <textarea name="comment" cols="100" rows="6"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment">
    </form>
</body>
</html>
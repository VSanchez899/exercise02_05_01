<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download error</title>
</head>
<body>
<h2>View File</h2>

    <?php
    $dir = "../exercise02_01_01";
    if (isset($_GET['fileName'])) {
        $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
        if (is_readable($fileToGet)) {
            $errorMsg = "";
            $showErrorPage = true;
        }else {
            $errorMsg = "Cannot read \"$fileToGet\"";
            $showErrorPage = true;
        }
    } else {
        $errorMsg = "No filename Specified";
        $showErrorPage = true;
    }
    if ($showErrorPage) {
    ?>
    <p>There was a error downloading "<?php echo htmlentities($_GET['fileName']);?>" </p>
    <p><?php echo htmlentities($errorMsg); ?></p>
    <?php
    }
    
    ?>
</body>
</html>
<?php?>
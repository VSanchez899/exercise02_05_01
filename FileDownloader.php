<?php
    $dir = "../exercise02_01_01";
    if (isset($_GET['fileName'])) {
        $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
        if (is_readable($fileToGet)) {
            header("Content-Description: File transfer");
            header("Content-Type: application/force-download");
            header("Content-Dispostition: attachment; filename=\"". $_GET[fileName] . "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " . filesize($fileToGet));
            readfile($fileToGet);
            $errorMsg = "";
            $showErrorPage = false;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download error</title>
</head>
<body>

    
    <p>There was a error downloading <?php echo htmlentities($_GET['fileName']);?> </p>
    <p><?php echo htmlentities($errorMsg); ?></p>
    </body>
</html>
    <?php
    }
    ?>  
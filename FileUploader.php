<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>
</head>
<body>
<h2>File uploader</h2>
    <?php
    $dir = ".";
    if (isset($_POST['upload'])) {
        if (isset($_FILES['newFile'])) {
            // if (isset($_FILES['oldFile'])) {
                if (move_uploaded_file($_FILES['newFile']['tmp_name'], $dir . "/" . $_FILES['newFile']['name']) === true) {
                    // chmod($dir . "/" . $_FILES['newFile']['name'], 0644);
                    echo "File \"" . htmlentities($_FILES['newFile']['name']) . "\"successfully uploaded.<br>\n";
                }
            }else {
                echo "There was an error uploading \"" . htmlentities($_FILES['newFile']['name']) . "\".<br>\n";
            }
        }
    ?>
    <form action="FileUploader.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="25000">
        file to upload:
        <input type="file" name="newFile"><br>(25,000byte limit)<br>
        <input type="submit" name="upload" value="Upload the File"><br>
    </form>
</body>
</html>
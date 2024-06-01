<?php
if(isset($_POST['submit'])){
    $target_dir = "uploads/"; // Directory where the files will be stored
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Path of the uploaded file
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (500KB limit)
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large (max 500KB).";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedExtensions = array("pdf", "doc", "docx");
    if(!in_array($imageFileType, $allowedExtensions)) {
        echo "Sorry, only PDF, DOC, DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select file to upload (max 500KB):
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>

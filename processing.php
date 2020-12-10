<?php 
require("includes/header.php"); 

if(!isset($_POST["uploadButton"])) {
    echo "No file sent to page.";
    exit();
}


// 1) 업로드 데이터 생성
$videoUploadData = new VideoUploadData(
    // $_POST["name"],
    $_POST["fileInput"],
    $_POST["titleInput"],
    $_POST["descriptionInput"],
    $_POST["privacyInput"],
    $_POST["categoryInput"],
    "REPLACE-THIS"
);

// 2) 비디오 데이터 업로드

// 3) 업로드가 제대로 되었는지 확인

?>


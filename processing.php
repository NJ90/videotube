<?php 
require_once("includes/header.php");
require_once("includes/classes/VideoUploadData.php");
require_once("includes/classes/VideoProcessor.php");

if(!isset($_POST["uploadButton"])) {
    echo "No file sent to page.";
    exit();
}

// 1) 업로드 데이터 생성
$videoUpoadData = new VideoUploadData(
    $_FILES["fileInput"], 
    $_POST["titleInput"],
    $_POST["descriptionInput"],
    $_POST["privacyInput"],
    $_POST["categoryInput"],
    "REPLACE-THIS"
);

// 2) 비디오 데이터 업로드
$videoProcessor = new VideoProcessor($con);
$wasSuccessful = $videoProcessor->upload($videoUpoadData);

// 3) 업로드가 제대로 되었는지 확인

?>


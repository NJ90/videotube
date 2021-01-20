<?php
class VideoProcessor{
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    public function upload($videoUploadData){

        $targetDir = "uploads/videos/";
        $videoData = $videoUploadData->videoDataArray;

        // mp4로 컨버트 되기 전 파일 패스 저장
        $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);
        // uploads/videos/uniqid filename

        $tempFilePath = str_replace(" ", "_", $tempFilePath);

        echo $tempFilePath;

    }
}
?>
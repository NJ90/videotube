<?php
class VideoProcessor{
    private $con;
    private $sizeLimit = 500000000;

    public function __construct($con){
        $this->con = $con;
    }

    public function upload($videoUploadData){

        $targetDir = "uploads/videos/";
        $videoData = $videoUploadData->videoDataArray;

        // mp4로 컨버트 되기 전 파일 패스 저장
        // $tempFilePath = $targetDir . uniqid(); //아이디 출력 테스트
        $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);
            // uploads/videos/uniqid filename

            //파일 패스 형태 변환
            $tempFilePath = str_replace(" ", "_", $tempFilePath);

        $isValidData = $this->processData($videoData, $tempFilePath);

        echo $tempFilePath;

    }

    private function processData($videoData, $filePath) {
        $videoType = pathInfo($filePath, PATHINFO_EXTENSION);

        // file-size 제한
        if($this->isValidSize($videoData)){
            echo "File too large. Cant't be more than " . $this->sizeLimit . "bytes";
            return false;
        }
    }

    private function isValidSize($data){
        return $data["size"] <= $this->sizeLimit;
    }
}
?>
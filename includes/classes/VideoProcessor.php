<?php
class VideoProcessor{
    private $con;
    private $sizeLimit = 500000000;
    private $allowedTypes = array("mp4", "flv", "webm", "mkv", "vob", "ogv", "ogg", "avi", "wmv", "mov", "mpeg", "mpg");
    private $ffmpegPath = "ffmpeg/bin/ffmpeg";

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

            // echo $tempFilePath;

            if(!$isValidData){
                return false;
            }

            // 파일을 upload(temp 위치)폴더로 옮기기 (권한 없음 에러 = 폴더에 읽기 쓰기 권한 주기)
            // if(move_uploaded_file($videoData["tmp_name"], $tempFilePath)){
            //     echo "File moved successfully";
            // }

            // 파일을 final path로 옮기기 (가장 보편적으로 지원되는 mp4 형식만 저장)
            if(move_uploaded_file($videoData["tmp_name"], $tempFilePath)){
                $finalFilePath = $targetDir . uniqid() . ".mp4";

                if(!$this->insertVideoData($videoUploadData, $finalFilePath)){
                    echo "Insert query failed";
                    return false;
                }
                // 파일 업로드 실패했을 때 알럿
                if(!$this->convertVideoToMp4($tempFilePath, $finalFilePath)){
                    echo "Upload failed";
                    return false;
                }

                // tempfile 삭제 실패했을 때 알럿
                if(!$this->deleteFile($tempFilePath)){
                    echo "Upload failed";
                    return false;
                }
            }
    }
    

    private function processData($videoData, $filePath) {
        $videoType = pathInfo($filePath, PATHINFO_EXTENSION);

        // file-size 제한 메세지
        if(!$this->isValidSize($videoData)){
            echo "File too large. Cant't be more than " . $this->sizeLimit . "bytes";
            return false;
        }
        // file-type 제한 메세지
        else if(!$this->isValidType($videoType)) {
            echo "Invalid file type";
            return false;
        }
        // error 컨트롤
        else if($this->hasError($videoData)){
            echo "Error code: " . $videoData["error"];
            return false;
        }

        return true;
    }

    private function isValidSize($data){
        return $data["size"] <= $this->sizeLimit;
    }

    //file-type 제한
    private function isValidType($type){
        $lowercased = strtolower($type);
        return in_array($lowercased, $this->allowedTypes);
    }  

    // error 컨트롤
    private function hasError($data){
        return $data["error"] != 0;
    }

    // final path
    // phpMyAdmin DB에서 INT 항목에는(privacy, category, views) 기본값 부분에 0을 넣어준다.
    private function insertVideoData($uploadData, $filePath) {
        $query = $this->con->prepare("INSERT INTO videos(title, uploadedBy, description, privacy, category, filePath)
                                        VALUES(:title, :uploadedBy, :description, :privacy, :category, :filePath)");
                                        //VALUES name은 admin에 있는 콜럼 네임과 반드시 똑같아야 한다.
        $query->bindParam(":title", $uploadData->title);
        $query->bindParam(":uploadedBy", $uploadData->uploadedBy);
        $query->bindParam(":description", $uploadData->description);
        $query->bindParam(":privacy", $uploadData->privacy);
        $query->bindParam(":category", $uploadData->category);
        $query->bindParam(":filePath", $filePath);

        return $query->execute();
    }

    // 37. Converting the video to MP4 server side
    public function convertVideoToMp4($tempFilePath, $finalFilePath){
        $cmd = "$this->ffmpegPath -i $tempFilePath $finalFilePath 2>&1";

        $outputLog = array();
        exec($cmd, $outputLog, $returnCode);

        if($returnCode != 0)
            //command failed
            foreach($outputLog as $line){
                echo $line . "<br>";
            }
            return false;
    }

    //temp file 삭제
    private function deleteFile($filePath){
        if(!unlink($filePath)){
            echo "Could not delete file\n";
            return false;
        }
        return false;
    }
}
?>
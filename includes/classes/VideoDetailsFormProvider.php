<?php
    class VideoDetailsFormProvider{

      private $con;

      public function __construct($con){
        // phpmyadmin에서 카테고리 가져오기 부분, 
        // 변수 $con($query = $con -> prepare("SELECT * FROM `categories`");)을 function에 전달하기 위함
        $this->con = $con;
      }

        public function createUploadForm(){
            $fileInput = $this -> createFileInput();
            $titleInput = $this -> createTitleInput();
            $descriptionInput = $this -> createDescriptionInput();
            $selectPrivacy = $this -> createPrivacyInput();
            // $submitAction = $this -> submitButton();
            $categoriesInput = $this -> createCategoriesInput();
            $uploadButton = $this -> createUploadButton();

            return "<form action='processing.php' method='POST'>
                $fileInput
                $titleInput
                $descriptionInput
                $selectPrivacy
                $categoriesInput
                $uploadButton
            </form>";
        }

        private function createFileInput(){
            return "<div class='form-group'>
                        <label for='exampleFormControlFile' class='d-flex align-items-baseline'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/>
                        <path fill-rule='evenodd' d='M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z'/>
                      </svg>
                        File Input
                        </label>
                        <input type='file' class='form-control-file' id='exampleFormControlFile' required>
                    </div>";
        }

        private function createTitleInput(){
            return "<div class='form-group'>
                        <label for='titleInput' class='d-flex align-items-baseline mt-3'>
                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                              <path fill-rule='evenodd' d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/>
                              <path fill-rule='evenodd' d='M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z'/>
                            </svg>
                        Title
                        </label>
                        <input class='form-control' id='titleInput' type='text' placeholder='Title' name='titleInput';>
                    </div>";
        }

        private function createDescriptionInput(){
            return "<div class='form-group'>
                        <label for='descriptionInput' class='d-flex align-items-baseline mt-3'>
                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                              <path fill-rule='evenodd' d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/>
                              <path fill-rule='evenodd' d='M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z'/>
                            </svg>
                        Description
                        </label>
                        <textarea class='form-control' id='descriptionInput' placeholder='Description' name='descriptionInput' rows='3';></textarea>
                    </div>";
        }

        private function createPrivacyInput(){
            return "  <div class='form-group'>
                        <label for='exampleFormControlSelect1'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                          <path fill-rule='evenodd' d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/>
                          <path fill-rule='evenodd' d='M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z'/>
                        </svg>
                        Select Private
                        </label>
                        <select class='form-control' id='privacyInput' name='privacyInput'>
                          <option value='0'>public</option>
                          <option value='1'>private</option>
                        </select>
                      </div>";
        }

        // private function submitButton(){
        //     return "<button type='submit' class='btn btn-light'>Submit</button>";
        // }

        private function createCategoriesInput(){
            // phpmyadmin에서 카테고리 가져오기
            $query = $this->con->prepare("SELECT * FROM `categories`");
            $query->execute();

            $html = "<div class='form-group'>
                    <label for='exampleFormControlSelect1'>
                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                      <path fill-rule='evenodd' d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/>
                      <path fill-rule='evenodd' d='M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z'/>
                    </svg>
                    Select Categories
                    </label>
                      <select class='form-control' name='categoryInput'>";

            // phpmyadmin > categories > NAME 속성 가져오기
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                // echo $row["NAME"] . "<br/>";

                $id = $row["ID"];
                $name = $row["NAME"];

                $html .= "<option value='$id'>$name</option>";
            }

            $html .= "</select>
            </div>";

            return $html;
        }

        private function createUploadButton(){
          return "<button type='submit' class='btn btn-primary' name='uploadButton'>Upload</button>";
        }

    }
?>
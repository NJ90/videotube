<?php
    class VideoDetailsFormProvider{

        public function createUploadForm()
        {
            $fileInput = $this -> createFileInput();
            $titleInput = $this -> createTitleInput();
            $descriptionInput = $this -> createDescriptionInput();
            $selectPrivacy = $this -> selectPrivacyInput();
            $submitAction = $this -> submitButton();

            return "<form action='procecssing.php' method='POST'>
                $fileInput
                $titleInput
                $descriptionInput
                $selectPrivacy
                $submitAction
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

        private function selectPrivacyInput(){
            return "  <div class='form-group'>
            <label for='exampleFormControlSelect1'>
            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
              <path fill-rule='evenodd' d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/>
              <path fill-rule='evenodd' d='M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z'/>
            </svg>
            Select Private
            </label>
            <select class='form-control' id='exampleFormControlSelect1'>
              <option>public</option>
              <option>private</option>
            </select>
          </div>";
        }

        private function submitButton(){
            return "<button type='submit' class='btn btn-light'>Submit</button>";
        }
    }
?>
<?php 
    require("includes/header.php"); 
    require_once("includes/classes/VideoDetailsFormProvider.php");
    ?>

<!-- 본문 시작 -->
<div class="section resize">
    <div class="section-main column bg-white">
        <?php
            $formProvider = new VideoDetailsFormProvider();
            echo $formProvider -> createUploadForm();

            $query = $con -> prepare("SELECT * FROM `categories`");
            $query->execute();
        ?>
    </div>
</div>
<!-- 본문 끝 -->
<?php require("includes/footer.php"); ?>
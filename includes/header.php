<?php require_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>VideoTube</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link rel="stylesheet" href="./assets/css/reset.css"/>

    <script type="text/javascript" src="./assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="./assets/js/common.js"></script>
</head>
<body>
    <div id="container-wrap">
        <!-- header 시작 -->
        <div id="header">
            <button class="main-menu">
                <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>            
            </button>
            <div class="logo">
                <a href="index.php" class="d-flex align-items-center">
                    <img src="./assets/images/mainlogo.png" alt="로고" width="100px">
                </a>
            </div>
            <div class="header-search-wrap">
                <form action="search.php">
                    <input type="text" placeholder="search">
                    <button  type="button" data-toggle="tooltip" data-placement="bottom" title="검색">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="#888" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </button>
                </form>
            </div>
            <div class="header-right d-flex  justify-content-end">
                <ul class="right-menu d-flex">
                    <li class="mr-4">
                        <a href="upload.php">
                            <span class="sr-only">업로드</span>
                            <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-upload" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8zM5 4.854a.5.5 0 0 0 .707 0L8 2.56l2.293 2.293A.5.5 0 1 0 11 4.146L8.354 1.5a.5.5 0 0 0-.708 0L5 4.146a.5.5 0 0 0 0 .708z"/>
                              <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 2z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <span class="sr-only">마이페이지</span>
                            <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                              <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                              <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- header 끝 -->

        <!-- 사이드메뉴 시작 -->
        <!-- 사이드메뉴 펼친상태 (toggle) -->
        <div class="content-wrap">
            <div id="main-menu-link">
                <ul class="link-wrap">
                    <li class="active">
                        <a href="index.php">
                        <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-house-door-fill mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                          <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        </svg>
                        홈</a>
                    </li>
                    <li>
                        <a href="popular.php">
                            <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-lightning-fill mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                            </svg>
                            인기
                        </a>
                    </li>
                    <li>
                        <a href="popular.php">
                            <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-collection-play-fill mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M1.5 14.5A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zm5.265-7.924A.5.5 0 0 0 6 7v5a.5.5 0 0 0 .765.424l4-2.5a.5.5 0 0 0 0-.848l-4-2.5zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                            </svg>   
                            구독
                        </a>
                    </li>
                </ul>
            </div>
            <!-- 사이드메뉴 끝 -->
        </div>
</body>
</html>
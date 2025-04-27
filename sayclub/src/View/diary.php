<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/css/diary.css">
    <!-- <script src="./js/mate.js" defer></script> -->
    <title>사랑방 Diary</title>
</head>
<body>
    <div class="container">
        <?php require_once('View/header.php'); ?>
        <div class="main">
            <div class="main_side">
                <div class="main_side_bar">
                    <div><a href="/main">홈</a></div>
                    <div><a href="">채팅</a></div>
                    <div><a href="">쪽지</a></div>
                    <div><a href="/diary">다이어리</a></div>
                </div>
            </div>
            <div class="main_content">
                <div class="diary_box">
                    <div class="insert_box">
                        <form class="diary_content" method="POST" actions="/diary">
                            <?php require_once('View/inc/errorMsg.php') ?>
                            <textarea class="diary_textarea" name="diary_content" id="diary_content"></textarea>
                            <button type="submit" class="btn_insert">작성</button>
                        </form>
                    </div>
                    <div class="diary_list">    
                        <p class="diary_title">일기 리스트</p>
                        <?php foreach($this->getDiaryList() as $item) { ?>
                        <div class="diary_content_1" id="diary_content_list">
                            <p class="diary_textarea_1"><span id="diary_content_modal"><?php echo $item['diary_content']; ?></span></p>
                            <div class="btn_box_1">
                                <!-- <button type="button" id="btn_more"><a href="<?php echo 'diary/'.$item['diary_id']; ?>">더보기</a></button> -->
                                <button type="button" id="btn_more">더보기</button>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- <p class="diary_title">나의 일기</p>
                        <?php foreach($this->getDiaryList() as $item) { ?>
                        <div class="diary_content">
                            <textarea class="diary_textarea" readonly><?php echo $item['diary_content'] ?></textarea>
                            <div class="btn_box">
                                <button type="button">수정</button>
                                <button type="button">삭제</button>
                            </div>
                        </div>
                        <?php } ?> -->
                        
                        <!-- <div class="diary_content">
                            <textarea class="diary_textarea"></textarea>
                            <div class="btn_box">
                                <button type="button">수정</button>
                                <button type="button">삭제</button>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="footer">
                    <div class="footer_item">
                        <div class="footer_ad">
                            <img src="/View/img/footer_ad.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal_container">
        <div class="modal_content">
            <p><?php echo $item['diary_content'] ?></p>
        </div>
    </div>
</body>
</html>
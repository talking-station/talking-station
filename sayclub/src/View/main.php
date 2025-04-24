<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/css/main.css">
    <!-- <script src="/View/js/main.js" defer></script> -->
    <script src="/View/dist/main.js" defer></script>
    <title>사랑방</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php require_once('View/header.php'); ?>
            <div class="header_box">
                <?php $user = $this->getUserInfo(); ?>
                <button><img class="profile_img" src="<?php $user['user_profile'] ?>"></button>
                <div class="header_content">
                    <div class="header_box_title">
                        <div class="header_right">
                            <p>www.talking-station.com</p>
                            <p>▶ <?php echo $user['user_nickname'] ?> (온라인)</p>
                            <p class="profile_comment"><?php echo $user['user_msg'] ?></p>
                        </div>
                        <div class="header_icon">
                            <a href=""><img src="/View/img/home_pixel.png" alt=""> (0)</a>
                            <a href=""><img src="/View/img/chat_pixel.png" alt=""> (0)</a>
                        </div>
                    </div>
                    <div class="header_btn">
                        <button id="btnToggleHeader">▲</button>
                    </div>
                </div>
            </div>
        </div>
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
                <div class="friends_content">
                    <div class="friends">
                        <div class="title">
                            <button id="btnToggleNow"><img src="/View/img/btn_triangle.png" alt=""></button>
                            <div class="title_message">친구 (
                                <?php echo $this->getOnlineFriends(); ?>
                                / 
                                <?php echo $this->getTotalFriends(); ?>
                                )
                            </div>
                        </div>
                        <div class="friend_list" id="friends_now">
                            <?php foreach($this->getArrMateList() as $item) { ?>
                            <div class="friend_item">
                                <img src="<?php echo $item['user_profile']; ?>" alt="">
                                <p class="friend_name"><?php echo $item['user_nickname']; ?></p>
                            </div>
                            <?php } ?>
                            <div class="btn_show">
                                <button class="show_more">더보기</button>
                                <button class="show_less">간략히</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer_menu">
                        <div class="friend_btn">
                            <button type="button">친구 추가</button>
                            <button type="button">친구 찾기</button>
                        </div>
                        <div class="emoji_left">
                            <a href=""><img src="/View/img/refresh.png" alt=""></a>
                            <a href=""><img src="/View/img/images.jfif" alt=""></a>
                        </div>
                        <div class="emoji_line">//</div>
                        <div class="emoji_right">
                            <a href=""><img src="/View/img/chat_pixel.png" alt=""></a>
                            <a href=""><img src="/View/img/slaughter.png" alt=""></a>
                            <a href=""><img src="/View/img/magnifying_glass_icon.png" alt=""></a>
                            <a href=""><img src="/View/img/microphone.png" alt=""></a>
                        </div>
                        <div class="btn_next">
                            <button type="button">>></button>
                        </div>
                    </div>
                    <div class="footer_item">
                        <div class="footer_music">
                            <img src="/View/img/footer_music.png" alt="">
                        </div>
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
            <ul class="modal_friends_menu">
                <li><span>대화하기</span></li>
                <li><span>쪽지보내기</span></li>
                <li><span>파일보내기</span></li>
                <li><hr class="modal_hr"></li>
                <!-- <li>
                    <span class="modal_item">
                        <span>친구이동</span>
                        <span>▶</span>
                    </span>
                </li>
                <li>
                    <span class="modal_item">
                        <span>친구복사</span>
                        <span>▶</span>
                    </span>
                </li> -->
                <li><span>친구 숨기기</span></li>
                <li><span>친구 차단</span></li>
                <?php 
                    $userGroupList = $this->getArrUserGroupMemberList();
                    if(!empty($userGroupList)) {  
                        foreach($userGroupList as $list) { ?>
                            <li><span><?php echo $list['user_group_name']." 그룹에서 제외"; ?></span></li>
                        <?php } ?>
                <?php } ?>
                <li><span>신고하기</span></li>
                <li><hr></li>
                <li><span>친구 정보</span></li>
            </ul>
        </div>
    </div>
</body>
</html>
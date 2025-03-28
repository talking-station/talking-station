document.addEventListener('DOMContentLoaded', function () {
    const BTN_HEADER = document.querySelector('#btnToggleHeader'); // header ▼ 버튼
    const COMMENT = document.querySelector('.profile_comment');
    const HEADER_CONTENT = document.querySelector('.header_box');
    const PROFILE_IMG = document.querySelector('.profile_img');

    const BTN_TOGGLE_NOW = document.querySelector('#btnToggleNow'); // 친구 목록 ▼ 버튼
    const BTN_TOGGLE_RECOMMEND = document.querySelector('#btnToggleRecommend'); // 추천 상대 ▼ 버튼

    const FRIENDS_NOW = document.querySelector('#friends_now'); // 친구 전체 리스트
    const FRIENDS_RECOMMEND = document.querySelector('#friends_recommend'); // 친구 전체 리스트
    const FRIEND = Array.from(FRIENDS_NOW.querySelectorAll('p')); // 친구

    const BTN_MORE = FRIENDS_NOW.querySelector('.show_more'); // 더보기 버튼
    let CNT = 5; // 초기에 보일 친구 수


    // 초기 친구 목록 5명만 보이게
    function friends_list() {
        FRIEND.forEach((friend, idx) => {
            if(idx < CNT) {
                friend.style.display= 'block';
            } else {
                friend.style.display= 'none';
            }
        });
    }

    BTN_MORE.addEventListener('click', () => {
        CNT += 5;
        friends_list();
    })

    // header 버튼
    BTN_HEADER.addEventListener('click', () => {
        COMMENT.classList.toggle('friend_list_hide');
        HEADER_CONTENT.classList.toggle('header_height');

        if(COMMENT.classList.contains('friend_list_hide')) {
            BTN_HEADER.textContent ='▼';
            PROFILE_IMG.style.height = '120px';
        } else {
            BTN_HEADER.textContent = '▲';
            PROFILE_IMG.style.height = '200px';
        }
    });

    // 현재 친구 목록
    BTN_TOGGLE_NOW.addEventListener('click', () => {
        FRIENDS_NOW.classList.toggle('friend_list_hide');

        if(FRIENDS_NOW.classList.contains('friend_list_hide')) {
            BTN_TOGGLE_NOW.textContent ='▶';
        } else {
            BTN_TOGGLE_NOW.textContent = '▼';
        }
    });

    // 추천 친구 목록
    BTN_TOGGLE_RECOMMEND.addEventListener('click', () => {
        FRIENDS_RECOMMEND.classList.toggle('friend_list_hide');
        
        if(FRIENDS_RECOMMEND.classList.contains('friend_list_hide')) {
            BTN_TOGGLE_RECOMMEND.textContent ='▶';
        } else {
            BTN_TOGGLE_RECOMMEND.textContent = '▼';
        }
    });

    friends_list();
});
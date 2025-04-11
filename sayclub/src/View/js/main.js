document.addEventListener('DOMContentLoaded', function () {
    const BTN_HEADER = document.querySelector('#btnToggleHeader'); // header ▼ 버튼
    const COMMENT = document.querySelector('.profile_comment');
    const HEADER_CONTENT = document.querySelector('.header_box');
    const PROFILE_IMG = document.querySelector('.profile_img');

    const BTN_TOGGLE_NOW = document.querySelector('#btnToggleNow'); // 친구 목록 ▼ 버튼
    const BTN_TOGGLE_NOW_IMG = document.querySelector('#btnToggleNow > img'); // 친구 목록 ▼ 이미지
    const BTN_TOGGLE_RECOMMEND = document.querySelector('#btnToggleRecommend'); // 추천 상대 ▼ 버튼
    const BTN_TOGGLE_RECOMMEND_IMG = document.querySelector('#btnToggleRecommend > img'); // 추천 상대 ▼ 이미지

    const FRIENDS_NOW = document.querySelector('#friends_now'); // 친구 전체 리스트
    const FRIENDS_RECOMMEND = document.querySelector('#friends_recommend'); // 친구 전체 리스트
    const FRIEND = Array.from(FRIENDS_NOW.querySelectorAll('.friend_item')); // 친구 항목들

    const FRIEND_NAME = document.querySelectorAll('.friend_name');
    const MODAL = document.querySelector('.modal_container');


    const BTN_MORE = FRIENDS_NOW.querySelector('.show_more'); // 더보기 버튼
    const BTN_LESS = FRIENDS_NOW.querySelector('.show_less'); // 간략히 버튼
    let CNT = 5; // 초기에 보일 친구 수


    // 초기 친구 목록 5명만 보이게
    function friends_list() {
        FRIEND.forEach((friend, idx) => {
            if (idx < CNT) {
                friend.classList.remove('friend_list_hide'); // 보이게 설정
            } else {
                friend.classList.add('friend_list_hide'); // 숨기게 설정
            }
            
            // 더보기 버튼 숨기기
            if (CNT >= FRIEND.length) {
                BTN_MORE.style.display = 'none'; // 더보기 버튼 숨기기
            } else {
                BTN_LESS.style.display = 'block';
            }

            // 간략히 버튼
            if (CNT <= 5) {
                BTN_LESS.style.display = 'none';
            } else {
                BTN_LESS.style.display = 'block';
            }
        });
    }
    
    // 친구 리스트 호출
    friends_list();

    // header 토글 버튼
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

    // 현재 친구 목록 토글
    BTN_TOGGLE_NOW.addEventListener('click', () => {
        FRIENDS_NOW.classList.toggle('friend_list_hide');

        if(FRIENDS_NOW.classList.contains('friend_list_hide')) {
            BTN_TOGGLE_NOW_IMG.src = "/View/img/btn_triangle_updown.png";
        } else {
            BTN_TOGGLE_NOW_IMG.src = "/View/img/btn_triangle.png";
        }
    });

    // 추천 친구 목록 토글
    BTN_TOGGLE_RECOMMEND.addEventListener('click', () => {
        FRIENDS_RECOMMEND.classList.toggle('friend_list_hide');
        
        if(FRIENDS_RECOMMEND.classList.contains('friend_list_hide')) {
            BTN_TOGGLE_RECOMMEND_IMG.src = "/View/img/btn_triangle_updown.png";
        } else {
            BTN_TOGGLE_RECOMMEND_IMG.src = "/View/img/btn_triangle.png";
        }
    });

    // 더보기 버튼
    BTN_MORE.addEventListener('click', () => {
        CNT += 5;
        friends_list();
    })

    // 간략히 버튼
    BTN_LESS.addEventListener('click', () => {
        CNT = 5;
        BTN_MORE.style.display = 'block'; // 더보기 버튼 생성
        friends_list();
    })

    // 친구 이름 클릭시 모달 생성
    FRIEND_NAME.forEach((name) => {
        name.addEventListener('click', (event) => {
            const rect = name.getBoundingClientRect();
    
            // 위치 설정
            MODAL.style.top = `${rect.top + window.scrollY}px`;
            MODAL.style.left = `${rect.right + 10 + window.scrollX}px`;
    
            MODAL.style.position = 'absolute';
            MODAL.style.display = 'block';
    
            event.stopPropagation(); // 다른 클릭 이벤트 방지
        });
    });
    
    // 바깥 클릭시 모달 닫기
    document.addEventListener('click', () => {
        MODAL.style.display = 'none';
    });
});
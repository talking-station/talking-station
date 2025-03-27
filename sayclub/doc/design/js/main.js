// const BTN_TOGGLE = document.querySelector('#btnToggle'); // ▼ 버튼
const BTN_TOGGLE = document.querySelector('.btn_toggle'); // ▼ 버튼
const FRIENDS_LIST = document.querySelector('.friend_list'); // 친구 전체 리스트
const FRIEND = document.querySelectorAll('.friend_list'); // 친구
const BTN_MORE = FRIENDS_LIST.querySelector('.show_more'); // 더보기 버튼
const CNT = 5; // 초기에 보일 친구 수

BTN_TOGGLE.addEventListener('click', () => {
    // alert('1');
    FRIENDS_LIST.classList.toggle('friend_list_hide');
    if(FRIENDS_LIST.classList.contains('friend_list_hide')) {
        btnToggle.textContent ='▶';
    } else {
        btnToggle.textContent = '▼';
    }
});

function friends_list() {
    FRIEND.foreach((friend, idx) => {
        if(idx < CNT) {
            friend.style.display= 'block';
        } else {
            friend.style.display= 'none';
        }
    })
}
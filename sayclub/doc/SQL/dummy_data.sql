INSERT INTO users(user_name, user_account, user_email, user_password, user_nickname, user_tel1, user_tel2, user_tel3, user_profile, user_birth, user_last_login)
VALUES('test01', 'test1', 'test1@naver.com', 'qwer1234', 'test01', '010', '1111', '1111', 'test01', '2000-01-01', NOW())
,('test02', 'test02', 'test02@naver.com', 'qwer1234', 'test02', '010', '2222', '2222', 'test02', '2000-01-02', NOW())
,('test03', 'test03', 'test03@naver.com', 'qwer1234', 'test03', '010', '3333', '3333', 'test03', '2000-01-03', NOW())
,('test04', 'test04', 'test04@naver.com', 'qwer1234', 'test04', '010', '4444', '4444', 'test04', '2000-01-04', NOW())
,('test05', 'test05', 'test05@naver.com', 'qwer1234', 'test05', '010', '5555', '5555', 'test05', '2000-01-05', NOW())
,('test06', 'test06', 'test06@naver.com', 'qwer1234', 'test06', '010', '6666', '6666', 'test06', '2000-01-06', NOW())
,('test07', 'test07', 'test07@naver.com', 'qwer1234', 'test07', '010', '7777', '7777', 'test07', '2000-01-07', NOW())
,('test08', 'test08', 'test08@naver.com', 'qwer1234', 'test08', '010', '8888', '8888', 'test08', '2000-01-08', NOW())
,('test09', 'test09', 'test09@naver.com', 'qwer1234', 'test09', '010', '9999', '9999', 'test09', '2000-01-09', NOW())
,('test10', 'test10', 'test10@naver.com', 'qwer1234', 'test10', '010', '0000', '0000', 'test10', '2000-01-10', NOW())
;

INSERT INTO mates(main_user_id, related_user_id, mate_status)
VALUES ('1', '2', '1'),('1', '3', '1'),('1', '4', '1'),('1', '7', '1'),('1', '8', '1')
,('2', '1', '1'),('2', '3', '1'),('2', '5', '1'),('2', '6', '1'),('2', '9', '1')
,('3', '1', '1'),('3', '2', '1'),('3', '5', '1'),('3', '9', '1'),('3', '10', '1')
,('4', '1', '1'),('4', '8', '1')
,('5', '2', '1'),('5', '3', '1'),('5', '6', '1'),('5', '9', '1')
,('6', '2', '1'),('6', '5', '1')
,('7', '1', '1')
,('8', '1', '1'),('8', '4', '1'),('8', '10', '1')
,('9', '2', '1'),('9', '3', '1'),('9', '5', '1'),('9', '10', '1')
,('10', '3', '1'),('10', '8', '1'),('10', '9', '1')
;

INSERT INTO user_groups(user_group_name)
VALUES ('group1'),('HelloWorld!'),('잘살자'),('노트북새로사자');

INSERT INTO user_group_memberships(user_id, user_group_id, membership_flg, membership_status)
VALUES ('1', '1', '1', '1'),('1', '3', '0', '1')
,('2', '1', '0', '1')
,('3', '1', '0', '1'),('3', '3', '0', '1'),('3', '4', '0', '1')
,('4', '1', '0', '1'),('4', '2', '0', '1')
,('5', '3', '1', '1')
,('8', '2', '1', '1')
,('10', '4', '1', '1')
;

INSERT INTO diaries(user_id, diary_content)
VALUES ('1', '다이어리 테스트1'),('1', '다이어리 테스트2'),('1', '다이어리 테스트3'),('1', '다이어리 테스트4')
,('2', '다이어리 테스트5'),('2', '다이어리 테스트6'),('2', '다이어리 테스트7')
;

INSERT INTO chat_rooms(chat_room_name)
VALUES ('채팅방1'),('채팅방2'),('채팅방3'),('채팅방4'),('채팅방5'),('채팅방6')
;

INSERT INTO chat_users(chat_room_id, user_id)
VALUES ('1', '1'),('1', '2'),('1', '3'),('2', '8'),('2', '8')
;

INSERT INTO direct_messages(sender_user_id, receiver_user_id, direct_msg_content)
VALUES ('1', '10', 'HELLO'),('2', '1', 'WORLD'),('6', '10', 'HAHA')
;
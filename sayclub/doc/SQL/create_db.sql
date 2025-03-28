CREATE DATABASE talk_station;
USE talk_station;


-- 	1) admin_lists(관리자) Table
--			- pk, 아이디, 비밀번호, 계정 삭제여부, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE `admins` (
	admin_id			BIGINT(20) UNSIGNED		PRIMARY KEY		AUTO_INCREMENT
	,admin_account		VARCHAR(20)				NOT NULL
	,admin_password		VARCHAR(255)			NOT NULL
	,admin_out_flg		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 디폴트, 1: 삭제'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 2) email_verifications(이메일 인증) Table
--			- pk, 이메일, hash 이메일, 인증 만료 시간, 인증 완료 시간, 요청일자, 수정일자, 삭제일자
CREATE TABLE `email_verifications` (
	verify_pk			BIGINT(20) UNSIGNED		PRIMARY KEY		AUTO_INCREMENT
	,verified_email		VARCHAR(255)			NOT NULL		COMMENT 'unique 체크'
	,hash_email			VARCHAR(100)			NOT NULL
	,email_expires_at	TIMESTAMP				NOT NULL		COMMENT '30분 후 만료'
	,email_verified_at	TIMESTAMP
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 	3) users(유저) Table
--			- pk, 탈퇴여부, 강퇴여부, 이름, 아이디, 이메일, 비밀번호, 닉네임, 전화번호1, 전화번호2, 전화번호3, 프로필사진, 생년월일, 프로필 문구, 로그인 상태, 마지막 로그인, 리프레쉬 토큰, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE `users` (
	user_id				BIGINT(20) UNSIGNED		PRIMARY KEY		AUTO_INCREMENT
	,user_out_flg		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 디폴트, 1 : 탈퇴'
	,admin_force_flg	CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0: 디폴트, 1 : 강퇴'
	,user_name			VARCHAR(20)				NOT NULL
	,user_account		VARCHAR(20)				NOT NULL
	,user_email			VARCHAR(255)			NOT NULL		COMMENT '이메일? 아이디? verified_email  가져오기, fk연결은 딱히'
	,user_password		VARCHAR(255)			NOT NULL
	,user_nickname		VARCHAR(20)				NOT NULL		COMMENT '한글, 영어, 숫자, 특수기호'
	,user_tel1			VARCHAR(3)				NOT NULL
	,user_tel2			VARCHAR(4)				NOT NULL
	,user_tel3			VARCHAR(4)				NOT NULL
	,user_profile		VARCHAR(100)			NOT NULL		COMMENT '디폴트 로고사진'
	,user_birth			DATE					NOT NULL		COMMENT '나이 계산'
	,user_msg			VARCHAR(30)
	,user_status		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 로그아웃, 1: 로그인'
	,user_last_login	TIMESTAMP				NOT NULL
	,refresh_token		VARCHAR(512)
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 4) user_groups(유저 그룹) Table
--			- pk, 그룹 이름, 생성일자, 수정일자, 삭제일자
CREATE TABLE `user_groups` (
	user_group_id		BIGINT(20) UNSIGNED		PRIMARY KEY		AUTO_INCREMENT
	,user_group_name	VARCHAR(50)				NOT NULL
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 5) user_group_memberships(유저별 가입한 그룹) Table
--			- pk, 유저 pk, 유저그룹 pk, 역할, 신청 상태, 생성일자, 수정일자, 삭제일자
CREATE TABLE `user_group_memberships` (
	membership_id		BIGINT(20) UNSIGNED		PRIMARY KEY	 	AUTO_INCREMENT
	,user_id			BIGINT(20) UNSIGNED		NOT NULL
	,user_group_id		BIGINT(20) UNSIGNED		NOT NULL
	,membership_flg		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 일반 유저, 1 : 그룹장'
	,membership_status	CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 요청 대기중, 1: 수락, 2: 거절, 3:  강퇴'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 	6) mates(친구) Table
--			- pk, 기준 유저 pk, 친구 유저 pk, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `mates` (
	mate_id				BIGINT(20) UNSIGNED		PRIMARY KEY	 	AUTO_INCREMENT
	,main_user_id		BIGINT(20) UNSIGNED		NOT NULL
	,related_user_id	BIGINT(20) UNSIGNED		NOT NULL
	,mate_status		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 요청 대기 , 1 : 수락, 2 : 거절, 3 : 해제, 4 : 자동생성'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 	7) direct_messages(쪽지) Table
--			- pk, 보낸 유저 pk, 받은 유저 pk, 내용, 읽음 여부, 삭제 여부, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `direct_messages` (
	direct_msg_id		BIGINT(20) UNSIGNED		PRIMARY KEY	 	AUTO_INCREMENT
	,sender_user_id		BIGINT(20) UNSIGNED		NOT NULL
	,receiver_user_id	BIGINT(20) UNSIGNED		NOT NULL
	,direct_msg_content	VARCHAR(255)			NOT NULL
	,is_read			CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : false, 1 : true'
	,is_deleted			CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0: 디폴트, 1: 삭제'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 	8) chat_rooms(채팅방) Table
--			- pk, 채팅방 이름, 채팅방 유형, 생성일자, 수정일자, 탈퇴일자
CREATE TABLE `chat_rooms` (
	chat_room_id		BIGINT(20) UNSIGNED		PRIMARY KEY		AUTO_INCREMENT
	,chat_room_name		VARCHAR(50)				NOT NULL
	,chat_room_type		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 개인. 1: 그룹'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 	9) chat_users(채팅방 참여 유저) Table
--			- pk, 채팅방 pk, 유저 pk, 내용, 역할, 참여일자, 수정일자, 탈퇴일자
CREATE TABLE `chat_users` (
	chat_user_id		BIGINT(20) UNSIGNED		PRIMARY KEY	 	AUTO_INCREMENT
	,chat_room_id		BIGINT(20) UNSIGNED		NOT NULL
	,user_id			BIGINT(20) UNSIGNED		NOT NULL
	,chat_user_flg		CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0: 일반 유저, 1 : 방장'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- 	10) chat_messages(채팅 메시지) Table
--			- pk, 채팅방 pk, 유저 pk, 내용, 읽음 여부, 작성일자
CREATE TABLE `chat_messages` (
	chat_msg_id			BIGINT(20) UNSIGNED		PRIMARY KEY	 	AUTO_INCREMENT
	,chat_room_id		BIGINT(20) UNSIGNED		NOT NULL
	,user_id			BIGINT(20) UNSIGNED		NOT NULL
	,chat_msg_content	VARCHAR(100)			NOT NULL
	,is_read			CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : false, 1 : true'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
);

-- 	11) notifications(알림) Table
--			- pk, 유저 pk, 채팅 메시지 pk, 쪽지 pk, 내용, 읽음 여부, 삭제 여부, 작성일자, 탈퇴일자
CREATE TABLE notifications (
	notification_id		BIGINT(20) UNSIGNED		PRIMARY KEY	 	AUTO_INCREMENT
	,user_id			BIGINT(20) UNSIGNED		NOT NULL
	,chat_msg_id		BIGINT(20) UNSIGNED
	,direct_msg_id		BIGINT(20) UNSIGNED
	,is_read			CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : false, 1: true'
	,is_deleted			CHAR(1)					NOT NULL		DEFAULT 0	COMMENT '0 : 디폴트, 1: 삭제'
	,created_at			TIMESTAMP				NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP
);

-- FK 추가
ALTER TABLE user_group_memberships
ADD CONSTRAINT fk_user_group_memberships_user_id
FOREIGN KEY(user_id)
REFERENCES users(user_id);

ALTER TABLE user_group_memberships
ADD CONSTRAINT fk_user_group_memberships_user_group_id
FOREIGN KEY(user_group_id)
REFERENCES user_groups(useruser_group_id_id);

ALTER TABLE mates
ADD CONSTRAINT fk_mates_main_user_id
FOREIGN KEY(main_user_id)
REFERENCES users(user_id);

ALTER TABLE mates
ADD CONSTRAINT fk_mates_related_user_id
FOREIGN KEY(related_user_id)
REFERENCES users(user_id);

ALTER TABLE direct_messages
ADD CONSTRAINT fk_direct_messages_sender_user_id
FOREIGN KEY(sender_user_id)
REFERENCES users(user_id);

ALTER TABLE direct_messages
ADD CONSTRAINT fk_direct_messages_receiver_user_id
FOREIGN KEY(receiver_user_id)
REFERENCES users(user_id);

ALTER TABLE chat_users
ADD CONSTRAINT fk_chat_users_chat_room_id
FOREIGN KEY(chat_room_id)
REFERENCES chat_rooms(chat_room_id);

ALTER TABLE chat_users
ADD CONSTRAINT fk_chat_users_user_id
FOREIGN KEY(user_id)
REFERENCES users(user_id);

ALTER TABLE chat_messages
ADD CONSTRAINT fk_chat_messages_chat_room_id
FOREIGN KEY(chat_room_id)
REFERENCES chat_rooms(chat_room_id);

ALTER TABLE chat_messages
ADD CONSTRAINT fk_chat_messages_user_id
FOREIGN KEY(user_id)
REFERENCES users(user_id);

ALTER TABLE notifications
ADD CONSTRAINT fk_notifications_user_id
FOREIGN KEY(user_id)
REFERENCES users(user_id);

ALTER TABLE notifications
ADD CONSTRAINT fk_notifications_chat_msg_id
FOREIGN KEY(chat_msg_id)
REFERENCES chat_messages(chat_msg_id);

ALTER TABLE notifications
ADD CONSTRAINT fk_notifications_direct_msg_id
FOREIGN KEY(direct_msg_id)
REFERENCES direct_messages(direct_msg_id);
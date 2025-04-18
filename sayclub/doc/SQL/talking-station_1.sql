CREATE DATABASE talk_station;
USE talk_station;

-- 1) email_verifications(이메일 인증) Table
--			- pk, 이메일, hash 이메일, 인증 만료 시간, 인증 완료 시간, 요청일자, 수정일자, 삭제일자
CREATE TABLE `email_verifications` (
	`verify_pk`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`verified_email`	VARCHAR(50)	NOT NULL	COMMENT 'unique 체크',
	`hash_email`	VARCHAR(100)	NOT NULL,
	`email_expires_at`	TIMESTAMP	NOT NULL	COMMENT '30분 후 만료',
	`email_verified_at`	TIMESTAMP	NULL,
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL	COMMENT '인증 실패시 추가'
);

-- 	2) users(유저) Table
--			- pk, 탈퇴여부, 강퇴여부, 이름, 아이디, 이메일, 비밀번호, 닉네임, 전화번호1, 전화번호2, 전화번호3, 프로필사진, 생년월일, 프로필 문구, 로그인 상태, 마지막 로그인, 리프레쉬 토큰, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE `users` (
	`user_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO_INCREMENT,
	`user_out_flg`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : 디폴트, 1 : 탈퇴',
	`admin_force_flg`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0: 디폴트, 1 : 강퇴',
	`user_name`	VARCHA(20)	NOT NULL,
	`user_account`	VARCHAR(20)	NOT NULL,
	`user_email`	VARCHAR(50)	NOT NULL	COMMENT '이메일? 아이디? verified_email  가져오기, fk연결은 딱히',
	`user_password`	VARCHAR(255)	NOT NULL,
	`user_nickname`	VARCHAR(20)	NOT NULL	COMMENT '한글, 영어, 숫자, 특수기호',
	`user_tel1`	VARCHAR(3)	NOT NULL,
	`user_tel2`	VARCHAR(4)	NOT NULL,
	`user_tel3`	VARCHAR(4)	NOT NULL,
	`user_profile`	VARCHAR(100)	NOT NULL	COMMENT '디폴트 로고사진',
	`user_birth`	DATE	NOT NULL	COMMENT '나이 계산',
	`user_msg`	VARCHAR(30)	NULL,
	`user_status`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : 로그아웃, 1: 로그인',
	`user_last_login`	TIMESTAMP	NOT NULL,
	`refresh_token`	VARCHAR(512)	NULL,
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	3) admin_lists(관리자) Table
--			- pk, 아이디, 비밀번호, 계정 삭제여부, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE `admin_lists` (
	`admin_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`admin_account`	VARCHA(20)	NOT NULL,
	`admin_password`	VARCHAR(255)	NULL,
	`admin_out_flg`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : 디폴트, 1: 삭제',
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	4) mates(친구) Table
--			- pk, 기준 아이디, 친구 아이디, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `mates` (
	`mate_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`main_user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`related_user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`mate_status`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : 요청 대기 , 1 : 수락, 2 : 거절, 3 : 해제, 4 : 자동생성',
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	5) user_groups(유저 그룹) Table
--			- pk, 그룹 이름, 생성일자, 수정일자, 탈퇴일자
CREATE TABLE `user_groups` (
	`user_group_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`user_group_name`	VARCHAR(10)	NOT NULL,
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	4) user_group_memberships(유저 가입된 그룹) Table
--			- pk, 유저pk, 그룹pk, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `user_group_memberships` (
	`membership_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`user_group_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	4) mates(친구) Table
--			- pk, 기준 아이디, 친구 아이디, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `direct_messages` (
	`dm_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`sender_user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`receiver_user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`dm_content`	VARCHAR(300)	NOT NULL,
	`dm_is_read`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : false, 1 : true',
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	4) mates(친구) Table
--			- pk, 기준 아이디, 친구 아이디, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `chat_rooms` (
	`chat_room_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`chat_room_name`	VARCHAR(15)	NOT NULL,
	`chat_room_type`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : 개인. 1: 그룹',
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`updated_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`deleted_at`	TIMESTAMP	NULL
);

-- 	4) mates(친구) Table
--			- pk, 기준 아이디, 친구 아이디, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `chat_users` (
	`chat_user_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`chat_room_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`chat_msg_flg`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0: 일반 유저, 1 : 방장',
	`joined_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP(),
	`left_at`	TIMESTAMP	NULL
);

-- 	4) mates(친구) Table
--			- pk, 기준 아이디, 친구 아이디, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `chat_messages` (
	`chat_msg_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`chat_room_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`user_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`chat_msg_content`	VARCHAR(100)	NOT NULL,
	`chat_msg_is_read`	CHAR(1)	NOT NULL	DEFAULT 0	COMMENT '0 : false, 1 : true',
	`created_at`	TIMESTAMP	NOT NULL	DEFAULT CURRENT_TIMESTAMP()
);

-- 	4) mates(친구) Table
--			- pk, 기준 아이디, 친구 아이디, 친구 상태, 작성일자, 수정일자, 탈퇴일자
CREATE TABLE `notifications` (
	`notification_id`	BIGINT(20) UNSIGNED	NOT NULL	DEFAULT AUTO INCREMENT,
	`user_id`	BIGINT(20) UNSIGNED	NULL,
	`chat_msg_id`	BIGINT(20) UNSIGNED	NULL,
	`dm_id`	BIGINT(20) UNSIGNED	NOT NULL,
	`notification_is_read`	CHAR(1)	NOT NULL	DEFAULT Y	COMMENT 'Y : false, N: true'
);


ALTER TABLE `direct_messages` ADD CONSTRAINT `PK_DIRECT_MESSAGES` PRIMARY KEY (
	`dm_id`
);

ALTER TABLE `chat_users` ADD CONSTRAINT `PK_CHAT_USERS` PRIMARY KEY (
	`chat_user_id`
);

ALTER TABLE `chat_rooms` ADD CONSTRAINT `PK_CHAT_ROOMS` PRIMARY KEY (
	`chat_room_id`
);

ALTER TABLE `user_group_lists` ADD CONSTRAINT `PK_USER_GROUP_LISTS` PRIMARY KEY (
	`user_group_list_id`
);

ALTER TABLE `user_groups` ADD CONSTRAINT `PK_USER_GROUPS` PRIMARY KEY (
	`user_group_id`
);

ALTER TABLE `users` ADD CONSTRAINT `PK_USERS` PRIMARY KEY (
	`user_id`
);

ALTER TABLE `mates` ADD CONSTRAINT `PK_MATES` PRIMARY KEY (
	`mate_id`
);

ALTER TABLE `email_verifications` ADD CONSTRAINT `PK_EMAIL_VERIFICATIONS` PRIMARY KEY (
	`verify_pk`
);

ALTER TABLE `chat_messages` ADD CONSTRAINT `PK_CHAT_MESSAGES` PRIMARY KEY (
	`chat_msg_id`
);

ALTER TABLE `notifications` ADD CONSTRAINT `PK_NOTIFICATIONS` PRIMARY KEY (
	`notification_id`
);

ALTER TABLE `admin_lists` ADD CONSTRAINT `PK_ADMIN_LISTS` PRIMARY KEY (
	`admin_id`
);


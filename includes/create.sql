CREATE TABLE users (
	user_uid int(11) AUTO_INCREMENT PRIMARY KEY not null,
	user_name varchar(256) not null,
	user_email varchar(256) not null,
	user_pwd varchar(256) not null
);

INSERT INTO users (user_first, user_email, user_pwd)
	VALUES ('Daniel','usemmtuts@gmail.com', 'test123');

INSERT INTO users(user_id, user_name, user_password)
Values ('1','kim.eunji', '김은지', '1234');
INSERT INTO users(user_id, user_name, user_password)
Values ('2','shjj09', '심정민', '0');
INSERT INTO users(user_id, user_name, user_password)
Values ('3','bgy1060', '박지연', '3422');

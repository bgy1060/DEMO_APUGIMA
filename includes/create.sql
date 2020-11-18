-- users Table Create SQL
CREATE TABLE users
(
    `uid`            INT            NOT NULL    AUTO_INCREMENT COMMENT 'uid',
    `user_id`        VARCHAR(45)    NOT NULL,
    `user_name`      VARCHAR(45)    NOT NULL,
    `user_password`  VARCHAR(45)    NOT NULL,
    PRIMARY KEY (uid)
);


-- users Table Create SQL
CREATE TABLE diseases
(
    `disease_id`    INT            NOT NULL    AUTO_INCREMENT,
    `disease_name`  VARCHAR(45)    NOT NULL,
    PRIMARY KEY (disease_id)
);


-- users Table Create SQL
CREATE TABLE hospitals
(
    `hospital_id`       INT             NOT NULL    AUTO_INCREMENT,
    `hospital_name`     VARCHAR(200)    NOT NULL,
    `hospital_type`     VARCHAR(45)     NOT NULL,
    `hospital_address`  VARCHAR(500)    NULL,
    `hospital_number`   VARCHAR(45)     NULL,
    PRIMARY KEY (hospital_id)
);


-- users Table Create SQL
CREATE TABLE medicines
(
    `medicine_id`       VARCHAR(45)    NOT NULL,
    `medicine_name`     VARCHAR(45)    NOT NULL,
    `medicine_symptom`  VARCHAR(45)    NOT NULL,
    PRIMARY KEY (medicine_id)
);


-- users Table Create SQL
CREATE TABLE prescriptions
(
    `prescription_id`     INT            NOT NULL    AUTO_INCREMENT,
    `uid`                 INT            NOT NULL,
    `prescription_date`   DATE           NOT NULL,
    `hospital_id`         INT            NULL,
    `memo`                TEXT           NULL,
    `prescription_price`  INT            NULL,
    `doctor_name`         VARCHAR(45)    NULL,
    `disease_id`          INT            NULL,
    PRIMARY KEY (prescription_id)
);

ALTER TABLE prescriptions
    ADD CONSTRAINT FK_prescriptions_uid_users_uid FOREIGN KEY (uid)
        REFERENCES users (uid) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE prescriptions
    ADD CONSTRAINT FK_prescriptions_hospital_id_hospitals_hospital_id FOREIGN KEY (hospital_id)
        REFERENCES hospitals (hospital_id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE prescriptions
    ADD CONSTRAINT FK_prescriptions_disease_id_diseases_disease_id FOREIGN KEY (disease_id)
        REFERENCES diseases (disease_id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- users Table Create SQL
CREATE TABLE diaries
(
    `diary_id`     INT            NOT NULL    AUTO_INCREMENT,
    `uid`          INT            NOT NULL,
    `disease_id`   INT            NOT NULL,
    `medicine_id`  VARCHAR(45)    NOT NULL,
    `memo`         TEXT           NOT NULL,
    `diary_date`   DATE           NOT NULL,
    PRIMARY KEY (diary_id)
);

ALTER TABLE diaries
    ADD CONSTRAINT FK_diaries_uid_users_uid FOREIGN KEY (uid)
        REFERENCES users (uid) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE diaries
    ADD CONSTRAINT FK_diaries_disease_id_diseases_disease_id FOREIGN KEY (disease_id)
        REFERENCES diseases (disease_id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE diaries
    ADD CONSTRAINT FK_diaries_medicine_id_medicines_medicine_id FOREIGN KEY (medicine_id)
        REFERENCES medicines (medicine_id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- users Table Create SQL
CREATE TABLE hospital_reviews
(
    `hospital_review_id`  INT     NOT NULL    AUTO_INCREMENT,
    `uid`                 INT     NOT NULL,
    `hospital_id`         INT     NOT NULL,
    `memo`                TEXT    NULL,
    `rate`                INT     NOT NULL,
    PRIMARY KEY (hospital_review_id)
);

ALTER TABLE hospital_reviews
    ADD CONSTRAINT FK_hospital_reviews_hospital_id_hospitals_hospital_id FOREIGN KEY (hospital_id)
        REFERENCES hospitals (hospital_id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE hospital_reviews
    ADD CONSTRAINT FK_hospital_reviews_uid_users_uid FOREIGN KEY (uid)
        REFERENCES users (uid) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- users Table Create SQL
CREATE TABLE medicine_reviews
(
    `medicine_review_id`  INT            NOT NULL    AUTO_INCREMENT,
    `uid`                 INT            NOT NULL,
    `medicine_id`         VARCHAR(45)    NOT NULL,
    `disease_id`          INT            NOT NULL,
    `memo`                TEXT           NULL,
    `rate`                INT            NOT NULL,
    PRIMARY KEY (medicine_review_id)
);

ALTER TABLE medicine_reviews
    ADD CONSTRAINT FK_medicine_reviews_medicine_id_medicines_medicine_id FOREIGN KEY (medicine_id)
        REFERENCES medicines (medicine_id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE medicine_reviews
    ADD CONSTRAINT FK_medicine_reviews_disease_id_diseases_disease_id FOREIGN KEY (disease_id)
        REFERENCES diseases (disease_id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE medicine_reviews
    ADD CONSTRAINT FK_medicine_reviews_uid_users_uid FOREIGN KEY (uid)
        REFERENCES users (uid) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- users Table Create SQL
CREATE TABLE columns
(
    `column_id`    INT            NOT NULL    AUTO_INCREMENT,
    `column_date`  DATE           NOT NULL,
    `title`        VARCHAR(45)    NOT NULL,
    `content`      TEXT           NOT NULL,
    PRIMARY KEY (column_id)
);

-- users Table Create SQL
CREATE TABLE covid
(
    `id`         INT             NOT NULL,
    `covid_date`       DATE     NOT NULL,
    `region`     VARCHAR(45)     NOT NULL,
    `is_travel`  VARCHAR(45)     NULL,
    `state`      VARCHAR(45)     NOT NULL,
    `cause`      VARCHAR(200)    NOT NULL,
    PRIMARY KEY (id)
);

-- INSERT users
INSERT INTO `users`(`uid`, `user_id`, `user_name`, `user_password`) VALUES (1, 'kim.eunji','김은지','1234')
INSERT INTO `users`(`uid`, `user_id`, `user_name`, `user_password`) VALUES (2, 'shjj09','심정민','0')
INSERT INTO `users`(`uid`, `user_id`, `user_name`, `user_password`) VALUES (3, 'bgy1060','박지연','3422')
INSERT INTO `users`(`uid`, `user_id`, `user_name`, `user_password`) VALUES (4, 'one_bin','원빈','1234')
INSERT INTO `users`(`uid`, `user_id`, `user_name`, `user_password`) VALUES (5, 'hyun_bin','현빈','1234')

-- INSERT other tables
LOAD DATA INFILE 'dbs/hospitals.csv' INTO TABLE hospitals FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/medicines.csv' INTO TABLE medicines FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/diseases.csv' INTO TABLE diseases FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/prescriptions.csv' INTO TABLE prescriptions FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/diaries.csv' INTO TABLE diaries FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/hospital_reviews.csv' INTO TABLE hospital_reviews FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/medicine_reviews.csv' INTO TABLE medicine_reviews FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/covid.csv' INTO TABLE covid FIELDS TERMINATED BY ',';
LOAD DATA INFILE 'dbs/columns.csv' INTO TABLE columns FIELDS TERMINATED BY ',';

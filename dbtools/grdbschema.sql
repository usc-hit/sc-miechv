
CREATE TABLE USER (
                UID INT AUTO_INCREMENT NOT NULL,
                UNAME VARCHAR NOT NULL,
                USERTYPE VARCHAR NOT NULL,
                PASS VARCHAR NOT NULL,
                PRIMARY KEY (UID)
);


CREATE TABLE PARENT_DETAILS (
                PARENT_ID BIGINT AUTO_INCREMENT NOT NULL,
                ENROLLMENT_DATE DATE NOT NULL,
                SSN BIGINT NOT NULL,
                FIRST_NAME VARCHAR NOT NULL,
                MIDDLE_NAME VARCHAR NOT NULL,
                LAST_NAME VARCHAR NOT NULL,
                BIRTH_DATE DATE NOT NULL,
                SEX CHAR NOT NULL,
                MARITAL_STATUS VARCHAR NOT NULL,
                RACE VARCHAR NOT NULL,
                ETHNICITY VARCHAR NOT NULL,
                ADDRESS_LINE_1 VARCHAR NOT NULL,
                ADDRESS_LINE_2 VARCHAR NOT NULL,
                CITY VARCHAR NOT NULL,
                STATE VARCHAR NOT NULL,
                ZIP INT NOT NULL,
                IS_TEEN_PARENT BOOLEAN NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE PARENT_DETAILS COMMENT 'This table maintains the record of PARENT/PATIENT(meta data of PARENT).';

ALTER TABLE PARENT_DETAILS MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE PARENT_DETAILS MODIFY COLUMN ENROLLMENT_DATE DATE COMMENT 'This field is responsible for saving the date of enrollment.';

ALTER TABLE PARENT_DETAILS MODIFY COLUMN SSN BIGINT COMMENT 'SSN of the child.';


CREATE TABLE HEALTH_SERVICES_24 (
                PARENT_ID BIGINT NOT NULL,
                INSURANCE_STATUS VARCHAR NOT NULL,
                LAST_CHECKUP VARCHAR NOT NULL,
                PARTICIPANT_SMOKES BOOLEAN DEFAULT 0 NOT NULL,
                SMOKE_FREQ VARCHAR NOT NULL,
                ATTEMPT_SMOKE_QUIT BOOLEAN NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE HEALTH_SERVICES_24 MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE HEALTH_SERVICES_24 MODIFY COLUMN LAST_CHECKUP VARCHAR COMMENT 'Last routing checkup.';

ALTER TABLE HEALTH_SERVICES_24 MODIFY COLUMN PARTICIPANT_SMOKES BOOLEAN COMMENT 'Does the participant smoke.';

ALTER TABLE HEALTH_SERVICES_24 MODIFY COLUMN SMOKE_FREQ VARCHAR COMMENT 'Smoking frequency, no of cigarettes per day.';

ALTER TABLE HEALTH_SERVICES_24 MODIFY COLUMN ATTEMPT_SMOKE_QUIT BOOLEAN COMMENT 'Has paticipant attempted to quit smoking.';


CREATE TABLE HEALTH_SERVICES_12 (
                PARENT_ID BIGINT NOT NULL,
                INSURANCE_STATUS VARCHAR NOT NULL,
                LAST_CHECKUP VARCHAR NOT NULL,
                PARTICIPANT_SMOKES BOOLEAN DEFAULT 0 NOT NULL,
                SMOKE_FREQ VARCHAR NOT NULL,
                ATTEMPT_SMOKE_QUIT BOOLEAN NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE HEALTH_SERVICES_12 MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE HEALTH_SERVICES_12 MODIFY COLUMN LAST_CHECKUP VARCHAR COMMENT 'Last routing checkup.';

ALTER TABLE HEALTH_SERVICES_12 MODIFY COLUMN PARTICIPANT_SMOKES BOOLEAN COMMENT 'Does the participant smoke.';

ALTER TABLE HEALTH_SERVICES_12 MODIFY COLUMN SMOKE_FREQ VARCHAR COMMENT 'Smoking frequency, no of cigarettes per day.';

ALTER TABLE HEALTH_SERVICES_12 MODIFY COLUMN ATTEMPT_SMOKE_QUIT BOOLEAN COMMENT 'Has paticipant attempted to quit smoking.';


CREATE TABLE HEALTH_SERVICES_6 (
                PARENT_ID BIGINT NOT NULL,
                INSURANCE_STATUS VARCHAR NOT NULL,
                LAST_CHECKUP VARCHAR NOT NULL,
                PARTICIPANT_SMOKES BOOLEAN DEFAULT 0 NOT NULL,
                SMOKE_FREQ VARCHAR NOT NULL,
                ATTEMPT_SMOKE_QUIT BOOLEAN NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE HEALTH_SERVICES_6 MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE HEALTH_SERVICES_6 MODIFY COLUMN LAST_CHECKUP VARCHAR COMMENT 'Last routing checkup.';

ALTER TABLE HEALTH_SERVICES_6 MODIFY COLUMN PARTICIPANT_SMOKES BOOLEAN COMMENT 'Does the participant smoke.';

ALTER TABLE HEALTH_SERVICES_6 MODIFY COLUMN SMOKE_FREQ VARCHAR COMMENT 'Smoking frequency, no of cigarettes per day.';

ALTER TABLE HEALTH_SERVICES_6 MODIFY COLUMN ATTEMPT_SMOKE_QUIT BOOLEAN COMMENT 'Has paticipant attempted to quit smoking.';


CREATE TABLE HEALTH_SERVICES_0 (
                PARENT_ID BIGINT NOT NULL,
                INSURANCE_STATUS VARCHAR NOT NULL,
                LAST_CHECKUP VARCHAR NOT NULL,
                PARTICIPANT_SMOKES BOOLEAN DEFAULT 0 NOT NULL,
                SMOKE_FREQ VARCHAR NOT NULL,
                ATTEMPT_SMOKE_QUIT BOOLEAN NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE HEALTH_SERVICES_0 MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE HEALTH_SERVICES_0 MODIFY COLUMN LAST_CHECKUP VARCHAR COMMENT 'Last routing checkup.';

ALTER TABLE HEALTH_SERVICES_0 MODIFY COLUMN PARTICIPANT_SMOKES BOOLEAN COMMENT 'Does the participant smoke.';

ALTER TABLE HEALTH_SERVICES_0 MODIFY COLUMN SMOKE_FREQ VARCHAR COMMENT 'Smoking frequency, no of cigarettes per day.';

ALTER TABLE HEALTH_SERVICES_0 MODIFY COLUMN ATTEMPT_SMOKE_QUIT BOOLEAN COMMENT 'Has paticipant attempted to quit smoking.';


CREATE TABLE PREGNANT_MOTHERS (
                PARENT_ID BIGINT NOT NULL,
                WEEKS_AFTER_DR_VISIT INT NOT NULL,
                MODE_OF_PAY VARCHAR NOT NULL,
                PRENATAL_CARE VARCHAR,
                NO_OF_CIGS VARCHAR NOT NULL,
                DISCUSSED_NO_SMOKING BOOLEAN DEFAULT 0 NOT NULL,
                ATTEMPT_STOP_SMOKING BOOLEAN NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE PREGNANT_MOTHERS MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE PREGNANT_MOTHERS MODIFY COLUMN WEEKS_AFTER_DR_VISIT INTEGER COMMENT 'only for pregnancy test or WIC';

ALTER TABLE PREGNANT_MOTHERS MODIFY COLUMN PRENATAL_CARE VARCHAR COMMENT 'nt.';

ALTER TABLE PREGNANT_MOTHERS MODIFY COLUMN NO_OF_CIGS VARCHAR COMMENT ' becoming pregnant.';

ALTER TABLE PREGNANT_MOTHERS MODIFY COLUMN DISCUSSED_NO_SMOKING BOOLEAN COMMENT 'Has the home visitor discussed not smoking during pregnancy.';

ALTER TABLE PREGNANT_MOTHERS MODIFY COLUMN ATTEMPT_STOP_SMOKING BOOLEAN COMMENT ' day since becoming pregnant.';


CREATE TABLE POSTPARTUM_MOTHERS (
                PARENT_ID BIGINT NOT NULL,
                REPEATED_PREGNANCY BOOLEAN DEFAULT 0 NOT NULL,
                PREGNANCY_DATE DATE,
                DEPRESSION_SCREENED BOOLEAN DEFAULT 0 NOT NULL,
                BREAST_FEEDING BOOLEAN DEFAULT 0 NOT NULL,
                WEEKS_BEFORE_BREAST_FEEDING INT NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE POSTPARTUM_MOTHERS MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE POSTPARTUM_MOTHERS MODIFY COLUMN REPEATED_PREGNANCY BOOLEAN COMMENT 'g program?';

ALTER TABLE POSTPARTUM_MOTHERS MODIFY COLUMN PREGNANCY_DATE DATE COMMENT ' repeated pregnancy.';

ALTER TABLE POSTPARTUM_MOTHERS MODIFY COLUMN DEPRESSION_SCREENED BOOLEAN COMMENT 'postpartum?';

ALTER TABLE POSTPARTUM_MOTHERS MODIFY COLUMN BREAST_FEEDING BOOLEAN COMMENT 'Did the mother initiate breast feeding?';

ALTER TABLE POSTPARTUM_MOTHERS MODIFY COLUMN WEEKS_BEFORE_BREAST_FEEDING INTEGER COMMENT 'Number of weeks, when mother started breast feeding.';


CREATE TABLE INTERACTIONS (
                PARENT_ID BIGINT NOT NULL,
                SAFE_SLEEPING BOOLEAN DEFAULT 0 NOT NULL,
                SHAKEN_BABY_SYNDROME BOOLEAN DEFAULT 0 NOT NULL,
                POISONING BOOLEAN DEFAULT 0 NOT NULL,
                PASENGER_SAFETY BOOLEAN DEFAULT 0 NOT NULL,
                FIRE_SAFETY BOOLEAN DEFAULT 0 NOT NULL,
                WATER_SAFETY BOOLEAN DEFAULT 0 NOT NULL,
                PLAYGROUND_SAFETY VARCHAR DEFAULT 0 NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE INTERACTIONS MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';


CREATE TABLE CHILD_DETAILS (
                CHILD_ID BIGINT AUTO_INCREMENT NOT NULL,
                PARENT_ID BIGINT NOT NULL,
                ENROLLMENT_DATE DATE NOT NULL,
                SSN BIGINT NOT NULL,
                FIRST_NAME VARCHAR NOT NULL,
                MIDDLE_NAME VARCHAR NOT NULL,
                LAST_NAME VARCHAR NOT NULL,
                BIRTH_DATE DATE NOT NULL,
                SEX CHAR NOT NULL,
                RACE VARCHAR NOT NULL,
                ETHNICITY VARCHAR NOT NULL,
                INSURANCE_PERIOD VARCHAR NOT NULL,
                INSURANCE_STATUS BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (CHILD_ID)
);

ALTER TABLE CHILD_DETAILS COMMENT 'This table maintains the record of child(meta data of child).';

ALTER TABLE CHILD_DETAILS MODIFY COLUMN CHILD_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE CHILD_DETAILS MODIFY COLUMN PARENT_ID BIGINT COMMENT 'This field stores the parent id of the child.';

ALTER TABLE CHILD_DETAILS MODIFY COLUMN ENROLLMENT_DATE DATE COMMENT 'This field is responsible for saving the date of enrollment.';

ALTER TABLE CHILD_DETAILS MODIFY COLUMN SSN BIGINT COMMENT 'SSN of the child.';


CREATE TABLE ASQ_GROWTH (
                CHILD_ID BIGINT NOT NULL,
                PROBLEM_IDENTIFIED BOOLEAN DEFAULT 0 NOT NULL,
                SCREENED BOOLEAN DEFAULT 0 NOT NULL,
                REFERRAL_MADE BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (CHILD_ID)
);

ALTER TABLE ASQ_GROWTH MODIFY COLUMN CHILD_ID BIGINT COMMENT ' identified by this unique id.';


CREATE TABLE ASQ_EMOTIONAL (
                CHILD_ID BIGINT NOT NULL,
                PROBLEM_IDENTIFIED BOOLEAN DEFAULT 0 NOT NULL,
                SCREENED BOOLEAN NOT NULL,
                REFERRAL_MADE BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (CHILD_ID)
);

ALTER TABLE ASQ_EMOTIONAL MODIFY COLUMN CHILD_ID BIGINT COMMENT ' identified by this unique id.';


CREATE TABLE ASQ_PROBLEM_SOLVING (
                CHILD_ID BIGINT NOT NULL,
                PROBLEM_IDENTIFIED BOOLEAN DEFAULT 0 NOT NULL,
                SCREENED BOOLEAN DEFAULT 0 NOT NULL,
                REFERRAL_MADE BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (CHILD_ID)
);

ALTER TABLE ASQ_PROBLEM_SOLVING MODIFY COLUMN CHILD_ID BIGINT COMMENT ' identified by this unique id.';


CREATE TABLE ASQ_PERSONAL_SOCIAL (
                CHILD_ID BIGINT NOT NULL,
                PROBLEM_IDENTIFIED BOOLEAN DEFAULT 0 NOT NULL,
                SCREENED BOOLEAN DEFAULT 0 NOT NULL,
                REFERRAL_MADE BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (CHILD_ID)
);

ALTER TABLE ASQ_PERSONAL_SOCIAL MODIFY COLUMN CHILD_ID BIGINT COMMENT ' identified by this unique id.';


CREATE TABLE ASQ_COMMUNICATION (
                CHILD_ID BIGINT NOT NULL,
                PROBLEM_IDENTIFIED BOOLEAN DEFAULT 0 NOT NULL,
                SCREENED BOOLEAN DEFAULT 0 NOT NULL,
                REFERRAL_MADE BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (CHILD_ID)
);

ALTER TABLE ASQ_COMMUNICATION MODIFY COLUMN CHILD_ID BIGINT COMMENT ' identified by this unique id.';


CREATE TABLE REFERRAL (
                PARENT_ID BIGINT NOT NULL,
                EPSDT_VISITS INT NOT NULL,
                NEEDING_SERVICES BOOLEAN DEFAULT 0 NOT NULL,
                FOLLOW_UP_COMPLETED BOOLEAN DEFAULT 0 NOT NULL,
                REFERRAL_MADE BOOLEAN DEFAULT 0 NOT NULL,
                PRIMARY KEY (PARENT_ID)
);

ALTER TABLE REFERRAL MODIFY COLUMN PARENT_ID BIGINT COMMENT ' identified by this unique id.';

ALTER TABLE REFERRAL MODIFY COLUMN EPSDT_VISITS INTEGER COMMENT 'e.';

ALTER TABLE REFERRAL MODIFY COLUMN NEEDING_SERVICES BOOLEAN COMMENT 'at program intake';


ALTER TABLE CHILD_DETAILS ADD CONSTRAINT parent_details_child_details_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE HEALTH_SERVICES_0 ADD CONSTRAINT parent_details_health_services_0_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE HEALTH_SERVICES_6 ADD CONSTRAINT parent_details_health_services_6_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE HEALTH_SERVICES_12 ADD CONSTRAINT parent_details_health_services_12_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE HEALTH_SERVICES_24 ADD CONSTRAINT parent_details_health_services_24_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE PREGNANT_MOTHERS ADD CONSTRAINT parent_details_pregnant_mothers_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE POSTPARTUM_MOTHERS ADD CONSTRAINT parent_details_postpartum_mothers_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE INTERACTIONS ADD CONSTRAINT parent_details_interactions_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE REFERRAL ADD CONSTRAINT parent_details_referral_fk
FOREIGN KEY (PARENT_ID)
REFERENCES PARENT_DETAILS (PARENT_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ASQ_COMMUNICATION ADD CONSTRAINT child_details_asq_communication_fk
FOREIGN KEY (CHILD_ID)
REFERENCES CHILD_DETAILS (CHILD_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ASQ_PERSONAL_SOCIAL ADD CONSTRAINT child_details_asq_personal_social_fk
FOREIGN KEY (CHILD_ID)
REFERENCES CHILD_DETAILS (CHILD_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ASQ_PROBLEM_SOLVING ADD CONSTRAINT child_details_asq_problem_solving_fk
FOREIGN KEY (CHILD_ID)
REFERENCES CHILD_DETAILS (CHILD_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ASQ_EMOTIONAL ADD CONSTRAINT child_details_asq_emotional_fk
FOREIGN KEY (CHILD_ID)
REFERENCES CHILD_DETAILS (CHILD_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE ASQ_GROWTH ADD CONSTRAINT child_details_asq_growth_fk
FOREIGN KEY (CHILD_ID)
REFERENCES CHILD_DETAILS (CHILD_ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

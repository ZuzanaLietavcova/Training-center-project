DELETE FROM MEMBER;
DELETE FROM TEAM;
DELETE FROM PROJECT;
DELETE FROM TRAINING;
DELETE FROM STUDY;
DELETE FROM CLASS;
DELETE FROM TRAINER;
DELETE FROM STUDENT;

ALTER TABLE student AUTO_INCREMENT = 1;
ALTER TABLE trainer AUTO_INCREMENT = 1;
ALTER TABLE class AUTO_INCREMENT = 1;
ALTER TABLE study AUTO_INCREMENT = 1;
ALTER TABLE training AUTO_INCREMENT = 1;
ALTER TABLE project AUTO_INCREMENT = 1;
ALTER TABLE team AUTO_INCREMENT = 1;
ALTER TABLE member AUTO_INCREMENT = 1;

ALTER TABLE team AUTO_INCREMENT = 1;
ALTER TABLE member AUTO_INCREMENT = 1;

INSERT INTO student(name, password) VALUES ("Niels Dawartz", "123");
INSERT INTO student(name, password) VALUES ("Zuzana Lietavcova", "1234");
INSERT INTO student(name, password) VALUES ("Petit Prince", "123");
INSERT INTO student(name, password) VALUES ("Amelie Poulain", "1234");
INSERT INTO Student (name, password) VALUES ("Daniel","123");
INSERT INTO Student (name, password) VALUES ("Bassel","123");

INSERT INTO trainer(name, password) VALUES ("Michel Plasse", "123");
INSERT INTO trainer(name, password) VALUES ("Bill Gates", "1234");

INSERT INTO class(name) VALUES ("Mathematical Structures in Informatics");
INSERT INTO class(name) VALUES ("Multiagent systems");

INSERT INTO study(student_id, class_id) VALUES (1,1);
INSERT INTO study(student_id, class_id) VALUES (1,2);
INSERT INTO study(student_id, class_id) VALUES (2,1);
INSERT INTO study(student_id, class_id) VALUES (2,2);
INSERT INTO study(student_id, class_id) VALUES (3,1);
INSERT INTO study(student_id, class_id) VALUES (4,1);
INSERT INTO study(student_id, class_id) VALUES (5,1);
INSERT INTO study(student_id, class_id) VALUES (6,2);

INSERT INTO Training (Class_id, Trainer_id) VALUES (1, 1);
INSERT INTO Training (Class_id, Trainer_id) VALUES (2, 2);

INSERT INTO project (title, subject, Creation_time, deadline, trainer_id, class_id)
	VALUES ("Web Developement Project", "final project", "2016-02-01","2016-04-02", 1, 1);

INSERT INTO team (summary, project_id, student_creator_id) VALUES ("Cool team", 1, 1);

INSERT INTO member (team_id, student_id) VALUES (1, 1);
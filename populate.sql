USE training_center_project;

USE DELIMITER $$

DROP PROCEDURE IF EXISTS populate $$
CREATE PROCEDURE populate()
BEGIN
DELETE from project;
DELETE from class;
DELETE from trainer;

SELECT * FROM trainer;
SELECT * from project;
SELECT * from class;

INSERT INTO trainer VALUES ("my_trainer");
INSERT INTO class VALUES(1, "myclas", 1);
INSERT INTO project VALUES (1, "title", "subject", NULL, NULL, 1);
END $$

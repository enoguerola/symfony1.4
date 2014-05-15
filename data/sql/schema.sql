CREATE TABLE language (idlang INT AUTO_INCREMENT, descriptor CHAR(2) DEFAULT '' NOT NULL, PRIMARY KEY(idlang)) ENGINE = INNODB;
CREATE TABLE project (idproject INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, PRIMARY KEY(idproject)) ENGINE = INNODB;
CREATE TABLE text_translation (idtext INT, paragraph TEXT, status TINYINT(1), lang CHAR(2), PRIMARY KEY(idtext, lang)) ENGINE = INNODB;
CREATE TABLE text (idtext INT AUTO_INCREMENT, app TINYINT(1), web TINYINT(1), destinationfile VARCHAR(250), idproject INT NOT NULL, created DATETIME, updated DATETIME, INDEX idproject_idx (idproject), PRIMARY KEY(idtext)) ENGINE = INNODB;
ALTER TABLE text_translation ADD CONSTRAINT text_translation_idtext_text_idtext FOREIGN KEY (idtext) REFERENCES text(idtext) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE text ADD CONSTRAINT text_idproject_project_idproject FOREIGN KEY (idproject) REFERENCES project(idproject);

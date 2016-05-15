/*
Created		7.3.2016
Modified		7.3.2016
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/




Create table users (
	id Int NOT NULL AUTO_INCREMENT,
	first_name Varchar(50),
	last_name Varchar(100) NOT NULL,
	email Varchar(100) NOT NULL,
	pass Varchar(50) NOT NULL,
	avatar Varchar(200),
	UNIQUE (email),
 Primary Key (id)) ENGINE = MyISAM;

Create table tasks (
	id Int NOT NULL AUTO_INCREMENT,
	team_id Int,
	user_id Int NOT NULL,
	group_id Int NOT NULL,
	title Varchar(50) NOT NULL,
	description Text,
	date_add Timestamp NOT NULL,
	date_end Timestamp,
	deadline Timestamp,
	priority Int NOT NULL DEFAULT 10,
 Primary Key (id)) ENGINE = MyISAM;

Create table groups (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(50) NOT NULL,
	description Text,
 Primary Key (id)) ENGINE = MyISAM;

Create table files (
	id Int NOT NULL AUTO_INCREMENT,
	task_id Int NOT NULL,
	url Varchar(200) NOT NULL,
	title Varchar(50) NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table teams (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(50) NOT NULL,
	description Text NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table teams_users (
	id Int NOT NULL AUTO_INCREMENT,
	team_id Int NOT NULL,
	user_id Int NOT NULL,
	admin Int NOT NULL DEFAULT 0,
 Primary Key (id)) ENGINE = MyISAM;






Alter table tasks add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table teams_users add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table files add Foreign Key (task_id) references tasks (id) on delete  restrict on update  restrict;
Alter table tasks add Foreign Key (group_id) references groups (id) on delete  restrict on update  restrict;
Alter table teams_users add Foreign Key (team_id) references teams (id) on delete  restrict on update  restrict;
Alter table tasks add Foreign Key (team_id) references teams (id) on delete  restrict on update  restrict;




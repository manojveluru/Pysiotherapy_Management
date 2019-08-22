#tables for Group Project
drop table if exists Activity;
drop table if exists Undergoes;
drop table if exists Conducts;
drop table if exists Appointment;
drop table if exists Patient;
drop table if exists Exercises;
drop table if exists Therapist; 

CREATE TABLE Patient
(PatientId int auto_increment PRIMARY KEY,
FirstName CHAR(20) NOT NULL,
LastName CHAR(20) NOT NULL,
Sex CHAR(10) NOT NULL,
Phone BIGINT NOT NULL, 
DateOfBirth Date NOT NULL,
Address CHAR(250) NOT NULL,
City CHAR(20) NOT NULL,
State CHAR(20) NOT NULL,
Zip VARCHAR(5) NOT NULL);

CREATE TABLE Therapist
(TherapistId int auto_increment PRIMARY KEY,
FirstName CHAR(20) NOT NULL,
LastName CHAR(20) NOT NULL,
Phone BIGINT NOT NULL,
Email VARCHAR(30) NOT NULL,
UserName VARCHAR (50) NOT NULL,
Password VARCHAR (20) NOT NULL);

CREATE TABLE Exercises
(ExerciseNumber int auto_increment PRIMARY KEY,
Bodypart CHAR(20),
TherapistId int,
foreign key (TherapistId) references Therapist(TherapistId) ON DELETE CASCADE);

CREATE TABLE Appointment
(AppointmentNumber int auto_increment PRIMARY KEY,
Duration int,
AppointmentDate Date,
AppointmentTime time(0),
PatientId int,
TherapistId int,
ExerciseNumber int,
foreign key (PatientId) references Patient(PatientId) ON DELETE CASCADE,
foreign key (TherapistId) references Therapist(TherapistId) ON DELETE CASCADE,
foreign key (ExerciseNumber) references Exercises(ExerciseNumber) ON DELETE CASCADE);

CREATE TABLE Undergoes
(PatientId int,
ExerciseNumber int,
foreign key (PatientId) references Patient(PatientId) ON DELETE CASCADE,
foreign key (ExerciseNumber) references Exercises(ExerciseNumber) ON DELETE CASCADE);

CREATE TABLE Conducts
(TherapistId int,
ExerciseNumber int,
foreign key (TherapistId) references Therapist(TherapistId) ON DELETE CASCADE,
foreign key (ExerciseNumber) references Exercises(ExerciseNumber) ON DELETE CASCADE);

CREATE TABLE Activity
(ActivityNumber int auto_increment PRIMARY KEY,
WeightOfElasticBand int,
ColorElasticBand CHAR(20),
Reps int,
AppointmentNumber int,
ExerciseNumber int,
foreign key (ExerciseNumber) references Exercises(ExerciseNumber) ON DELETE CASCADE,
foreign key (AppointmentNumber) references Appointment(AppointmentNumber) ON DELETE CASCADE);


insert into Patient (FirstName, LastName, Sex, Phone, DateOfBirth, Address, City, State, Zip) Values
('Srikanth Reddy', 'Nagidi', 'Male', 2106687412, '1991-04-07','1083 first Avenue','Dekalb', 'Illinois', '60115'), /*1*/
('Leela Krishna Vasista', 'Gutta', 'Male', 2106687413, '1993-12-08','1073 Seccond Street', 'Chicago', 'Illinois', '61134'), /*2*/
('Rahul Reddy', 'Gopu', 'Male', 2106687414, '1996-11-04', '1089 North Road', 'Chicago', 'Illinois', '61135'), /*3*/
('Saran Kumar Reddy', 'Padala', 'Male', 2106687415, '1995-08-06','1143 South Street', 'DeKalb', 'Illinois', '60115'), /*4*/
('Manoj', 'Vellure', 'Male', 2106687416, '1993-01-12','115 Northern Road', 'Rockford', 'Illinois', '61127'), /*5*/
('Raga', 'Susmitha', 'Female', 2106687417,'1994-02-11','1073 Pendown street', 'Aurora', 'Illinois', '61134'); /*6*/

insert into Therapist (FirstName, LastName, Phone, Email, UserName, Password) Values
('Dr. John', 'Christoph', 8155939797, 'john.christoph@live.com','john.christoph', '123456' ), /*1*/
('Dr. Paul', 'Williams', 8155939898, 'paul.williams@live.com', 'paul.williams', '654321'), /*2*/
('Dr. Eric', 'Selvig', 8155939999, 'eric.selvig@live.com','eric.selvig', '111111'), /*3*/
('Dr. Bruce', 'Wayne', 8156949696, 'bruce.wayne@live.com','bruce.wayne', '000000'); /*4*/

insert into Exercises (Bodypart, TherapistId) Values /*ExerciseNumber auto increment*/
('knee', 1), /*1*/
('shoulder', 2), /*2*/
('chest', 3); /*3*/

insert into Conducts(TherapistId, ExerciseNumber) Values
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 2),
(4, 3);

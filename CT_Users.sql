CREATE DATABASE CT_Users;
use CT_Users;

create table department(
deptID int(20) NOT NULL auto_increment,
deptName varchar(100) NOT NULL,
phoneNumber varchar(15) NOT NULL,
PRIMARY KEY(deptID)
);

create table users(
userID int(20) NOT NULL auto_increment,
userName varchar(40) NOT NULL,
pass varchar(256) NOT NULL,
fName varchar(25) NOT NULL, 
lName varchar(25) NOT NULL,
email varchar(50) NOT NULL,
phoneNumber varchar(15) NOT NULL,
cellNumber varchar(15) NULL,
dept_ID int(20),
address varchar(100) NOT NULL,
signature varchar(50) NOT NULL,
dateSigned DATETIME NOT NULL,
questions varchar(1000) NULL,
concerns varchar(1000) NULL,
comments varchar(1000) NULL,
PRIMARY KEY(userID),
FOREIGN KEY(dept_ID) REFERENCES department(deptID)
);

create table typeOfForm(
typeID int(20) NOT NULL auto_increment,
formType varchar(100) NOT NULL,
PRIMARY KEY(typeID)
);

create table forms(
formID int(20) NOT NULL auto_increment,
type_ID int(20) NOT NULL,
user_ID int(20) NOT NULL,
dept_ID int(20) NOT NULL,
submitDate DATE NOT NULL,
reviewEmp int(20) NOT NULL, #employee reviewing the application
fname varchar(25) NOT NULL, 
lname varchar(25) NOT NULL,
address varchar(100) NOT NULL,
AlarmAd varchar(100) NOT NULL,
AD varchar(50) NOT NULL,
TA varchar(50) NOT NULL,
LO varchar(75) NOT NULL,
CS varchar(100) NOT NULL,
ACname varchar(100) NOT NULL,
ACaddress varchar(100) NOT NULL,
ACphone varchar(15) NOT NULL,
Ename1 varchar(50) NOT NULL,
Ephone1 varchar(15) NOT NULL,
Ename2 varchar(50) NOT NULL,
Ephone2 varchar(15) NOT NULL,
Ename3 varchar(50) NULL,
Ephone3 varchar(15) NULL,
appElecSig varchar(50) NOT NULL,
PRIMARY KEY(formID),
FOREIGN KEY(type_ID) REFERENCES typeOfForm(typeID),
FOREIGN KEY(user_ID) REFERENCES users(userID),
FOREIGN KEY(dept_ID) REFERENCES department(deptID)
);

create table payments(
paymentId int(20) NOT NULL auto_increment,
user_ID int(20) NOT NULL,
ccNumber int(16) NOT NULL,
ccSecCode int(3) NOT NULL,
ccExpDate DATE NOT NULL,
ccType varchar(30) NOT NULL, 
form_ID int(20) NOT NULL,
amountPaid decimal(10, 2) NOT NULL,
PRIMARY KEY(paymentId),
FOREIGN KEY(user_ID) REFERENCES users(userID),
FOREIGN KEY(form_ID) REFERENCES forms(formID)
);


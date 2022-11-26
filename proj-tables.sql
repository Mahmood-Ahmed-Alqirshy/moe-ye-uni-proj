create database moe;
use moe;
create table Governorates(
	ID int auto_increment primary key,
    governorate varchar(45) not null
);
create table Directorates(
	ID int auto_increment primary key,
    directorate varchar(45) not null,
    governorate int,
    foreign key(governorate) references Governorates(ID)
);
create table Nationalities(
	ID int auto_increment primary key,
    nationality varchar(45) not null
);
create table Sex(
	ID int auto_increment primary key,
    sex varchar(45) not null
);
create table Statuses(
	ID int auto_increment primary key,
    request_status varchar(45) not null
);
create table Grades(
	ID int auto_increment primary key,
    grade varchar(45) not null,
    foreign key(stage) references Stages(ID)
);
create table Subjects(
	ID int auto_increment primary key,
    studying_subject varchar(45) not null
);
create table Books(
	ID int auto_increment primary key,
    book_name varchar(45) not null,
    book_subject int,
    book_grade int,
    term int,
    book_path varchar(255),
    foreign key(book_subject) references Subjects(ID),
    foreign key(book_grade) references Grades(ID)
);
create table Genders(
	ID int auto_increment primary key,
    gender varchar(45) not null
);
create table School_types(
	ID int auto_increment primary key,
    school_type varchar(45) not null
);
create table Schools(
	ID int auto_increment primary key,
    school_name varchar(45) not null,
    directorate int not null,
    gender int,
    school_type int,
    nationality int,
    e_mail varchar(45),
    address varchar(45),
    phone varchar(45),
    google_map varchar(255),
    primary_school int,
    middle_school int,
    secondary_school int,
    foreign key(directorate) references Directorates(ID),
    foreign key(gender) references Genders(ID),
    foreign key(school_type) references School_types(ID),
    foreign key(nationality) references Nationalities(ID)
);
create table Students(
	ID int auto_increment primary key,
    student_name varchar(45) not null,
    nationality int,
    sex int not null,
    school int,
    birth_certificate varchar(45) not null,
    grade int,
    residence int,
    date_of_birth date,
    address varchar(45),
    student_photo varchar(255) not null,
    e_mail varchar(45),
    phone varchar(45),
    clearance_letters tinyint,
    foreign key(nationality) references Nationalities(ID),
    foreign key(sex) references Sex(ID),
    foreign key(school) references Schools(ID),
    foreign key(grade) references Grades(ID),
    foreign key(residence) references Directorates(ID)
);
create table Student_auth(
	ID int primary key,
    username varchar(45) not null,
    user_password varchar(255) not null,
    session_id varchar(255) not null,
    foreign key(ID) references Students(ID)
);
create table Students_results(
	ID int auto_increment primary key,
    student_ID int not null,
    result_subject int not null,
    grade int not null,
    term int,
    book int,
    mark int,
    foreign key(student_ID) references Students(ID),
    foreign key(result_subject) references Subjects(ID),
    foreign key(grade) references Grades(ID),
    foreign key(book) references Books(ID)
);
create table High_school_majors(
	ID int auto_increment primary key,
    major varchar(45) not null
);
create table Seat_numbers(
	ID int auto_increment primary key,
    student_ID int not null,
    seat_number varchar(45) not null,
    exam_center int,
    academic_year year not null,
    high_school_major int not null,
    foreign key(student_ID) references Students(ID),
    foreign key(exam_center) references Schools(ID),
    foreign key(high_school_major) references High_school_majors(ID)
);
create table Complaints_suggestions_inquiries (
	ID int auto_increment primary key,
	content TEXT not null,
	send_date DATE,
	e_mail VARCHAR(45)
);
create table Activities_and_events (
	ID int auto_increment primary key,
	activitie_name VARCHAR(45) not null,
	activitie_start DATETIME not null,
	activitie_end DATETIME
);
create table News (
	ID int auto_increment primary key,
	title VARCHAR(255) not null,
	post_date DATETIME,
	content TEXT not null,
	cover VARCHAR(255) not null
);
create table Programs_and_courses (
	ID int auto_increment primary key,
	program_name VARCHAR(45),
	discription VARCHAR(600),
	price INT,
	lenght INT,
	location VARCHAR(45),
	program_start DATE,
	cover VARCHAR(255),
    google_map VARCHAR(255)
);
create table Reject_types (
	ID int auto_increment primary key,
    rejection_type varchar(45) not null
);
create table Rejects (
	request_id INT not null,
	rejection_type int not null,
	massage text not null,
    rejection_source varchar(45),
    foreign key(rejection_type) references Reject_types(id)
);
create table Request_certificate_equation(
	ID int auto_increment primary key,
	student_id INT not null,
    seat_numbers_image VARCHAR(255) not null,
	request_status INT default 1,
    foreign key(student_id) references Students(ID),
    foreign key(request_status) references Statuses(ID)
);
create table Request_to_move_student (
	ID int auto_increment primary key,
	student INT not null,
	old_school INT not null,
	old_school_respond INT not null default 1,
	new_school INT not null,
	new_school_respond INT not null default 1,
    foreign key(student) references Students(id),
    foreign key(old_school) references Schools(ID),
	foreign key(new_school) references Schools(ID),
    foreign key(old_school_respond) references Statuses(ID),
    foreign key(new_school_respond) references Statuses(ID)
);
create table Request_high_school_certificate (
	ID int auto_increment primary key,
	seat_number_id INT not null,
	request_status INT not null default 1,
	seat_numbers_image VARCHAR(255) not null,
    foreign key(seat_number_id) references Seat_numbers(ID),
    foreign key(request_status) references Statuses(ID)
);
create table Students_request_to_register (
	ID int auto_increment primary key,
	student_name VARCHAR(255) not null,
	nationality INT not null,
	sex INT not null,
	school INT not null,
	birth_certificate VARCHAR(255) not null,
	grade INT not null,
	residence INT not null,
	date_of_birth DATE not null,
	address VARCHAR(45),
	student_photo VARCHAR(255) not null,
	e_mail VARCHAR(45),
	phone VARCHAR(45),
	request_status INT not null default 1,
    foreign key(nationality) references Nationalities(ID),
    foreign key(sex) references Sex(ID),
    foreign key(school) references Schools(ID),
    foreign key(grade) references Grades(ID),
    foreign key(residence) references Directorates(ID),
    foreign key(request_status) references Statuses(ID)
);
create table Request_scholarship (
	ID int auto_increment primary key,
	student_id INT not null,
	passport_image VARCHAR(255) not null,
	certificate_of_good_conduct VARCHAR(255) not null,
    seat_numbers_image VARCHAR(255) not null,
	request_status INT not null  default 1,
    foreign key(student_ID) references Students(ID),
    foreign key(request_status) references Statuses(ID)
);
create table Grievances (
	ID int auto_increment primary key,
	result INT not null,
	request_status INT not null default 1,
    foreign key(result) references Students_results(ID), 
    foreign key(request_status) references Statuses(ID)
);

create table Job_types (
	ID int primary key auto_increment,
    job_type varchar(45) not null
);
create table Employees(
	ID int primary key auto_increment,
    employee_name varchar(45) not null,
    job_type int,
    workplace int,
    certificate varchar(255),
    salary int default 0,
    foreign key(job_type) references Job_types(ID),
    foreign key(workplace) references Schools(ID)
);
create table Employee_auth(
	ID int primary key,
    username varchar(45) not null,
    user_password varchar(255) not null,
    session_id varchar(255) not null,
    is_admin boolean not null default false,
    foreign key(ID) references Employees(ID)
);
-- Database Section
-- ________________ 
drop database if exists AlmaMatch;

create database AlmaMatch;
use AlmaMatch;

-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table USERS (
    user_id int primary key auto_increment,
    username varchar(50) not null unique,
    name varchar(50) not null,
    surname varchar(50) not null,
    email varchar(100) not null unique,
    password varchar(255) not null,
    picture1 varchar(255) not null,
    picture2 varchar(255),
    picture3 varchar(255),
    role enum("STUDENT", "ADMIN") not null default "STUDENT",
    created_at timestamp default current_timestamp
);

create table STUDENT_DETAILS (
    user_id int primary key,
    study_plan varchar(255) not null,
    searching_partners enum("COMPUTER SCIENCE", "BIOLOGY", "ELECTRONIC", "MECHANIC") not null,
    communication_style enum("CHAT", "VIDEO CALL", "IN PERSON") not null,
    constraint FK_student_details_user foreign key (user_id) references USERS(user_id) on delete cascade
);

create table MATCHES (
    match_id int primary key auto_increment,
    student1_id int not null,
    student2_id int not null,
    matched_at timestamp default current_timestamp,
    constraint FK_student1 foreign key (student1_id) references USERS(user_id),
    constraint FK_student2 foreign key (student2_id) references USERS(user_id),
    constraint UQ_students_match unique (student1_id, student2_id),
    constraint CHK_match_order check (student1_id < student2_id)
);

create table MESSAGES (
    message_id int primary key auto_increment,
    match_id int not null,
    sender_id int not null,
    content text not null,
    sent_at timestamp default current_timestamp,
    constraint FK_match foreign key (match_id) references MATCHES(match_id),
    constraint FK_sender foreign key (sender_id) references USERS(user_id)
);

create table LIKES (
    like_id int primary key auto_increment,
    liker_id int not null,
    liked_id int not null,
    liked_at timestamp default current_timestamp,
    constraint FK_liker foreign key (liker_id) references USERS(user_id),
    constraint FK_liked foreign key (liked_id) references USERS(user_id),
    constraint UQ_like_pair unique (liker_id, liked_id),
    constraint CHK_no_self_like check (liker_id <> liked_id)
);

create table DISLIKES (
    dislike_id int primary key auto_increment,
    disliker_id int not null,
    disliked_id int not null,
    disliked_at timestamp default current_timestamp,
    constraint FK_disliker foreign key (disliker_id) references USERS(user_id),
    constraint FK_disliked foreign key (disliked_id) references USERS(user_id),
    constraint UQ_dislike_pair unique (disliker_id, disliked_id),
    constraint CHK_no_self_dislike check (disliker_id <> disliked_id)
);

create table SUPERLIKES (
    superlike_id int primary key auto_increment,
    superliker_id int not null,
    superliked_id int not null,
    superliked_at timestamp default current_timestamp,
    constraint FK_superliker foreign key (superliker_id) references USERS(user_id),
    constraint FK_superliked foreign key (superliked_id) references USERS(user_id),
    constraint UQ_superlike_pair unique (superliker_id, superliked_id),
    constraint CHK_no_self_superlike check (superliker_id <> superliked_id)
);

create table FIRST_IMPRESSIONS (
    impression_id int primary key auto_increment,
    viewer_id int not null,
    viewed_id int not null,
    impression text not null,
    impressed_at timestamp default current_timestamp,
    constraint FK_viewer foreign key (viewer_id) references USERS(user_id),
    constraint FK_viewed foreign key (viewed_id) references USERS(user_id),
    constraint UQ_impression_pair unique (viewer_id, viewed_id),
    constraint CHK_no_self_impression check (viewer_id <> viewed_id)
);

create table REPORTS (
    report_id int primary key auto_increment,
    reporter_id int not null,
    reported_id int not null,
    reason varchar(255) not null,
    reported_at timestamp default current_timestamp,
    constraint FK_reporter foreign key (reporter_id) references USERS(user_id),
    constraint FK_reported foreign key (reported_id) references USERS(user_id)
);


-- Index Section
-- _____________ 

-- USERS table population
-- Password hash example (e.g., 'password')
INSERT INTO USERS (username, name, surname, email, password, picture1, picture2, picture3, role) VALUES
('alice_w', 'Alice', 'Wonderland', 'alice@unibo.it', 'password', 'alice1.jpg', 'alice2.jpg', NULL, 'STUDENT'),
('bob_b', 'Bob', 'Builder', 'bob@unibo.it', 'password', 'bob1.jpg', NULL, NULL, 'STUDENT'),
('charlie_c', 'Charlie', 'Chocolate', 'charlie@unibo.it', 'password', 'charlie1.jpg', 'charlie2.jpg', 'charlie3.jpg', 'STUDENT'),
('diana_p', 'Diana', 'Prince', 'diana@unibo.it', 'password', 'diana1.jpg', NULL, NULL, 'STUDENT'),
('eve_s', 'Eve', 'Smith', 'eve@unibo.it', 'password', 'eve1.jpg', 'eve2.jpg', NULL, 'STUDENT'),
('admin_user', 'Admin', 'System', 'admin@almamatch.it', 'password', 'admin.jpg', NULL, NULL, 'ADMIN');

-- STUDENT_DETAILS table population
INSERT INTO STUDENT_DETAILS (user_id, study_plan, searching_partners, communication_style) VALUES
(1, 'Computer Science', 'BIOLOGY', 'CHAT'),
(2, 'Biology', 'COMPUTER SCIENCE', 'VIDEO CALL'),
(3, 'Electronic Engineering', 'MECHANIC', 'IN PERSON'),
(4, 'Mechanical Engineering', 'ELECTRONIC', 'CHAT'),
(5, 'Computer Science', 'COMPUTER SCIENCE', 'IN PERSON');

-- LIKES table population
INSERT INTO LIKES (liker_id, liked_id) VALUES
(1, 2), -- Alice likes Bob
(2, 1), -- Bob likes Alice
(3, 4), -- Charlie likes Diana
(4, 3), -- Diana likes Charlie
(5, 1); -- Eve likes Alice

-- DISLIKES table population
INSERT INTO DISLIKES (disliker_id, disliked_id) VALUES
(1, 3), -- Alice dislikes Charlie
(2, 5); -- Bob dislikes Eve

-- SUPERLIKES table population
INSERT INTO SUPERLIKES (superliker_id, superliked_id) VALUES
(5, 2); -- Eve superlikes Bob

-- MATCHES table population (Alice-Bob, Charlie-Diana)
INSERT INTO MATCHES (student1_id, student2_id) VALUES
(1, 2),
(3, 4);

-- MESSAGES table population
INSERT INTO MESSAGES (match_id, sender_id, content) VALUES
(1, 1, 'Ciao Bob! Ho visto che studi Biologia.'),
(1, 2, 'Ehi Alice! Sì, esatto. Tu Informatica giusto?'),
(1, 1, 'Sì! Cerco qualcuno per un progetto interdisciplinare.'),
(2, 3, 'Ciao Diana, piacere di conoscerti.'),
(2, 4, 'Piacere mio Charlie!');

-- FIRST_IMPRESSIONS table population
INSERT INTO FIRST_IMPRESSIONS (viewer_id, viewed_id, impression) VALUES
(1, 2, 'Sembra una persona molto studiosa.'),
(3, 4, 'Ha un sorriso simpatico.');

-- REPORTS table population
INSERT INTO REPORTS (reporter_id, reported_id, reason) VALUES
(5, 3, 'Profilo sospetto, sembra falso.');

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
    name varchar(50) not null,
    surname varchar(50) not null,
    email varchar(100) not null unique,
    password varchar(255) not null,
    role enum("STUDENT", "ADMIN") not null default "STUDENT",
    created_at timestamp default current_timestamp
);

-- Correzione virgola mancante dopo display_order
create table USER_IMAGES (
    image_id int primary key auto_increment,
    user_id int not null,
    image_path varchar(255) not null,
    alt_text varchar(255),
    display_order int default 1,
    constraint FK_user_images foreign key (user_id) references USERS(user_id) on delete cascade,
    constraint UQ_user_image_order unique (user_id, display_order)
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
    constraint FK_student1 foreign key (student1_id) references USERS(user_id) on delete cascade,
    constraint FK_student2 foreign key (student2_id) references USERS(user_id) on delete cascade,
    constraint UQ_students_match unique (student1_id, student2_id),
    constraint CHK_match_order check (student1_id < student2_id)
);

create table MESSAGES (
    message_id int primary key auto_increment,
    sender_id int not null,
    receiver_id int not null,
    content text not null,
    sent_at timestamp default current_timestamp,
    constraint FK_sender foreign key (sender_id) references USERS(user_id) on delete cascade,
    constraint FK_receiver foreign key (receiver_id) references USERS(user_id) on delete cascade
);

create table LIKES (
    like_id int primary key auto_increment,
    liker_id int not null,
    liked_id int not null,
    liked_at timestamp default current_timestamp,
    constraint FK_liker foreign key (liker_id) references USERS(user_id) on delete cascade,
    constraint FK_liked foreign key (liked_id) references USERS(user_id) on delete cascade,
    constraint UQ_like_pair unique (liker_id, liked_id),
    constraint CHK_no_self_like check (liker_id <> liked_id)
);

create table DISLIKES (
    dislike_id int primary key auto_increment,
    disliker_id int not null,
    disliked_id int not null,
    disliked_at timestamp default current_timestamp,
    constraint FK_disliker foreign key (disliker_id) references USERS(user_id) on delete cascade,
    constraint FK_disliked foreign key (disliked_id) references USERS(user_id) on delete cascade,
    constraint UQ_dislike_pair unique (disliker_id, disliked_id),
    constraint CHK_no_self_dislike check (disliker_id <> disliked_id)
);

create table SUPERLIKES (
    superlike_id int primary key auto_increment,
    superliker_id int not null,
    superliked_id int not null,
    superliked_at timestamp default current_timestamp,
    constraint FK_superliker foreign key (superliker_id) references USERS(user_id) on delete cascade,
    constraint FK_superliked foreign key (superliked_id) references USERS(user_id) on delete cascade,
    constraint UQ_superlike_pair unique (superliker_id, superliked_id),
    constraint CHK_no_self_superlike check (superliker_id <> superliked_id)
);

create table FIRST_IMPRESSIONS (
    impression_id int primary key auto_increment,
    viewer_id int not null,
    viewed_id int not null,
    impression text not null,
    impressed_at timestamp default current_timestamp,
    constraint FK_viewer foreign key (viewer_id) references USERS(user_id) on delete cascade,
    constraint FK_viewed foreign key (viewed_id) references USERS(user_id) on delete cascade,
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

-- View Section
-- _____________

create view VIEW_USER_MATCHES AS
SELECT
    match_id,
    student1_id AS user_id,
    student2_id AS matched_user_id,
    matched_at
FROM MATCHES
UNION ALL
SELECT
    match_id,
    student2_id AS user_id,
    student1_id AS matched_user_id,
    matched_at
FROM MATCHES;




-- Index Section
-- _____________

-- 1. Inserimento UTENTI (USERS)
-- Nota: Le password qui sono in chiaro per esempio. In produzione dovrebbero essere hashate.
INSERT INTO USERS (name, surname, email, password, role) VALUES 
('Mario', 'Rossi', 'mario.rossi@studio.unibo.it', 'password123', 'STUDENT'),       -- ID: 1
('Luca', 'Bianchi', 'luca.bianchi@studio.unibo.it', 'password123', 'STUDENT'),     -- ID: 2
('Giulia', 'Verdi', 'giulia.verdi@studio.unibo.it', 'password123', 'STUDENT'),     -- ID: 3
('Sofia', 'Neri', 'sofia.neri@studio.unibo.it', 'password123', 'STUDENT'),         -- ID: 4
('Marco', 'Gialli', 'marco.gialli@studio.unibo.it', 'password123', 'STUDENT'),     -- ID: 5
('Admin', 'Super', 'admin@almamatch.it', 'adminpass', 'ADMIN');                    -- ID: 6

-- 2. Inserimento DETTAGLI STUDENTI (STUDENT_DETAILS)
INSERT INTO STUDENT_DETAILS (user_id, study_plan, searching_partners, communication_style) VALUES
(1, 'Informatica per il Management', 'BIOLOGY', 'CHAT'),
(2, 'Scienze Biologiche', 'COMPUTER SCIENCE', 'VIDEO CALL'),
(3, 'Ingegneria Elettronica', 'MECHANIC', 'IN PERSON'),
(4, 'Ingegneria Meccanica', 'ELECTRONIC', 'IN PERSON'),
(5, 'Informatica', 'BIOLOGY', 'CHAT');

-- 3. Inserimento IMMAGINI UTENTI (USER_IMAGES)
INSERT INTO USER_IMAGES (user_id, image_path, alt_text, display_order) VALUES
(1, '/uploads/mario1.jpg', 'Mario al mare', 1),
(1, '/uploads/mario2.jpg', 'Mario in biblioteca', 2),
(2, '/uploads/luca1.jpg', 'Luca che suona la chitarra', 1),
(3, '/uploads/giulia1.jpg', 'Giulia ritratto', 1),
(4, '/uploads/sofia1.jpg', 'Sofia escursione', 1),
(5, '/uploads/marco1.jpg', 'Marco laurea', 1);

-- 4. Inserimento LIKES
-- Mario (1) mette like a Luca (2)
-- Luca (2) mette like a Mario (1) -> Questo creerà un MATCH logico
-- Giulia (3) mette like a Sofia (4)
INSERT INTO LIKES (liker_id, liked_id) VALUES
(1, 2),
(2, 1),
(3, 4);

-- 5. Inserimento DISLIKES
-- Sofia (4) non è interessata a Marco (5)
INSERT INTO DISLIKES (disliker_id, disliked_id) VALUES
(4, 5);

-- 6. Inserimento SUPERLIKES
-- Marco (5) è molto interessato a Giulia (3)
INSERT INTO SUPERLIKES (superliker_id, superliked_id) VALUES
(5, 3);

-- 7. Inserimento MATCHES
-- Poiché Mario (1) e Luca (2) si sono messi like a vicenda, inseriamo il match.
-- Constraint: student1_id < student2_id
INSERT INTO MATCHES (student1_id, student2_id) VALUES
(1, 2);

-- 8. Inserimento MESSAGGI (MESSAGES)
-- Conversazione tra Mario (1) e Luca (2)
INSERT INTO MESSAGES (sender_id, receiver_id, content) VALUES
(1, 2, 'Ciao Luca! Ho visto che studi Biologia, interessante!'),
(3, 2, 'Prova messaggio'),
(2, 1, 'Ehi Mario! Sì esatto. Tu Informatica? Mi servirebbe una mano con Python ahah'),
(1, 2, 'Volentieri, se mi aiuti con Genetica siamo pari!');

-- 9. Inserimento PRIME IMPRESSIONI (FIRST_IMPRESSIONS)
INSERT INTO FIRST_IMPRESSIONS (viewer_id, viewed_id, impression) VALUES
(3, 5, 'Sembra una persona molto studiosa e seria.');

-- 10. Inserimento SEGNALAZIONI (REPORTS)
-- Qualcuno segnala Marco


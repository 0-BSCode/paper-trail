CREATE DATABASE IF NOT EXISTS paper_trail_db;

USE paper_trail_db;

CREATE TABLE
    IF NOT EXISTS `user` (
        user_id INT NOT NULL AUTO_INCREMENT,
        first_name VARCHAR(300) NOT NULL,
        last_name VARCHAR(300) NOT NULL,
        password VARCHAR(280) NOT NULL,
        email VARCHAR(300) NOT NULL,
        role ENUM ('student', 'organization') NOT NULL DEFAULT 'student',
        CONSTRAINT PK_User PRIMARY KEY (user_id),
        CONSTRAINT UC_User_Email UNIQUE (email)
    );

CREATE TABLE
    IF NOT EXISTS `category` (
        category_id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        CONSTRAINT PK_Category PRIMARY KEY (category_id)
    );

CREATE TABLE
    IF NOT EXISTS `status` (
        status_id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        description VARCHAR(100) NOT NULL,
        CONSTRAINT PK_Status PRIMARY KEY (status_id)
    );

CREATE TABLE
    IF NOT EXISTS `ticket` (
        ticket_id INT NOT NULL AUTO_INCREMENT,
        user_id INT NOT NULL,
        category_id INT NOT NULL,
        status_id INT NOT NULL DEFAULT 1,
        title VARCHAR(100) NOT NULL,
        description TEXT,
        date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        date_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT PK_Ticket PRIMARY KEY (ticket_id),
        CONSTRAINT FK_Ticket_User FOREIGN KEY (user_id) REFERENCES user (user_id),
        CONSTRAINT FK_Ticket_Category FOREIGN KEY (category_id) REFERENCES category (category_id),
        CONSTRAINT FK_Ticket_Status FOREIGN KEY (status_id) REFERENCES status (status_id)
    );

CREATE TABLE
    IF NOT EXISTS `comment` (
        comment_id INT NOT NULL AUTO_INCREMENT,
        user_id INT NOT NULL,
        ticket_id INT NOT NULL,
        description TEXT,
        date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT PK_Comment PRIMARY KEY (comment_id),
        CONSTRAINT FK_Product_User FOREIGN KEY (user_id) REFERENCES user (user_id),
        CONSTRAINT FK_Product_Ticket FOREIGN KEY (ticket_id) REFERENCES ticket (ticket_id)
    );

CREATE TABLE
    IF NOT EXISTS `document` (
        document_id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        description TEXT,
        link VARCHAR(255),
        date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT PK_Document PRIMARY KEY (document_id)
    );

CREATE TABLE
    IF NOT EXISTS `contact` (
        contact_id INT NOT NULL,
        first_name VARCHAR(300) NOT NULL,
        last_name VARCHAR(300) NOT NULL,
        email VARCHAR(300) NOT NULL,
        contact_no VARCHAR(11) NOT NULL,
        CONSTRAINT PK_Contact PRIMARY KEY (contact_id)
    );

-- TABLES FOR NOTIFICATION SYSTEM --
CREATE TABLE
    IF NOT EXISTS `notification_entity_type` (
        notification_entity_type_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        action_type VARCHAR(15),
        CONSTRAINT PK_NotificationEntityType PRIMARY KEY (notification_entity_type_id)
    );

CREATE TABLE
    IF NOT EXISTS `notification_object` (
        notification_object_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        notification_entity_type_id INT UNSIGNED NOT NULL,
        entity_id INT UNSIGNED NOT NULL,
        date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT PK_NotificationObject PRIMARY KEY (notification_object_id),
        CONSTRAINT PK_NotificationObject_NotificationEntityType FOREIGN KEY (notification_entity_type_id) REFERENCES notification_entity_type (notification_entity_type_id)
    );

CREATE TABLE
    IF NOT EXISTS `notification` (
        notification_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        notification_object_id INT UNSIGNED NOT NULL,
        notifier_id INT NOT NULL,
        CONSTRAINT PK_Notification PRIMARY KEY (notification_id),
        CONSTRAINT FK_Notification_NotificationObject FOREIGN KEY (notification_object_id) REFERENCES notification_object (notification_object_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT FK_Notification_User FOREIGN KEY (notifier_id) REFERENCES user (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION
    );

CREATE TABLE
    IF NOT EXISTS `notification_change` (
        notification_change_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        notification_object_id INT UNSIGNED NOT NULL,
        actor_id INT NOT NULL,
        CONSTRAINT PK_NotificationChange PRIMARY KEY (notification_change_id),
        CONSTRAINT FK_NotificationChange_NotificationObject FOREIGN KEY (notification_object_id) REFERENCES notification_object (notification_object_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT FK_NotificationChange_User FOREIGN KEY (actor_id) REFERENCES user (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION
    );

-- SAMPLE DATA FOR CATEGORY TABLE -- 
INSERT INTO
    `category` (
        `category_id`,
        `name`
    )
VALUES
    (
        1,
        'Academic'
    ), (
        2,
        'Systems'
    ), (
        3,
        'Processes'
    ), (
        4,
        'Finance'
    );

-- SAMPLE DATA FOR STATUS TABLE -- 
INSERT INTO
    `status` (
        `status_id`,
        `name`,
        `description`
    )
VALUES
    (
        1,
        'pending',
        'Grievance was submitted but not viewed by an organization member'
    ), (
        2,
        'review',
        'Grievance has been viewed by an organization member'
    ), (
        3,
        'raised',
        'Grievance has been raised to proper authority by organization member'
    ),
    (
        4,
        'resolved',
        'Grievance has been marked as resolved by organization member'
    );

-- SAMPLE DATA FOR USER TABLE -- 
INSERT INTO
    `user` (
        `user_id`,
        `first_name`,
        `last_name`,
        `password`,
        `email`,
        `role`
    )
VALUES
    (
        1,
        'Bryan',
        'Sanchez',
        '$2y$10$KE9g.B89rCpM4GVEERMrauWwj5HqMihzWJJLgVyfFBwtOHchXJzM.',
        '20101466@usc.edu.ph',
        'organization'
    ), (
        2,
        'Alexandra',
        'Abainza',
        '$2y$10$ycEwVQcxLwuP4KV0bvLWHeIzp360dtavvKTIXEZBnOqebgtex4rTq',
        '20101562@usc.edu.ph',
        'organization'
    ), (
        3,
        'Louis',
        'Tajanlangit',
        '$2y$10$5kB1OX89SwyYTpVwJf7YP.mej9QOHP38SxJttzVIOnmoGC3j2ccIO',
        '22103880@usc.edu.ph',
        'organization'
    ), (
        4,
        'Jun',
        'Cheong',
        '$2y$10$fOuB7kAiqV9WJrRwtyxtAeWmCWeRVxICSVBSKkTtpcPxpPLxDJCEe',
        '22103271@usc.edu.ph',
        'organization'
    ), (
        5,
        'Organization',
        'User',
        '$2y$10$3QjXzQ0HdlNrrq.NVEWZyOTWc9WZw95g1I0H2bcjUQ1xLs645IzXG',
        'organization@usc.edu.ph',
        'organization'
    ), (
        6,
        'Student',
        'User',
        '$2y$10$DcQ27rl7rTaVC4JBFMmx9eW.2eEH5jrQyV.Rf3VVKuKyhw7ASghJ.',
        'student@usc.edu.ph',
        'student'
    ), (
        7,
        'Student2',
        'User2',
        '$2y$10$Uf/YLMFUR2HoXTrNx.yj9Oe/z.ldX8akP3wBpRfhxlmoqbW/DWARe',
        'student2@usc.edu.ph',
        'student2'
    );

-- SAMPLE DATA FOR TICKET TABLE -- 
INSERT INTO
    `ticket` (
              `ticket_id`, 
              `user_id`, 
              `category_id`,
              `status_id`,
              `title`, 
              `description`,
              `date_created`, 
              `date_updated`
             )
VALUES
    (
      1,
      '6',
      '1',
      '2',
      'Absentee Professor', 
      'Professor has not shown up to class for the past 2 weeks.', 
      current_timestamp(), 
      current_timestamp()
    ),
    (
      2, 
      '6', 
      '4',
      '2',
      'Tuition Raise', 
      'Tuition has been raised mid-school year.', 
      current_timestamp(), 
      current_timestamp()
    ),
    (
      3, 
      '7', 
      '1',
      '4',
      'Teacher has not given grade', 
      'My professor has not released our grades yet, so I am unable to enroll in my next majors.', 
      current_timestamp(), 
      current_timestamp()
    );

-- SAMPLE DATA FOR COMMENT TABLE --
INSERT INTO
    `comment` (
        `comment_id`,
        `user_id`,
        `ticket_id`,
        `description`,
        `date_created`
    )
VALUES
    (
        1,
        '1',
        '1',
        'Did you bring this up with your professor already?',
        current_timestamp()
    ), (
        2,
        '1',
        '2',
        'Thank you for bringing this up!',
        current_timestamp()
    ), (
        3,
        '2',
        '2',
        'Was this raised to your professor already?',
        current_timestamp()
    );

-- SAMPLE DATA FOR DOCUMENT TABLE -- 
INSERT INTO
    `document` (
        `document_id`,
        `name`,
        `description`,
        `date_created`
    )
VALUES
    (
        1,
        'Memorandum No. 7731',
        'Memorandum regarding the suspension of classes on the days of April 12 - 16, 2023.',
        current_timestamp()
    ), (
        2,
        'Republic Act 5234',
        'Republic Act that deems the act of wiretapping to be illegal',
        current_timestamp()
    ), (
        3,
        'Memorandum No. 2341',
        'Memorandum stating the stuff regarding the thingies about yes',
        current_timestamp()
    );

-- SAMPLE DATA FOR CONTACT TABLE -- 
INSERT INTO
    `contact` (
        `contact_id`,
        `first_name`,
        `last_name`,
        `email`,
        `contact_no`
    )
VALUES
    (
        1,
        'Christine',
        'Pena',
        'christine.pena@usc.edu.ph',
        '09341384928'
    ), (
        2,
        'Godwin',
        'Monserate',
        'godwin.monserate@usc.edu.ph',
        '09742938291'
    ), (
        3,
        'Khent',
        'dela Paz',
        'khent@usc.edu.ph',
        '09472938201'
    );

-- SAMPLE DATA FOR NOTIFICATION ENTITY TYPE --
INSERT INTO
    `notification_entity_type` (
        `notification_entity_type_id`,
        `action_type`
    )
VALUES
    (
        1,
        'CREATE'
    ),
    (
        2,
        'UPDATE'
    ),
    (
        3,
        'DELETE'
    ),
    (
        4,
        'COMMENT'
    ),
    (
        5,
        'STATUS'
    );

INSERT INTO
    `notification_object` (
        `notification_object_id`,
        `notification_entity_type_id`,
        `entity_id`
    )
VALUES
    (
        1,
        '1',
        '1'
    ),
    (
        2,
        '1',
        '2'
    ),
    (
        3,
        '1',
        '3'
    ),
    (
        4,
        '4',
        '1'
    ),
    (
        5,
        '4',
        '2'
    ),
    (
        6,
        '4',
        '3'
    );

INSERT INTO
    `notification` (
        `notification_id`,
        `notification_object_id`,
        `notifier_id`
    )
VALUES
    (
        1,
        '1',
        '1'
    ),
    (
        2,
        '1',
        '2'
    ),
    (
        3,
        '1',
        '3'
    ),
    (
        4,
        '1',
        '4'
    ),
    (
        5,
        '1',
        '5'
    ),    
    (
        6,
        '2',
        '1'
    ),   
    (
        7,
        '2',
        '2'
    ),   
    (
        8,
        '2',
        '3'
    ),   
    (
        9,
        '2',
        '4'
    ),   
    (
        10,
        '2',
        '5'
    ),
    (
        11,
        '3',
        '1'
    ),
    (
        12,
        '3',
        '2'
    ),
    (
        13,
        '3',
        '3'
    ),
    (
        14,
        '3',
        '4'
    ),
    (
        15,
        '3',
        '5'
    ),
    (
        16,
        '4',
        '6'
    ),        
    (
        17,
        '5',
        '6'
    ),              
    (
        18,
        '6',
        '7'
    );

INSERT INTO
    `notification_change` (
        `notification_change_id`,
        `notification_object_id`,
        `actor_id`
    )
VALUES
    (
        1,
        '1',
        '6'
    ),
    (
        2,
        '2',
        '6'
    ),
    (
        3,
        '3',
        '7'
    ),
    (
        4,
        '4',
        '1'
    ),
    (
        5,
        '5',
        '1'
    ),
    (
        6,
        '6',
        '2'
    );
/*
CREATE TABLES FOr PROJECT
*/

CREATE TABLE users(
    id INT(11) AUTO-INCREMENT,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    subscription_at DATETIME DEFAULT NOW(),
    avatar VARCHAR(255),
    CONSTRAINT PK_USERS_ID PRIMARY KEY (id)
);

CREATE TABLE comment(
    id INT(11) AUTO-INCREMENT,
    comment VARCHAR(255) NOT NULL,
    create_at DATETIME DEFAULT NOW(),
    CONSTRAINT PK_COMMENT_ID PRIMARY KEY (id)
);

CREATE TABLE task(
    id INT(11) AUTO-INCREMENT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    create_at DATETIME DEFAULT NOW(),
    start_at DATETIME DEFAULT NOW(),
    end_at DATETIME DEFAULT NOW(),
    lead VARCHAR(255),
    CONSTRAINT PK_TASK_ID PRIMARY KEY (id)
);

CREATE TABLE sticker(
    id INT(11),
    name VARCHAR(255),
    color VARCHAR(255),
    CONSTRAINT PK_STICKER_ID PRIMARY KEY(id)
);

CREATE TABLE project(
    id INT(11),
    name VARCHAR(150),
    description VARCHAR(255),
    create_at DATETIME DEFAULT NOW(),
    CONSTRAINT PK_PROJECT_ID PRIMARY KEY(id)
);

CREATE TABLE list(
    id INT(11),
    name VARCHAR(150),
    description VARCHAR(255),
    create_at DATETIME DEFAULT NOW(),
    CONSTRAINT PK_LIST_ID PRIMARY KEY(id)
);

CREATE TABLE guest(
    id INT(11),
    invited_at DATETIME DEFAULT NOW(),
    CONSTRAINT PK_GUEST_ID PRIMARY KEY(id)
);

/*
ADD CONSTRAINTS
*/


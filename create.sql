-- Create tables for the infotainment database

-- Table for Motion Picture
CREATE TABLE MotionPicture (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    rating DECIMAL(3, 1),
    production VARCHAR(255),
    budget DECIMAL(19, 4)
);

CREATE TABLE Movie (
    id INT,
    boxoffice_collection DECIMAL(19, 4),
    PRIMARY KEY (id),     
    FOREIGN KEY (id) REFERENCES MotionPicture(id)
);

-- Table for Series (a specialization of MotionPicture)
CREATE TABLE Series (
    id INT,
    season_count INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES MotionPicture(id)
);


-- Table for User
CREATE TABLE User (
    email VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255),
    age INT
);

-- Table for Likes
CREATE TABLE Likes (
    mpid INT,
    uemail VARCHAR(255),
    PRIMARY KEY (mpid, uemail),
    FOREIGN KEY (uemail) REFERENCES User(email),
    FOREIGN KEY (mpid) REFERENCES MotionPicture(id)
);


-- Table for People
CREATE TABLE People (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    nationality VARCHAR(255),
    dob DATE,
    gender CHAR(1)
);

-- Table for Role
CREATE TABLE Role (
    mpid INT,
    pid INT,
    role_name ENUM('Actor', 'Director', 'Producer', 'ScreenWriter'),
    PRIMARY KEY (mpid, pid, role_name),
    FOREIGN KEY (mpid) REFERENCES MotionPicture(id),
    FOREIGN KEY (pid) REFERENCES People(id)
);

-- Table for Award
CREATE TABLE Award (
    mpid INT,
    pid INT,
    award_name VARCHAR(255),
    award_year INT,
    PRIMARY KEY (award_name, award_year, mpid, pid),
    FOREIGN KEY (mpid) REFERENCES MotionPicture(id),
    FOREIGN KEY (pid) REFERENCES People(id)
);

-- Table for Genre
CREATE TABLE Genre (
    mpid INT,
    genre_name VARCHAR(255),
    PRIMARY KEY(mpid, genre_name),
    FOREIGN KEY (mpid) REFERENCES MotionPicture(id)
);

-- Table for Location
CREATE TABLE Location (
    mpid INT,
    zip VARCHAR(10),
    city VARCHAR(255),
    country VARCHAR(255),
    
    PRIMARY KEY (mpid, zip),
    FOREIGN KEY (mpid) REFERENCES MotionPicture(id)
);

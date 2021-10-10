<?php

//initialize db setup
include './dbConnection.php';
$conn = OpenCon();

CREATE TABLE if not exists countries (
    id int AUTO_INCREMENT,
    name varchar(25),
    PRIMARY KEY (id)
);

CREATE TABLE if not exists states (
    id int AUTO_INCREMENT,
    country_id int,
    name varchar(25),
    PRIMARY KEY (id),
    FOREIGN KEY (country_id) REFERENCES countries(id)
);
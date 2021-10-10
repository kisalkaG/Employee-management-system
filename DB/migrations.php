<?php

try {
    $sql = "CREATE TABLE if not exists departments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL            
        )";

    $conn->exec($sql);
    //echo "Table departments created successfully";

    try {
        $sql = "INSERT INTO departments (name)
        VALUES ('IT'), ('HR'), ('Accounts'), ('Cleaning')";

        $conn->exec($sql);
        // echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $sql = "CREATE TABLE if not exists employees (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        department_id INT(6) UNSIGNED,
        dob VARCHAR(30),
        address VARCHAR(30),
        phone VARCHAR(30),
        FOREIGN KEY (department_id) REFERENCES departments(id)        
        )";

    $conn->exec($sql);
    //echo "Table employees created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $sql = "CREATE TABLE if not exists salaries (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        emp_id INT(6) UNSIGNED,
        month VARCHAR(30) NOT NULL,
        amount DOUBLE,
        FOREIGN KEY (emp_id) REFERENCES employees(id)        
        )";

    $conn->exec($sql);
    //echo "Table salaries created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $sql = "CREATE TABLE if not exists leaves (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        emp_id INT(6) UNSIGNED,
        start_date DATETIME,
        end_date DATETIME,
        comment VARCHAR(30),
        FOREIGN KEY (emp_id) REFERENCES employees(id)        
        )";

    $conn->exec($sql);
    //echo "Table leaves created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

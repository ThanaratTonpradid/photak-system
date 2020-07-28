USE `photak`;

CREATE TABLE employee (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    em_fname VARCHAR(20) NOT NULL,
    em_lname VARCHAR(20) NOT NULL,
    em_user VARCHAR(20) NOT NULL,
    em_pass VARCHAR(50) NOT NULL,
    em_status VARCHAR(20) NOT NULL,
    em_group VARCHAR(20) NOT NULL,
    posi_id int, FOREIGN KEY (posi_id) REFERENCES position (id),
    d_id int, FOREIGN KEY (d_id) REFERENCES department (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
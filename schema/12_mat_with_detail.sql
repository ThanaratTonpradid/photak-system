USE `photak`;

CREATE TABLE mat_with_detail (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mat_with_id int, FOREIGN KEY (mat_with_id) REFERENCES mat_with (id),
    mat_id int, FOREIGN KEY (mat_id) REFERENCES material (id),
    quantity CHAR NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

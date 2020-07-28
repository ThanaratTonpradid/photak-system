USE `photak`;

CREATE TABLE mat_with_detail (
    mat_with_id int, FOREIGN KEY (mat_with_id) REFERENCES material (id),
    mat_id int, FOREIGN KEY (mat_id) REFERENCES employee (id),
    quantity CHAR NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
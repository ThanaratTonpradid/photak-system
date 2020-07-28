USE `photak`;

CREATE TABLE mat_with (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mat_id int, FOREIGN KEY (mat_id) REFERENCES material (id),
    date_approve DATETIME NOT NULL,
    approve_mw VARCHAR(50) NOT NULL,
    em_take INT NULL,
    em_approver INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
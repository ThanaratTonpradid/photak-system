USE `photak`;

CREATE TABLE mat_with (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mat_with_name VARCHAR(50) NOT NULL,
    date_take DATETIME NULL,
    date_approve DATETIME NULL,
    approve_mw VARCHAR(50) NULL,
    em_take INT NULL,
    em_approver INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

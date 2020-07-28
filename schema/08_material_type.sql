USE `photak`;

CREATE TABLE material_type (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mtype_name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
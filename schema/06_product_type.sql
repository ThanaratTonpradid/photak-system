USE `photak`;

CREATE TABLE product_type (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ptype_name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
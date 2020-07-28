USE `photak`;

CREATE TABLE material (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mat_price DECIMAL(13,2) NOT NULL,
    mat_name VARCHAR(100) NOT NULL,
    mat_band VARCHAR(100) NOT NULL,
    mtype_id int, FOREIGN KEY (mtype_id) REFERENCES material_type (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
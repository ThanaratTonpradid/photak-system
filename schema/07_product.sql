USE `photak`;

CREATE TABLE product (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    p_number VARCHAR(50) NOT NULL,
    p_name VARCHAR(50) NOT NULL,
    p_serie VARCHAR(50) NOT NULL,
    p_band VARCHAR(50) NOT NULL,
    p_status VARCHAR(50) NOT NULL,
    p_image MEDIUMBLOB NOT NULL,
    p_detail VARCHAR(250) NOT NULL,
    p_datein DATETIME NOT NULL,
    p_dateout DATETIME NOT NULL,
    ptype_id int, FOREIGN KEY (ptype_id) REFERENCES product_type (id),
    room_id int, FOREIGN KEY (room_id) REFERENCES room (id),
    em_id int, FOREIGN KEY (em_id) REFERENCES employee (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
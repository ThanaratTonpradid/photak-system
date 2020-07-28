USE `photak`;

CREATE TABLE room (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(100) NOT NULL,
    room_phone VARCHAR(50) NOT NULL,
    buil_id int, FOREIGN KEY (buil_id) REFERENCES building (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
USE `photak`;

CREATE TABLE notify_repair (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    em_order int, FOREIGN KEY (em_order) REFERENCES employee (id),
    em_repair int, FOREIGN KEY (em_repair) REFERENCES employee (id),
    em_approver int, FOREIGN KEY (em_approver) REFERENCES employee (id),
    p_id int, FOREIGN KEY (p_id) REFERENCES product (id),
    mtype_id int, FOREIGN KEY (mtype_id) REFERENCES material_type (id),
    nr_datenotifi DATETIME NOT NULL,
    nr_approve VARCHAR(50) NOT NULL,
    nr_detail1 VARCHAR(250) NOT NULL,
    nr_detail2 VARCHAR(250) NOT NULL,
    nr_detail3 VARCHAR(250) NOT NULL,
    nr_status VARCHAR(100) NOT NULL,
    nr_images MEDIUMBLOB NOT NULL,
    nr_successfull DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
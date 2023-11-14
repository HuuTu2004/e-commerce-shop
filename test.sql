CREATE DATABASE `do_an` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use do_an;

CREATE TABLE `category` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  created_at date DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp 
)ENGINE = InnoDB;

CREATE TABLE `user` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  created_at date DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp 
)ENGINE = InnoDB;

CREATE TABLE `customer` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  address VARCHAR(255),
  phone VARCHAR(255),
  image VARCHAR(255),
  created_at date DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp 
)ENGINE = InnoDB;

CREATE TABLE `product` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  price float NOT NULL,
  sale_price float ,
  status tinyint DEFAULT '1',
  image varchar(255) ,
  description text,
  category_id int NOT NULL,
  FOREIGN KEY (`category_id`) REFERENCES category(`id`),
  created_at date DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp 
)ENGINE = InnoDB;

CREATE TABLE orders 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NULL,
    email varchar(100) NULL,
    phone varchar(12) NULL,
    address varchar(255) NULL,
    note VARCHAR(255) NULL,
    token VARCHAR(255) NULL,
    customer_id int NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL
);

CREATE TABLE order_detail
(
    order_id int NOT NULL,
    product_id int NOT NULL,
    price float NOT NULL,
    quantity int NOT NULL,
    customer_id int NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES product(id),
    PRIMARY KEY (order_id, product_id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at date NULL
);
CREATE TABLE favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    product_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE comment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment  varchar(100) NULL,
    customer_id INT,
    product_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE reply (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_comment INT,
    comment_id INT,
    name_reply VARCHAR(255) NOT NULL,
    reply_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     FOREIGN KEY (comment_id) REFERENCES comment(id)
    
);

CREATE TABLE flashsale (
  id INT PRIMARY KEY AUTO_INCREMENT,
 hour INT NOT NULL DEFAULT 0,
  minute INT NOT NULL DEFAULT 0,
  second INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rateStar INT,
    product_id INT,
    customer_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (customer_id) REFERENCES customer(id)
);
INSERT INTO `flashsale`(`hour`, minute, second) VALUES
(0, 0, 0)
;
INSERT INTO `category`(`name`) VALUES
('rau'),
('củ'),
('quả')
;
INSERT INTO `user`(`name`, email, password) VALUES
('admin', 'admin@gmail.com', '123456')
;

INSERT INTO `product`(`name`, price, sale_price, status, image, description, category_id) VALUES
('rau muống', 12, 10, 1, 'g1.jpg', 'hello hello hello', 1 ),
('su hào', 13, 10, 0, 'g2.jpg', 'hello hello hello', 2 ),
('cà chua', 11, 10, 1, 'g3.jpg', 'hello hello hello', 3 )
;


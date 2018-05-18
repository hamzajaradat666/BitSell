CREATE TABLE items (
  item_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  price float NOT NULL ,
  brand int(11) NOT NULL,
  `type` int(11) NOT NULL,
  in_stock tinyint(1) NOT NULL,
  item_name varchar(255) NOT NULL,
  FOREIGN KEY (brand) REFERENCES brands(brand_id),
  FOREIGN KEY (`type`) REFERENCES types(type_id)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

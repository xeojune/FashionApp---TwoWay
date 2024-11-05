create table user
( 
    userid int unsigned not null auto_increment primary key,
    name varchar(100),
    email varchar(100),
    password varchar(100),
    phonenumber int,
    datecreated date not null
);

create table wishlist
(
    wishproductid int,
    userid int unsigned not null auto_increment primary key,
    productid int
);

create table cart
(
    name varchar(100),
    brand varchar(100),
    description varchar(100),
    quantity int,
    size varchar(5),
    price float(6,2)
);

create table cart_history
(
    ordercode int, 
    orderstatuscode int, 
    tradecode int, 
    buyerid int, 
    sellerid int, 
    datecreated date not null, 
    dateupdated date not null
);

CREATE TABLE ProductImages (
    ProductImageCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    Image VARCHAR(255) NOT NULL
);
create table user
( 
    userid int unsigned not null auto_increment primary key,
    name varchar(100),
    email varchar(100),
    password varchar(100),
    phonenumber int,
    datecreated date not null
);
create table if not exists tbl_user_type
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
UserTypeName varchar(100)
);
create table if not exists tbl_user
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
FullName varchar(100),
FK_UserType int,
Email varchar(200),
Password varchar(1000),
Contact varchar(100),
DisplayPicture varchar(100),
LoginToken varchar(200),
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_category
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
CategoryName varchar(100),
CategorySlug varchar(100),
CategoryImages text,
CategoryTags text,
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_product
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
ProductName varchar(200),
ProductDescription text,
Reviews text,
Sizes text,
ProductID varchar(100),
Categories text,
ProductTags text,
ProductImages text,
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_inventory
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
FK_Product int,
Quantity int default 0,
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_purchased
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
FK_Product int,
Quantity int default 0,
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_orders
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
CustomerID int,
CustomerName varchar(100),
CustomerEmail varchar(200),
CustomerContact varchar(100),
CustomerBillingAddress varchar(500),
CustomerShippingAddress varchar(500),
CustomerCity varchar(100),
ProductsWithQuantity text,
OrderStatus varchar(100),
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_customer
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
FullName varchar(100),
Contact varchar(100),
Email varchar(200),
Password varchar(1000),
BillingAddress varchar(500),
ShippingAddress varchar(500),
City varchar(100),
OrderHistory text,
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
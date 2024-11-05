CREATE TABLE OrderDetails (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(100),
    ProductID INT,
    ProductName VARCHAR(255),
    BrandCode VARCHAR(50),
    ProductImage VARCHAR(255),
    BrandName VARCHAR(100),
    CartName VARCHAR(100),
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Create WishList Table
CREATE TABLE WishList (
    WishProductID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Price INT NOT NULL,
    Size VARCHAR(100) NOT NULL,
    Quantity INT NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE
);

-- Create Product Inventory Table
CREATE TABLE ProductInventory (
    ProductSizeCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    SizeCode INT NOT NULL,
    Quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE,
    FOREIGN KEY (SizeCode) REFERENCES Sizes(SizeCode) ON DELETE CASCADE
);

-- Create Sizes Table
CREATE TABLE Sizes (
    SizeCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    SizeName VARCHAR(255) NOT NULL,
    SizeType ENUM('Shoes', 'Clothes') NOT NULL
);

-- Create ProductSizes Table (after Sizes and Products are created)
-- CREATE TABLE ProductSizes (
--     ProductSizeCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     ProductID INT NOT NULL,
--     SizeCode INT NOT NULL,
--     FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE,
--     FOREIGN KEY (SizeCode) REFERENCES Sizes(SizeCode) ON DELETE CASCADE
-- );

-- Create Cart Table
CREATE TABLE Cart (
    Name VARCHAR(100) NOT NULL,
    ProductID INT NOT NULL,
    Quantity VARCHAR(100) NOT NULL,
    Size VARCHAR(100) NOT NULL,
    Price INT NOT NULL
);

-- Create User Table
CREATE TABLE User (
    Userid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100),
    Password VARCHAR(100),
    PhoneNumber INT,
    DateCreated DATE NOT NULL
);

-- Create Brands Table
CREATE TABLE Brands (
    BrandCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BrandName VARCHAR(255) NOT NULL
);

-- Create Products Table
CREATE TABLE Products (
    ProductID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BrandCode INT NOT NULL,
    ProductName VARCHAR(255),
    Price INT NOT NULL,
    ModelNumber VARCHAR(255),
    DateCreated DATETIME NOT NULL,
    DateUpdated DATETIME,
    DateDeleted DATETIME,
    FOREIGN KEY (BrandCode) REFERENCES Brands(BrandCode)
);


-- Create ProductSizes Table (after Sizes and Products are created)
CREATE TABLE ProductSizes (
    ProductSizeCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    SizeCode INT NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE,
    FOREIGN KEY (SizeCode) REFERENCES Sizes(SizeCode) ON DELETE CASCADE
);

-- Create ProductImages Table
CREATE TABLE ProductImages (
    ProductImageCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    Image VARCHAR(255) NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE
);


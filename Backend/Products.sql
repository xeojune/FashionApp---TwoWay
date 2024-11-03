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

-- Create Sizes Table
CREATE TABLE Sizes (
    SizeCode INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    SizeName VARCHAR(255) NOT NULL
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

-- Create WishList Table
CREATE TABLE WishList (
    WishProductID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID) ON DELETE CASCADE
);

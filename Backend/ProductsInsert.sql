INSERT INTO Brands (BrandCode, BrandName) VALUES 
(1, 'Nike'),
(2, 'Adidas');
(3, 'Palace');
(4, 'Converse');
(5, 'Stussy');
(6, 'IAB Studio');
(7, 'Asics');
(8, 'Supreme');
(9, 'Chrome Hearts');
(10, 'New Balance');


-- -- Insert into Products table
INSERT INTO Products (BrandCode, ProductName, Price, DateCreated) VALUES
-- Nike Products
(1, 'Nike Air Force 1', 120, '2024-11-01'),
(1, 'Nike Peaceminusone Air Force 1', 240, '2024-11-01'),
(1, 'Jordan 1 x Travis Scott Retro Low OG SP Reverse Olive', 574, '2024-11-02'),
(1, 'Jordan 1 x Travis Scott Retro Low OG SP Sail and Ridgerock', 1476, '2024-11-2')
(1, 'Jordan 1 x Travis Scott Retro Low OG SP Black Phantom', 671, '2024-11-2')
-- Adidas Products
(2, 'Adidas Manchester United Originals Track Top Black Red', 67, '2024-11-2')
(2, 'Adidas Waffle Beckenbauer Track Top Black', 123, '2024-11-2')
(2, 'Adidas Samba OG Dark Brown Clay Brown', 148, '2024-11-2')
(2, 'Adidas Samba OG Cream White Dark Brown', 127, '2024-11-2')
(2, 'Adidas Ozgaia Core Black', 91, '2024-11-2')
-- Palace Products
(3, "Palace x McDonald's Logo Hood Black", 213, '2024-11-2')
(3, 'Palace x Porter Hoodie Black - 24FW', 304, '2024-11-2')
(3, 'Palace x Porter Hoodie Olive - 24FW', 304, '2024-11-2')
(3, 'Palace x Porter Hoodie Orange - 24FW', 304, '2024-11-2')
(3, 'Palace Pro Team 02 Shell Jacket Black - 24FW', 379, '2024-11-2')
-- Converse Products
(4, 'Converse x Drkshdw Turbowpn Black Cream', 313, '2024-11-2')
(4, 'Converse x Play Comme des Garcons Chuck 70 Ox Black', 145, '2024-11-2')
(4, 'Converse x Drkshdw DBL Drkstar Chuck 70 Hi Black', 145, '2024-11-2')
(4, 'Converse x Ader Error Chuck 70 High White', 119, '2024-11-2')
(4, 'Converse One Star Ox Black', 78, '2024-11-2')
-- Stussy Products
(5, 'Stussy Down Parka Micro Ripstop Phantom Black', 585, '2024-11-2')
(5, 'Stussy Ransom Jacquard Tie Black', 600, '2024-11-2')
(5, 'Stussy Metal Dice Keychain Silver', 185, '2024-11-2')
(5, 'Stussy x Dries Van Noten Varsity Jacket Black', 1799, '2024-11-2')
(5, 'Stussy 40th Anniversary IST Jacket (Ny.LT.La)', 3210, '2024-11-2')
-- IAB Studio Products
(6, 'IAB Studio Hoodie Black', 225, '2024-11-2')
(6, 'IAB Studio Embossed Sweatshirt Gray', 112, '2024-11-2')
(6, 'IAB Studio Blackwatch Tartan Shirt Blue Green', 113, '2024-11-2')
(6, 'IAB Studio Ripstop Wind Jacket Black', 195, '2024-11-2')
(6, 'IAB Studio Socks White (5 Pack)', 48, '2024-11-2')
-- Asics Products
(7, 'Asics Novablast 4 White Moonrock', 139, '2024-11-2')
(7, 'Asics Gel-Kayano 14 Cream Black', 174, '2024-11-2')
(7, 'Asics Gel-Kayano 14 Black Pure Silver', 183, '2024-11-2')
(7, 'Asics Gel-Kayano 14 Midnight Pure Silver', 189, '2024-11-2')
(7, 'Asics x Cecilie Bahnsen Gel-Terrain Sepia', 399, '2024-11-2')
-- Supreme Products
(8, 'Supreme x The North Face Nuptse Jacket Black - 24FW', 820, '2024-11-2')
(8, 'Supreme Faux Shearling Lined Bomber Jacket Denim - 24FW', 469, '2024-11-2')
(8, 'Supreme x Schott Snow White Hand-Painted Leather A2 Jacket Brown - 24FW', 8000, '2024-11-2')
(8, 'Supreme x Burberry Leather Track Jacket Black - 22SS', 6000, '2024-11-2')
(8, 'Supreme Gerrit T.Rietveld Red and Blue Chair for Cassina Red - 22FW', 6000, '2024-11-2')
-- Chrome Hearts Products
(9, 'Chrome Hearts Horseshoe Floral Fleece Zip-Up Hoodie Black', 2444, '2024-11-2')
(9, 'Chrome Hearts Silichrome CH Cross Pendant Black 2022/2023', 740, '2024-11-2')
(9, 'Chrome Hearts Bonennoisseur II Black Brushed Silver', 3000, '2024-11-2')
(9, 'Chrome Hearts Scroll Fuck you Logo LS T-Shirt Black', 773, '2024-11-2')
(9, 'Chrome Hearts Dagger Logo Long Sleeve T-Shirt White - Los Angeles Exclusive', 800, '2024-11-2')
-- New Balance Products
(10, 'New Balance 2002R Grey', 130, '2024-11-2')
(10, 'New Balance 2002R Rust Oxide', 104, '2024-11-2')
(10, 'New Balance 2002R Eclipse Castlerock', 115, '2024-11-2')
(10, 'New Balance 1906R White Gold', 98, '2024-11-2')
(10, 'New Balance 530 Classic Grey', 70, '2024-11-2')




INSERT INTO ProductImages (ProductID, Image) VALUES
((SELECT ProductID FROM Products WHERE ProductName = 'Nike Air Force 1' LIMIT 1), '../../../public/images/productImg/nike_airforce1.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Nike Peaceminusone Air Force 1' LIMIT 1), '../../../public/images/productImg/nike_peaceminusone.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Converse All Star' LIMIT 1), '../../../public/images/productImg/converse_allstar.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Nike Air Force 1' LIMIT 1), '../../../public/images/productImg/nike_airforce1.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Nike Peaceminusone Air Force 1' LIMIT 1), '../../../public/images/productImg/nike_peaceminusone.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Converse All Star' LIMIT 1), '../../../public/images/productImg/converse_allstar.jpg');




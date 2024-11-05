INSERT INTO Cart VALUES
    ("hari", 1, "1", "L", 19.00),
    ("password", 2, "2", "L", 20.00),
    ("password", 3, "2", "L", 20.00),
    ("password1", 4, "2", "L", 21.00),
    ("password2", 5, "2", "L", 22.00),
    ("password3", 6, "2", "L", 23.00),
    ("password4", 7, "2", "L", 24.00),
    ("password5", 8, "2", "L", 24.00),
    ("password6", 9, "2", "L", 24.00),
    ("password7", 10, "2", "L", 24.00),
    ("password8", 11, "2", "L", 24.00);

INSERT INTO User VALUES
    (1, "hari", "example@email.com", "a9bcf1e4d7b95a22e2975c812d938889","90919221", "2024-05-10" ),
    (2, "password", "passsword@email.com", "5f4dcc3b5aa765d61d8327deb882cf99","90919222", "2024-05-10" ),
    (3, "password1", "password1@email.com", "7c6a180b36896a0a8c02787eeafb0e4c","90919223", "2024-05-10" ),
    (4, "password2", "password2@email.com", "6cb75f652a9b52798eb6cf2201057c73","90919224", "2024-05-10" ),
    (5, "password3", "password3@email.com", "819b0643d6b89dc9b579fdfc9094f28e","90919225", "2024-05-10" ),
    (6, "password4", "password4@email.com", "34cc93ece0ba9e3f6f235d4af979b16c","90919226", "2024-05-10" ),
    (7, "password5", "password5@email.com", "db0edd04aaac4506f7edab03ac855d56","90919227", "2024-05-10" ),
    (8, "password6", "password6@email.com", "218dd27aebeccecae69ad8408d9a36bf","90919228", "2024-05-10" ),
    (9, "password7", "password7@email.com", "00cdb7bb942cf6b290ceb97d6aca64a3","90919229", "2024-05-10" ),
    (10, "password8", "password8@email.com", "b25ef06be3b6948c0bc431da46c2c738","90919230", "2024-05-10" );

INSERT INTO Brands (BrandCode, BrandName) VALUES 
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Palace'),
(4, 'Converse'),
(5, 'Stussy'),
(6, 'IAB Studio'),
(7, 'Asics'),
(8, 'Supreme'),
(9, 'Chrome Hearts'),
(10, 'New Balance');


-- -- Insert into Products table
INSERT INTO Products (BrandCode, ProductName, Price, DateCreated) VALUES
-- Nike Products
(1, 'Nike Air Force 1', 120, '2024-11-01'),
(1, 'Nike Peaceminusone Air Force 1', 240, '2024-11-01'),
(1, 'Jordan 1 x Travis Scott Retro Low OG SP Reverse Olive', 574, '2024-11-02'),
(1, 'Jordan 1 x Travis Scott Retro Low OG SP Sail and Ridgerock', 1476, '2024-11-2'),
(1, 'Jordan 1 x Travis Scott Retro Low OG SP Black Phantom', 671, '2024-11-2'),
-- Adidas Products
(2, 'Adidas Manchester United Originals Track Top Black Red', 67, '2024-11-2'),
(2, 'Adidas Waffle Beckenbauer Track Top Black', 123, '2024-11-2'),
(2, 'Adidas Samba OG Dark Brown Clay Brown', 148, '2024-11-2'),
(2, 'Adidas Samba OG Cream White Dark Brown', 127, '2024-11-2'),
(2, 'Adidas Ozgaia Core Black', 91, '2024-11-2'),
-- Palace Products
(3, "Palace x McDonald's Logo Hood Black", 213, '2024-11-2'),
(3, 'Palace x Porter Hoodie Black - 24FW', 304, '2024-11-2'),
(3, 'Palace x Porter Hoodie Olive - 24FW', 304, '2024-11-2'),
(3, 'Palace x Porter Hoodie Orange - 24FW', 304, '2024-11-2'),
(3, 'Palace Pro Team 02 Shell Jacket Black - 24FW', 379, '2024-11-2'),
-- Converse Products
(4, 'Converse x Drkshdw Turbowpn Black Cream', 313, '2024-11-2'),
(4, 'Converse x Play Comme des Garcons Chuck 70 Ox Black', 145, '2024-11-2'),
(4, 'Converse x Drkshdw DBL Drkstar Chuck 70 Hi Black', 145, '2024-11-2'),
(4, 'Converse x Ader Error Chuck 70 High White', 119, '2024-11-2'),
(4, 'Converse One Star Ox Black', 78, '2024-11-2'),
-- Stussy Products
(5, 'Stussy Down Parka Micro Ripstop Phantom Black', 585, '2024-11-2'),
(5, 'Stussy Ransom Jacquard Tie Black', 600, '2024-11-2'),
(5, 'Stussy Metal Dice Keychain Silver', 185, '2024-11-2'),
(5, 'Stussy x Dries Van Noten Varsity Jacket Black', 1799, '2024-11-2'),
(5, 'Stussy 40th Anniversary IST Jacket (Ny.LT.La)', 3210, '2024-11-2'),
-- IAB Studio Products
(6, 'IAB Studio Hoodie Black', 225, '2024-11-2'),
(6, 'IAB Studio Embossed Sweatshirt Gray', 112, '2024-11-2'),
(6, 'IAB Studio Blackwatch Tartan Shirt Blue Green', 113, '2024-11-2'),
(6, 'IAB Studio Ripstop Wind Jacket Black', 195, '2024-11-2'),
(6, 'IAB Studio Socks White (5 Pack)', 48, '2024-11-2'),
-- Asics Products
(7, 'Asics Novablast 4 White Moonrock', 139, '2024-11-2'),
(7, 'Asics Gel-Kayano 14 Cream Black', 174, '2024-11-2'),
(7, 'Asics Gel-Kayano 14 Black Pure Silver', 183, '2024-11-2'),
(7, 'Asics Gel-Kayano 14 Midnight Pure Silver', 189, '2024-11-2'),
(7, 'Asics x Cecilie Bahnsen Gel-Terrain Sepia', 399, '2024-11-2'),
-- Supreme Products
(8, 'Supreme x The North Face Nuptse Jacket Black - 24FW', 820, '2024-11-2'),
(8, 'Supreme Faux Shearling Lined Bomber Jacket Denim - 24FW', 469, '2024-11-2'),
(8, 'Supreme x Schott Snow White Hand-Painted Leather A2 Jacket Brown - 24FW', 8000, '2024-11-2'),
(8, 'Supreme x Burberry Leather Track Jacket Black - 22SS', 6000, '2024-11-2'),
(8, 'Supreme Gerrit T.Rietveld Red and Blue Chair for Cassina Red - 22FW', 6000, '2024-11-2'),
-- Chrome Hearts Products
(9, 'Chrome Hearts Horseshoe Floral Fleece Zip-Up Hoodie Black', 2444, '2024-11-2'),
(9, 'Chrome Hearts Silichrome CH Cross Pendant Black 2022/2023', 740, '2024-11-2'),
(9, 'Chrome Hearts Bonennoisseur II Black Brushed Silver', 3000, '2024-11-2'),
(9, 'Chrome Hearts Scroll Fuck you Logo LS T-Shirt Black', 773, '2024-11-2'),
(9, 'Chrome Hearts Dagger Logo Long Sleeve T-Shirt White - Los Angeles Exclusive', 800, '2024-11-2'),
-- New Balance Products
(10, 'New Balance 2002R Grey', 130, '2024-11-2'),
(10, 'New Balance 2002R Rust Oxide', 104, '2024-11-2'),
(10, 'New Balance 2002R Eclipse Castlerock', 115, '2024-11-2'),
(10, 'New Balance 1906R White Gold', 98, '2024-11-2'),
(10, 'New Balance 530 Classic Grey', 70, '2024-11-2');

INSERT INTO ProductImages (ProductID, Image) VALUES
-- Nike Products
((SELECT ProductID FROM Products WHERE ProductName = 'Nike Air Force 1' LIMIT 1), '../../../public/images/productImg/Nike/nike_airforce1.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Nike Peaceminusone Air Force 1' LIMIT 1), '../../../public/images/productImg/Nike/nike_peaceminusone.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Jordan 1 x Travis Scott Retro Low OG SP Reverse Olive' LIMIT 1), '../../../public/images/productImg/Nike/JordanTravisOlive.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Jordan 1 x Travis Scott Retro Low OG SP Sail and Ridgerock' LIMIT 1), '../../../public/images/productImg/Nike/JordanTravisSail.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Jordan 1 x Travis Scott Retro Low OG SP Black Phantom' LIMIT 1), '../../../public/images/productImg/Nike/JordanTravisBlack.png'),

-- Adidas Products
((SELECT ProductID FROM Products WHERE ProductName = 'Adidas Manchester United Originals Track Top Black Red' LIMIT 1), '../../../public/images/productImg/Adidas/adidasManchester.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Adidas Waffle Beckenbauer Track Top Black' LIMIT 1), '../../../public/images/productImg/Adidas/AdidasWaffle.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Adidas Samba OG Dark Brown Clay Brown' LIMIT 1), '../../../public/images/productImg/Adidas/adidasSamba.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Adidas Samba OG Cream White Dark Brown' LIMIT 1), '../../../public/images/productImg/Adidas/adidasSambaWhite.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Adidas Ozgaia Core Black' LIMIT 1), '../../../public/images/productImg/Adidas/adidasOzgaia.png'),

((SELECT ProductID FROM Products WHERE ProductName = "Palace x McDonald's Logo Hood Black" LIMIT 1), '../../../public/images/productImg/Palace/palaceMcDonald.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Palace x Porter Hoodie Black - 24FW' LIMIT 1), '../../../public/images/productImg/Palace/palaceHoodBlack.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Palace x Porter Hoodie Olive - 24FW' LIMIT 1), '../../../public/images/productImg/Palace/palaceHoodOlive.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Palace x Porter Hoodie Orange - 24FW' LIMIT 1), '../../../public/images/productImg/Palace/palaceHoodOrange.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Palace Pro Team 02 Shell Jacket Black - 24FW' LIMIT 1), '../../../public/images/productImg/Palace/palacePro.png'),

-- Converse Products
((SELECT ProductID FROM Products WHERE ProductName = 'Converse x Drkshdw Turbowpn Black Cream' LIMIT 1), '../../../public/images/productImg/Converse/converseDrk.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Converse x Play Comme des Garcons Chuck 70 Ox Black' LIMIT 1), '../../../public/images/productImg/Converse/converseComme.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Converse x Drkshdw DBL Drkstar Chuck 70 Hi Black' LIMIT 1), '../../../public/images/productImg/Converse/converseDrkStar.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Converse x Ader Error Chuck 70 High White' LIMIT 1), '../../../public/images/productImg/Converse/converseAder.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Converse One Star Ox Black' LIMIT 1), '../../../public/images/productImg/Converse/converseOne.png'),

-- Stussy Products
((SELECT ProductID FROM Products WHERE ProductName = 'Stussy Down Parka Micro Ripstop Phantom Black' LIMIT 1), '../../../public/images/productImg/Stussy/stussyParka.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Stussy Ransom Jacquard Tie Black' LIMIT 1), '../../../public/images/productImg/Stussy/stussyRansom.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Stussy Metal Dice Keychain Silver' LIMIT 1), '../../../public/images/productImg/Stussy/stussyDice.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Stussy x Dries Van Noten Varsity Jacket Black' LIMIT 1), '../../../public/images/productImg/Stussy/stussyJacket.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Stussy 40th Anniversary IST Jacket (Ny.LT.La)' LIMIT 1), '../../../public/images/productImg/Stussy/stussy40.jpg'),

-- IAB Studio Products
((SELECT ProductID FROM Products WHERE ProductName = 'IAB Studio Hoodie Black' LIMIT 1), '../../../public/images/productImg/IAB/iabHoodBlack.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'IAB Studio Embossed Sweatshirt Gray' LIMIT 1), '../../../public/images/productImg/IAB/iabShirtGray.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'IAB Studio Blackwatch Tartan Shirt Blue Green' LIMIT 1), '../../../public/images/productImg/IAB/iabBlackWatch.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'IAB Studio Ripstop Wind Jacket Black' LIMIT 1), '../../../public/images/productImg/IAB/iabRipstop.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'IAB Studio Socks White (5 Pack)' LIMIT 1), '../../../public/images/productImg/IAB/iabSocks.jpg'),

-- Asics Products
((SELECT ProductID FROM Products WHERE ProductName = 'Asics Novablast 4 White Moonrock' LIMIT 1), '../../../public/images/productImg/Asics/asicsNovablast.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Asics Gel-Kayano 14 Cream Black' LIMIT 1), '../../../public/images/productImg/Asics/asicsCreamBlack.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Asics Gel-Kayano 14 Black Pure Silver' LIMIT 1), '../../../public/images/productImg/Asics/asicsBlackPureSilver.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Asics Gel-Kayano 14 Midnight Pure Silver' LIMIT 1), '../../../public/images/productImg/Asics/asicsMidnight.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Asics x Cecilie Bahnsen Gel-Terrain Sepia' LIMIT 1), '../../../public/images/productImg/Asics/asicsCecilie.png'),

-- Supreme Products
((SELECT ProductID FROM Products WHERE ProductName = 'Supreme x The North Face Nuptse Jacket Black - 24FW' LIMIT 1), '../../../public/images/productImg/Supreme/supremeNorthFace.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Supreme Faux Shearling Lined Bomber Jacket Denim - 24FW' LIMIT 1), '../../../public/images/productImg/Supreme/supremeFaux.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Supreme x Schott Snow White Hand-Painted Leather A2 Jacket Brown - 24FW' LIMIT 1), '../../../public/images/productImg/Supreme/supremeSchott.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Supreme x Burberry Leather Track Jacket Black - 22SS' LIMIT 1), '../../../public/images/productImg/Supreme/supremeBurberry.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Supreme Gerrit T.Rietveld Red and Blue Chair for Cassina Red - 22FW' LIMIT 1), '../../../public/images/productImg/Supreme/supremeGerrit.jpg'),

-- Chrome Hearts Products
((SELECT ProductID FROM Products WHERE ProductName = 'Chrome Hearts Horseshoe Floral Fleece Zip-Up Hoodie Black' LIMIT 1), '../../../public/images/productImg/ChromeHearts/chromeHorse.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Chrome Hearts Silichrome CH Cross Pendant Black 2022/2023' LIMIT 1), '../../../public/images/productImg/ChromeHearts/chromeSilicon.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Chrome Hearts Bonennoisseur II Black Brushed Silver' LIMIT 1), '../../../public/images/productImg/ChromeHearts/chromeGlasses.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'Chrome Hearts Scroll Fuck you Logo LS T-Shirt Black' LIMIT 1), '../../../public/images/productImg/ChromeHearts/chromeScroll.jpg'),
((SELECT ProductID FROM Products WHERE ProductName = 'Chrome Hearts Dagger Logo Long Sleeve T-Shirt White - Los Angeles Exclusive' LIMIT 1), '../../../public/images/productImg/ChromeHearts/chromeDagger.jpg'),

-- New Balance Products
((SELECT ProductID FROM Products WHERE ProductName = 'New Balance 2002R Grey' LIMIT 1), '../../../public/images/productImg/NewBalance/new2002RGray.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'New Balance 2002R Rust Oxide' LIMIT 1), '../../../public/images/productImg/NewBalance/newRust.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'New Balance 2002R Eclipse Castlerock' LIMIT 1), '../../../public/images/productImg/NewBalance/newEclipse.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'New Balance 1906R White Gold' LIMIT 1), '../../../public/images/productImg/NewBalance/newWhiteGold.png'),
((SELECT ProductID FROM Products WHERE ProductName = 'New Balance 530 Classic Grey' LIMIT 1), '../../../public/images/productImg/NewBalance/newClassicGray.png');






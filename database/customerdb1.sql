/* 
 * MySQL Script - customer.sql
 */

CREATE DATABASE business CHARACTER SET utf8 COLLATE utf8_general_ci;      

/*CREATE DATABASE business;     */                           -- สร้างฐานข้อมูล business
USE business; 								 				 -- เรียกใช้ฐานข้อมูล business

CREATE TABLE country (                                       -- สร้างตาราง country
  CountryCode varchar(2) NOT NULL,
  CountryName varchar(20) NOT NULL,  
  PRIMARY KEY  (CountryCode)  
);  		
INSERT INTO country VALUES ('TH', 'ไทย');  
INSERT INTO country VALUES ('PK', 'ปากีสถาน'); 
INSERT INTO country VALUES ('BD', 'บังคลาเทศ');  
INSERT INTO country VALUES ('AT', 'ออสเตรีย');  
   

                                                      
CREATE TABLE customer (                                       -- สร้างตาราง customer
  CustomerID varchar(6) NOT NULL,
  Name varchar(40) NOT NULL,
  Birthdate date NOT NULL,
  Email varchar(40) NOT NULL,
  CountryCode varchar(2) NOT NULL,
  OutstandingDebt  float NOT NULL,
  PRIMARY KEY  (CustomerID),
  FOREIGN KEY (CountryCode) REFERENCES country(CountryCode)
);  		
INSERT INTO customer VALUES ('Cus001', 'Nittaya Pinthong', '1976-12-23','n.pinthong@hotmail.com', 'TH', 8000);                                                            -- เพิ่มข้อมูลลูกค้าในตาราง customer
INSERT INTO customer VALUES ('Cus002', 'Thanit Boonchu', '1978-11-03','t.boonchu@gmail.com', 'TH', 15000);
INSERT INTO customer VALUES ('Cus003', 'Imran Haider', '1989-02-04','i.haider@hotmail.com', 'PK',0);
INSERT INTO customer VALUES ('Cus004', 'Ariful Russell', '1966-11-20','a.russell@gmail.com', 'BD', 20000);
INSERT INTO customer VALUES ('Cus005', 'Emanuel Reiterer', '1977-12-03','e.reiterer@gmail.com', 'AT', 5000);


 

                                       
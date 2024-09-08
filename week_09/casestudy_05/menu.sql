-- import this database @ localhost:8000/phpmyadmin/

create database coffee_prices;
use coffee_prices;

create table prices ( coffee varchar(50), 
                      price decimal(5,2)
                    );

insert into prices values 
('justjava', 2.00),
('cafeaulait_single', 2.00),
('cafeaulait_double', 3.00),
('icedcappuccino_single', 4.75),
('icedcappuccino_double', 5.75);

create table sales ( coffee varchar(50), 
                     product varchar(50),
                     category varchar(50),
                     quantity int,
                     revenue decimal(10,2)
                   );

insert into sales values
('justjava', 'Just Java', 'NULL', 0, 0.00),
('cafeaulait_single', 'Cafe Au Lait', 'Single', 0, 0.00),
('cafeaulait_double', 'Cafe Au Lait', 'Double', 0, 0.00),
('icedcappuccino_single', 'Iced Cappuccino', 'Single', 0, 0.00),
('icedcappuccino_double', 'Iced Cappuccino', 'Double', 0, 0.00);

-- reset all varibles in sales table --

UPDATE sales
SET quantity = 0, revenue = 0.00;
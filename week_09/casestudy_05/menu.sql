create database coffee_prices;
use coffee_prices;

create table prices ( coffee varchar(20), 
                      price decimal(5,2)
                    );

insert into prices values 
('justjava', 2.00),
('cafeaulait_single', 2.00),
('cafeaulait_double', 3.00),
('icedcappuccino_single', 4.75),
('icedcappuccino_double', 5.75);
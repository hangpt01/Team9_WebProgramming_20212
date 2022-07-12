CREATE TABLE Users (
    UserName varchar(50) PRIMARY KEY,
    Password varchar(30) NOT NULL,
    DisplayName varchar(100) character set UTF8 NOT NULL,
    Email varchar(50) NOT NULL UNIQUE,
    PhoneNumber varchar(10)
);



CREATE USER 'xfinity'@'%' IDENTIFIED BY 'jSuZ7ugR7SKB9Afm';
CREATE DATABASE IF NOT EXISTS `xfinity`;
GRANT ALL PRIVILEGES ON `xfinity`.* TO 'xfinity'@'%';GRANT ALL PRIVILEGES ON `xfinity\_%`.* TO 'xfinity'@'%';
flush privileges;

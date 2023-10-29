ifapme-ecommerce
===
## Information
- Title:  `ifapme-ecommerce`
- Authors:  `neitsab`


## Install & Dependence


## Dataset Preparation
```
-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table ifapme-ecommerce. products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table ifapme-ecommerce. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

```
## Directory Hierarchy
```
|—— .htaccess
|—— app
|    |—— app.php
|    |—— config.php
|    |—— core
|        |—— Database.php
|        |—— Query.php
|        |—— Redirect.php
|        |—— Request.php
|        |—— Router.php
|        |—— View.php
|        |—— _include.php
|    |—— http
|        |—— actions
|            |—— AuthActions.php
|            |—— CartActions.php
|            |—— ProductsActions.php
|            |—— UserActions.php
|        |—— controllers
|            |—— CartController.php
|            |—— HomeController.php
|            |—— LoginController.php
|            |—— LogoutController.php
|            |—— ProductsController.php
|            |—— RegisterController.php
|        |—— views
|            |—— 404.php
|            |—— auth
|                |—— login.php
|                |—— register.php
|            |—— cart
|                |—— index.php
|            |—— home
|                |—— index.php
|            |—— layouts
|                |—— default.php
|                |—— guest.php
|            |—— products
|                |—— create.php
|                |—— edit.php
|                |—— index.php
|                |—— show.php
|        |—— _include.php
|    |—— state
|        |—— CartState.php
|        |—— UserState.php
|—— index.php
```
## Code Details
### Tested Platform
- software
  ```
  OS: Debian unstable (May 2021), Ubuntu LTS
  Python: 3.8.5 (anaconda)
  PyTorch: 1.7.1, 1.8.1
  ```
- hardware
  ```
  CPU: Intel Xeon 6226R
  GPU: Nvidia RTX3090 (24GB)
  ```
### Hyper parameters
```
```
## References
- [paper-1]()
- [paper-2]()
- [code-1](https://github.com)
- [code-2](https://github.com)
  
## License

## Citing
If you use xxx,please use the following BibTeX entry.
```
```

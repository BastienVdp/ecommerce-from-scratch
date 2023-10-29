ifapme-ecommerce
===
## Information
- Title:  `ifapme-ecommerce`
- Authors:  `neitsab`


## Install & Dependence


## Dataset Preparation
```

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour ifapme-ecommerce
CREATE DATABASE IF NOT EXISTS `ifapme-ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ifapme-ecommerce`;

-- Listage de la structure de la table ifapme-ecommerce. products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
|            |—— CartActions.php
|            |—— ProductsActions.php
|        |—— controllers
|            |—— CartController.php
|            |—— HomeController.php
|            |—— ProductsController.php
|        |—— views
|            |—— 404.php
|            |—— cart
|                |—— index.php
|            |—— home
|                |—— index.php
|            |—— layouts
|                |—— default.php
|            |—— products
|                |—— create.php
|                |—— edit.php
|                |—— index.php
|                |—— show.php
|        |—— _include.php
|—— index.php
```
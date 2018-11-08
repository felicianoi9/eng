-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Ago-2018 às 18:35
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `control`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address_number` varchar(10) DEFAULT NULL,
  `address_neighb` varchar(100) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_state` varchar(100) DEFAULT NULL,
  `address_country` varchar(100) DEFAULT NULL,
  `address_zipcode` varchar(60) DEFAULT NULL,
  `stars` int(1) NOT NULL DEFAULT '3',
  `internal_obs` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Feliciano i9 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_purchase` int(11) DEFAULT NULL,
  `name_desc` varchar(100) NOT NULL,
  `date_expense` datetime NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `purchase_price` float NOT NULL,
  `price` float DEFAULT NULL,
  `quant` int(11) NOT NULL,
  `min_quant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventory_history`
--

DROP TABLE IF EXISTS `inventory_history`;
CREATE TABLE IF NOT EXISTS `inventory_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `action` varchar(3) NOT NULL,
  `date_action` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `main_params`
--

DROP TABLE IF EXISTS `main_params`;
CREATE TABLE IF NOT EXISTS `main_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `main_params`
--

INSERT INTO `main_params` (`id`, `name`, `description`) VALUES
(1, 'logout', 'PermissÃ£o para sair do sistema'),
(4, 'permissions_view', 'PermissÃ£o para visualizar/  permissÃµes e '),
(5, 'companies_view', 'Visualiza Companias'),
(6, 'users_view', 'PermissÃ£o para visualizar/editar/deletar usuÃ¡rio'),
(7, 'clients_edit', 'PermissÃ£o para Editar clientes'),
(8, 'clients_view', 'PermissÃ£o para visualizar clientes'),
(9, 'purchases_view', 'PermissÃ£o para visualizar compras'),
(10, 'purchases_edit', 'PermissÃ£o para Editar compras'),
(11, 'inventory_view', 'PermissÃ£o para Visualizar Estoque'),
(12, 'inventory_add', 'PermissÃ£o para adicionar Estoque'),
(13, 'inventory_edit', 'PermissÃ£o para editar Estoque'),
(14, 'inventory_del', 'PermissÃ£o para deletar Estoque'),
(15, 'providers_view', 'PermissÃ£o para visualizar Fornecedor'),
(16, 'providers_edit', 'PermissÃ£o para Editar Fornecedor'),
(17, 'sales_view', 'PermissÃ£o para visualizar Vendas'),
(18, 'sales_edit', 'PermissÃ£o para Editar Vendas'),
(19, 'reports_view', 'PermissÃ£o para visualizar RelatÃ³rios'),
(20, 'financial_view', 'PermissÃ£o para Visualizar Financeiro '),
(21, 'revenue_view', 'PermissÃ£o para visualizar Receita'),
(22, 'revenue_add', 'PermissÃ£o para adicionar Receita'),
(23, 'revenue_edit', 'PermissÃ£o para editar Receita'),
(24, 'expenses_view', 'PermissÃ£o para visualizar Despesa'),
(25, 'expenses_edit', 'PermissÃ£o para editar Despesa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `main_user`
--

DROP TABLE IF EXISTS `main_user`;
CREATE TABLE IF NOT EXISTS `main_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `my_company` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `main_user`
--

INSERT INTO `main_user` (`id`, `name`, `email`, `password`, `my_company`) VALUES
(1, 'Rogério', 'rogerio@felicianoi9.com.br', 'c921de9e38f6f672058791e598ef7a4e', 'Feliciano i9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_groups`
--

DROP TABLE IF EXISTS `permission_groups`;
CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `params` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `id_company`, `group_name`, `params`) VALUES
(1, 1, 'Desenvolvedor', '1,2,9,8,42,35,41,37,38,39,40,34,36,43,44,45,46,47,48,49,50,51,52'),
(5, 1, 'Testador 3', '1,8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_params`
--

DROP TABLE IF EXISTS `permission_params`;
CREATE TABLE IF NOT EXISTS `permission_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `id_company` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission_params`
--

INSERT INTO `permission_params` (`id`, `name`, `id_company`) VALUES
(1, 'logout', 1),
(2, 'permissions_view', 1),
(9, 'companies_view', 1),
(8, 'users_view', 1),
(42, 'purchases_view', 1),
(35, 'clients_edit', 1),
(41, 'inventory_del', 1),
(37, 'providers_edit', 1),
(38, 'inventory_view', 1),
(39, 'inventory_add', 1),
(40, 'inventory_edit', 1),
(34, 'clients_view', 1),
(36, 'providers_view', 1),
(43, 'sales_view', 1),
(44, 'sales_edit', 1),
(45, 'purchases_edit', 1),
(46, 'reports_view', 1),
(47, 'financial_view', 1),
(48, 'revenue_view', 1),
(49, 'revenue_add', 1),
(50, 'revenue_edit', 1),
(51, 'expenses_view', 1),
(52, 'expenses_edit', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `providers`
--

DROP TABLE IF EXISTS `providers`;
CREATE TABLE IF NOT EXISTS `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address_number` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address_2` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address_neighb` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address_city` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address_state` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address_country` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address_zipcode` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `internal_obs` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_purchase` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases_products`
--

DROP TABLE IF EXISTS `purchases_products`;
CREATE TABLE IF NOT EXISTS `purchases_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_purchase` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quant` int(11) NOT NULL,
  `purchase_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `revenue`
--

DROP TABLE IF EXISTS `revenue`;
CREATE TABLE IF NOT EXISTS `revenue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sale` int(11) DEFAULT NULL,
  `name_desc` varchar(100) NOT NULL,
  `date_revenue` datetime NOT NULL,
  `total_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales_products`
--

DROP TABLE IF EXISTS `sales_products`;
CREATE TABLE IF NOT EXISTS `sales_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `sale_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_group` int(11) NOT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `id_company`, `name`, `email`, `password`, `id_group`, `user_type`) VALUES
(1, 1, 'RogÃ©rio', 'rogerio@felicianoi9.com.br', 'c921de9e38f6f672058791e598ef7a4e', 1, 'master');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db-desafio
CREATE DATABASE IF NOT EXISTS `db-desafio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db-desafio`;

-- Copiando estrutura para tabela db-desafio.tbagenda
CREATE TABLE IF NOT EXISTS `tbagenda` (
  `pkagenda_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkcartorio_id` int(11) NOT NULL DEFAULT '0',
  `clagenda_nome` varchar(220) NOT NULL DEFAULT '0',
  `clagenda_telefone` varchar(11) NOT NULL DEFAULT '0',
  `clagenda_email` varchar(120) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pkagenda_id`),
  KEY `FK1cartorio_idFk` (`fkcartorio_id`),
  CONSTRAINT `FK1cartorio_idFk` FOREIGN KEY (`fkcartorio_id`) REFERENCES `tbcartorio` (`pkcartorio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db-desafio.tbagenda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbagenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbagenda` ENABLE KEYS */;

-- Copiando estrutura para tabela db-desafio.tbcartorio
CREATE TABLE IF NOT EXISTS `tbcartorio` (
  `pkcartorio_id` int(10) NOT NULL AUTO_INCREMENT,
  `clcartorio_nome` varchar(220) NOT NULL,
  `clcartorio_telefone` varchar(220) NOT NULL,
  `clcartorio_email` varchar(220) NOT NULL,
  PRIMARY KEY (`pkcartorio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db-desafio.tbcartorio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcartorio` DISABLE KEYS */;
INSERT INTO `tbcartorio` (`pkcartorio_id`, `clcartorio_nome`, `clcartorio_telefone`, `clcartorio_email`) VALUES
	(1, '1º Cartório Civil de Taguatinga', '', ''),
	(2, 'Cartório Afonso Ribeiro', '', ''),
	(3, 'Novo cartório', '', ''),
	(4, 'NOVO REGISTRO', '6121038300', 'TESTE'),
	(5, 'NOVO REGISTRO', '6121038300', 'TESTE'),
	(6, 'NOVO REGISTRO', '6121038300', 'TESTE'),
	(7, 'NOVO REGISTRO', '6121038300', 'TESTE');
/*!40000 ALTER TABLE `tbcartorio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.25-MariaDB - mariadb.org binary distribution
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

-- Copiando estrutura para tabela db-desafio.tbcartorio
CREATE TABLE IF NOT EXISTS `tbcartorio` (
  `pkcartorio_id` int(10) NOT NULL AUTO_INCREMENT,
  `clcartorio_nome` varchar(220) NOT NULL,
  `clcartorio_razao` varchar(220) NOT NULL,
  `clcartorio_tabeliao` varchar(220) NOT NULL,
  `clcartorio_endereco` varchar(220) NOT NULL,
  `clcartorio_bairro` varchar(220) NOT NULL,
  `clcartorio_cidade` varchar(220) NOT NULL,
  `clcartorio_uf` varchar(220) NOT NULL,
  `clcartorio_cep` varchar(220) NOT NULL,
  `clcartorio_telefone` varchar(220) DEFAULT NULL,
  `clcartorio_email` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`pkcartorio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db-desafio.tbcartorio: ~33 rows (aproximadamente)
DELETE FROM `tbcartorio`;
/*!40000 ALTER TABLE `tbcartorio` DISABLE KEYS */;
INSERT INTO `tbcartorio` (`pkcartorio_id`, `clcartorio_nome`, `clcartorio_razao`, `clcartorio_tabeliao`, `clcartorio_endereco`, `clcartorio_bairro`, `clcartorio_cidade`, `clcartorio_uf`, `clcartorio_cep`, `clcartorio_telefone`, `clcartorio_email`) VALUES
	(1, '1º Tabelionato de Notas e Registro de Imoveis', '1º Tabelionato de Notas e Registro de Imoveis', 'Luciano Carneiro do Vale', 'Pc. Prof. Jose Candido Nr 709', 'Centro', 'Morrinhos', 'GO', '75.650-000', '(61) 99887-6542', 'teste@gmail.com'),
	(2, '2º Tabelionato de Notas, Protesto e Oficio do Registro Tit., e Documentos e Pess., Juridicas', '2º Tabelionato de Notas, Protesto e Oficio do Registro Tit., e Documentos e Pess., Juridicas', 'Wiliam Gomes de Morais', 'Rua Luis Antonio Nr 62', 'Centro', 'Itaberai', 'GO', '76630000', NULL, NULL),
	(3, 'Oficio de Registro de Imoveis e 1º Tabelionato de Notas', 'Oficio de Registro de Imoveis e 1º Tabelionato de Notas', 'Yacatan Silva Pinto', 'Rua Sr. dos Passos Nr 62', 'Centro', 'Itaberai', 'GO', '76630000', NULL, NULL),
	(4, '1º Tabelionato de Notas e Oficio do Registro de Imoveis', '1º Tabelionato de Notas e Oficio do Registro de Imoveis', 'ELMIRO SOUZA LUZ', 'Rua Dagmar Bueno 225', 'Setor Aeroporto', 'Aragarças', 'GO', '76240000', NULL, NULL),
	(5, '10 Tabelionato de Notas', '10 Tabelionato de Notas', 'Maria de Fatima Botelho Moreira de Deus', 'Rua Cassimiro Montenegro, Nº 50', 'Monte Castelo', 'Fortaleza', 'CE', '60325720', NULL, NULL),
	(6, 'Cartorio do 1º Oficio e Anexos', 'Cartorio do 1º Oficio e Anexos', 'Thereza Lima Vieira', 'Av. Brasil Nr 506', 'Centro', 'Couto de Magalhaes', 'TO', '77750000', NULL, NULL),
	(7, 'Oficio de Registro Civil das Pessoas Naturais', 'Oficio de Registro Civil das Pessoas Naturais', 'Aureny Carlos Ramalho', 'Rua 12 S/nº Qd. 10 Lt. 09', 'Setor Sul', 'Peixe', 'TO', '77460000', NULL, NULL),
	(8, '1º Tabelionato de Notas e Registro de Imoveis', '1º Tabelionato de Notas e Registro de Imoveis', 'Neuza Maria Costa e Silva', 'Av. Costa e Silva  Nr 032', 'Centro', 'Colmeia', 'TO', '77.725-000', '(98) 09908-0989', ''),
	(9, 'Oficio do Registro Civil e Tab. de Notas Prot. e Registro de Imoveis', 'Oficio do Registro Civil e Tab. de Notas Prot. e Registro de Imoveis', 'Moema Borges Leite', 'Rua Augusto Pereira Nr 326', 'Centro', 'Americano do Brasil', 'GO', '76165000', NULL, NULL),
	(10, 'Oficio do Registro Civil das Pessoas Naturais 1º Subdistrito', 'Oficio do Registro Civil das Pessoas Naturais 1º Subdistrito', 'Nelson Hidalgo Molero', 'Rua Amador Bueno Nr 203', 'Centro', 'Santos', 'SP', '11013150', NULL, NULL),
	(11, 'Oficio de Registro Civil e Tabelionato de Notas - 2ª Circunscricao', 'Oficio de Registro Civil e Tabelionato de Notas - 2ª Circunscricao', 'Gislane Divina Costa', 'Rua Coronel Batista Nr 111', 'Centro', 'Anapolis', 'GO', '75020080', NULL, NULL),
	(12, 'Oficio de Registro Civil e Tabelionato de Notas', 'Oficio de Registro Civil e Tabelionato de Notas', 'Isan Rodrigues Silva', 'Av. Longuinho Vieira Junior Nr  600 Ed. do Forum', 'Centro', 'Colmeia', 'TO', '77725000', NULL, NULL),
	(13, '2º Tabelionato de Notas', '2º Tabelionato de Notas', 'Sagramor Angela Piccoli Dall\'agnol', 'Qd. 104 Sul, Av. Ns-2, Cj. 3, Lt 01, Lj.01', 'Centro', 'Palmas', 'TO', '77020030', NULL, NULL),
	(14, 'Segundo Servico Notarial e Registro Civil', 'Segundo Servico Notarial e Registro Civil', 'Wanderley Luis Kuhn', 'Av. Amos Bernardino Zanchet Nr 1000', 'Centro', 'Nova Maringa', 'MT', '78445000', NULL, NULL),
	(15, 'Tabelionato de Protesto de Titulos', 'Tabelionato de Protesto de Titulos', 'Jorge Artur Pena Fernandes', 'Rua Jose de Santana,  Nr 454 - Lj 207', 'Centro', 'Patos de Minas', 'MG', '38700052', NULL, NULL),
	(16, 'Oficio do Registroi Civil Etabelionato de Notas - Cordeiro', 'Oficio do Registroi Civil Etabelionato de Notas - Cordeiro', 'Jose Cordeiro de Oliveira', 'Praca dos Esportes,  Nr 50', 'Centro', 'Caratinga', 'MG', '35300972', NULL, NULL),
	(17, 'Oficio de Registro de Imoveis', 'Oficio de Registro de Imoveis', 'Celso Gamborgi Branco', 'Rua Jose Geraldo de Souza Nr 822', 'Centro', 'Goioere', 'PR', '87360000', NULL, NULL),
	(18, 'Cartorio de Distribuicao', 'Cartorio de Distribuicao', 'Dilque Nunes', 'Rua Anita Garibaldi S/n', 'Centro', 'Juara', 'MT', '78575000', NULL, NULL),
	(21, 'Oficio do Registro Civil das Pessoas Naturais', 'Oficio do Registro Civil das Pessoas Naturais', 'Juvenal Batista de Sousa Maria', 'Av.magalhaes Barata, S/n', 'Centro', 'Capanema', 'PA', '68706000', NULL, NULL),
	(22, 'Registros de Imoveis, Titulos e Documentos de Claudia', 'Registros de Imoveis, Titulos e Documentos de Claudia', 'Ary Garcia Filho', 'Rua Ferreira Mendes, Nr 1065-a', 'Centro', 'Claudia', 'MT', '78540000', NULL, NULL),
	(23, 'Oficio do Registro Civil e Tabelionato de Notas', 'Oficio do Registro Civil e Tabelionato de Notas', 'Jose Simoes Sobrinho', 'Rua Rio de Janeiro Nr 293', 'Centro', 'Marilac', 'MG', '35115000', NULL, NULL),
	(24, 'Cartorio de Notas e Registro Civil de Venda Nova do Imigrante', 'Cartorio de Notas e Registro Civil de Venda Nova do Imigrante', 'Noemea Zandonade Feitoza', 'Av. Domingos Perim, 344', 'Centro', 'Venda Nova do Imigrante', 'ES', '29375000', NULL, NULL),
	(25, '1º Tabelionato de Protesto e Oficio do Registro de Imoveis', '1º Tabelionato de Protesto e Oficio do Registro de Imoveis', 'Eleuterio Conrado Paste', 'Av. Domingos Perim Nr 234 - Sala 102/103', 'Centro', 'Venda Nova do Imigrante', 'ES', '29375000', NULL, NULL),
	(26, 'Oficio de Registro Civil das Pessoas Naturais', 'Oficio de Registro Civil das Pessoas Naturais', 'Roberto Coelho de Magalhaes', 'Praca. Dr. Miguel Batista Vieira Nr  131', 'Centro', 'Alto Rio Doce', 'MG', '36260000', NULL, NULL),
	(27, 'Tabelionato de Protestos de Titulos de Dividas', 'Tabelionato de Protestos de Titulos de Dividas', 'Leda Guido Lima de Medeiros', 'Praca Getulio Vargas,  Nr 56 Sl 104/105', 'Centro', 'Caratinga', 'MG', '35300034', NULL, NULL),
	(28, 'Oficio do Registro de Imoveis', 'Oficio do Registro de Imoveis', 'Joao Alberto Andre Silva', 'Rua Bahia, 1.018', 'Centro', 'Buritis', 'MG', '38660000', NULL, NULL),
	(29, '4º Oficio de Registro de Titulos e Documentos', '4º Oficio de Registro de Titulos e Documentos', 'Graciano Pinheiro de Siqueira', 'Rua 15 de Novembro Nr 251 - 2°andar', 'Centro', 'Sao Paulo', 'SP', '01013001', NULL, NULL),
	(30, 'Oficio de Registro Civil das Pessoas Naturais 1º Subdistrito', 'Oficio de Registro Civil das Pessoas Naturais 1º Subdistrito', 'Luis Antonio Medeiros Souza', 'Av Coronel Silva Teles 123', 'Cambui', 'Campinas', 'SP', '13.024-000', '', ''),
	(31, '1º Tabelionato de Protesto de Titulos', '1º Tabelionato de Protesto de Titulos', 'Marcos Medeiros de Albuquerque', 'Rua Hugo Cabral, Nr 710 - Sobreloja', 'Centro', 'Londrina', 'PR', '86020110', NULL, NULL),
	(32, '2º Cartorio de Notas e Registro Civil', '2º Cartorio de Notas e Registro Civil', 'Joao Palma Villas Boas Neto', 'Rua Dourado Nr 464', 'Centro', 'Bataguassu', 'MS', '79780000', NULL, NULL),
	(33, 'Cartorio Maria Madalena Heringer Chamon Barros Quintao', 'Cartorio Maria Madalena Heringer Chamon Barros Quintao', 'Maria Madalena Heringer Chamon Barros Quintao', 'Rua Belo Horizonte Nr 243', 'Centro', 'Ipatinga', 'MG', '35160034', NULL, NULL),
	(34, 'Oficio de Registro Civil das Pessoas Naturais do 3º Subdistrito', 'Oficio de Registro Civil das Pessoas Naturais do 3º Subdistrito', 'Alvaro Ernesto de Moraes Silveira', 'Av. das Amoreiras,  Nr 1859', 'Sao Bernardo', 'Campinas', 'SP', '13036120', NULL, NULL),
	(35, 'Oficio do Registro Civil e Tabelionato de Notas - Dom Modesto', 'Oficio do Registro Civil e Tabelionato de Notas - Dom Modesto', 'Luciana Andrea Lopes', 'Rua Princesa Isabel, 16 - C Vila Paulo Afonso', 'Centro', 'Caratinga', 'MG', '35300078', NULL, NULL);
/*!40000 ALTER TABLE `tbcartorio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

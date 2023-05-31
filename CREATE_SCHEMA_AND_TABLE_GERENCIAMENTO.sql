CREATE DATABASE IF NOT EXISTS `gerenciamento_atendimento` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
CREATE TABLE IF NOT EXISTS `formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `cidade_municipio` varchar(100) NOT NULL,
  `sistema_usado` varchar(200) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

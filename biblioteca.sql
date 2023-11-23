-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2023 às 02:39
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `status`, `login`, `senha`) VALUES
(2, '', 'liviamaria', '0'),
(3, '', 'joaobidoia', '0'),
(4, '', 'biblioteca1', 'jacnakjd'),
(5, '', 'liviamaria', 'livia1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`id`, `status`, `nome`) VALUES
(1, 'Ativo', 'V.E Schwab'),
(2, 'Ativo', 'Taylor Jenkins Reid'),
(3, 'Ativo', 'Jane Austen'),
(4, 'Ativo', 'Agatha Christie'),
(5, 'Ativo', 'G.B Baldassari'),
(6, 'Ativo', 'Sally Rooney'),
(7, 'Ativo', 'Ilana Casoy'),
(8, 'Ativo', 'Raphael Montes'),
(9, 'Ativo', 'Carla Madeira'),
(10, 'Ativo', 'Alice Oseman');

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id`, `status`, `nome`) VALUES
(1, 'Ativo', 'FTD'),
(2, 'Ativo', 'Paralela'),
(3, 'Ativo', 'Arqueiro'),
(4, 'Ativo', 'Record'),
(5, 'Ativo', 'Companhia das Letras'),
(6, 'Ativo', 'Galera'),
(7, 'Ativo', 'Seguinte'),
(8, 'Ativo', 'HarperCollins');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `statusEmprestimo` varchar(100) DEFAULT NULL,
  `dataEmprestimo` datetime DEFAULT current_timestamp(),
  `dataPrevistaDevolucao` date DEFAULT NULL,
  `idLeitor` int(11) DEFAULT NULL,
  `valorMulta` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `statusEmprestimo`, `dataEmprestimo`, `dataPrevistaDevolucao`, `idLeitor`, `valorMulta`) VALUES
(1, 'Em andamento', '2023-11-22 22:07:55', '2023-11-30', 3, NULL),
(2, 'Em andamento', '2023-11-22 22:08:37', '2023-11-30', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id`, `status`, `nome`) VALUES
(1, 'Ativo', 'Drama'),
(2, 'Ativo', 'Romance'),
(3, 'Ativo', 'Fantasia'),
(4, 'Ativo', 'Mistério'),
(5, 'Ativo', 'True Crime'),
(6, 'Ativo', 'Terror'),
(7, 'Ativo', 'Aventura');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itensdeemprestimo`
--

CREATE TABLE `itensdeemprestimo` (
  `idLivro` int(11) NOT NULL,
  `idEmprestimo` int(11) NOT NULL,
  `dataDevolvido` date DEFAULT NULL,
  `statusItem` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itensdeemprestimo`
--

INSERT INTO `itensdeemprestimo` (`idLivro`, `idEmprestimo`, `dataDevolvido`, `statusItem`) VALUES
(2, 1, NULL, ''),
(7, 2, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `leitor`
--

CREATE TABLE `leitor` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `dn` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nomeResp` varchar(100) DEFAULT NULL,
  `cpfResp` varchar(14) DEFAULT NULL,
  `telResp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `leitor`
--

INSERT INTO `leitor` (`id`, `status`, `nome`, `telefone`, `endereco`, `dn`, `cpf`, `email`, `senha`, `nomeResp`, `cpfResp`, `telResp`) VALUES
(1, '1', 'João Vitor Bidoia', '(98) 11198-', 'Rua Joase', '2005-01-06', '529.981.651', 'aoifj@gosij', 'jnnon', NULL, NULL, NULL),
(2, 'Ativo', 'Leandro', '(12) 12121-2123', 'Rua Prudentópolis', '2005-05-10', '104.200.879', 'liviamariadossantos998@gmail.com', '215416310', NULL, NULL, NULL),
(3, 'Ativo', 'Lívia Maria', '(44) 99710-7375', 'Avenida Brasil', '2005-11-17', '789.456.456', 'liviamariadossantos998@gmail.com', '123456789', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `idEditora` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `statusLivro` varchar(45) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `pag` varchar(45) DEFAULT NULL,
  `isbn` varchar(15) DEFAULT NULL,
  `edicao` varchar(45) NOT NULL,
  `arquivo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id`, `idEditora`, `idGenero`, `statusLivro`, `titulo`, `pag`, `isbn`, `edicao`, `arquivo`) VALUES
(1, 1, 3, 'Disponível', 'A vida invisível de Addie La Rue', '499', '6555872551', '7', 'ADDIE.jpg'),
(2, 2, 2, 'Emprestado', 'Os sete maridos de Evelyn Hugo', '360', '8584391509', '1', 'evelyn.jpg'),
(3, 2, 1, 'Disponível', 'Daisy Jones and The Six', '360 ', '8584391401', '1', 'daisy.jpg'),
(4, 1, 1, 'Disponível', 'Pessoas Normais', '264', '8535932569', '1', 'pessoasnormais.jpg'),
(5, 4, 1, 'Disponível', 'Tudo é rio', '210', '6555871784', '10', 'Tudoerio.jpg'),
(6, 7, 2, 'Disponível', 'Heartstopper Vol.1', '288', '8555341612', '1', 'heart.jpg'),
(7, 8, 4, 'Emprestado', 'Assassinato no Expresso Oriente', '240', '8595086788', '1', 'expresso.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livroautor`
--

CREATE TABLE `livroautor` (
  `idLivro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livroautor`
--

INSERT INTO `livroautor` (`idLivro`, `idAutor`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 6),
(5, 9),
(6, 10),
(7, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLeitor` (`idLeitor`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `itensdeemprestimo`
--
ALTER TABLE `itensdeemprestimo`
  ADD KEY `idLivro` (`idLivro`),
  ADD KEY `idEmprestimo` (`idEmprestimo`);

--
-- Índices de tabela `leitor`
--
ALTER TABLE `leitor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEditora` (`idEditora`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Índices de tabela `livroautor`
--
ALTER TABLE `livroautor`
  ADD PRIMARY KEY (`idLivro`,`idAutor`),
  ADD KEY `idAutor` (`idAutor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `leitor`
--
ALTER TABLE `leitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`idLeitor`) REFERENCES `leitor` (`id`);

--
-- Restrições para tabelas `itensdeemprestimo`
--
ALTER TABLE `itensdeemprestimo`
  ADD CONSTRAINT `idEmprestimo` FOREIGN KEY (`idEmprestimo`) REFERENCES `emprestimo` (`id`),
  ADD CONSTRAINT `idLivro` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`id`);

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `idEditora` FOREIGN KEY (`idEditora`) REFERENCES `editora` (`id`),
  ADD CONSTRAINT `idGenero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`id`);

--
-- Restrições para tabelas `livroautor`
--
ALTER TABLE `livroautor`
  ADD CONSTRAINT `livroautor_ibfk_1` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`id`),
  ADD CONSTRAINT `livroautor_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

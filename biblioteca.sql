-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2023 às 22:03
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
(4, '', 'biblioteca1', 'jacnakjd');

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
(2, 'Ativo', 'Taylor Jenkins Reid'),
(4, 'Ativo', 'Jane Austen'),
(5, 'Ativo', 'Kiera Cass'),
(6, 'Ativo', 'Beth'),
(7, 'Ativo', 'Coleen Hoover'),
(9, 'Ativo', 'V.E Schwab'),
(10, 'Ativo', 'Christina'),
(11, 'Ativo', 'Lauren'),
(12, 'Ativo', ' Ilana Casoy'),
(13, 'Ativo', 'Raphael Montes');

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
(3, 'Ativo', 'Arqueiro');

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
  `dataDevolucao` date DEFAULT NULL,
  `valorMulta` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `statusEmprestimo`, `dataEmprestimo`, `dataPrevistaDevolucao`, `idLeitor`, `dataDevolucao`, `valorMulta`) VALUES
(75, 'Finalizado', '2023-11-17 17:47:52', '2023-11-24', 2, NULL, NULL),
(76, 'Em andamento', '2023-11-17 17:48:06', '2023-11-24', 3, NULL, NULL),
(77, 'Em andamento', '2023-11-17 17:51:59', '2023-11-24', 3, NULL, NULL),
(78, 'Em andamento', '2023-11-17 17:56:39', '2023-11-24', 3, NULL, NULL),
(79, 'Em andamento', '2023-11-17 17:56:50', '2023-11-24', 2, NULL, NULL),
(80, 'Em andamento', '2023-11-17 17:57:23', '2023-11-24', 2, NULL, NULL),
(81, 'Em andamento', '2023-11-17 17:57:47', '2023-11-24', 3, NULL, NULL);

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
(2, 'Ativo', 'Romance');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itensdeemprestimo`
--

CREATE TABLE `itensdeemprestimo` (
  `idLivro` int(11) NOT NULL,
  `idEmprestimo` int(11) NOT NULL,
  `dataDevolvido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itensdeemprestimo`
--

INSERT INTO `itensdeemprestimo` (`idLivro`, `idEmprestimo`, `dataDevolvido`) VALUES
(7, 78, NULL),
(12, 78, NULL),
(7, 79, NULL),
(3, 79, NULL),
(7, 80, NULL),
(3, 80, NULL),
(3, 81, NULL),
(12, 81, NULL);

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
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nomeResp` varchar(100) DEFAULT NULL,
  `cpfResp` varchar(11) DEFAULT NULL,
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
(2, 1, 1, 'Emprestado', 'Orgulho e Preconceito', '320', '1022365214', '2', NULL),
(3, 2, 2, 'Disponível', 'A Seleção', '120', '12345689', '3', NULL),
(6, 3, 1, 'Emprestado', 'A garota do lago', '362', '105447410452', '9', NULL),
(7, 3, 1, 'Emprestado', 'A garota do lago', '362', '105447410452', '9', NULL),
(8, 3, 1, 'Disponível', 'A garota do lago', '400', '12345645456', '9', NULL),
(9, 1, 2, 'Disponível', 'Razão e sensibilidade', '362', '105447410452', '9', NULL),
(10, 1, 1, 'Disponível', 'Orgulho e Preconceito', '362', '105447410452', '2', NULL),
(11, 1, 1, 'Disponível', 'Orgulho e Preconceito', '362', '105447410452', '2', NULL),
(12, 3, 1, 'Disponível', 'A vida invisível de Addie La Rue', '499', '12345645456', '1', NULL),
(13, 2, 2, 'Disponível', 'Addie La Rue', '400', '105447410452', '3', NULL),
(14, 2, 2, 'Disponível', 'Os sete maridos de Evelyn Hugo', '360', '454564545645', '4', NULL),
(15, 3, 2, 'Disponível', 'Imperfeitos', '350', '123456456', '4', NULL),
(16, 1, 1, 'Disponível', 'Bom dia, Verônica', '362', '105447410452', '1', NULL),
(17, 3, 2, 'Disponível', 'Leitura de Verão', '362', '105447410452', '9', NULL),
(18, 3, 2, 'Disponível', 'Leitura de Verão', '362', '105447410452', '9', NULL),
(19, 3, 1, 'Disponível', 'Orgulho e Preconceito', '362', '105447410452', '9', NULL),
(20, 1, 2, 'Disponível', 'Daisy Jones', '400', '1425254242', '3', NULL);

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
(11, 4),
(11, 5),
(11, 7),
(13, 4),
(13, 9),
(14, 2),
(14, 4),
(14, 5),
(15, 10),
(15, 11),
(16, 12),
(16, 13),
(20, 2),
(20, 7);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `leitor`
--
ALTER TABLE `leitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/12/2023 às 16:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
(10, 'Ativo', 'Alice Oseman'),
(11, 'Ativo', 'Theago Neiva'),
(12, 'Ativo', 'David Levithan'),
(13, 'Ativo', 'Nathan Hill'),
(14, 'Ativo', 'Jeff Kinney');

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
(8, 'Ativo', 'HarperCollins'),
(9, 'Ativo', 'VR Editora');

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
(1, 'Finalizado', '2023-11-22 22:07:55', '2023-11-30', 3, 0),
(2, 'Finalizado', '2023-11-22 22:08:37', '2023-11-30', 2, 0),
(3, 'Em andamento', '2023-11-24 14:12:13', '2023-12-01', 2, NULL),
(4, 'Finalizado', '2023-11-24 14:34:57', '2023-12-01', 3, 0),
(5, 'Em andamento', '2023-11-24 14:36:22', '2023-12-01', 2, NULL),
(6, 'Finalizado', '2023-11-24 14:39:24', '2023-12-01', 2, 3),
(7, 'Em andamento', '2023-11-24 14:39:32', '2023-12-01', 1, NULL),
(8, 'Em andamento', '2023-11-24 14:46:38', '2023-12-01', 3, NULL),
(9, 'Em andamento', '2023-11-24 15:02:34', '2023-12-01', 2, NULL),
(10, 'Finalizado', '2023-11-24 15:02:51', '2023-12-01', 1, 0),
(11, 'Em andamento', '2023-12-01 00:00:00', '2023-12-08', 3, NULL),
(12, 'Em andamento', '2023-11-24 16:10:30', '2023-12-01', 2, NULL),
(13, 'Finalizado', '2023-11-25 14:44:12', '2023-12-02', 2, 0),
(14, 'Em andamento', '2023-11-25 14:47:49', '2023-12-02', 3, NULL),
(15, 'Finalizado', '2023-11-25 15:01:34', '2023-12-02', 2, NULL),
(16, 'Em andamento', '2023-11-25 15:01:39', '2023-12-02', 1, NULL),
(17, 'Finalizado', '2023-11-25 15:01:47', '2023-12-02', 3, NULL),
(18, 'Em andamento', '2023-12-01 18:38:53', '2023-12-08', 1, NULL),
(19, 'Finalizado', '2023-12-04 08:49:08', '2023-12-11', 4, 0),
(20, 'Finalizado', '2023-12-04 08:54:45', '2023-12-11', 5, 0),
(21, 'Em andamento', '2023-12-04 11:18:13', '2023-12-11', 5, NULL);

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
  `statusItem` varchar(14) NOT NULL,
  `dataPrevDev` date NOT NULL,
  `dataRenovacao` date DEFAULT NULL,
  `multa` float DEFAULT NULL,
  `quantRenov` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itensdeemprestimo`
--

INSERT INTO `itensdeemprestimo` (`idLivro`, `idEmprestimo`, `dataDevolvido`, `statusItem`, `dataPrevDev`, `dataRenovacao`, `multa`, `quantRenov`) VALUES
(2, 1, NULL, 'Devolvido', '2023-12-01', NULL, NULL, 0),
(7, 2, '2023-11-24', 'Devolvido', '2023-12-01', NULL, NULL, 0),
(7, 3, NULL, 'Renovado', '2023-12-01', '2023-11-24', NULL, 0),
(5, 4, '2023-11-24', 'Devolvido', '2023-12-01', NULL, NULL, 0),
(3, 5, NULL, 'Emprestado', '2023-12-01', NULL, NULL, 0),
(3, 6, '2023-12-04', 'Devolvido', '2023-12-01', '2023-11-24', 3, 0),
(1, 7, NULL, 'Emprestado', '2023-12-01', '2023-11-24', NULL, 0),
(6, 8, NULL, 'Renovado', '2023-12-01', '2023-11-24', NULL, 0),
(10, 9, '2023-11-24', 'Devolvido', '2023-12-01', '2023-11-24', NULL, 0),
(9, 10, '2023-11-24', 'Devolvido', '2023-12-01', '2023-11-24', NULL, 0),
(8, 10, '2023-11-24', 'Devolvido', '2023-12-01', '2023-11-24', NULL, 0),
(4, 11, NULL, 'Renovado', '2023-12-08', '2023-11-24', NULL, 0),
(10, 12, NULL, 'Emprestado', '0000-00-00', '2023-11-24', NULL, 0),
(4, 13, '2023-12-04', 'Devolvido', '0000-00-00', '2023-11-25', 739255, 0),
(7, 14, NULL, 'Renovado', '2023-12-02', '2023-11-27', NULL, 0),
(9, 15, '2023-12-01', 'Devolvido', '2023-12-04', '2023-11-27', 0, 0),
(8, 16, NULL, 'Renovado', '2023-12-04', '2023-11-27', NULL, 0),
(5, 17, '2023-12-01', 'Devolvido', '2023-12-02', '2023-11-25', 0, 0),
(2, 1, NULL, 'Devolvido', '2023-12-01', NULL, NULL, 0),
(7, 2, '2023-11-24', 'Devolvido', '2023-12-01', NULL, NULL, 0),
(7, 3, NULL, 'Renovado', '2023-12-01', '2023-11-24', NULL, 0),
(5, 4, '2023-11-24', 'Devolvido', '2023-12-01', NULL, NULL, 0),
(3, 5, NULL, 'Emprestado', '2023-12-01', NULL, NULL, 0),
(3, 6, '2023-12-04', 'Devolvido', '2023-12-01', '2023-11-24', 3, 0),
(1, 7, NULL, 'Emprestado', '2023-12-01', '2023-11-24', NULL, 0),
(6, 8, NULL, 'Renovado', '2023-12-01', '2023-11-24', NULL, 0),
(10, 9, '2023-11-24', 'Devolvido', '2023-12-01', '2023-11-24', NULL, 0),
(9, 10, '2023-11-24', 'Devolvido', '2023-12-01', '2023-11-24', NULL, 0),
(8, 10, '2023-11-24', 'Devolvido', '2023-12-01', '2023-11-24', NULL, 0),
(4, 11, NULL, 'Renovado', '2023-12-08', '2023-11-24', NULL, 0),
(10, 12, NULL, 'Emprestado', '0000-00-00', '2023-11-24', NULL, 0),
(4, 13, '2023-12-04', 'Devolvido', '0000-00-00', '2023-11-25', 739255, 0),
(7, 14, NULL, 'Renovado', '2023-12-02', '2023-11-27', NULL, 0),
(9, 15, '2023-12-01', 'Devolvido', '2023-12-04', '2023-11-27', 0, 0),
(8, 16, NULL, 'Renovado', '2023-12-04', '2023-11-27', NULL, 0),
(5, 17, '2023-12-01', 'Devolvido', '2023-12-02', '2023-11-25', 0, 0),
(9, 18, NULL, 'Emprestado', '2023-12-08', NULL, NULL, 0),
(5, 18, NULL, 'Emprestado', '2023-12-08', NULL, NULL, 0),
(3, 19, '2023-12-04', 'Devolvido', '2023-12-11', '2023-12-04', 0, 1),
(4, 20, '2023-12-04', 'Devolvido', '2023-12-11', '2023-12-04', 0, 6),
(11, 21, NULL, 'Renovado', '2023-12-11', '2023-12-04', NULL, 3);

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
(1, 'Ativo', 'João Vitor Bidoia', '(44) 99758-6323', 'Avenida Brasil n°123', '2005-01-06', '529.981.651-44', 'joaobidoia@gmail.com', 'jnnon', '', '', ''),
(2, 'Ativo', 'Leandro', '(44) 99985-0471', 'Rua Prudentópolis', '1993-10-07', '285.400.570-85', 'leandrohs@gmail.com', '215416310', '', '', ''),
(3, 'Ativo', 'Lívia Maria', '(44) 99710-7375', 'Avenida Brasil', '2005-11-17', '789.456.456', 'liviamariadossantos998@gmail.com', '123456789', NULL, NULL, NULL),
(4, 'Ativo', 'Larissa Tinelli', '(44) 99722-2068', 'Rua Gastão Vidigal n°187', '2005-02-18', '138.112.579-43', 'larissatinelli@gmail.com', '12345', NULL, NULL, NULL),
(5, 'Pendente', 'Leonardo Alves', '(44) 99931-1723', 'Rua Porecatu n°26', '2004-07-15', '137.007.469-70', 'leoalves@gmail.com', 'leonardo1234', NULL, NULL, NULL);

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
(1, 1, 3, 'Emprestado', 'A vida invisível de Addie La Rue', '499', '6555872551', '7', 'ADDIE.jpg'),
(2, 2, 2, 'Emprestado', 'Os sete maridos de Evelyn Hugo', '360', '8584391509', '1', 'evelyn.jpg'),
(3, 2, 1, 'Disponível', 'Daisy Jones and The Six', '360 ', '8584391401', '1', 'daisy.jpg'),
(4, 1, 1, 'Disponível', 'Pessoas Normais', '264', '8535932569', '1', 'pessoasnormais.jpg'),
(5, 4, 1, 'Emprestado', 'Tudo é rio', '210', '6555871784', '10', 'Tudoerio.jpg'),
(6, 7, 2, 'Emprestado', 'Heartstopper Vol.1', '288', '8555341612', '1', 'heart.jpg'),
(7, 8, 4, 'Emprestado', 'Assassinato no Expresso Oriente', '240', '8595086788', '1', 'expresso.jpg'),
(8, 7, 1, 'Emprestado', 'O fim de tudo', '392', '25165165', '2', 'ofimdetudo.jpg'),
(9, 6, 2, 'Emprestado', 'Dois Garotos se beijando', '272', '464564', '1', 'doisgarotos.jpg'),
(10, 7, 1, 'Emprestado', 'Nix', '600', '1656544', '3', 'nix.jpg'),
(11, 3, 7, 'Emprestado', 'Diário de um Banana vol.1', '224', '8576831309', '2', 'diariodeum.jpg');

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
(7, 4),
(8, 11),
(9, 12),
(10, 13),
(11, 14);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `leitor`
--
ALTER TABLE `leitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

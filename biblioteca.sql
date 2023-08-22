-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2023 às 15:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao`
--

CREATE TABLE `devolucao` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dataDevolucao` date DEFAULT NULL,
  `valorMulta` double DEFAULT NULL,
  `idExemplarEmprestimo` int(11) DEFAULT NULL,
  `idEmprestimoExemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `dataEmprestimo` date DEFAULT NULL,
  `dataPrevistaDevolucao` date DEFAULT NULL,
  `idLeitor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exemplar`
--

CREATE TABLE `exemplar` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `prateleira` varchar(45) DEFAULT NULL,
  `etiqueta` varchar(45) NOT NULL,
  `dataCadastro` date NOT NULL,
  `local` varchar(45) NOT NULL,
  `idLivro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensdeemprestimo`
--

CREATE TABLE `itensdeemprestimo` (
  `idEmprestimo` int(11) DEFAULT NULL,
  `idExemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensdereserva`
--

CREATE TABLE `itensdereserva` (
  `idReserva` int(11) DEFAULT NULL,
  `idExemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitor`
--

CREATE TABLE `leitor` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `dn` date NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `idEditora` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `pag` varchar(45) DEFAULT NULL,
  `isbn` varchar(15) DEFAULT NULL,
  `quant` int(11) NOT NULL,
  `edicao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroautor`
--

CREATE TABLE `livroautor` (
  `idAutor` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `dataReserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `devolucao`
--
ALTER TABLE `devolucao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idExemplarEmprestimo` (`idExemplarEmprestimo`),
  ADD KEY `idEmprestimoExemplar` (`idEmprestimoExemplar`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLeitor` (`idLeitor`);

--
-- Índices para tabela `exemplar`
--
ALTER TABLE `exemplar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itensdeemprestimo`
--
ALTER TABLE `itensdeemprestimo`
  ADD KEY `idEmprestimo` (`idEmprestimo`),
  ADD KEY `idExemplar` (`idExemplar`);

--
-- Índices para tabela `itensdereserva`
--
ALTER TABLE `itensdereserva`
  ADD KEY `idReserva` (`idReserva`),
  ADD KEY `idExemplar` (`idExemplar`);

--
-- Índices para tabela `leitor`
--
ALTER TABLE `leitor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEditora` (`idEditora`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Índices para tabela `livroautor`
--
ALTER TABLE `livroautor`
  ADD PRIMARY KEY (`idAutor`,`idLivro`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `leitor`
--
ALTER TABLE `leitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `devolucao`
--
ALTER TABLE `devolucao`
  ADD CONSTRAINT `devolucao_ibfk_1` FOREIGN KEY (`idExemplarEmprestimo`) REFERENCES `itensdeemprestimo` (`idExemplar`),
  ADD CONSTRAINT `devolucao_ibfk_2` FOREIGN KEY (`idEmprestimoExemplar`) REFERENCES `itensdeemprestimo` (`idExemplar`);

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`idLeitor`) REFERENCES `leitor` (`id`);

--
-- Limitadores para a tabela `exemplar`
--
ALTER TABLE `exemplar`
  ADD CONSTRAINT `exemplar_ibfk_1` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`id`);

--
-- Limitadores para a tabela `itensdeemprestimo`
--
ALTER TABLE `itensdeemprestimo`
  ADD CONSTRAINT `itensdeemprestimo_ibfk_1` FOREIGN KEY (`idEmprestimo`) REFERENCES `emprestimo` (`id`),
  ADD CONSTRAINT `itensdeemprestimo_ibfk_2` FOREIGN KEY (`idExemplar`) REFERENCES `exemplar` (`id`);

--
-- Limitadores para a tabela `itensdereserva`
--
ALTER TABLE `itensdereserva`
  ADD CONSTRAINT `itensdereserva_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reserva` (`id`),
  ADD CONSTRAINT `itensdereserva_ibfk_2` FOREIGN KEY (`idExemplar`) REFERENCES `exemplar` (`id`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`idEditora`) REFERENCES `editora` (`id`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`id`);

--
-- Limitadores para a tabela `livroautor`
--
ALTER TABLE `livroautor`
  ADD CONSTRAINT `livroautor_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `livroautor_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

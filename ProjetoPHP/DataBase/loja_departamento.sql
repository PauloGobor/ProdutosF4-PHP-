-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2019 às 13:16
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja_departamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_enderecos_usuario`
--

CREATE TABLE `tb_enderecos_usuario` (
  `id_endereco` int(11) NOT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(8) NOT NULL,
  `complemento` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_enderecos_usuario`
--

INSERT INTO `tb_enderecos_usuario` (`id_endereco`, `estado`, `cidade`, `cep`, `rua`, `bairro`, `numero`, `complemento`, `id_user`) VALUES
(2, 'PR', 'Almirante TamandarÃ©', '83501060', 'Rua JoÃ£o AntÃ´nio Zem', 'Jardim SÃ£o JosÃ©', 121, '12', 25),
(3, 'admin', 'admin', '123', '', 'admin', 123, 'admin', 1),
(4, 'PR', 'Curitiba', '82220152', 'Rua Jordão Corrêa', 'Barreirinha', 203, '203', 32),
(23, '123213', '12312', '82220152', 'gjnthn', '123213', 203, '', 54),
(24, '...', '...', '82220152', 'batat', '...', 203, '', 55),
(25, '...', '...', '82220152', '...', '...', 203, '', 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor_produto` float(10,2) NOT NULL,
  `descricao_produto` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id_produto`, `nome_produto`, `valor_produto`, `descricao_produto`) VALUES
(1, '12', 12.00, '122132311241'),
(3, 'Batata', 2.00, 'Batata'),
(4, 'Banana', 10.00, 'Banana'),
(5, 'Testando', 123.00, 'Testando'),
(6, 'Azul', 1234.00, '1231241'),
(7, 'batataat', 123124.00, '12421421');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fone_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `senha_user` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nome_user`, `fone_user`, `senha_user`, `email_user`, `perfil`) VALUES
(1, 'admin', '', 'admin', 'adm@adm.com', 'admin'),
(32, 'Eduardo', '123', '123', 'edu@email.com', 'usuario'),
(49, 'Paulo', '9239239239', '123', 'paulo@email.com', 'usuario'),
(54, 'Eduxd', '1234', '123', 'eduxd@email.com', 'admin'),
(56, 'Batata', '914914291249', '123', 'batata@email.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_enderecos_usuario`
--
ALTER TABLE `tb_enderecos_usuario`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produto`) USING BTREE;

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nome_user` (`nome_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_enderecos_usuario`
--
ALTER TABLE `tb_enderecos_usuario`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

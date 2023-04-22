-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22-Abr-2023 às 11:23
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `criar_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `id` int(11) NOT NULL,
  `nomeAnimal` text NOT NULL,
  `tipo` enum('cão','gato') NOT NULL,
  `raca` text NOT NULL,
  `pelo` enum('curto','longo') NOT NULL,
  `idDono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`id`, `nomeAnimal`, `tipo`, `raca`, `pelo`, `idDono`) VALUES
(1, 'Snoopy', 'cão', 'Épagneul Breton', 'curto', 4),
(2, 'Riscas', 'gato', '', 'curto', 4),
(3, 'Flocky', 'cão', 'Podengo', 'curto', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `dataInicio` datetime NOT NULL,
  `dataFim` datetime NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `dataInicio`, `dataFim`, `idAnimal`, `idServico`) VALUES
(1, '2023-06-30 11:31:45', '2023-06-30 12:01:45', 1, 1),
(3, '2023-04-22 02:50:54', '2023-04-22 02:50:54', 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nomeServico` text NOT NULL,
  `descricao` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `imagem` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nomeServico`, `descricao`, `duracao`, `preco`, `imagem`) VALUES
(1, 'Banho de cão', 'Lavagem do pelo feita com shampoo especifico para cada tipo de pelo', 30, 30, 'banhocao.png'),
(2, 'Corte de cão', 'Escovagem de pelo para remover os pelos portes e corte do pelo', 60, 50, 'cortecao.png'),
(3, 'Banho de gato', 'Lavagem do pelo feita com shampoo adequado para cada tipo de pelo e/ou raça', 30, 25, 'banhogato.png'),
(5, 'Corte de gato', 'Escovagem de pelo para remover os pelos portes e tosquia do pelo ', 30, 40, 'cortegato.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicosfuncionarios`
--

CREATE TABLE `servicosfuncionarios` (
  `id` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicosfuncionarios`
--

INSERT INTO `servicosfuncionarios` (`id`, `idFuncionario`, `idServico`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 5),
(5, 3, 5),
(9, 4, 1),
(10, 3, 3),
(14, 4, 3),
(15, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `nomeUtilizador` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `telemovel` int(13) NOT NULL,
  `tipo` enum('cliente','funcionario','admin') DEFAULT NULL,
  `imagem` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nomeUtilizador`, `password`, `email`, `telemovel`, `tipo`, `imagem`) VALUES
(1, 'joao', 'joao', 'joao@hotmail.com', 961234567, 'funcionario', 'funcionario3.jpg'),
(2, 'cliente', 'cliente', 'cliente@gmail.com', 2147483647, 'cliente', ''),
(3, 'joana', 'joana', 'joana@hotmail.com', 968254821, 'funcionario', 'funcionario1.jpg'),
(4, 'maria', 'maria', 'maria@hotmail.com', 938247327, 'funcionario', 'funcionario2.jpg'),
(5, 'admin', 'admin', 'admin@hotmail.com', 936925333, 'admin', ''),
(6, 'teste', '', 'teste', 91, 'funcionario', NULL),
(7, 'm', '', 'm@m', 9, 'funcionario', NULL),
(8, 'j', '', 'j@mail.com', 8, 'funcionario', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dono` (`idDono`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servico` (`idServico`),
  ADD KEY `animal` (`idAnimal`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagem` (`id`);

--
-- Índices para tabela `servicosfuncionarios`
--
ALTER TABLE `servicosfuncionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario` (`idFuncionario`),
  ADD KEY `servicosfuncionarios_ibfk_2` (`idServico`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password_2` (`password`,`email`,`nomeUtilizador`) USING HASH,
  ADD KEY `password_3` (`password`(768)),
  ADD KEY `email` (`email`(768)) USING HASH;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servicosfuncionarios`
--
ALTER TABLE `servicosfuncionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animais`
--
ALTER TABLE `animais`
  ADD CONSTRAINT `animais_ibfk_1` FOREIGN KEY (`idDono`) REFERENCES `utilizadores` (`id`);

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idServico`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `animais` (`id`);

--
-- Limitadores para a tabela `servicosfuncionarios`
--
ALTER TABLE `servicosfuncionarios`
  ADD CONSTRAINT `servicosfuncionarios_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `servicosfuncionarios_ibfk_2` FOREIGN KEY (`idServico`) REFERENCES `servicos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

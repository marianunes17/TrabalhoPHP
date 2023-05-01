-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01-Maio-2023 às 22:13
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
  `pelo` enum('curto','longo','sem pelo') NOT NULL,
  `idDono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`id`, `nomeAnimal`, `tipo`, `raca`, `pelo`, `idDono`) VALUES
(1, 'Snoopy', 'cão', 'Épagneul Breton', 'curto', 4),
(2, 'Riscas', 'gato', '', 'curto', 4),
(3, 'Flocky', 'cão', 'Podengo', 'curto', 2),
(13, 'Flash', 'gato', 'Épagneul Bretonn', 'curto', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `dataInicio` datetime NOT NULL,
  `dataFim` datetime NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `atendido` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `dataInicio`, `dataFim`, `idAnimal`, `idServico`, `idFuncionario`, `atendido`) VALUES
(1, '2023-06-30 11:31:45', '2023-06-30 12:01:45', 1, 1, 1, 1),
(5, '2023-04-23 22:48:54', '2023-04-23 22:48:54', 3, 1, 3, 1),
(23, '2023-05-01 15:22:45', '2023-05-01 16:22:45', 2, 4, 1, 0),
(27, '2022-04-25 17:20:00', '2022-04-25 17:50:00', 1, 1, 1, 1);

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
(4, 'Corte de gato', 'Escovagem de pelo para remover os pelos portes e tosquia do pelo ', 30, 40, 'cortegato.png');

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
(4, 1, 4),
(5, 3, 4),
(6, 4, 1),
(7, 3, 3),
(8, 4, 3),
(9, 3, 1);

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
(1, 'joao', 'dccd96c256bc7dd39bae41a405f25e43', 'joao@hotmail.com', 961234567, 'funcionario', 'funcionario3.jpg'),
(2, 'cliente', '4983a0ab83ed86e0e7213c8783940193', 'cliente@gmail.com', 2147483647, 'cliente', ''),
(3, 'joana', '18f01959ff46071d73905d549cafde20', 'joana@hotmail.com', 968254821, 'funcionario', 'funcionario1.jpg'),
(4, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'maria@hotmail.com', 2147483647, 'funcionario', 'funcionario2.jpg'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@hotmail.com', 9692, 'admin', ''),
(22, 'rui', '0eb46665addf43389ae950050f787a45', 'rui@rui.pt', 91, '', NULL);

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
  ADD KEY `animal` (`idAnimal`),
  ADD KEY `idFuncionario` (`idFuncionario`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `nomeUtilizador` (`nomeUtilizador`,`email`) USING HASH;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `animais` (`id`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`idFuncionario`) REFERENCES `utilizadores` (`id`);

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

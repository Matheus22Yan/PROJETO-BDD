-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 22:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(10) UNSIGNED NOT NULL,
  `paciente_id_paciente` int(10) UNSIGNED NOT NULL,
  `medico_id_medico` int(10) UNSIGNED NOT NULL,
  `data_consulta` date DEFAULT NULL,
  `hora_consulta` time DEFAULT NULL,
  `descricao_consulta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `paciente_id_paciente`, `medico_id_medico`, `data_consulta`, `hora_consulta`, `descricao_consulta`) VALUES
(1, 0, 3, '2024-11-11', '09:45:00', 'testea'),
(3, 0, 3, '2222-02-22', '12:22:00', 'aa'),
(4, 0, 3, '2024-11-29', '11:48:00', 'Q2QSS'),
(5, 0, 3, '2222-02-22', '12:22:00', 'AAAAAA'),
(6, 9, 3, '0222-02-22', '12:22:00', 'aaaaaaaaaaaaaaaaaaa'),
(7, 11, 4, '2222-02-22', '12:02:00', '1'),
(9, 19, 7, '2024-11-19', '20:19:00', 'teste'),
(10, 20, 8, '2024-11-21', '14:56:00', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(10) UNSIGNED NOT NULL,
  `nome_medico` varchar(100) DEFAULT NULL,
  `crm_medico` varchar(10) DEFAULT NULL,
  `especialidade_medico` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`id_medico`, `nome_medico`, `crm_medico`, `especialidade_medico`) VALUES
(7, 'santorini', '22228', 'psicologo'),
(8, 'DIEGO', '1222332', 'MEDICO DE OUVIDO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(10) UNSIGNED NOT NULL,
  `nome_paciente` varchar(100) DEFAULT NULL,
  `cpf_paciente` varchar(14) DEFAULT NULL,
  `data_nasc_paciente` date DEFAULT NULL,
  `sexo_paciente` char(1) DEFAULT NULL,
  `fone_paciente` varchar(20) DEFAULT NULL,
  `email_paciente` varchar(100) DEFAULT NULL,
  `endereco_paciente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `cpf_paciente`, `data_nasc_paciente`, `sexo_paciente`, `fone_paciente`, `email_paciente`, `endereco_paciente`) VALUES
(19, 'claudio', '222-222-09', '2024-11-05', 'm', '61992234', 'claudio@gmail.com', 'itapoas'),
(20, 'caio', '1122333', '2024-11-07', 'm', '122222222222', 'caio@gmail.com.br', 'itapoas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`, `tipo`) VALUES
(1, 'matheus', 'matheusyan978@gmail.com', 'matheus', '123@', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `Consulta_FKIndex1` (`medico_id_medico`),
  ADD KEY `Consulta_FKIndex2` (`paciente_id_paciente`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

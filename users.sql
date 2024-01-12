
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `tipoUser` varchar(255) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `login`, `senha`, `nome`, `foto`, `tipoUser`, `profissao`, `instagram` `twitter`, `facebook`) VALUES
(0, 'bela@gmail.com', '0867', 'Belina Aparecida', 'Semfoto.png', 'admin', 'Aposentada', 'https://www.instagram.com/marques.belina/', '', 'https://www.facebook.com/belina.marques/'),
(1, 'leo@gmail.com', '1608', 'Leonardo Marques', 'leo.png', 'admin', 'Estudante', 'https://www.instagram.com/leonardo_marques15/', 'https://twitter.com/LeonardoMarks07', 'https://www.facebook.com/leonardo.emanuel.374/'),
(2, 'dan@gmail.com', '7528', 'Daniel Moreira', 'dan.png', 'admin', 'Estudante', 'https://www.instagram.com/dan.hma/', '', ''),
(3, 'manu@gmail.com', 'manu123', 'Manoela Moraes', 'manu.png', 'user', 'Estudante', 'https://www.instagram.com/manu.tjx/', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto` (`foto`),
  ADD KEY `login` (`login`),
  ADD KEY `nome` (`nome`,`tipoUser`),
  ADD KEY `tipoUser` (`tipoUser`);

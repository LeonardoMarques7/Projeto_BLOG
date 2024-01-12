

CREATE TABLE `comentarios` (
  `comentario_id` int(11) UNSIGNED NOT NULL,
  `codigo_post` int(30) DEFAULT NULL,
  `image_comentario` varchar(30) DEFAULT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `login_user` varchar(255) DEFAULT NULL,
  `nome_user` varchar(255) DEFAULT NULL,
  `conteudo_comentario` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `codigo_post`, `image_comentario`, `id_user`, `login_user`, `nome_user`, `conteudo_comentario`) VALUES
(1, 222222, 'leo.png', '1', 'leo@gmail.com', 'Leonardo Marques', 'A nova cozinha parece ser um verdadeiro avanço, tornando a distribuição da merenda mais ágil e prática.'),
(2, 222222, 'manu.png', '3', 'manu@gmail.com', 'Manoela Moraes', 'Adorei saber sobre a reforma na cozinha! A escola realmente se dedicou a oferecer um ambiente moderno e eficiente para os estudantes.'),
(4, 12345, 'manu.png', '3', 'manu@gmail.com', 'Manoela Moraes', 'Que excelente oportunidade para os estudantes interessados em ingressar no ensino técnico! '),
(5, 33333, 'leo.png', '1', 'leo@gmail.com', 'Leonardo Marques', 'Muito legal essas esportivas :)'),
(6, 33333, 'manu.png', '3', 'manu@gmail.com', 'Manoela Moraes', 'Essa mistura de anos de curso para formar as equipes não só fortalece os laços entre os estudantes!!'),
(7, 44444, 'dan.png', '2', 'dan@gmail.com', 'Daniel Moreira', 'Que legal que aEtec está se juntando para ajudar a comunidade!'),
(8, 44444, 'manu.png', '3', 'manu@gmail.com', 'Manoela Moraes', 'Que orgulho ver o comprometimento dos alunos da Etec Fernando Prestes na XXIV Gincana da Amizade! '),
(9, 55555, 'leo.png', '1', 'leo@gmail.com', 'Leonardo Marques', 'Uau computadores de ultima geração, etec mais uma vez a frente!'),
(10, 55555, 'dan.png', '2', 'dan@gmail.com', 'Daniel Moreira', 'Que legal esses novos computadores para nossa etec ; )'),
(11, 77777, 'manu.png', '3', 'manu@gmail.com', 'Manoela Moraes', 'Vou me inscrever agora mesmo..');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `codigo_post` (`codigo_post`),
  ADD KEY `image_comentario` (`image_comentario`),
  ADD KEY `login_user` (`login_user`),
  ADD KEY `nome_user` (`nome_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`codigo_post`) REFERENCES `post` (`codigo`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`image_comentario`) REFERENCES `users` (`foto`),
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`login_user`) REFERENCES `users` (`login`),
  ADD CONSTRAINT `comentarios_ibfk_4` FOREIGN KEY (`nome_user`) REFERENCES `users` (`nome`);

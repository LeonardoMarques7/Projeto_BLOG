CREATE DATABASE blog;
USE blog;

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
(1, 222222, 'leo.png', 1, 'leo@gmail.com', 'Leonardo Marques', 'A nova cozinha parece ser um verdadeiro avanço, tornando a distribuição da merenda mais ágil e prática.'),
(2, 222222, 'manu.png', 3, 'manu@gmail.com', 'Manoela Moraes', 'Adorei saber sobre a reforma na cozinha! A escola realmente se dedicou a oferecer um ambiente moderno e eficiente para os estudantes.'),
(4, 12345, 'manu.png', 3, 'manu@gmail.com', 'Manoela Moraes', 'Que excelente oportunidade para os estudantes interessados em ingressar no ensino técnico! '),
(5, 33333, 'leo.png', 1, 'leo@gmail.com', 'Leonardo Marques', 'Muito legal essas esportivas :)'),
(6, 33333, 'manu.png', 3, 'manu@gmail.com', 'Manoela Moraes', 'Essa mistura de anos de curso para formar as equipes não só fortalece os laços entre os estudantes!!'),
(7, 44444, 'dan.png', 2, 'dan@gmail.com', 'Daniel Moreira', 'Que legal que aEtec está se juntando para ajudar a comunidade!'),
(8, 44444, 'manu.png', 3, 'manu@gmail.com', 'Manoela Moraes', 'Que orgulho ver o comprometimento dos alunos da Etec Fernando Prestes na XXIV Gincana da Amizade! '),
(9, 55555, 'leo.png', 1, 'leo@gmail.com', 'Leonardo Marques', 'Uau computadores de ultima geração, etec mais uma vez a frente!'),
(10, 55555, 'dan.png', 2, 'dan@gmail.com', 'Daniel Moreira', 'Que legal esses novos computadores para nossa etec ; )'),
(11, 77777, 'manu.png', 3, 'manu@gmail.com', 'Manoela Moraes', 'Vou me inscrever agora mesmo..');

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `codigo` int(30) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `assuntoIntro` varchar(1000) DEFAULT NULL,
  `assuntoCompleto` varchar(1000) DEFAULT NULL,
  `tags` varchar(1000) DEFAULT NULL,
  `comentario` varchar(1000) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `datePost` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `post`
--

INSERT INTO `post` (`id`, `codigo`, `foto`, `titulo`, `assuntoIntro`, `assuntoCompleto`, `tags`, `comentario`, `autor`, `datePost`) VALUES
(1, 12345, 'f1.png', 'Etecs recebem inscrições para processo seletivo do primeiro semestre de 2024', 'As Etecs (Escolas Técnicas Estaduais) abriram as inscrições para o processo seletivo do primeiro semestre de 2024. As inscrições vão até 8 de novembro e devem ser feitas pelo site <strong><a href=\"https://www.vestibulinhoetec.com.br/home/\">Vestibulinho</a></strong>. O valor da taxa de inscrição é de R$ 34. Já o exame será aplicado em 10 de dezembro.\r\n\r\n', 'Este é um passo importante para os estudantes que desejam ingressar em uma instituição de <strong>ensino técnico de qualidade</strong>. As Etecs oferecem uma variedade de cursos e oportunidades de formação profissional, tornando-se uma escolha valiosa para muitos jovens em busca de uma educação de alto nível. A abertura das inscrições representa o início de uma<strong>jornada promissora</strong> para aqueles que buscam se destacar no mercado de trabalho por meio de uma educação técnica sólida e especializada.', 'EtecFP', 'Vou me inscrever agora!', 'Leonardo Marques', '2023-12-21 14:12:00'),
(2, 222222, 'f2.png', 'Obra da construção finalizada da nova cozinha do Fernando Prestes', 'Obra da construção da <strong>nova cozinha</strong> foi entregada, já começou a ser distribuída a merenda desde 20 setembro, essa obra foi feita em torno de 3 meses. <strong> As vantagens dessa nova cozinha</strong>, é que a distribuição da merenda é mais rápida e pratica, com os próprios alunos pegando sua comida e duas filas separadas. Isso não era possível na outra cozinha por seu espaço pequeno.', 'A <strong>Escola Técnica Fernando Prestes</strong> tem o prazer de apresentar sua mais recente inovação, a <strong>nova cozinha escolar</strong>. Esta atualização representa um marco significativo na qualidade e na experiência dos alunos. A cozinha, recentemente reformada e equipada com <strong>tecnologia de ponta</strong>, proporciona um ambiente moderno e eficiente para a preparação de refeições. Com instalações mais amplas e equipamentos de última geração, os estudantes têm agora a oportunidade de aprimorar suas habilidades culinárias em um espaço inspirador.\r\n<br><br>\r\nAlém da infraestrutura renovada, a escola também está focada em promover hábitos alimentares saudáveis. A <strong>nova cozinha</strong> oferece opções de refeições equilibradas e nutritivas, contribuindo para o bem-estar dos alunos. Essa abordagem abrangente para a alimentação escolar não apenas satisfaz as necessidades nutricionais, mas também educa os alunos sobre a importância de escolhas alimentares saudáveis.', 'CozinhaNova', 'Muito legal :)', 'Gabriel Annuciato', '2023-11-11 08:04:00'),
(3, 33333, 'f3.png', 'Começaram as provas esportivas da XXIV Gincana da Amizade do FP', 'Times da <strong>Etec Fernando Prestes (FP)</strong>, se unem para vencer provas em esportes(vôlei, futsal, tênis de mesa..). Cada equipe é formada pelos 3 anos de curso, por exemplo: (1°, 2°, 3° ano) de Desenvolvimento de Sistemas.\r\nE assim são formadas as equipes com essa mistura. Além disso com as participações e pódios, essas equipes arrecadam pontos, que vão sendo acumulados para no final do ano termos o OSCAR, neste evento a equipe que conseguir mais pontos ganha o troféu da gincana da amizade.', '<strong>A XXIV Gincana da Amizade do FP</strong> é um evento altamente aguardado e estimado pelos estudantes da Etec Fernando Prestes. Além de promover a competição saudável e o espírito esportivo entre os alunos, a gincana também fortalece os laços de amizade e colaboração entre os diferentes anos e cursos da escola. É um momento em que a diversidade de conhecimento e habilidades se une para enfrentar desafios esportivos, criando uma atmosfera de união e camaradagem.<br><br>\r\n\r\nA rivalidade saudável entre as equipes é intensa, e a busca pelo troféu do <strong>OSCAR</strong> se torna uma fonte de motivação extra para os estudantes. A competição não se resume apenas às provas esportivas, pois as equipes também se envolvem em atividades sociais e culturais ao longo do ano. ', 'AjudarOPróximo', 'Super legal ', 'Manoela Moraes', '2023-10-11 07:24:00'),
(4, 44444, 'f4.png', 'Alunos de Etec Fernando Prestes arrecadam leite para doação', 'Os alunos da Escola Técnica Estadual (Etec) Fernando Prestes arrecadaram mais de <strong>18 mil litros de leite para doação</strong>. A coleta do alimento foi feita durante ação do projeto Gincana da Amizade, realizado há mais de 20 edições na instituição. O leite arrecadado foi doado para 13 associações sociais: Banco de Alimentos de Sorocaba, Lar Criança Feliz, Instituto Maria Claro, Gpaci, Lar São Vicente de Paula, Afissore, Anjos do Bem, Casa Áurea, Apae, Comunidade Há Uma Esperança, Amigos da Etec, Comunidade Amigos e Salesiano Sorocaba.', '<strong>Começaram as provas esportivas da XXIV Gincana da Amizade do FP</strong>. Times da Etec Fernando Prestes (FP), se unem para vencer provas em esportes (vôlei, futsal, tênis de mesa...). Cada equipe é formada pelos 3 anos de curso, por exemplo: (1°, 2°, 3° ano) de Desenvolvimento de Sistemas. E assim são formadas as equipes com essa mistura. Além disso com as participações e pódios, essas equipes arrecadam pontos, que vão sendo acumulados para no final do ano termos o OSCAR, neste evento a equipe que conseguir mais pontos ganha o troféu da gincana da amizade.<br><br>\r\n\r\nA XXIV Gincana da Amizade do FP é um evento altamente aguardado e estimado pelos estudantes da Etec Fernando Prestes. Além de promover a competição saudável e o espírito esportivo entre os alunos, a gincana também fortalece os laços de amizade e colaboração entre os diferentes anos e cursos da escola. É um momento em que a diversidade de conhecimento e habilidades se une para enfrentar desafios esportivos, criando', 'GincanaDaAmizade', 'asdasdssadsadsa', 'Leonardo Marques', '2023-04-18 09:14:00'),
(5, 55555, 'f5.png', 'Escola Técnica Fernando Prestes recebem novas unidades de notebooks', 'A <strong>Escola Técnica Fernando Prestes</strong> acaba de introduzir uma emocionante atualização em sua infraestrutura educacional, com a incorporação de novos notebooks de última geração. Essa iniciativa tem como <strong>objetivo</strong> proporcionar aos alunos um ambiente de aprendizado mais <strong>dinâmico</strong> e <strong>tecnologicamente avançado</strong>, preparando-os para os desafios do mundo digital. ', 'Essa iniciativa tem como objetivo proporcionar aos alunos um ambiente de aprendizado mais dinâmico e tecnologicamente avançado, preparando-os para os desafios do mundo digital.<br><br>\r\n\r\nA Escola Técnica Fernando Prestes está comprometida em oferecer aos seus alunos as melhores ferramentas e recursos educacionais para garantir que estejam preparados para o futuro. Os novos notebooks oferecem acesso a tecnologias de ponta, permitindo que os estudantes explorem diversas áreas do conhecimento de maneira mais eficiente e interativa. Isso representa um passo importante em direção a uma educação mais moderna e adaptada aos desafios do século XXI.', 'Tecnologia', '', 'Manoela Moraes', '2023-10-16 15:52:00'),
(6, 77777, 'f7.png', 'As inscrições do SARAU está aberta, venha se expressar artisticamente <3', 'Sarau é um evento muito apreciado e significativo para o FP, nos qual os alunos, até professores têm a oportunidade de se expressar artisticamente, seja por meio de poesia, música, dança, teatro, pintura, ou outras formas de arte. Saiba Mais..', 'É ótimo que a Etec Fernando Prestes realiza esse tipo de evento, proporcionando um espaço para que os alunos expressem seus sentimentos e habilidades artísticas. O Sarau é uma maneira maravilhosa de promover a criatividade, a cultura, além de fortalecer o senso de comunidade dentro da instituição de ensino. Eles também oferecem uma plataforma para que os alunos mostrem seu talento. <strong><a href=\"https://www.instagram.com/saraufprestes/\">SARAUFP</a></strong>\r\nmande sua mensagem lá na DM ;) ', 'SarauFP', '', 'Leonardo Marques', '2023-10-19 23:18:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

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

INSERT INTO `users` (`id`, `login`, `senha`, `nome`, `foto`, `tipoUser`, `profissao`, `instagram`, `twitter`, `facebook`) VALUES
(1, 'leo@gmail.com', '$2a$08$Cf1f11ePArKlBJomM0F6a.IKhB8WyhHy1BBwnE8Id3fCkIoJ1hOe.', 'Leonardo Marques', 'leo.png', 'admin', 'Estudante', 'https://www.instagram.com/leonardo_marques15/', 'https://twitter.com/LeonardoMarks07', 'https://www.facebook.com/leonardo.emanuel.374/'),
(2, 'dan@gmail.com', '$2a$08$Cf1f11ePArKlBJomM0F6a.AyTBHfcCjQxohXK9igA9iNnHjnEo4iG', 'Daniel Moreira', 'dan.png', 'admin', 'Estudante', 'https://www.instagram.com/dan.hma/', '', ''),
(3, 'manu@gmail.com', '$2a$08$Cf1f11ePArKlBJomM0F6a.j6/zWYbxa1beIDqDjaBsd6mH3A8dXHq', 'Manoela Moraes', 'manu.png', 'user', 'Estudante', 'https://www.instagram.com/manu.tjx/', '', '');

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
  ADD KEY `nome_user` (`nome_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD KEY `foto` (`foto`),
  ADD KEY `login` (`login`),
  ADD KEY `nome` (`nome`,`tipoUser`),
  ADD KEY `tipoUser` (`tipoUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

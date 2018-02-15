CREATE TABLE user(
   user_id INTEGER PRIMARY KEY,
   user_username VARCHAR NOT NULL,
   user_fullName VARCHAR,
   user_birthDate VARCHAR,
   user_photoId VARCHAR,
   user_gender VARCHAR,
   user_password VARCHAR NOT NULL
);



CREATE TABLE task(
  task_id INTEGER PRIMARY KEY ,
  task_content VARCHAR NOT NULL,
  task_checkdone INTEGER NOT NULL,
  list_id INTEGER REFERENCES list
);

CREATE TABLE list(
  list_id INTEGER PRIMARY KEY,
  list_name VARCHAR NOT NULL,
  list_public INTEGER NOT NULL,
  user_username VARCHAR REFERENCES user
);


INSERT INTO user VALUES (NULL, 'miguel', 'User Administrator','1993-10-02', 'images/profile/miguel.jpg', 'male', '9eb0c9605dc81a68731f61b3e0838937');
INSERT INTO user VALUES (NULL, 'joao', 'João Pedro','1996-11-05', 'images/profile/joao.jpg', 'male', 'dccd96c256bc7dd39bae41a405f25e43');
INSERT INTO user VALUES (NULL, 'ana', 'Ana Catarina','2000-12-12', 'images/profile/ana.jpg', 'female', '276b6c4692e78d4799c12ada515bc3e4');

/* Miguel */
INSERT INTO list VALUES (NULL,'Linguages e Tecnologias Web',0,'miguel');
INSERT INTO list VALUES (NULL,'Programação em Lógica',0,'miguel');
INSERT INTO list VALUES (NULL,'Engenharia de Software',0,'miguel');
INSERT INTO list VALUES (NULL,'Base de Dados',0,'miguel');
INSERT INTO list VALUES (NULL,'Exames',1,'miguel');

/* Joao*/
INSERT INTO list VALUES (NULL,'Desporto',1,'joao');
INSERT INTO list VALUES (NULL,'Lazer',1,'joao');
INSERT INTO list VALUES (NULL,'Trabalho',1,'joao');
INSERT INTO list VALUES (NULL,'Social',1,'joao');



/*ANA*/
INSERT INTO list VALUES (NULL,'Segunda-Feira',1,'ana');
INSERT INTO list VALUES (NULL,'Terça-Feira',1,'ana');
INSERT INTO list VALUES (NULL,'Quarta-Feira',1,'ana');
INSERT INTO list VALUES (NULL,'Quinta-Feira',1,'ana');
INSERT INTO list VALUES (NULL,'Sexta-Feira',1,'ana');
INSERT INTO list VALUES (NULL,'Sabado',1,'ana');
INSERT INTO list VALUES (NULL,'Domingo',1,'ana');
INSERT INTO list VALUES (NULL,'Festa de Aniversário',0,'ana');


/*Miguel - Linguages e Tecnologias Web */
INSERT INTO task VALUES (NULL,'JavaScript',0,1);
INSERT INTO task VALUES (NULL,'HTML',1,1);
INSERT INTO task VALUES (NULL,'CSS',0,1);
INSERT INTO task VALUES (NULL,'JSON',1,1);
INSERT INTO task VALUES (NULL,'PHP',0,1);

/*Miguel - Programação em Lógica */
INSERT INTO task VALUES (NULL,'PLR',1,2);
INSERT INTO task VALUES (NULL,'Jogo de tabuleiro',0,2);
INSERT INTO task VALUES (NULL,'Sicstus',0,2);

/*Miguel - Engenharia de Software */
INSERT INTO task VALUES (NULL,'Trabalho',1,3);
INSERT INTO task VALUES (NULL,'Relatorio',0,3);
INSERT INTO task VALUES (NULL,'Rever teorica 3',0,3);

/*Miguel - Base de Dados */
INSERT INTO task VALUES (NULL,'UML',1,4);
INSERT INTO task VALUES (NULL,'Querys',1,4);
INSERT INTO task VALUES (NULL,'Triggers',0,4);

/*Miguel - Exames */
INSERT INTO task VALUES (NULL,'ESOF',0,5);
INSERT INTO task VALUES (NULL,'BDAD',0,5);
INSERT INTO task VALUES (NULL,'LTW',1,5);

/*Ana - Segunda-Feira */
INSERT INTO task VALUES (NULL,'Aulas',1,10);
INSERT INTO task VALUES (NULL,'Ginasio',0,10);
INSERT INTO task VALUES (NULL,'Cabeleireiro',0,10);


/*Ana - Festa de Aniversário */
INSERT INTO task VALUES (NULL,'Marcar Restaurante',1,17);
INSERT INTO task VALUES (NULL,'Convidar a Joana',1,17);
INSERT INTO task VALUES (NULL,'Comprar um bolo',0,17);
  
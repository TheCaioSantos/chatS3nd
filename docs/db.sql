create database chats3nd /*!40100 DEFAULT CHARACTER SET utf8 */;

use chats3nd;

create table mensagem(
	id_mensagem int(11) primary key AUTO_INCREMENT not null,
	id_remetente_mensagem varchar(255),
	id_destinatario_mensagem varchar(255),
	mensagem text
)engine=innodb CHARSET=utf8;


create table usuario(
	id_usuario int(11) primary key AUTO_INCREMENT not null,
	nome_usuario varchar(50) not null unique,
	email_usuario varchar(70) not null unique,
	foto_usuario varchar(255) not null,
	nivel_usuario enum('1','2') not null #Nível 1 = Visitante, 2 = Atendente
)engine=innodb CHARSET=utf8;

INSERT INTO usuario VALUES 
(default, 'Atendente', 'atendente@email.com', 'imagens/atendente.png', '2'),
(default, 'Visitante', 'visitante@email.com', 'imagens/visitante.png','1');




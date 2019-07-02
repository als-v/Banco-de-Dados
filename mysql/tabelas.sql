DROP DATABASE IF EXISTS sorvete;
CREATE DATABASE sorvete;
use sorvete;

DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS sorvete;
DROP TABLE IF EXISTS pedido;

create table cliente(
id_cliente integer AUTO_INCREMENT,
email varchar(200),
cpf integer,
nome varchar(200),
senha varchar(200),
telefone integer,
cidade varchar(200),
nascimento YEAR,
primary key (id_cliente, email, cpf)
);

create table sorvete(
id_sorvete integer PRIMARY KEY AUTO_INCREMENT,
sabor varchar(200)
);

create table pedido(
id_cliente integer,
id_sorvete integer,
id_pedido integer,
tamanho enum('P', 'M', 'G'),
preco decimal(5,2),
foreign key (id_cliente) references cliente (id_cliente),
foreign key (id_sorvete) references sorvete (id_sorvete),
primary key(id_cliente, id_sorvete, id_pedido)
);

insert into cliente values (1, 'adm', 00000000000, 'adm', 'adm', 00000000000, 'Brazil', 2000);
insert into sorvete values (1, "Flocos"),("Chocolate"),("Napolitano"),("Limão"),("Abacaxi),("Coco"),("Milho-Verde),("Maracuja"),("Passas ao rum"),("Uva ao leite"),("Abacaxi ao leite"),("Creme"),("Romeu e Julieta"),("Nuttela"),("Limão ao leite"),("Açai"),("Bombom"),("Cookies'n cream"),("Chiclete"),("Morango"),("Manga"),("Torta italiana"),("Granola"),("Queijo"),("Café"),("Blue Ice"),("Jack Daniels"),("Nata"),("Danoninho"),("Profiteroles");

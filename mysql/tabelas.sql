DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS sorvete;
DROP TABLE IF EXISTS pedido;

create table cliente(
id_cliente integer auto_increment,
email varchar(200),
cpf integer,
nome varchar(200),
senha varchar(200),
telefone integer,
cidade varchar(200),
nascimento year,
primary key (id_cliente, email, cpf)
);

create table sorvete(
id_sorvete integer PRIMARY KEY,
sabor varchar(200),
descricao varchar(200)
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
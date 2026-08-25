create database patinhas_com_seguranca_lazza;
use patinhas_com_seguranca_lazza;

create table clientes (
    id_cliente int primary key auto_increment,
    nome varchar(100) not null
);

create table animais (
    id_pet int primary key auto_increment,
    nome varchar(100) not null,
    especie varchar(50) not null,
    raca varchar(50) not null,
    idade int not null,
    id_responsavel int,
    foreign key (id_responsavel) references clientes(id_cliente)
);


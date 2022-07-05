create database if not exists sga;
use sga;

create or replace table atendente(
    id int primary key auto_increment,
    nome varchar(250) not null,
    email varchar(250) not null unique,
    nota int not null unique,
    create_at timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table atendente add column foto text after nome default "" not null;

create or replace table atendente(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    create_at timestamp not null default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



insert into login (email, senha) values ('admin@loja.com.br' , md5('admin@123'))
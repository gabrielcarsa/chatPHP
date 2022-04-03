# Sistema de Chat em PHP

Sistema de chat em PHP.

## Script para criação do Banco de Dados

<code>  
        
        create table usuario
                (
                        id serial not null,
                        nome varchar(100), 
                        email varchar(100),
                        senha varchar(255),
                        primary key(id)
                );
</code>

<code>
        
        create table mensagem
                (
                        id serial not null,
                        texto varchar(300),
                        data timestamp,
                        fk_deUsuario int,
                        fk_paraUsuario int,
                        primary key(id),
                        foreign key(fk_deUsuario) references usuario(id),
                        foreign key(fk_paraUsuario) references usuario(id)
                );
</code>


Após isso no próprio sistema cadastre dois usuários para começar a conversar

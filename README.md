# Sistema de Chat em PHP

Este é um sistema de chat feito em PHP. Este projeto foi criado para um trabalho acadêmico de um sistema em PHP com Banco de Dados que possibilite criar, atualizar, deletear e visualizar dados com o PostgresSQL. O objetivo do trabalho, também, é de colocar em prática a arquitetura MVC(Model, View e Controller) no PHP.

## Tecnologias Utilizadas 
<div align="center">
<img height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"/>
<img height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" />
<img height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" />
<img height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" />
</div>

  - PHP
  - PostgreSQL.
  - HTML.
  - CSS.

## Autores
- Gabriel: responsável, principalmente, pelo back-end do projeto.
- Rafael: responsável, principalmente, pelo front-end do projeto.

## Layout

![FireShot Capture 015 - Sistema Chat - WebIII - localhost](https://user-images.githubusercontent.com/63206031/162496415-ce4605dd-45f9-43ed-ad90-14be17443d7c.png)
![FireShot Capture 016 - Sistema Chat - WebIII - localhost](https://user-images.githubusercontent.com/63206031/162496426-139bf9ed-2fce-4a87-a1db-6946c2e3f70e.png)

## Modelo Entidade Relacionamento
![diagramaEntidadeRelacionamento](https://user-images.githubusercontent.com/63206031/162497396-a6bc32cb-1bd6-465c-8e99-705172d1cf07.png)


## Instruções para usar

### Script para criação do Banco de Dados

        
        create table usuario
                (
                        id serial not null,
                        nome varchar(100), 
                        email varchar(100),
                        senha varchar(255),
                        primary key(id)
                );

        
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


### Para começar a usar:
- Mude a constate chamada 'APP', localizada na raiz do projeto no arquivo index.php. Mude essa variável para o caminho do seu diretório.
        Ex.: se o projeto irá está em: 'var/www/html/sistemaChat/'
        
        Coloque o caminho nessa variável 'APP', para funcionar corretamente o sistema em sua máquina.
- Após criar o BD no próprio sistema cadastre dois usuários para começar a conversar.

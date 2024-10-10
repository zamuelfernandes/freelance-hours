# Freelance Hours

Freelance Hours é uma aplicação web para oferta em projetos com a moeda de horas. Desenvolvido utilizando PHP com o framework Laravel, Livewire para componentes dinâmicos e Tailwind CSS para estilização, o projeto segue o padrão de arquitetura MVC e foi implementado para estudo das tecnologias durante um intensivo de PHP da Rocketseat 🚀.

## 🤖 Tecnologias

Este projeto foi desenvolvido com as seguintes tecnologias:

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)
-   [Livewire](https://laravel-livewire.com/)
-   [Tailwind CSS](https://tailwindcss.com/)
-   [MySQL](https://www.mysql.com/)

## 🎯 Funcionalidades

-   Controle de horas trabalhadas para freelancers.
-   Criação, visualização, edição e exclusão de projetos.
-   Relatórios de horas por projeto.
-   Interface dinâmica com Livewire para atualizações em tempo real.
-   Autenticação de usuários com Laravel Breeze.

## 📦 Instalação

Siga os passos abaixo para configurar o projeto localmente:

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/freelance-hours.git
```

2. Acesse o diretório do projeto:

```bash
cd freelance-hours
```

3. Instale as dependências do PHP e do Node.js:

```bash
composer install
npm install
```

4. Execute as migrações com seed:

```bash
php artisan migrate:fresh --seed
```

5. Compile os arquivos do front-end:

```bash
npm run build
```

6. Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

## 📋 Estrutura do Projeto

O projeto segue o padrão MVC, com Livewire, com as seguintes principais pastas:

-   Models: Contém as classes de modelo que representam as tabelas no banco de dados.
-   Controllers: Controladores responsáveis pela lógica de negócios e comunicação entre Models e Views.
-   Views: Arquivos Blade do Laravel que gerenciam a renderização do front-end.
-   Livewire Components: Componentes dinâmicos do Livewire para funcionalidades interativas.

## 🛠️ Ferramentas Utilizadas

-   Livewire: Para criar interfaces dinâmicas.
-   Tailwind CSS: Para estilização rápida e eficiente.

## 📄 Licença

Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para mais informações.

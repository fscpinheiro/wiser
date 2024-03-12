
# Wiser Challenge


## Desafios Cobertos

1. **Observers**: Avaliar o conhecimento sobre Observers no Laravel. O objetivo é criar um Observer que ouça os eventos de criação, atualização e exclusão de um modelo User.

2. **Eloquent**: Avaliar a proficiência com o ORM Eloquent. O desafio é criar um modelo Product com os campos name, price, e category_id e definir relações Eloquent adequadas.

3. **Scopes**: Verificar o entendimento sobre Scopes no Laravel. O desafio é definir um Local Scope no modelo Product que permita filtrar produtos por um preço mínimo.

4. **Verificar Números Primos**: Testar o entendimento sobre números e algoritmos básicos em matemática computacional. O desafio é escrever uma função que determine se um número é primo ou não.


## Requisitos

- Docker
- Composer
- PHP 8.0 ou superior
- MySQL 8.0 ou superior

## Docker Compose

O projeto utiliza Docker Compose para definir e executar os serviços do aplicativo. Aqui está uma visão geral dos serviços definidos no arquivo `docker-compose.yml`:

- **php**: Contêiner PHP com Laravel instalado.
- **nginx**: Contêiner Nginx para servir a aplicação.
- **mysql**: Contêiner MySQL para armazenar os dados da aplicação.
- **phpmyadmin**: Contêiner PhpMyAdmin para gerenciar facilmente o banco de dados MySQL.
- **redis**: Contêiner Redis para armazenamento em cache.

## Configuração

1. Clone o repositório para a sua máquina local.
2. Navegue até o diretório do projeto.
3. Execute `docker-compose up -d --build` para iniciar os serviços.
4. Execute `docker exec setup-php composer install` para instalar as dependências do projeto.
5. Execute `docker exec setup-php php artisan migrate:fresh --seed` para executar as migrações e popular o banco com dados.
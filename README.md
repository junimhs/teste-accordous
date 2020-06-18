# Aplicação teste da empresa Accordous

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## Tecnologias Usadas

Para desenvolver essa aplicação usei as tecnologias abaixo

- [Laravel V6](https://laravel.com/)
- [Uuid](https://laravel-news.com/eloquent-uuid)
- [Test unit e Test features](https://laravel.com/docs/6.x/testing)
- [Job com database](https://laravel.com/docs/6.x/queues)
- [Mail (Mailtrap)](https://mailtrap.io/)
- [Autencicação de api com Sanctum](https://laravel.com/docs/7.x)
- [Docker - Docker compose](https://www.docker.com/)
- [MySQL](https://www.mysql.com/)


## Teste

Para fazer os testes acabei usando a metodologia de criar um segundo banco usando docker-compose para que os teste fosse executado em um ambiente totalmente de teste.

## Como executar o projeto

```bash
# Clone o repositorio
$ git clone https://github.com/junimhs/teste-accordous.git

# Entre no repositorio
$ cd teste-accordous

# Configure as variaveis de email no .env.example com o 
$ MAIL_USERNAME=
$ MAIL_PASSWORD=

# Se estiver usando windows execute o comando abaixo ou no git bash ou no cmder
$ dos2unix .docker\entrypoint.sh

# Execute o docker-compose
$ docker-compose up -d

# Verifique se fez todas as instalações do laravel e rodou as migrations
$ docker logs app

# Após executar tudo, vamos entrar no container de app
$ docker exec -it app bash

# Vamos executar os testes
$ vendor/bin/phpunit

# Irremos ativar o job
$ php artisan queue:work ou php artisan queue:listen
```

## Rotas da api

* [Cadastrar empresa](documentacao/company.md) : `POST /api/company/`
* [Cadastrar usuario](documentacao/users.md) : `POST /api/company/{urlCompany}/users`
* [Autenticação da api](documentacao/auth.md) : `POST /api/sanctum/token`
### Rotas abaixo necessita de esta autenticada para acessá-las
* [Listar fornecedores](documentacao/provider.md) : `GET /api/provider`
* [Listar total de mensalidades](documentacao/provider.md) : `GET /api/total-payment`
* [Cadastrar fornecedores](documentacao/provider.md) : `POST /api/provider`
* [Apagar fornecedores](documentacao/provider.md) : `DELETE /api/provider/{urlFornecedor}`
### Rota separada não necessita de esta autenticado
* [Ativar fornecedor](documentacao/provider.md) : `POST /api/active-provider/{idFornecedor}`

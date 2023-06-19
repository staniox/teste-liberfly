# Teste liberfly

Teste da liberfly feito por Bruno Gomes

## Requisitos
- Ambiente Linux
- Docker
- Composer

## Instalação

clone o projeto:

```bash
git clone git@github.com:staniox/teste-liberfly-bruno-gomes.git
```
baixe as dependencias do composer:

```bash
composer install
```
vamos criar nosso arquivo .env a partir do modelo:

```bash
 cp .env.example .env
```

execute o comando para gerar a secret key e a app key

```bash
 ./vendor/bin/sail artisan jwt:secret
 ./vendor/bin/sail  artisan key:generate
```

Agora vamos buildar e subir o docker:

```bash
./vendor/bin/sail build && ./vendor/bin/sail up -d
```
Para Executar as migrations do banco:
```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan migrate --env=testing
```

Apos estes passos voce ja conseguira acessar o Swagger [Clique Aqui](http://localhost), entre e fique a vontade para explorar.


## Testes
Para Executar os testes basta rodar o comando:
```bash
./vendor/bin/sail artisan test
```

## Licenca

[Bruno dos Santos Gomes](https://github.com/staniox)

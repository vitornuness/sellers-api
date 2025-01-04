# Sellers-API

Esta API faz o gerenciamento de vendedores e suas vendas, com sistema de e-mail.

## Desenvolvimento

### Últimas atualização
1. Adicionar servidor ngix - Docker
2. Configurar servidor - Docker/Local
3. Documentação
4. Instalar PHP - Docker
5. Configurar PHP - Docker
6. Instalar Banco de Dados (MySQL) - Docker
7. Configurar Banco de Dados - Docker
8. Conectar Banco de Dados
9. Instalar Composer
10. Adicionar Router
11. Adicionar Controller para index

### Próximas atualizações
- Adicionar verificação de saúde da api
- Refatorar conexão com o Banco de Dados

## Sumário
- [Desenvolvimento](#desenvolvimento)
- [Dependências](#dependências)
- [Instalação](#instalação)

## Dependências
- [Docker](https://docker.com)
- [GIT](https://git-scm.com/)

## Instalação

1. Clone o repositório
```bash
git clone https://github.com/vitornuness/sellers-api.git
cd sellers-api
```

2. Adicione o host do servidor

- **Windows**

    Abra o arquivo **C: > Windows > System32 > drivers > etc > hosts** e adicone na última linha:
    ```bash
    127.0.0.1 docker.localhost
    ```
    Salve e feche o arquivo.

- **Linux**

    Abra o terminal e digite:
    ```bash
    sudo nano /etc/hosts
    ```
    Na última linha do arquivo insira:
    ```bash
    127.0.0.1 docker.localhost
    ```
    Salve (**CTRL + O**) e feche o arquivo (**CTRL + X**).

3. Execute a aplicação
```bash
docker-compose build
docker-compose up -d
```

A aplicação estará disponível em: [http://docker.localhost](http://docker.localhost).

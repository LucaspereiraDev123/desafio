# Controle Financeiro - Desafio Laravel

Uma aplicação web desenvolvida em **Laravel 12** para gerenciamento de transações e controle financeiro pessoal.

## 🎯 Funcionalidades

- **Autenticação de Usuários**: Sistema de login e registro com hash de senha seguro (Bcrypt)
- **Dashboard**: Visualização geral de transações com filtros por nome e categoria
- **Gerenciamento de Transações**: CRUD completo (Criar, Ler, Atualizar, Deletar)
- **Categorização**: Organizar transações por categorias (Entradas/Saídas)
- **Edição de Transações**: Formulário com pré-seleção de valores cadastrados
- **Logout**: Saída segura da aplicação

## 🛠️ Requisitos

- PHP 8.2+
- Composer
- MySQL/MariaDB
- Node.js (para assets, opcional)

## 📦 Instalação

### 1. Clonar o repositório
```bash
git clone <seu-repositorio>
cd DESAFIO-CONTROLE-FINANCEIRO
```

### 2. Instalar dependências
```bash
composer install
```

### 3. Configurar ambiente
```bash
cp .env.example .env
```

### 4. Gerar chave de aplicação
```bash
php artisan key:generate
```

### 5. Configurar banco de dados
Edite o arquivo `.env` com suas credenciais MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desafio_controle_financeiro
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 6. Executar migrations
```bash
php artisan migrate
```

### 7. Iniciar servidor
```bash
php artisan serve
```

A aplicação estará disponível em: `http://127.0.0.1:8000`

## 🚀 Como Usar

### Tela de Login
1. Acesse a URL raiz da aplicação
2. Será redirecionado automaticamente para `/login`
3. Insira email e senha cadastrados

### Tela de Registro
1. Clique em "Registrar" na tela de login
2. Preencha nome, email e senha
3. Será autenticado automaticamente após registro

### Dashboard
1. Após login, será redirecionado para `/dashboard`
2. Visualize todas as suas transações em uma tabela
3. Use os filtros por nome e categoria para buscar

### Gerenciar Transações
- **Nova Transação**: Clique em "+Nova Transação" para adicionar
- **Editar**: Clique em "Editar" na linha da transação
- **Visualizar**: Clique em "Exibir" para ver detalhes
- **Deletar**: Remova transações conforme necessário

### Categorias
- Clique em "Categorias" para gerenciar categorias de transação
- Crie novas categorias para organizar suas transações

## 📁 Estrutura do Projeto

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── TransacoesController.php
│   │   │   ├── CategoriasController.php
│   │   │   └── UsuariosController.php
│   │   ├── Middleware/
│   │   │   └── Autenticador.php
│   └── Models/
│       ├── Usuario.php
│       ├── Transacao.php
│       ├── Categoria.php
│       └── Dashboard.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── dashboard/
│       ├── transacoes/
│       ├── categorias/
│       ├── usuarios/
│       └── login/
├── routes/
│   └── web.php
├── config/
│   └── auth.php
└── public/
    └── css/
        └── app.css
```

## 🔐 Segurança

- **Autenticação**: Middleware `Autenticador` protege rotas autenticadas
- **Senhas**: Hash Bcrypt com rounds configurável (BCRYPT_ROUNDS=12)
- **Sessões**: Regeneração após login
- **CSRF Protection**: Tokens CSRF em todos os formulários
- **HTTP Methods**: Uso correto de PUT/POST para operações

## 📊 Modelos de Dados

### Usuario
- id
- nome
- email (único)
- password
- timestamps

### Categoria
- id
- nome
- tipo (entrada/saída)
- timestamps

### Transacao
- id
- nome
- descricao
- valor
- categoria_id (FK)
- usuario_id (FK)
- timestamps

### Dashboard
- Agregação visual de transações

## 🔄 Fluxo de Autenticação

1. Usuário acessa `/login`
2. Submete credenciais via POST
3. `Auth::attempt()` valida credenciais
4. Sessão regenerada
5. Redirecionado para `/dashboard` com middleware protetor
6. Middleware `Autenticador` verifica `Auth::check()`
7. Acesso a recursos protegidos

## 🎓 Tecnologias Utilizadas

- **Framework**: Laravel 12
- **Linguagem**: PHP 8.2+
- **Banco de Dados**: MySQL
- **Autenticação**: Session-based (Laravel Auth)
- **Views**: Blade Template Engine
- **CSS**: Custom stylesheets

## 📝 Rotas Disponíveis

| Method | Route | Controller | Middleware |
|--------|-------|-----------|----------|
| GET | `/dashboard` | DashboardController@index | Autenticador |
| GET | `/login` | UsuariosController@index | - |
| POST | `/login` | UsuariosController@store | - |
| GET | `/logout` | UsuariosController@logout | - |
| GET/POST | `/register` | UsuariosController@create/registerStore | - |
| GET/POST/PUT | `/transacoes` | TransacoesController@* | - |
| GET/POST/PUT | `/categorias` | CategoriasController@* | - |

## 🐛 Troubleshooting

### Erro: "Route not found"
- Verifique se todas as rotas estão definidas em `routes/web.php`
- Limpe o cache: `php artisan route:clear`

### Erro: "SQLSTATE[HY000]"
- Verifique credenciais do banco em `.env`
- Certifique-se que MySQL está rodando
- Execute migrações: `php artisan migrate`

### Login não funciona
- Realize cadastro antes (dados iniciais não inclusos)
- Verifique se `config/auth.php` aponta para modelo `Usuario`
- Verifique coluna 'password' na tabela usuarios

## 👨‍💻 Autor

**Lucas Pereira Rocha**

## 📄 Licença

Este projeto está licenciado sob MIT License.

---

**Desenvolvido como desafio educacional em Laravel**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

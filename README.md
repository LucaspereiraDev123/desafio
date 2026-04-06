# Controle Financeiro - Desafio Laravel

Uma aplicação web desenvolvida em **Laravel 12** para gerenciamento de transações e controle financeiro pessoal.

## 🎯 Funcionalidades

- **Autenticação de Usuários**: Sistema de login e registro com hash de senha seguro (Bcrypt)
- **Dashboard Avançada**: 
  - Visualização de transações em tabela organizada
  - Filtros por Período, Entrada (Receitas/Despesas), Categoria e Busca por descrição
  - Exibição de saldos: Total, Receitas e Despesas atualizados em tempo real
- **Gerenciamento de Transações**: CRUD completo (Criar, Ler, Atualizar, Deletar)
  - Campos: Tipo (Receitas/Despesas), Descrição, Valor e Categoria
  - Input numérico para valores com 2 casas decimais
  - Seleção via dropdown para tipo de transação
- **Categorização**: Organizar transações por categorias com tipo (Receitas/Despesas)
  - Tabela estruturada de categorias com opções de Mostrar/Editar/Deletar
- **Cálculos Dinâmicos**: 
  - Total de transações
  - Soma de Receitas (tipo = 'Receitas')
  - Soma de Despesas (tipo = 'Despesas')
  - Saldo automático (Receitas - Despesas)
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
2. **Visualização de Saldos**: 
   - TOTAL: Soma de todas as transações
   - RECEITAS: Soma de transações com tipo "Receitas"
   - DESPESAS: Soma de transações com tipo "Despesas"
3. **Aplicar Filtros**:
   - **Período**: Selecione mês/ano para filtrar por data
   - **Entrada**: Escolha "Receitas" ou "Despesas"
   - **Categoria**: Selecione uma categoria cadastrada
   - **Busca**: Digite parte da descrição da transação
   - Clique em "Filtrar" para aplicar todos os filtros
4. **Tabela de Transações**: Visualize todos os dados incluindo Tipo, Valor, Descrição, Categoria, Usuário e Data
5. **Ações**: Use "Exibir" ou "Editar" para manipular transações

### Gerenciar Transações
- **Nova Transação**: Clique em "+Nova Transação" para adicionar
  - Selecione **Tipo**: Receitas ou Despesas
  - Insira **Descrição**: Detalhes da transação
  - Digite **Valor**: Números com até 2 casas decimais (ex: 50.00)
  - Escolha **Categoria**: Selecione nas opções disponíveis
  - Selecione **Usuário**: Quem fez a transação
- **Editar**: Clique em "Editar" na linha da transação para modificar qualquer campo
- **Visualizar**: Clique em "Exibir" para ver detalhes completos
- **Deletar**: Use o botão Excluir no formulário de edição

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
- tipo (Receitas/Despesas)
- nome
- descricao
- valor (decimal 10,2)
- data
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

| Method | Route | Controller | Middleware | Descrição |
|--------|-------|-----------|----------|-----------|
| GET | `/dashboard` | DashboardController@index | Autenticador | Dashboard com filtros |
| GET | `/login` | UsuariosController@index | - | Tela de login |
| POST | `/login` | UsuariosController@store | - | Processar login |
| GET | `/logout` | UsuariosController@logout | - | Realizar logout |
| GET | `/register` | UsuariosController@create | - | Tela de registro |
| POST | `/register` | UsuariosController@registerStore | - | Criar novo usuário |
| GET/POST/PUT/DELETE | `/transacoes` | TransacoesController@* | Autenticador | CRUD Transações |
| GET/POST/PUT/DELETE | `/categorias` | CategoriasController@* | Autenticador | CRUD Categorias |

## � Atualizações Recentes (April 2026)

### Dashboard
- ✅ Adicionado sistema de filtros avançado (Período, Entrada, Categoria, Busca)
- ✅ Implementado cálculo dinâmico de Total, Receitas e Despesas
- ✅ Reorganização visual da tabela de transações
- ✅ Valores monetários formatados corretamente em português (R$ x.xxx,xx)

### Transações
- ✅ Adicionado campo `tipo` (Receitas/Despesas) com dropdown no formulário
- ✅ Campo valor agora é input numérico com suporte a decimais
- ✅ Melhorada validação de campos obrigatórios
- ✅ Cálculos atualizados ao criar/editar/deletar transações

### Categorias
- ✅ Tabela de categorias reorganizada com estrutura semântica
- ✅ Melhorado estilo visual com hover e cores destacadas
- ✅ Links de ação (Mostrar/Editar) no mesmo estilo

## �🐛 Troubleshooting

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

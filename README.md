# Projeto ERP – Módulo de Planejamento

## Descrição do Projeto
Este projeto é um sistema ERP desenvolvido para uma pequena empresa do setor de manutenção de plataformas, com foco em gerenciar e otimizar processos essenciais, como planejamento, delineamento, detalhamento e listas de materiais. O módulo de planejamento foi projetado para centralizar informações, automatizar tarefas e oferecer uma interface intuitiva para os usuários.

## Tecnologias Utilizadas
- **Framework Backend**: Laravel
- **Linguagem de Programação**: PHP
- **Banco de Dados**: SQLite
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Arquitetura de Desenvolvimento**: MVC (Model-View-Controller)
- **ORM**: Eloquent (Laravel)

## Funcionalidades Principais
- **Cadastro de Projetos**: Criação, edição e exclusão de projetos, incluindo a atribuição de responsáveis, definição de prazos e status.
- **Delineamento**: Registro de delineamentos com informações detalhadas e anexos para aprovação.
- **Detalhamento**: Cadastro de detalhamentos técnicos, com controle de status e anexos de documentação.
- **Termo de Encerramento de Obra**: Criação e gerenciamento de TEO's associadas a projetos.

## Estrutura do Projeto
O projeto segue a arquitetura MVC:
- **Model**: Representa a lógica de negócios e a interação com o banco de dados.
- **View**: Interface de usuário construída com HTML, CSS e Bootstrap.
- **Controller**: Responsável por processar as requisições, gerenciar a lógica e retornar as respostas apropriadas.

## Instalação e Configuração
### Pré-requisitos
- **PHP 8.3** 
- **Composer**
- **SQLite**

### Passos de Instalação
1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seuusuario/erp-planejamento.git
   cd erp-planejamento
   ```

2. **Instale as dependências:**
   ```bash
   composer install
   ```

3. **Configure o arquivo `.env`:**
   Copie o arquivo `.env.example` para `.env` e ajuste as configurações de banco de dados:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Crie a base de dados SQLite:**
   ```bash
   touch database/database.sqlite
   ```

5. **Execute as migrations:**
   ```bash
   php artisan migrate
   ```

6. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve
   ```

## Uso
Após a instalação, acesse `http://localhost:8000` para utilizar o sistema. O sistema inclui funcionalidades de cadastro, listagem, edição e aprovação de projetos, delineamentos e detalhamentos.

## Estrutura de Pastas
- **app/Models**: Contém os modelos Eloquent.
- **app/Http/Controllers**: Contém os controllers.
- **resources/views**: Contém as views em Blade.
- **database/migrations**: Contém as migrations do banco de dados.

## Futuras Implementações
- **Módulos adjacentes**
- **Segurança**: Controle de permissões e acesso por perfis de usuário.
- **Relatórios e Dashboards**: Integração para geração de relatórios.
- **Integração com APIs Externas**: Expansão para outros módulos.
- **Notificações Automáticas**: Sistema de alertas de prazos.

## Contribuições
Contribuições são bem-vindas! Siga as etapas abaixo:
1. Faça um fork do projeto.
2. Crie uma branch com a nova feature:
   ```bash
   git checkout -b feature/nova-feature
   ```
3. Faça commit das alterações:
   ```bash
   git commit -m "Adiciona nova feature"
   ```
4. Envie as alterações:
   ```bash
   git push origin feature/nova-feature
   ```
5. Abra um Pull Request.

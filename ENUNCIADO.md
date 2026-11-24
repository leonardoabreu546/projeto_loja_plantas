# Projeto final --- Aplicações Centradas em Redes

**Escola Superior de Tecnologias e Gestão --- Universidade da Madeira**\
**Ano letivo:** 2026/2027

-   **Curso:** CTeSP em Tecnologias e Programação de Sistemas de
    Informação
-   **Ano/Semestre:** 2.º Ano / 1.º Semestre
-   **Unidade Curricular:** Aplicações Centradas em Redes
-   **Docentes:** Hugo Perdigão / Filipe Ornelas
-   **Data de entrega indicada no cabeçalho:** 4/11/2026
-   **Época:** Normal
-   **Versão do projeto:** 1.0

## 1. Tecnologias a usar

Criar e fazer deploy de uma aplicação web usando o modelo **MVC**, tendo
como base a framework **Laravel**, utilizando uma base de dados
**MySQL** para armazenamento de dados.

## 2. Tema

O projeto é individual e o tema é livre, desde que cumpra os seguintes
requisitos:

-   Não devem existir temas repetidos na mesma turma e o tema **loja de
    informática** está excluído.
-   Devem existir pelo menos **dois Modelos relacionados** (ex.:
    Produtos e Categorias):
    -   Os dois Modelos devem ser listados pelo menos numa página.
    -   Um elemento de cada Modelo deve ser detalhado pelo menos numa
        página.
    -   Os dois Modelos devem permitir uma gestão CRUD (através de
        formulários).
-   Devem existir Views para a área pública e para a área reservada:
    -   **Área pública:** acessível a qualquer utilizador.
    -   **Área reservada:** acessível apenas a utilizadores
        autenticados/administrador, para gestão de objetos (criação,
        edição e eliminação).
    -   **Administração:** devem existir páginas apenas acessíveis a
        administradores (ex.: criação de produtos) ou partes de páginas
        (ex.: botões/ligações).
-   **View de Layout:** utilizar um layout para manter a aparência entre
    páginas.
-   **Controllers:** pelo menos um Controller para cada Modelo.
-   **Pesquisa:** deve existir alguma forma de pesquisa (ex.: filtro por
    categoria).
-   **Destaques aleatórios:** ao entrar na página principal.

**Exemplos de temas:** vendas de usados, imobiliária, portal de jogos,
portal de streaming (filmes/séries), portal escolar e portal de
notícias.

**Tema escolhido:** loja de plantas

## 3. Estrutura de dados

-   Devem existir dois Modelos e tabelas correspondentes (além de
    Users).
-   Pelo menos um Modelo deve ter vários campos descritivos.
-   Pelo menos um Modelo deve ter um campo de imagem (URL).
-   Os dois Modelos devem estar relacionados.

### 3.1. Relações

-   Tem de existir pelo menos uma relação de **um para muitos** (ex.:
    uma Categoria tem muitos Produtos).
-   A relação deve estar definida:
    -   Na base de dados (migration).
    -   Nos objetos Model (`belongsTo` / `hasMany`).

## 4. Requisitos funcionais

### 4.1. Parte interna (acesso com login)

1.  **Gestão de dados (CRUD)** das classes escolhidas:
    -   Criar objetos (*Create*).
    -   Visualizar objeto(s) (*Read*) --- pode ser feito na área
        pública.
    -   Editar objeto (*Update*).
    -   Eliminar objeto (*Delete*).
2.  **Validação de campos:**
    -   Pelo menos um campo obrigatório e com número mínimo de
        caracteres.
    -   Validação de tamanho e tipo no campo de imagens.
    -   Outros tipos de validação, se forem úteis.
    -   Apresentar mensagens de erro personalizadas.
    -   Apresentar a relação de um para muitos, onde se justificar (ex.:
        ao mostrar os detalhes de um Autor, mostrar uma lista com os
        seus Artigos).
3.  **Sistema de autenticação**, através do módulo Laravel Breeze:
    -   Registo de utilizadores.
    -   Login de utilizadores.
    -   Partes da(s) página(s) exclusivas para diferentes tipos de
        utilizador (`guest` / `auth` / `admin`).
4.  **Definir permissões**, por exemplo:
    -   Todos os utilizadores podem ver os produtos.
    -   O utilizador tem de fazer login para comprar produtos e ver as
        suas compras.
    -   Um administrador pode criar produtos e categorias, mas não pode
        comprar.

### 4.2. Parte pública (sem login)

5.  **Página(s) de lista(s)** da(s) classe(s) principal(is), que cumpram
    o seguinte:
    -   Apresentar os principais dados de cada objeto listado.
    -   Permitir aceder aos detalhes de um objeto (apenas dados
        públicos).
6.  **Páginas de detalhes públicas** das duas classes principais:
    -   Mostrar a imagem em dimensões maiores.
    -   Caso exista, mostrar a lista das entradas da classe que tem
        relação.
7.  **Pesquisa e ordenação** (pelo menos numa classe):
    -   Pesquisar registos de uma classe por um campo (ex.: produtos por
        categoria).
    -   Ordenar os registos por ordem ascendente/descendente, através de
        botões.
8.  **Página de contacto** com informações de contacto.

### 4.3. Layout

9.  Utilizar um layout comum a todas as páginas. Em alternativa, poderão
    existir dois layouts: um para a área pública e outro para a área
    reservada.

10. O botão de login na área pública deve ser substituído pelo nome de
    utilizador na área reservada e/ou por um botão de logout.

## 5. Regras de negócio

-   Diferenciar as áreas `guest` / `auth` / `admin`.
-   Existir uma entrada que seja um **destaque aleatório**, apresentado
    sempre nas páginas públicas (lista e detalhes).
-   A cada atualização (*refresh*) das páginas deve aparecer uma entrada
    de destaque aleatória.

## 6. Requisitos não funcionais

-   **Nomes adequados ao tema:** os nomes dos Models, Controllers,
    Views, variáveis, funções, etc. devem ser descritivos e relacionados
    com o tema em questão.
-   **Usabilidade:**
    -   A aplicação deve ser fácil de utilizar.
    -   Deve ter boa apresentação e organização na interface do
        utilizador, principalmente na parte pública.

## 7. Deploy

-   Utilizar o **GitHub** para o projeto (facilita o deploy no Render).
-   Usar o **Aiven.io** para a base de dados (podem configurar o `.env`
    e executar `migrate` diretamente).
-   Usar o **Cloudinary** para uploads (ex.: imagens de produtos).
-   Usar o **Render** para o projeto em si (PHP --- através de Docker).

## 8. Mais-valias

-   Paginação nas listas.
-   Formulário de envio de email na página de contactos.
-   Ordenação --- permitir ordenar a(s) lista(s).
-   Adequação a aplicações móveis (*responsive*).

## 9. Mini relatório

Para o relatório, utilizar o modelo de capa: **Modelo da capa dos
trabalhos académicos CTeSP**.

### 9.1. Conteúdo

1.  Identificação do tema, disciplina e aluno.
2.  Apresentação do projeto (tema, modelos e relações) e respetivas
    regras de negócio.
3.  Indicações gerais das opções tomadas, decisões próprias e respetivas
    justificações.
4.  Log de atividade.

### 9.2. Decisões próprias

Indicar e justificar decisões de estrutura/organização, listagens, dados
a mostrar, entre outras, tomadas por iniciativa própria.

### 9.3. Log de atividade

Resumo do trabalho efetuado por data, indicando o que foi feito nesse
dia.

## 10. Contactos

Em caso de dúvidas, contactar o professor da turma através do Teams ou
do email da universidade.

## 11. Entrega

### 11.1. Datas previstas

-   **Entrega:** 4/12/2026.
-   **Apresentação/defesa:** 5/12/2026.

### 11.2. Defesa

-   2 a 4 perguntas.
-   Nota mínima: 9,5.

### 11.3. Conteúdo do email de entrega

O email deve conter:

-   Link do Render para visualização do projeto online.
-   Dados de acesso dos utilizadores de teste (email e password).
-   Link do GitHub com o código do projeto.
-   Relatório em PDF em anexo.

### 11.4. Endereços de entrega

-   **Turma A --- Hugo Perdigão:** hugo.perdigao@staff.uma.pt
-   **Turma B --- Filipe Ornelas:** filipe.ornelas@staff.uma.pt

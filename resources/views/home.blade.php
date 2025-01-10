<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- Vite -->
  @vite([
  'resources/sass/app.scss',
  'resources/js/app.js',
  'resources/css/style.css', // A referência ao novo caminho
  'resources/css/style_products.css', // A referência ao novo caminho
  'resources/js/custom.js'
  ])
</head>

<body>
  <div class="container py-5">
    <header class="text-center mb-5">
      <h1>Bem-vindo à Aplicação de Estoque</h1>
      <p class="lead">Gerencie seus produtos, estoques e usuários de forma fácil e eficiente.</p>
    </header>

    <!-- Verificação de autenticação -->
    @if (Auth::check())
    <!-- Usuário logado -->
    <div class="text-center">
      <p>Olá, {{ Auth::user()->name }}!</p>
      <a href="{{ route('stock.index') }}" class="btn btn-primary">Acessar Estoque</a>

      <!-- Botão de logout -->
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Sair</button>
      </form>
    </div>
    @else
    <!-- Usuário não logado -->
    <div class="text-center">
      <p>Você ainda não está logado.</p>
      <a href="{{ route('login') }}" class="btn btn-primary">Fazer Login</a>
      <a href="{{ route('register') }}" class="btn btn-success">Cadastrar-se</a>
    </div>
    @endif
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
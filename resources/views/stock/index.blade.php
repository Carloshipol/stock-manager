@if (session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

@if (session('error'))
<p style="color: red;">{{ session('error') }}</p>
@endif


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque</title>
  <link rel="stylesheet" href="{{ asset('css/style_products.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS (inclui Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

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
  @if (Auth::check())
  <div id="container-botoes_sair" class="col-md-12">
    @csrf
    <button type="button" style="float: right" class="btn button3 col-md-12"
      onclick="window.location.href='{{ route('home') }}'">
      Sair
    </button>
  </div>
  @endif

  <div id="container-botoes">
    <button type="button" class="btn btn-success" onclick="window.location.href='{{ route('products.create') }}'">
      Adicionar Produto
    </button>
  </div>
  <br>
  <div class="col-md-12 contorno_selecionado">
    <div class="form-group col-md-12 contorno" style="background-color:#eaedee">
      <h1 class="titulo-formulario">Estoque de Produtos</h1>
      <table class="display table table-striped table-bordered table-hover ">
        <thead>
          <tr>
            <th>Ação</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Validade</th>
            <th>Preço</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $produto)
          <tr>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateStockModal"
                data-id="{{ $produto->id }}" data-name="{{ $produto->name }}" data-quantity="{{ $produto->amount }}">
                Atualizar Estoque
              </button>

            </td>
            <td>{{ $produto->name }}</td>
            <td>{{ $produto->category }}</td>
            <td>{{ $produto->amount }}</td>
            <td>{{ \Carbon\Carbon::parse($produto->validity)->format('d/m/Y') }}</td>
            <td>R$ {{ number_format($produto->price, 2, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
@include('components.modals')
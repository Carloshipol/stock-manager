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



</head>

<body>
  @if (Auth::check())
  <div class="float-right">
    <form action="{{ route('logout') }}" method="POST" style="display: inline;" id="button_logout">
      @csrf
      <button type="submit"
        class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-red-500 focus:outline-none focus:ring-0 border-none transition-colors duration-300">
        Sair
      </button>
    </form>
  </div>
  @endif


  <div class="container mt-5">
    <h1 class="text-center mb-4">Estoque de Produtos</h1>
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
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
</body>

</html>
@include('components.modals')
<script src="{{ asset('js/custom.js') }}"></script>
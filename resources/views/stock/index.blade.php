<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="container">
    <h1>Estoque de Produtos</h1>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Quantidade</th>
          <th>Validade</th>
          <th>Preço</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $produto)
        <tr>
          <td>{{ $products->name }}</td>
          <td>{{ $products->amount }}</td>
          <td>{{ \Carbon\Carbon::parse($products->validity)->format('d/m/Y') }}</td>
          <td>R$ {{ number_format($products->price, 2, ',', '.') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
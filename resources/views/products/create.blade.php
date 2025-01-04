<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produtos</title>
  <link rel="stylesheet" href="{{ asset('css/style_products.css') }}">


</head>

<body>
  <h1>Cadastro de Produtos</h1>

  @if (session('success'))
  <p style="color: green;">{{ session('success') }}</p>
  @endif
  <div class="contorno">
    <form action="{{ route('products.store') }}" method="POST">
      @csrf

      <div>
        <label for="name" class="col-md-2">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="category">Categoria:</label>
        <input type="text" name="category" id="category" value="{{ old('category') }}">
        @error('category')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="amount">Quantidade:</label>
        <input type="number" name="amount" id="amount" value="{{ old('amount') }}">
        @error('amount')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="validity">Validade:</label>
        <input type="date" name="validity" id="validity" value="{{ old('validity') }}">
        @error('validity')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="price">Preço:</label>
        <input type="text" name="price" id="price" value="{{ old('price') }}">
        @error('price')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit">Cadastrar Produto</button>
  </div>
  </form>
</body>

</html>
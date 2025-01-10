<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produtos</title>


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
  <h1>Cadastro de Produtos</h1>

  @if (session('success'))
  <p style="color: green;">{{ session('success') }}</p>
  @endif
  <div class="contorno_novo" style="background-color: #eaedee;">
    <form action="{{ route('products.store') }}" method="POST">
      @csrf

      <div class="form-row col-md-12">
        <div class=" form-control col-md-12" <label for="name" class="col-md-2">Nome:</label>
          <input type="text" name="name" id="name" value="{{ old('name') }}">
          @error('name')
          <p style="color: red;">{{ $message }}</p>
          @enderror
        </div>

        <div class=" form-control col-md-12">
          <label for="category">Categoria:</label>
          <input type="text" name="category" id="category" value="{{ old('category') }}">
          @error('category')
          <p style="color: red;">{{ $message }}</p>
          @enderror
        </div>

        <div class=" form-control col-md-12">
          <label for="amount">Quantidade:</label>
          <input type="number" name="amount" id="amount" value="{{ old('amount') }}">
          @error('amount')
          <p style="color: red;">{{ $message }}</p>
          @enderror
        </div>

        <div class=" form-control col-md-12">
          <label for="validity">Validade:</label>
          <input type="date" name="validity" id="validity" value="{{ old('validity') }}">
          @error('validity')
          <p style="color: red;">{{ $message }}</p>
          @enderror
        </div>

        <div class=" form-control col-md-12">
          <label for="price">Preço:</label>
          <input type="text" name="price" id="price" value="{{ old('price') }}">
          @error('price')
          <p style="color: red;">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </form>
</body>

</html>
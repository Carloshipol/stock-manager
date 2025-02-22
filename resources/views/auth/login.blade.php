<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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

  <div class="container col-md-12" style="text-align: center; background-color: #eaedee">
    <h1>Login</h1>
    <form action="{{ url('/login') }}" method="POST">
      @csrf
      <div class="form-row col-md-12">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        </divcla>
        <br>
        <br>
        <div>
          <label for="password">Senha:</label>
          <input type="password" id="password" name="password" required>
          @error('password')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-success">Entrar</button>
    </form>
  </div>
</body>

</html>
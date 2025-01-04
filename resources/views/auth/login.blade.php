<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="container">
    <h1>Login</h1>
    <form action="{{ url('/login') }}" method="POST">
      @csrf
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>

</html>
<!-- resources/views/users/create.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 50px;
  }

  form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  div {
    margin-bottom: 15px;
  }

  input {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
  }

  button:hover {
    background-color: #45a049;
  }

  p {
    color: red;
    font-size: 14px;
  }
  </style>
</head>

<body>
  <h1>Cadastro de Usuário</h1>

  <!-- Exibição de mensagens de erro ou sucesso -->
  @if(session('success'))
  <p style="color: green">{{ session('success') }}</p>
  @endif

  <form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Digite seu nome" required>
      @error('name')
      <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail" required>
      @error('email')
      <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
      @error('password')
      <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="password_confirmation">Confirmar Senha:</label>
      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha"
        required>
    </div>

    <button type="submit">Cadastrar</button>
  </form>
</body>

</html>
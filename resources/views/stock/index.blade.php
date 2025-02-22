@if (session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

@if (session('error'))
<p style="color: red;">{{ session('error') }}</p>
@endif

@include('components.head')
@include('components.script')
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque</title>
  <!-- Vite -->
  @vite([
  'resources/sass/app.scss',
  'resources/js/app.js',
  'resources/css/style.css',
  'resources/css/style_products.css',
  'resources/js/custom.js'
  ])
</head>

<body>
  @if (Auth::check())
  <div id="container-botoes_sair" class="col-md-12">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn button3 col-md-12" style="float: right">
        Sair
      </button>
    </form>
  </div>
  @endif

  <div id="container-botoes" class="button-container">
    <button type="button" class="button button1" data-bs-toggle="modal" data-bs-target="#insertProductModal">
      Cadastrar Novo Produto
    </button>
  </div>
  <br>

  <div class="col-md-12">
    <h1 class="titulo-formulario contorno_novo" style="background-color:darkslateblue">Estoque de Produtos</h1>
    <div class="form-group col-md-12 contorno_novo" style="background-color:#eaedee">
      <div class="table-responsive">
        <table id="table" class="display table table-striped table-bordered table-hover">
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal"
                  data-id="{{ $produto->id }}" data-name="{{ $produto->name }}" data-quantity="{{ $produto->amount }}">
                  <i class="fas fa-edit fa-2x"></i>Editar Produto
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
          <tfoot>
            <tr class="print">
              <th><select>
                  <option value=""></option>
                </select></th>
              <th><select>
                  <option value=""></option>
                </select></th>
              <th><select>
                  <option value=""></option>
                </select></th>
              <th><select>
                  <option value=""></option>
                </select></th>
              <th><select>
                  <option value=""></option>
                </select></th>
              <th><select>
                  <option value=""></option>
                </select></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

  @include('components.modals')

</body>

</html>
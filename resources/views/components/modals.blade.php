<!-- resources/views/components/modals.blade.php -->

<!-- Modal de Atualização de Estoque -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('stock.update') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="updateStockModalLabel">Atualizar Estoque</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background-color:#eaedee">
          <input type="hidden" name="product_id" id="product-id">
          <p id="product-name"></p>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
          </div>
          <div class="mb-3">
            <label for="action" class="form-label">Ação</label>
            <select class="form-select" id="action" name="action" required>
              <option value="increase">Aumentar</option>
              <option value="decrease">Diminuir</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Inserir produto INICIO -->
<div class="modal fade" id="insertProductModal" tabindex="-1" role="dialog" aria-labelledby="insertProductModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="insertProductModalLabel" style="color: black">Adicionar Produto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: #eaedee">
        <form method="POST" id="form-insert-service" action="{{ route('stock.insert') }}">
          @csrf
          <div class="form-group col-md-6" style="margin-bottom: 3px;">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group col-md-6" style="margin-bottom: 3px;">
            <label for="category">Categoria:</label>
            <input type="text" name="category" id="category" class="form-control">
          </div>
          <div class="form-group" style="margin-bottom: 3px;">
            <label for="amount">Quantidade:</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4" style="margin-bottom: 3px;">
              <label for="validity">Validade:</label>
              <input type="date" name="validity" id="validity" class="form-control" required>
            </div>
            <div class="form-group col-md-6" style="margin-bottom: 3px;">
              <label for="price">Preço:</label>
              <input type="number" name="price" id="price" class="form-control">
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            
        </form>
      </div>
    </div>
       
  </div>
</div>
<!-- Modal Inserir produto FINAL -->

<!-- Modal Editar produto INICIO -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="editProductModalLabel" style="color: black">Editar Produto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: #eaedee">
        <form method="POST" id="form-editar-produto" action="{{ route('stock.update') }}">
          @csrf
          <input type="hidden" name="edit_id" id="edit_id" value="">

          <div class="form-group col-md-6" style="margin-bottom: 3px;">
            <label for="edit_name">Nome:</label>
            <input type="text" name="name" id="edit_name" class="form-control">
          </div>

          <div class="form-group col-md-6" style="margin-bottom: 3px;">
            <label for="edit_category">Categoria:</label>
            <input type="text" name="category" id="edit_category">
          </div>

          <div class="form-group" style="margin-bottom: 3px;">
            <label for="edit_amount">Quantidade:</label>
            <input type="number" name="amount" id="edit_amount" class="form-control" required>
          </div>

          <div class="form-group col-md-6" style="margin-bottom: 3px;">
            <label for="edit_validity">Validade:</label>
            <input type="date" name="validity" id="edit_validity" class="form-control" required>
          </div>
      </div>


      <div class="form-group col-md-6" style="margin-bottom: 3px;">
        <label for="edit_price">Preço:</label>
        <input type="date" name="price" id="edit_price" class="form-control">
      </div>

      <br>
      <button type="submit" class="btn btn-primary">Salvar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </form>
    </div>
  </div>
     
</div>
</div>
<!-- Modal Editar Produto FINAL -->


<!-- Script para mostrar alert -->
@if (session('success'))
<script>
alert("{{ session('success') }}");
</script>
@endif

@if (session('error'))
<script>
alert("{{ session('error') }}");
</script>
@endif
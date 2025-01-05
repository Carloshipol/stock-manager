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
        <div class="modal-body">
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
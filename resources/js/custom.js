document.addEventListener('DOMContentLoaded', function () {
  const updateStockModal = document.getElementById('updateStockModal');
  updateStockModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;

      const productId = button.getAttribute('data-id');
      const productAmount = button.getAttribute('data-quantity');

      document.getElementById('product-id').value = productId;
      document.getElementById('quantity').value = productAmount;
  });
}); 

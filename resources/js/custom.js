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

function editProductForm(id) {
  $.ajax({
      url: 'stock.update',  
      type: 'POST',  
      data: { id: id },  
      dataType: 'json', 
      success: function(response){
  console.log(response);
          if (response.success) {
              // Preenche os campos do formulário com os dados retornados
              $('#edit_id').val(response.data.id_relacao_servicos_site);
              $('#edit_name').val(response.data.name);
              $('#edit_category').val(response.data.category);
              $('#edit_amount').val(response.data.amount);
              $('#edit_validity').val(response.data.validity);
              $('#edit_price').val(response.data.price);
              $('#editProductModal').modal('show');
          } else {
              alert('Erro ao obter dados do serviço: ' + response.message);
          }
      },
      error: function(xhr, status, error) {
          console.error(xhr.responseText);
          alert('Erro ao obter dados do serviço.');
      }
    });
}

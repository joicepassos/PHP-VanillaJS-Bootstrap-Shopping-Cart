<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Carrinho de Compras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-H7b1w86BXLV7Q2xj+uH7mkQhAbVDNOr7g1p+TX1y7lmHwYrRUrJrUKpny/dlJHvZ+oG4U4D9U5L6U5HJw5Y+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <div class="container my-5">
    <h1 class="text-center mb-5">Produtos disponíveis:</h1>
    <div class="row">
      <?php foreach($products as $product) { ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $product['name']; ?></h5>
              <p class="card-text">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
              <button class="btn btn-primary add-to-cart" data-id="<?php echo $product['id']; ?>" data-name="<?php echo $product['name']; ?>">Adicionar ao carrinho</button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-Sdjvj4K3q0+4G7SB45FadYcv9fVQ2KjJgikOwLJHpiZ7EIXMgiruK7VUDZhYtXJZBb/etP51d/gw+18C1KjN1Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/js/app.js"></script>
</body>
</html>

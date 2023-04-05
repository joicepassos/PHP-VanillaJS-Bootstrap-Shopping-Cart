<?php
  // Helper to return products list
  function getProducts() {
    $products = [
      [
        'id' => 1,
        'name' => 'Produto 1',
        'image' => 'img/produto1.jpg',
        'price' => 10.00
      ],
      [
        'id' => 2,
        'name' => 'Produto 2',
        'image' => 'img/produto2.jpg',
        'price' => 15.00
      ],
      [
        'id' => 3,
        'name' => 'Produto 3',
        'image' => 'img/produto3.jpg',
        'price' => 20.00
      ]
    ];

    return $products;
  }

  $products = getProducts();
?>

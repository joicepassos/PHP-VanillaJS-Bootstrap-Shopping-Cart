<?php

/**
 * Class Cart
 *
 * Represents a shopping cart that can be used to add, remove and display items.
 */
class Cart
{
    private $items = []; // an array to hold the items in the cart

    /**
     * Adds an item to the cart.
     *
     * @param int $id The ID of the item to add.
     * @param string $name The name of the item to add.
     * @param float $price The price of the item to add.
     * @param int $quantity The quantity of the item to add (default 1).
     */
    public function addItem(int $id, string $name, float $price, int $quantity = 1): void
    {
        // If the item is already in the cart, update the quantity
        if (array_key_exists($id, $this->items)) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            // Add the item to the cart
            $this->items[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity
            ];
        }
    }

    /**
     * Removes an item from the cart.
     *
     * @param int $id The ID of the item to remove.
     */
    public function removeItem(int $id): void
    {
        unset($this->items[$id]);
    }

    /**
     * Gets the total price of all items in the cart.
     *
     * @return float The total price of all items in the cart.
     */
    public function getTotalPrice(): float
    {
        $totalPrice = 0.0;

        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

    /**
     * Gets the number of items in the cart.
     *
     * @return int The number of items in the cart.
     */
    public function getItemCount(): int
    {
        return count($this->items);
    }

    /**
     * Gets an array of items in the cart.
     *
     * @return array An array of items in the cart.
     */
    public function getItems(): array
    {
        return $this->items;
    }
}

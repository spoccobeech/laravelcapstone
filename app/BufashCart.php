<?php

namespace App;
// use App\BufashItems;

class BufashCart // extends Model implements Buyable
{
  public $items = null;
  public $totalQty = 0;
  public $totalPrice = 0;

  public function __construct($oldcart)
  {
      if($oldcart)
      {
          $this->items = $oldcart->items;
          $this->totalQty = $oldcart->totalQty;
          $this->totalPrice = $oldcart->totalPrice;
      }
  }

  public function add(/*$BufashItems*/$item, $id)
  {
    $storedItem = ['item_qty' => 0, 'item_price' => $item->item_price, 'item' => $item];
    if ($this->items) {
      if (array_key_exists($id, $this->items)) {
        $storedItem = $this->items[$id];
      }
    }
    $storedItem['item_qty']++;
    $storedItem['item_price'] = $item->item_price * $storedItem['item_qty'];
    $this->items[$id] = $storedItem;
    $this->totalQty++;
    $this->totalPrice += $item->item_price;
  }
}

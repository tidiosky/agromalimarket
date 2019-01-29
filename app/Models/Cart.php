<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21/05/2018
 * Time: 16:43
 */

namespace App\Models;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } 
    }

    public function add($item,$id)
    {
        $storedItem = ['quantity' => 0,'prix' => $item->prix,'item' => $item];
        if ($this->items){
            if (array_key_exists($id,$this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['prix'] = $item->prix * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->prix;
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['prix'] -= $this->items[$id]['item']['prix'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['prix'];
        if ($this->items[$id]['quantity'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['prix'];
        unset($this->items[$id]);
    }
}
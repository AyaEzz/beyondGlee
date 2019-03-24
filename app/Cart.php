<?php
/**
 * Created by PhpStorm.
 * User: islamseleem
 * Date: 19/06/18
 * Time: 09:37 ص
 */

namespace App;


class Cart
{

    public $items;
    public $totalqty=0;
    public $totalPrice=0;
    public $tcoupondiscount=0;
    public $couponused=null;

    public function __construct($oldCart){

        if ($oldCart <> null){

            $this->items = $oldCart->items;
            $this->totalqty = $oldCart->totalqty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->tcoupondiscount = $oldCart->tcoupondiscount;
            $this->couponused = $oldCart->couponused;
        }else{

            $this->items = null;
        }


    }

    public function add($prod_id , $prodD_id,$qty,$item){


        if ($item->sale == 1){
            $totalItemPrice = $qty * ($item->price - ($item->price*($item->discount/100))) ;
        }else{
            $totalItemPrice = $qty * $item->price;
        }


        $storedItem= ['sale_copoun'=>null,'pord_id'=>$prod_id, 'pordD_id'=>$prodD_id ,'price'=>$totalItemPrice ,'qty'=>0 ,'item'=> $item];
        if ($this->items){

            if (array_key_exists($prodD_id,$this->items)){

                $storedItem = $this->items[$prodD_id];


                $perQty = $storedItem['qty'];
                $perPrice = $storedItem['price'];

                $this->totalqty= $this->totalqty - $perQty;
                $this->totalqty= $this->totalqty + $qty;
                $this->totalPrice= $this->totalPrice - $perPrice;
                $this->totalPrice= $this->totalPrice + $totalItemPrice;

            }

            else{

                $this->totalqty= $this->totalqty + $qty ;
                $this->totalPrice= $this->totalPrice + $totalItemPrice ;

            }



        }
        else{

            $this->totalqty= $this->totalqty + $qty ;
            $this->totalPrice= $this->totalPrice + $totalItemPrice ;

        }

        $storedItem['qty']= $qty;
        $storedItem['price']=$totalItemPrice;


        $this->items[$prodD_id]=$storedItem;


    }

    public function increment($prodD_id){

        $storedItem = $this->items[$prodD_id];
        $oldPrice = $storedItem['price'];
        $storedItem['qty'] ++;
        $this->totalqty ++;
        if ($storedItem['item']->sale == 1){
            $storedItem['price'] = $storedItem['qty'] * ($storedItem['item']->price - ($storedItem['item']->price*($storedItem['item']->discount/100))) ;
        }else{
            $storedItem['price'] = $storedItem['item']->price * $storedItem['qty'];
        }


        $difPrice = $storedItem['price'] - $oldPrice;
        $this->totalPrice = $this->totalPrice + $difPrice;
        $this->items[$prodD_id]=$storedItem;


    }


    public function decrement($prodD_id){

        $storedItem = $this->items[$prodD_id];
        $oldPrice = $storedItem['price'];
        $storedItem['qty'] --;
        $this->totalqty --;
        if ($storedItem['item']->sale == 1){
            $storedItem['price'] = $storedItem['qty'] * ($storedItem['item']->price - ($storedItem['item']->price*($storedItem['item']->discount/100))) ;
        }else{
            $storedItem['price'] = $storedItem['item']->price * $storedItem['qty'];
        }

        $difPrice = $oldPrice -$storedItem['price'];
        $this->totalPrice = $this->totalPrice - $difPrice;
        $this->items[$prodD_id]=$storedItem;


    }

    public function remove($prodD_id){

        $storedItem = $this->items[$prodD_id];
        $itemPrice = $storedItem['price'];
        $itemQty = $storedItem['qty'];
        $this->totalqty -= $itemQty;
        $this->totalPrice -= $itemPrice;
        unset($this->items[$prodD_id]);

    }

    public function setCopoun($prodD_id,$amount,$code){

        //dd($code);
        $storedItem = $this->items[$prodD_id];
        $oldPrice = $storedItem['price'];
        $storedItem['price'] = $storedItem['price'] * ((100 - $amount) /100) ;
        $difPrice = $oldPrice-$storedItem['price'];
        $this->totalPrice = $this->totalPrice - $difPrice;
        $this->tcoupondiscount = $this->tcoupondiscount + $difPrice;
        $this->couponused=$code;
        $storedItem['sale_copoun'] = $code;
        $this->items[$prodD_id]=$storedItem;

    }



}
<?php
/**
 * Created by PhpStorm.
 * User: islamseleem
 * Date: 24/06/18
 * Time: 03:25 م
 */

namespace App;


class CartReview
{
    public $items;

    public function __construct($oldCart){

        if ($oldCart <> null){

            $this->items = $oldCart->items;

        }else{

            $this->items = [];
        }


    }

    public function add($prod_id ,$item){


        $storedItem= ['pord_id'=>$prod_id,$item];

        if ($this->items){

            if (array_key_exists($prod_id,$this->items)){

                $storedItem = $this->items[$prod_id];


            }



        }


        $this->items[$prod_id]=$storedItem;


    }


    public function remove($prod_id){

        unset($this->items[$prod_id]);

    }


}
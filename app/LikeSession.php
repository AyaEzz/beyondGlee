<?php
/**
 * Created by PhpStorm.
 * User: islamseleem
 * Date: 23/06/18
 * Time: 05:19 م
 */

namespace App;


class LikeSession
{


    public $items;

    public function __construct($oldCart){

        if ($oldCart <> null){

            $this->items = $oldCart->items;

        }else{

            $this->items = [];
        }


    }

    public function add($prod_id ){


        $storedItem= ['pord_id'=>$prod_id];
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
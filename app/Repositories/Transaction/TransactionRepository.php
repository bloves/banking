<?php

namespace App\Repositories\Transaction;

interface TransactionRepository
{
    // Declare the interface methods
    public function get($id=Null); // get product categoriees using id or none
    public function create($data); // creates new product categoriees 
    public function update($id, $data); // updates the product categoriees  using id
    public function delete($id); //deletes the product categoriees  using id

}
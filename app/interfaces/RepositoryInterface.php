<?php

namespace App\Http\interfaces;


interface RepositoryInterface
{
    public function index();
    public function create(array $data);
    public function update(array $data , $id);
    public function delete($id); 
}
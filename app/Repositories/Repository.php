<?php

namespace App\Repositories;

use App\Http\interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected $model ;

    public function __construct(Model $model)
    {
        $this->model = $model ;
    }

    public function index(){
        return $this->model->all();
    }
    public function create(array $data){
        return $this->model->create($data);

    }
    
    
    public function update(array $data , $id){
        $record = $this->model->find($id);
        return $record->update($data);

    }
    public function delete($id){
        
        $this->model->destroy($id);

    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
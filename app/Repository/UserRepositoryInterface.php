<?php
namespace App\Repository;

//use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    //List all users
    public function all();
    
    /**
    * @param array $attributes
    * @return Model
    */
    public function store($attributes);

    /**
    * @param $id
    * @return Model
    */
    public function show($id);

    /**
    * @param $id
    * @return Model
    */
    public function update($attributes, $id);

    /**
    * @param $id
    * @return Model
    */
    public function destroy($id);
}
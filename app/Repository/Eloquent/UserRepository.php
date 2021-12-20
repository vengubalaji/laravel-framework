<?php

namespace App\Repository\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Http\Resources\User as UserResource;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

    //List all users
    public function all() {
        return UserResource::collection($this->model->all());
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function store($attributes){
        $user = $this->model->create($attributes);
        return $response = new UserResource($this->model->findOrFail($user->id));
    }

    /**
     * @param $id
     * @return Model
     */
    public function show($id){
        $response = new UserResource($this->model->findOrFail($id));
        return $response; 
    }

    /**
     * @param $id
     * @return Model
     */
    public function update($attributes, $id){

        $user = $this->model->findOrFail($id);
        $validated = $attributes->validated();
        $validated['password']  = Hash::make($validated['password']);
        $validated['api_token'] = Str::random(80);

        $user->fill($validated); 
        $user->save();
        
        $response = new UserResource($this->model->findOrFail($user->id));
        return $response; 
    }

    /**
     * @param $id
     * @return Model
     */
    public function destroy($id){
        $user = $this->model->findOrFail($id);
        $user->delete();

        return response()->noContent();
    }
}
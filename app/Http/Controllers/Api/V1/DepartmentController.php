<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartment;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Http\Resources\Department as DepartmentResource;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page') ?? 15;
        return DepartmentResource::collection(
            Departments::where('status','=',1)->with('headofdepartment')->orderby('id','asc')->paginate($perPage)->appends(
                [
                    'per_page' => $perPage
                ]
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartment $request)
    {
        $validated = $request->validated();
        $department = Departments::make($validated);
        $department->save();

        return DepartmentResource::collection(Departments::where('status','=',1)->with('headofdepartment')->orderby('id','asc')->get());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DepartmentResource(Departments::with('headofdepartment')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartment $request, $id)
    {
        $department = Departments::findOrFail($id);
        $validated = $request->validated();
        $department->fill($validated);
        $department->save();
        return new DepartmentResource(Departments::with('headofdepartment')->findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Departments::findOrFail($id);
        $department->delete();
        
        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use Datatables;


class UsersController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('bms.AdministrationUsers');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest $request
     */
    public function store(UsersRequest $request)
    {
        if (!empty($request->id)){
            $this->update($request,$request->id);
        }else{
            User::create($request->all());
        }
    }


    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        //$user = User::all();
        $user = User::whereNotIn('level',['super'])->get();

        return Datatables::of($user)->addColumn('option', function ($user) {
            return '<button type="button" class="btn btn-info btn-circle" onclick="edit(' . $user['id'] . ')" ><i class="fa fa-pencil"></i> </button>
             <button type="button" class="btn btn-danger btn-circle" onclick="deleteUser(' . $user['id'] . ')"><i class="fa fa-times"></i> </button>';
        })->make(true);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     */
    public function edit($id)
    {
        return User::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest $request
     * @param  int $id
     */
    public function update($request, $id)
    {
        User::find($id)->fill($request->all())->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     *
     * @return array
     */
    public function index()
    {
        return [
            "data" => Character::all(),
            'status' => 200
        ];
    }

    /**
     * @param $name string
     * @param $image string
     * @param $birth integer
     * @param $occupation string
     * @param $status string
     * @param $type string
     * @param $origin integer
     * @return array
     */
    public function create(
        $name,
        $image,
        $birth,
        $occupation,
        $status,
        $type,
        $origin
    ) {
        try {
            $character = new Character();
            $character->name = ucwords($name);
            $character->image = $image;
            $character->birth = $birth;
            $character->occupation = $occupation;
            $character->status = $status;
            $character->type = $type;
            $character->origin = $origin;
            $character->save();

            return [
                'message'=> 'user created successfully',
                'status' => 200
            ];
        }
        catch (\Exception $e) {
            return[
                'message'=> $e,
                'status' => 404
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        try {
            return [
                'data' => Character::find($id),
                'status' => 200
            ];
        }
        catch (\Exception $e) {
            return[
                'data' => $e,
                'status' => 400
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param $id integer
     * @param $name string|null
     * @param $image string|null
     * @param $birth integer|null
     * @param $occupation string|null
     * @param $status string|null
     * @param $type string|null
     * @param $origin integer|null
     * @return array
     */
    public function update(
        $id,
        $name,
        $image,
        $birth,
        $occupation,
        $status,
        $type,
        $origin
    ) {
        try {
            $character = Character::find($id);
            $character->name = $name ? ucwords($name) : $character->name;
            $character->image = $image ? $image : $character->image;
            $character->birth = $birth ? $birth : $character->birth;
            $character->occupation = $occupation ? $occupation : $character->occupation;
            $character->status = $status ? $status : $character->status;
            $character->type = $type ? $type : $character->type;
            $character->origin = $origin ? $origin : $character->origin;
            $character->save();
            return ['data' => 'correct update', 'status' => 200];
        }
        catch (\Exception $e){
            return [
                'data' => $e,
                'status' => 404
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            "data" => Character::all(),
            'status' => 200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
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

            return response()->json([
                'message'=> 'user created successfully',
                'status' => 200
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message'=> $e,
                'status' => 404
            ]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            return response()->json([
                'data' => Character::find($id),
                'status' => 200
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'data' => $e,
                'status' => 400
            ]);
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
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
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

        $character = Character::find($id);
        $character->name = $name ? ucwords($name) : $character->name;
        $character->image = $image ? $image : $character->image;
        $character->birth = $birth ? $birth : $character->birth;
        $character->occupation = $occupation ? $occupation : $character->occupation;
        $character->status = $status ? $status : $character->status;
        $character->type = $type ? $type : $character->type;
        $character->origin = $origin ? $origin : $character->origin;
        $character->save();

        return response()->json(
            ['data' => $character->birth, 'status' => 200]
        );
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

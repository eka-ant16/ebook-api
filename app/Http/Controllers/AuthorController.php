<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::get();
        return response()->json([
            'status' => 200,
            'data' => $author
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->date_of_birth = $request->date_of_birth;
        $author->place_of_birth = $request->place_of_birth;
        $author->gender = $request->gender;
        $author->email = $request->email;
        $author->no_hp = $request->no_hp;
        $author->save();
        if($author->save()){
            return response()->json([
                'status' => 201,
                'message' => 'Data Berhasil Di Simpan!',
                'data' => $author
            ], 201);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'Data Belum Tersimpan!'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        if($author){
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil ditemukan!',
                'data' => $author
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . ' tidak ditemukan!'
            ], 404);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if($author){
            $author->name = $request->name ? $request->name : $author->name;
            $author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
            $author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
            $author->gender = $request->gender ? $request->gender : $author->gender;
            $author->email = $request->email ? $request->email : $author->email;
            $author->no_hp = $request->no_hp ? $request->no_hp : $author->no_hp;
            $author->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil diubah!',
                'data' => $author
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . ' tidak ditemukan!'
            ], 404);
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
        $author = Author::find($id);
        if($author){
            $author->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Data Id ' . $id . ' Berhasil dihapus!'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . ' tidak ditemukan!'
            ], 404);
        }
    }
}

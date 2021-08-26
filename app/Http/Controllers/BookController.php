<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::get();
        return response()->json([
            'status' => 200,
            'data' => $book
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
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->date_of_issue = $request->date_of_issue;
        $book->save();
        if($book->save()){
            return response()->json([
                'status' => 201,
                'message' => 'Data Berhasil Di Simpan!',
                'data' => $book
            ], 201);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'Data Gagal Tersimpan!'
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
        $book = Book::find($id);
        if($book){
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil ditemukan!',
                'data' => $book
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . 'Data tidak ditemukan!'
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
        $book = Book::find($id);
        if($book){
            $book->title = $request->title ? $request->title : $book->title;
            $book->description = $request->description ? $request->description : $book->description;
            $book->author = $request->author ? $request->author : $book->author;
            $book->publisher = $request->publisher ? $request->publisher : $book->publisher;
            $book->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
            $book->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil diubah!',
                'data' => $book
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . 'Data tidak ditemukan!'
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
        $book = Book::find($id);
        if($book){
            $book->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Data Id ' . $id . 'Data Berhasil dihapus!'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . 'Data tidak ditemukan!'
            ], 404);
        }
    }
}
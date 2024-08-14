<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $todos = todolist::all();
        return view('todo1', compact("todos"));
    }

    public function memo()
    {
        return view('memo2');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "content" => "required|max:255",
        ]);

        todolist::create($validatedData);

        return redirect()->route("input.index");
    }



    /*public function info_obtain()
    {
        $contents = todolist::get();    //これでtodolistsテーブルのidカラムが1の情報を取得=データベースから情報を取得
        return view("todo1",compact("$contents"));        //これでviewに$infoを受け渡す -> view側で$infoを表示させる記述が必要

    }*/
}

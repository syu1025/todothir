<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $sort = $request->query('sort', 'created_at');

        if ($sort === 'byDate') {
            $todos = todolist::orderBy('byDate', 'asc')->get();
        } else {
            $todos = todolist::orderBy('created_at', 'asc')->get();
        }

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
            'byDate' => 'required|date'
        ]);

        $request->user()->todos()->create($validatedData);

        return redirect()->route("input.index");
    }

    public function deleteChecked(Request $request)
    {
        $todoIds = $request->input("todos", []);

        if (!empty($todoIds)) {
            todolist::whereIn('id', $todoIds)->delete();
            return redirect()->route('input.index')->with('success', 'チェックしたアイテムを削除しました。');
        }

        return redirect()->route('input.index')->with('info', '削除するアイテムが選択されていません。');
    }



    /*public function info_obtain()
    {
        $contents = todolist::get();    //これでtodolistsテーブルのidカラムが1の情報を取得=データベースから情報を取得
        return view("todo1",compact("$contents"));        //これでviewに$infoを受け渡す -> view側で$infoを表示させる記述が必要

    }*/
}

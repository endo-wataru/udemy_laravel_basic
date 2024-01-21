<?php

namespace App\Http\Controllers; //ファイルの場所

use Illuminate\Http\Request;
use App\Models\Test; //Testファイルを読み込む
use Illuminate\Support\Facades\DB; //DBから始まる機能を使えるよ

class TestController extends Controller //コントローラクラスを継承
{
    public function index()
    {
        //エロクアントの記述
        $values = Test::all(); //テストの中身を全権取得し$valueに渡す

        $count = Test::count();

        $first = Test::findOrFail(1);

        $whereBBB = Test::where('text', '=', 'bbb')->get(); //get()で取得する情報を確定する

        //クエリビルダの記述
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get();

        dd($values, $count, $first, $whereBBB, $queryBuilder); //view画面で中身を確認できる

        return view('tests.test', compact('values')); //testsはフォルダ名、testはファイル名

    }
}

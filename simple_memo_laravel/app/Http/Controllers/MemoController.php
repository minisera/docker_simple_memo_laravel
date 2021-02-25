<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * 初期表示
     * @return \Illuminate\Contract\View\Factory\Illuminate\View
     */

    public function index()
    {
        $memos = Memo::where('user_id',Auth::id())->orderBy('updated_at','desc')->get();

        return view('memo',[
            'name' => $this->getLoginUserName(),
            'memos' => $memos
        ]);
    }

    /**
     * メモの追加
     * @return Illuminate\Http\RedirectResponse
     */
    public function add()
    {
        Memo::create([
            'user_id' => Auth::id(),
            'title' => '新規メモ',
            'time' => 1,
        ]);

        return redirect()->route('memo.index');
    }

    /**
     * ログインユーザー名取得
     * @return string
     */
    private function getLoginUserName() {
        $user = Auth::user();

        $name = '';
        if ($user) {
            if (7 < mb_strlen($user->name)) {
                $name = mb_substr($user->name, 0, 7) . "...";
            } else {
                $name = $user->name;
            }
        }

        return $name;
    }

    public function select(Request $request)
    {
        $memo = Memo::find($request->id);
        session()->put('select_memo',$memo);

        return redirect()->route('memo.index');
    }
}

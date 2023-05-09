<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    //
    public function index() {
        return view('contacts.index');
    }

    public function confirm(Request $request) {
        // バリデーションルールを定義
        // 引っかかるとエラーを起こしてくれる
        $request->validate([
        'name'  => 'required|max:10',
        'kana'  => 'required|max:10',
        'tel'   => 'nullable|numeric|max:11|',
        'email' => 'required|email',
        'body'  => 'required',
        ]);

        // フォームからの入力値を全て取得
        $inputs = $request->all();

        // 確認ページに表示
        // 入力値を引数に渡す
        return view('contacts.confirm', [
            'inputs' => $inputs,]);
    }

    public function complete(Request $request) {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if ($action === 'submit') {

            // DBにデータを保存
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            return view('contacts.complete');
        } else {
            return redirect()->route('contact')->withInput($input);
        }
    }
}
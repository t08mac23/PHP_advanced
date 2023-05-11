<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function confirm(Request $request) {
        // バリデーションルールを定義
        $request->validate([
        'name'  => 'required|max:10',
        'kana'  => 'required|max:10',
        'tel'   => 'nullable|numeric|digits_between:8,11',
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

    public function edit($id) {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id) {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');
        // バリデーションルールを定義
        $request->validate([
            'name'  => 'required|max:10',
            'kana'  => 'required|max:10',
            'tel'   => 'nullable|numeric|digits_between:8,11',
            'email' => 'required|email',
            'body'  => 'required',
            ]);

        if ($action === 'submit') {
            // DBにデータを保存
            $contact = Contact::find($id);
            $contact->fill($input);
            $contact->save();

            return redirect()->route('contact')->with('success', '更新完了しました');
        } else {
            return redirect()->route('contact');
        }

    }

    public function destroy($id) {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //usermodelにview側に渡す値を$fillableに詰めて、./vendor/bin/sail artisan make:controller UserControllerで作成
    public function create()
    {
        return view('register1'); //フォームを表示
    }
    public function store(Request $request) //Requestクラスを使いフォーム入力データを取得する。それを変数に詰める。バリデーション関係をここから書く
    {
        $request->validate(
            [
                /**
                 * requiredはフォーム入力がが必須であることを指定。からの場合バリデーションエラー
                 * emailは正しいメールアドレスの形式かチェック@を含んでいないなど。
                 * unique:users,emailはusersテーブルのemailカラムに重複したアドレスがないかチェック。あればエラー。
                 */
                'email' => 'required | email | unique:users,email',
                /**
                 * requiredはフォーム入力がが必須であることを指定。からの場合バリデーションエラー
                 * min:6 ６文字以上入力してください。
                 * confirmed　ルールを使うと、classがpassword_confirmationとなっているものと自動で比較される。この場合パスワードの再入力が誤っていれば、DB登録できない
                 */
                'password' => 'required | min:6 | confirmed'
            ],
            [
                'email.required' => 'メールアドレスは必須です。',
                'email.email' => '正しいメールアドレスを入力してください。',
                'email.unique' => 'このメールアドレスは既に登録されています。',
                'password.required' => 'パスワードは必須です。',
                'password.min' => 'パスワードは６文字以上にしてください。',
                'password.confirmed' => 'パスワードが一致しません。',
            ]

        );
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return to_route('home');
    }
}
// $request->validate([
//     'email' => 'required|email|unique:users,email',
//     'password' => 'required|min:6|confirmed',], [
//     'email.required' => 'メールアドレスは必須です。',
//     'email.email' => '正しいメールアドレスを入力してください。',
//     'email.unique' => 'このメールアドレスはすでに登録されています。',
//     'password.required' => 'パスワードは必須です。',
//     'password.min' => 'パスワードは6文字以上にしてください。',
//     'password.confirmed' => 'パスワードが一致しません。',
// ]);

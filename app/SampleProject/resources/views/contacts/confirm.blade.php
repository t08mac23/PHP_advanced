<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ - 確認</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">お問い合わせ確認</h1>
        <div class="container">
            {!! Form::open(['route' => 'complete', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お名前<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ $inputs['name'] }}
                    </div>
                </div>
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">フリガナ<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ $inputs['kana'] }}
                    </div>
                </div>
                <input type="hidden" name="kana" value="{{ $inputs['kana'] }}">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">電話番号</p>
                    <div class="col-sm-8">
                        {{ $inputs['tel'] }}
                    </div>
                </div>
                <input type="hidden" name="tel" value="{{ $inputs['tel'] }}">


                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ $inputs['email'] }}
                    </div>
                </div>
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お問い合わせ内容</p>
                    <div class="col-sm-8">
                        {{ $inputs['body'] }}
                    </div>
                </div>
                <input type="hidden" name="body" value="{{ $inputs['body'] }}">

                <div class="text-center">
                    <button name="action" type="submit" value="return" class="btn btn-dark">入力画面に戻る</button>
                    <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
                </div>
            {!! Form::close() !!}
            <form class="text-center">
                <button type="button" onclick="history.back()">戻る</button>
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ - 編集</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">お問い合わせ編集</h1>
        <div class="container">
          <form action="{{ route('update', $contact->id) }}"  method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                  <p class="col-sm-4 col-form-label">お名前<span class="badge badge-danger ml-1">必須</span></p>
                  <div class="col-sm-8">
                    <input type="text" name="name" value="{{old('name')?: $contact->name}}" maxlength="10">
                  </div>
              </div>
              @if ($errors->has('name'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
              @endif

              <div class="form-group row">
                  <p class="col-sm-4 col-form-label">フリガナ<span class="badge badge-danger ml-1">必須</span></p>
                  <div class="col-sm-8">
                    <input type="text" name="kana" value="{{ $contact['kana'] }}" maxlength="10">
                  </div>
              </div>
              @if ($errors->has('kana'))
                <p class="alert alert-danger">{{ $errors->first('kana') }}</p>
              @endif

              <div class="form-group row">
                  <p class="col-sm-4 col-form-label">電話番号</p>
                  <div class="col-sm-8">
                    <input type="text" name="tel" value="{{ $contact['tel'] }}" maxlength="11">
                  </div>
              </div>
              @if ($errors->has('tel'))
                <p class="alert alert-danger">{{ $errors->first('tel') }}</p>
              @endif


              <div class="form-group row">
                  <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                  <div class="col-sm-8">
                    <input type="text" name="email" value="{{ $contact['email'] }}">
                  </div>
              </div>
              @if ($errors->has('email'))
                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
              @endif

              <div class="form-group row">
                  <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="badge badge-danger ml-1">必須</span></p>
                  <div class="col-sm-8">
                    <textarea type="text" name="body" >{!! nl2br(e($contact['body'])) !!} </textarea>
                  </div>
              </div>
              @if ($errors->has('body'))
                <p class="alert alert-danger">{{ $errors->first('body') }}</p>
              @endif

              <div class="text-center">
                  <button name="action" type="submit" value="return" class="btn btn-dark">キャンセル</button>
                  <button name="action" type="submit" value="submit" class="btn btn-primary">更新する</button>
              </div>
          </form>
        </div>
    </div>
</body>
</html>
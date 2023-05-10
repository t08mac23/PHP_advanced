<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">お問い合わせ</h1>
        <div class="container">
            {!! Form::open(['route' => 'confirm', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お名前 <span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('name'))
                  <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">フリガナ <span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::text('kana', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('kana'))
                  <p class="alert alert-danger">{{ $errors->first('kana') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">電話番号</p>
                    <div class="col-sm-8">
                        {{ Form::text('tel', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('tel'))
                  <p class="alert alert-danger">{{ $errors->first('tel') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('email'))
                  <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                @endif

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="badge badge-danger ml-1">必須</span></p>
                    <div class="col-sm-8">
                        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @if ($errors->has('body'))
                  <p class="alert alert-danger">{{ $errors->first('body') }}</p>
                @endif

                <div class="text-center">
                    {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <table class="table table-dark table-striped", style="margin-top: 100px;">
      <tr>
          <th >氏名</th>
          <th >フリガナ</th>
          <th >電話番号</th>
          <th >メールアドレス</th>
          <th >お問い合わせ内容</th>
      </tr>
      @foreach($contacts as $contact)
        <tr>
          <td>{{ $contact->name }}</td>
          <td>{{ $contact->kana }}</td>
          <td>{{ $contact->tel }}</td>
          <td>{{ $contact->email }}</td>
          <td>{!! nl2br(e($contact->body)) !!}</td>
          <td>
            <form action="{{ route('edit', ['id' => $contact->id]) }}" method="get">
              <button>編集</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
</body>
</html>
@extends('layouts.profile')
@section('title', 'プロフィール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <form method="POST"action="{{ action('Admin\ProfileController@add') }}"></form>
                 @foreach($posts as $profile)
                    {{ $profile->id }}</br>
                    
                    <div class="form-rtop row">
                        <label class="col-md-10" for="name">名前：</label>
                            {{ $profile->name }}
                    </div>
                    <div class="form-rtop row">
                        <label class="col-md-10" for="career">スタイリスト歴：</label>
                            {{ $profile->career }}
                    </div>
                    <div class="form-rtop row">
                        <label class="col-md-10" for="style">得意なスタイル：</label>
                             {{ $profile->style }}
                    </div>
                    <div class="form-rtop row">
                        <label class="col-md-10" for="counseling">カウンセリング方法：</label>
                            {{ $profile->counseling }}
                    </div>
                    <div class="form-rtop row">
                        <label class="col-md-10" for="shopname">店舗名：</label>
                            {{ $profile->shopname }}
                    </div>
                     <div class="form-rtop row">
                        <label class="col-md-10" for="url">店舗URL：</label>
                            {{ $profile->url }}
                    </div>
                     <div class="form-rtop row">
                        <label class="col-md-10" for="address">店舗住所：</label>
                            {{ $profile->address }}
                    </div>
                @endforeach
                <div>
                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">
                        <input type="submit" class="btn btn-primary" value="編集画面">
                    </a>
                    <a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">
                       <input type="submit" class="btn btn-primary" value="削除">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
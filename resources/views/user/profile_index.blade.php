@extends('layouts.front')

@section('content')
    <div class="container">
     <h3>プロフィール</h3>
        </br>
            <div class="row">
                <div class="posts">
                    <div class="post">
                    
                                 @foreach($posts as $profile)
                                    {{ $profile->id }}</br>
                                    <dl class="form-rtop row">
                                        <dt class="col-sm-4" for="name">画像</dt>
                                        <dd class="col-sm-6 meta-name">
                                            @if ($profile->image_path)
                                                <img width="200px" src="{{ $profile->image_path }}">
                                            @endif
                                        </dd>
                                        <dt class="col-sm-4" for="name">名前</dt>
                                        <dd class="col-sm-6 meta-name">{{ $profile->name }}</dd>
                                        
                                        <dt class="col-sm-4" for="career">スタイリスト歴</dt>
                                        <dd class="col-sm-6 meta-name">{{ $profile->career }}</dd>
                                        
                                        <dt class="col-sm-4" for="style">得意なスタイル</dt>
                                        <dd class="col-sm-6 meta-name">{{ $profile->style }}</dd>
                                        
                                        <dt class="col-sm-4" for="counseling">カウンセリング方法</dt>
                                        <dd class="col-sm-6 meta-name"> {{ $profile->counseling }}</dd>
                                        
                                        <dt class="col-sm-4" for="shopname">店舗名</dt>
                                        <dd class="col-sm-6 meta-name">{{ $profile->shopname }}</dd>
                                        
                                        <dt class="col-sm-4" for="url">店舗URL</dt>
                                        <dd class="col-sm-6 meta-name">{{ $profile->url }}</dd>
                                        
                                        <dt class="col-sm-4" for="address">店舗住所</dt>
                                        <dd class="col-sm-6 meta-name">{{ $profile->address }}</dd>
                                    </dl>
                                    @endforeach
                                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">
                                      <input type="submit" class="btn btn-primary" value="お気に入り登録">
                                    </a>
                    </div>
                </div>
            </div>
     
    </div>
@endsection
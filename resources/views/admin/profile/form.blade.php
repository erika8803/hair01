@extends('layouts.profile')
@section('title','プロフィール')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>【プロフィール】</h2>
      
        @if (empty($profile->id))
          <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
        @else
          <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
        @endif
          <input type="hidden" name="id" value="{{ $profile->id }}">
        
        
        @if (count($errors) > 0)
          <!-- エラーがあった場合エラーを表示 -->
          <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
          </ul>
        @endif
              <br>
              <h4>スタイリスト情報</h4>
              
              <div class="form-group row">
                <label class="col-md-10" for="image">画像</label>
                <div class="col-md-10">
                  @if (empty($profile->id))
                    <input type="file" class="form-control-file" name="image">
                  @else
                    @if ($profile->image_path)
                    <img width="200px" src="{{ $profile->image_path }}">
                    @endif
                  @endif
                   
                </div>
              </div>
                    
              <div class="form-rtop row">
                <label class="col-md-10" for="name">名前</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $profile->name) }}">
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-10" for="career">スタイリスト歴</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="career" value="{{ old('career', $profile->career) }}">
                </div>
              </div>
          
              <div class="form-rtop row">
                <label class="col-md-10" for="style">得意なスタイル</label>
                <div class="col-md-10">
                  <textarea type="text" class="form-control" name="style">{{ old('style', $profile->style) }}</textarea>
                </div>
              </div>
          
              <div class="form-rtop row">
                <label class="col-md-10" for="counseling">カウンセリング方法</label>
                <div class="col-md-10">
                  <textarea type="text" class="form-control" name="counseling">{{ old('counseling', $profile->counseling) }}</textarea>
                </div>
              </div>
              
              <br>
              <h4>店舗先情報</h4>
              <div class="form-rtop row">
                <label class="col-md-10" for="shopname">店舗名</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="shopname" value="{{ old('shopname', $profile->shopname) }}">
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-10" for="url">店舗のURL</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="url" value="{{ old('url', $profile->url) }}">
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-10" for="address">店舗住所</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="address" value="{{ old('address', $profile->address) }}">
                </div>
              </div>
              
              </br>
            
              {{ csrf_field() }}
               
                @if (empty($profile->id))
                  <input type="submit" class="btn btn-primary" value="新規登録">
                @else
                  <input type="submit" class="btn btn-primary" value="更新">
                  <a href="{{ action('Admin\PortfolioController@index') }}">
                  <input type="button" class="btn btn-primary" value="ポートフォリオ一覧へ">
                @endif
      </form>
    </div>
  </div>
</div>
@endsection
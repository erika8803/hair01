@extends('layouts.portfolio')
@section('title','ポートフォリオ ')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <form action="{{ action('Admin\PortfolioController@create') }}" method="post" enctype="multipart/form-data">
     
     
        @if (count($errors) > 0)
          <!-- エラーがあった場合エラーを表示 -->
          <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
          </ul>
        @endif
              <br>
              <h4>【ポートフォリオ】</h4>
              
              <div class="form-group row">
                <label class="col-md-10">画像</label>
                <div class="col-md-10">
                   <input type="file" class="form-control-file" name="image">
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="gender">性別</label>
                
                <div class="col-md-8">
                 <label class="col-md-3" for="female">女性
                    <input type="radio"  name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>
                  </label>
                  
                <label class="col-md-3" for="male">男性
                    <input type="radio" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }}>
                  </label>
                  
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="hair_type">髪質</label>
                
                <div class="col-md-8">
                  <label class="col-md-3" for="coarsehair">太い
                    <input type="radio" name="hair_type" value="coarsehair" {{ old('hair_type') === 'coarsehair' ? 'checked' : '' }}>
                  </label>
                  
                 <label class="col-md-3" for="mediumcoarse">普通
                    <input type="radio" name="hair_type" value="mediumcoarse" {{ old('hair_type') === 'mediumcoarse' ? 'checked' : '' }}>
                  </label>
                  
                  <label class="col-md-3" for="finehair">細い
                    <input type="radio" name="hair_type" value="finehair" {{ old('gehair_typender') === 'finehair' ? 'checked' : '' }}>
                  </label>
                  
                </div>
              </div>

              <div class="form-rtop row">
                <label class="col-md-3" for="hair_volume">毛量</label>
                
                <div class="col-md-8">
                  <label class="col-md-3" for="thick">多い
                    <input type="radio" name="hair_volume" value="thick" {{ old('hair_volume') === 'thick' ? 'checked' : '' }}>
                  </label>
                  
                 <label class="col-md-3" for="medium">普通
                    <input type="radio" name="hair_volume" value="medium" {{ old('hair_volume') === 'medium' ? 'checked' : '' }}>
                  </label>
                  
                  <label class="col-md-3" for="thin">少ない
                    <input type="radio" name="hair_volume" value="thin" {{ old('hair_volume') === 'thin' ? 'checked' : '' }}>
                  </label>
                  
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="hair_length">髪の長さ</label>
                
                <div class="col-md-8">
                  <label class="col-md-3" for="long">ロング
                    <input type="radio" name="hair_length" value="long" {{ old('hair_length') === 'long' ? 'checked' : '' }}>
                  </label>
                  
                 <label class="col-md-3" for="medium">ミディアム
                    <input type="radio" name="hair_length" value="medium" {{ old('hair_length') === 'medium' ? 'checked' : '' }}>
                  </label>
                  
                  <label class="col-md-3" for="short">ショート
                    <input type="radio" name="hair_length" value="short" {{ old('hair_length') === 'short' ? 'checked' : '' }}>
                  </label>
                  
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="hair_color">髪色</label>
                
                <div class="col-md-8">
                  <label class="col-md-3" for="bright">明るい
                    <input type="radio" name="hair_color" value="bright" {{ old('hair_color') === 'bright' ? 'checked' : '' }}>
                  </label>
                  
                 <label class="col-md-3" for="dark">暗め
                    <input type="radio" name="hair_color" value="dark" {{ old('hair_color') === 'dark' ? 'checked' : '' }}>
                  </label>
                  
                  <label class="col-md-3" for="other">他
                    <input type="radio" name="hair_color" value="other" {{ old('hair_color') === 'other' ? 'checked' : '' }}>
                  </label>
                  
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="straighte">ストレート</label>
                
                <div class="col-md-8">
                  <label class="col-md-3" for="yes">あり
                   <input type="hidden" name="straighte" value="0" >
                    <input type="checkbox" name="straighte" value="1" {{ old('straighte') === '1' ? 'checked' : '' }}>
                  </label>
                  
                </div>
              </div>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="perm">パーマ</label>
                
                <div class="col-md-8">
                  <label class="col-md-3" for="yes">あり
                    <input type="hidden" name="perm" value="0" >
                    <input type="checkbox" name="perm" value="1" {{ old('perm') === '1' ? 'checked' : '' }}>
                  </label>
                
                </div>
              </div>
              
              </br>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="hair_style">ヘアースタイル</label>
                <div class="col-md-8">
                  <textarea type="text" class="form-control" name="hair_style" rows="7">{{ old('hair_style') }}</textarea>
                </div>
              </div>
              
              </br>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="hair_care">ヘアケア方法</label>
                <div class="col-md-8">
                  <textarea type="text" class="form-control" name="hair_care" rows="7">{{ old('hair_care') }}</textarea>
                </div>
              </div>
              
              </br>
              
              <div class="form-rtop row">
                <label class="col-md-3" for="other">その他</label>
                <div class="col-md-8">
                  <textarea type="text" class="form-control" name="other" rows="7">{{ old('other') }}</textarea>
                </div>
              </div>
              
              
               {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="確認画面">
      </form>
    </div>
  </div>
</div>
@endsection
@extends('layouts.portfolio')
@section('title', 'ポートフォリオの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('Admin\PortfolioController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e) 
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $portfolio_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-rtop row">
                        <label class="col-md-3" for="gender">性別</label>
                        
                        <div class="col-md-8">
                            <label class="col-md-3" for="male">男性
                                <input type="radio" class="form-control" name="gender" value="male" {{ old('gender', $portfolio_form->gender ) === 'male' ? 'checked' : '' }}>
                            </label>
                          
                            <label class="col-md-3" for="female">女性
                                <input type="radio" class="form-control" name="gender" value="female" {{ old('gender', $portfolio_form->gender) === 'female' ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                             
                    <div class="form-rtop row">
                        <label class="col-md-3" for="hair_type">髪質</label>
                        
                            <div class="col-md-8">
                              <label class="col-md-3" for="coarsehair">太い
                                <input type="radio" class="form-control" name="hair_type" value="coarsehair" {{ old('hair_type' , $portfolio_form->hair_type) === 'coarsehair' ? 'checked' : '' }}>
                              </label>
                              
                             <label class="col-md-3" for="mediumcoarse">普通
                                <input type="radio" class="form-control" name="hair_type" value="mediumcoarse" {{ old('hair_type' , $portfolio_form->hair_type) === 'mediumcoarse' ? 'checked' : '' }}>
                              </label>
                              
                              <label class="col-md-3" for="finehair">細い
                                <input type="radio" class="form-control" name="hair_type" value="finehair" {{ old('gehair_typender' , $portfolio_form->hair_type) === 'finehair' ? 'checked' : '' }}>
                              </label>
                              
                            </div>
                      </div>
        
                      <div class="form-rtop row">
                        <label class="col-md-3" for="hair_volume">毛量</label>
                        
                        <div class="col-md-8">
                          <label class="col-md-3" for="thick">太い
                            <input type="radio" class="form-control" name="hair_volume" value="thick" {{ old('hair_volume' , $portfolio_form->hair_volume) === 'thick' ? 'checked' : '' }}>
                          </label>
                          
                         <label class="col-md-3" for="medium">普通
                            <input type="radio" class="form-control" name="hair_volume" value="medium" {{ old('hair_volume' , $portfolio_form->hair_volume) === 'medium' ? 'checked' : '' }}>
                          </label>
                          
                          <label class="col-md-3" for="thin">細い
                            <input type="radio" class="form-control" name="hair_volume" value="thin" {{ old('hair_volume' , $portfolio_form->hair_volume) === 'thin' ? 'checked' : '' }}>
                          </label>
                          
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="hair_length">髪の長さ</label>
                        
                        <div class="col-md-8">
                          <label class="col-md-3" for="long">ロング
                            <input type="radio" class="form-control" name="hair_length" value="long" {{ old('hair_length', $portfolio_form->hair_length) === 'long' ? 'checked' : '' }}>
                          </label>
                          
                         <label class="col-md-3" for="medium">ミディアム
                            <input type="radio" class="form-control" name="hair_length" value="medium" {{ old('hair_length', $portfolio_form->hair_length) === 'medium' ? 'checked' : '' }}>
                          </label>
                          
                          <label class="col-md-3" for="short">ショート
                            <input type="radio" class="form-control" name="hair_length" value="short" {{ old('hair_length' , $portfolio_form->hair_length) === 'short' ? 'checked' : '' }}>
                          </label>
                          
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="hair_color">髪色</label>
                        
                        <div class="col-md-8">
                          <label class="col-md-3" for="bright">明るい
                            <input type="radio" class="form-control" name="hair_color" value="bright" {{ old('hair_color', $portfolio_form->hair_color) === 'bright' ? 'checked' : '' }}>
                          </label>
                          
                         <label class="col-md-3" for="dark">暗め
                            <input type="radio" class="form-control" name="hair_color" value="dark" {{ old('hair_color', $portfolio_form->hair_color) === 'dark' ? 'checked' : '' }}>
                          </label>
                          
                          <label class="col-md-3" for="other">他
                            <input type="radio" class="form-control" name="hair_color" value="other" {{ old('hair_color', $portfolio_form->hair_color) === 'other' ? 'checked' : '' }}>
                          </label>
                          
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="straighte">ストレート</label>
                        
                        <div class="col-md-8">
                          <label class="col-md-3" for="yes">あり
                            <input type="checkbox" class="form-control" name="straighte" value="1" {{ old('straighte', $portfolio_form->straighte) === '1' ? 'checked' : '' }}>
                          </label>
                          
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="perm">パーマ</label>
                        
                        <div class="col-md-8">
                          <label class="col-md-3" for="yes">あり
                            <input type="radio" class="form-control" name="perm" value="1" {{ old('perm', $portfolio_form->perm) === '1' ? 'checked' : '' }}>
                          </label>
                        
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="hair_style">ヘアースタイル</label>
                        <div class="col-md-8">
                          <textarea type="text" class="form-control" name="hair_style" rows="20">{{ old('hair_style', $portfolio_form->hair_style) }}</textarea>
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="hair_care">ヘアケア方法</label>
                        <div class="col-md-8">
                          <textarea type="text" class="form-control" name="hair_care"  rows="20">{{ old('hair_care', $portfolio_form->hair_care) }}</textarea>
                        </div>
                      </div>
                      
                      <div class="form-rtop row">
                        <label class="col-md-3" for="other">他</label>
                        <div class="col-md-8">
                          <textarea type="text" class="form-control" name="other" rows="20">value={{ old('other', $portfolio_form->other) }}</textarea>
                        </div>
                      </div>
              
                   
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $portfolio_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
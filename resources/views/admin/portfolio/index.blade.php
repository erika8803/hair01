@extends('layouts.portfolio')
@section('title', 'ポートフォリオ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ポートフォリオ一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\PortfolioController@create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PortfolioController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-3">施術した内容</label>
                        <div class="col-md-4">
                            <input type="text" class="form-controller" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        
                    </table>
                </div>
            </div>
        </div>
            @foreach($posts as $portfolio)
                <input type="hidden" value="{{ $portfolio->id }}">
                </br>
               
                <dl class="form-rtop row">
                    <dt class="col-sm-3" for="image">画像</dt>
                    <dd class="col-sm-8 meta-name">
                        @if ($portfolio->image_path)
                            <img width="200px" src="{{ $portfolio->image_path }}">
                        @endif
                    </dd>
                    
                    
                    <dt class="col-sm-3" for="gender">性別</dt>
                    <dd class="col-sm-8 meta-name">
                        @if ($portfolio->gender === 'female' )女性 @endif
                        @if ($portfolio->gender === 'male' )男性 @endif
                    </dd>
                    
                    <dt class="col-sm-3" for="hair_type">髪質</dt>
                    <dd class="col-sm-8 meta-name">
                        @if ($portfolio->hair_type === 'coarsehair' )太い @endif
                        @if ($portfolio->hair_type === 'mediumcoarse' )普通 @endif
                        @if ($portfolio->hair_type === 'finehair' )細い @endif
                    </dd>
                    
                    <dt class="col-sm-3" for="hair_volume">毛量</dt>
                    <dd class="col-sm-8 meta-name">
                        @if ($portfolio->hair_volume === 'thick' )多い @endif
                        @if ($portfolio->hair_volume === 'medium' )普通 @endif
                        @if ($portfolio->hair_volume === 'thin' )少ない @endif
                    </dd>
                    
                    <dt class="col-sm-3" for="hair_length">髪の長さ</dt>
                    <dd class="col-sm-8 meta-name">
                        @if ($portfolio->hair_length === 'long' )多い @endif
                        @if ($portfolio->hair_length === 'medium' )普通 @endif
                        @if ($portfolio->hair_length === 'short' )少ない @endif
                    </dd>
                    
                    <dt class="col-sm-3" for="hair_color">髪色</dt>
                    <dd class="col-sm-8 meta-name">
                        @if ($portfolio->hair_color === 'bright' )多い @endif
                        @if ($portfolio->hair_color === 'dark' )普通 @endif
                        @if ($portfolio->hair_color === 'other' )少ない @endif
                    </dd>
                    
                    <dt class="col-sm-3" for="straighte">ストレートパーマー</dt>
                    <dd class="col-sm-8 meta-name">{{ $portfolio->straighte == 1 ? 'あり' : 'なし' }}</dd>
                    
                    <dt class="col-sm-3" for="perm">パーマ</dt>
                    <dd class="col-sm-8 meta-name">{{ $portfolio->perm == 1 ? 'あり' : 'なし' }}</dd>
                    
                    <dt class="col-sm-3" for="hair_style">施術した内容</dt>
                    <dd class="col-sm-8 meta-name">{!! nl2br(e( $portfolio->hair_style )) !!}</dd>
                    
                    <dt class="col-sm-3" for="hair_care">手入れ方法</dt>
                    <dd class="col-sm-8 meta-name">{!! nl2br(e( $portfolio->hair_care )) !!}</dd>
                    
                    <dt class="col-sm-3" for="other">その他</dt>
                    <dd class="col-sm-8 meta-name">{!! nl2br(e( $portfolio->other )) !!}</dd>
                </dl>
            <div>
                <a href="{{ action('Admin\PortfolioController@edit', ['id' => $portfolio->id]) }}">
                    <input type="submit" class="btn btn-primary" value="編集画面">
                </a>
                <a href="{{ action('Admin\PortfolioController@delete', ['id' => $portfolio->id]) }}">
                   <input type="submit" class="btn btn-primary" value="削除">
                </a>
            </div>
                
            @endforeach
    </div>
@endsection
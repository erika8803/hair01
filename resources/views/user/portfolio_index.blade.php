@extends('layouts.front')

@section('content')
    <div class="container">
     <h3>ポートフォリ一覧</h3>
        </br>
            <div class="row">
                <div class="posts">
                    <div class="post">
                    @php $count = 0; @endphp 
                    @foreach($posts as $post)
                        
                            <!-- 投稿数を2で割ったあまりの時に div=row を閉じる、閉じないを処理。 -->
                            @if (!($count % 2)) 
                            
                            <div class="row">
                                <!--<div class="text col-md-10">-->
                            @endif
                                <div class="col-md-6">
                                    <div class="image">
                                        @if ($post->image_path)
                                            <img width="500" src="{{ $post->image_path }}">
                                        @endif
                                    </div>   
                                    <div class="date">
                                        {{ $post->updated_at->format('Y年m月d日') }}
                                    </div>
                                    <h5>ヘアースタイル</h5>
                                        <div class="title">
                                            {{ str_limit($post->hair_style, 150) }}
                                        </div>
                                        
                                    </br>
                                    <h6>ヘアーケア方法</h6>
                                        <div class="body mt-1">
                                            {{ str_limit($post->hair_care, 1500) }}
                                        </div>
                                        
                                    <a href="{{ action('UserController@show') }}">
                                    <input type="button" class="btn btn-primary btn-block" value="プロフィール一覧">
                                    </a>
                                    
                                </div>
                            @if (($count % 2)) 
                                <!--</div>-->
                            </div> 
                           
                            @endif
                        
                        
                    @php $count++; @endphp    
                    @endforeach
                    
                    @if (!($count % 2)) 
                            <!-- 投稿が奇数の場合の閉じタグ -->
                            </div> 
                    @endif
                    </div>
                </div>
            </div>
     
    </div>
@endsection
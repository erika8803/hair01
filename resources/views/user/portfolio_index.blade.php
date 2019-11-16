@extends('layouts.front')

@section('content')
    <div class="container portfolio">
     <h3>【ポートフォリ一覧】</h3>
        </br>
            <div class="row">
                <div class="posts">
                    <div class="post">
                        <form action="{{ action('UserController@index') }}" method="get">
                            <div class="form-group row">
                                <label class="col-md-2">施術した内容検索</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-controller" name="cond_title" value={{ $cond_title }}>
                                    </div>
                                    <div class="col-md-2">
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary" value="検索">
                                    </div>
                            </div>
                        </form>
                        
                    @php $count = 0; @endphp 
                    @foreach($posts as $post)
                        
                        <!-- 投稿数を2で割ったあまりの時に div=row を閉じる、閉じないを処理。 -->
                        @if (!($count % 2)) 
                            
                            <div class="row">
                            @endif
                                <div class="col-md-6">
                                    
                                    <div class="image">
                                        @if ($post->image_path)
                                            <img src="{{ $post->image_path }}">
                                        @endif
                                    </div>   
                                    
                                    <div class="date">
                                        <p>{{ $post->updated_at->format('Y年m月d日') }}</p>
                                    </div>
                                    
                                    <div class="title">
                                        <p>施術した内容： {!! nl2br(e( $post->hair_style )) !!}</p>
                                    </div>
                                    
                                    <div class="title">
                                        <p>手入れ方法： {!! nl2br(e( $post->hair_care )) !!}</p>
                                    </div>
                                    <div class="title">
                                        <p>その他： {!! nl2br(e( $post->other )) !!}</p>
                                    </div>
           
                                    <a href="{{ url('user/profile?id='.$post->user_id) }}">
                                        <input type="button" class="btn btn-primary btn-block" value="プロフィール詳細">
                                    </a>
                                    
                                    </br>
                                    
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

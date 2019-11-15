@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin_登録完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <a href="{{ action('Admin\ProfileController@form') }}">
                            プロフィール登録・編集画面
                           <!--<input type="submit" class="btn btn-primary" value="クリック">-->
                        </a>
                    </div>
                    
                    </br>
                    
                    <div>
                        <a href="{{ action('Admin\PortfolioController@index') }}">
                            ポートフォリオ登録・編集画面
                            <!--<input type="submit" class="btn btn-primary" value="クリック">-->
                        </a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

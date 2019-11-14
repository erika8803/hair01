@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
                    <h5>プロフィール編集画面</h5>
                    <a href="{{ action('Admin\ProfileController@form') }}">
                       <input type="submit" class="btn btn-primary" value="クリック">
                    </a>
                    
                    <h5>ポートフォリオ 一覧画面</h5>
                    <a href="{{ action('Admin\PortfolioController@index') }}">
                        <input type="submit" class="btn btn-primary" value="クリック">
                    </a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

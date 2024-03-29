@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User_登録完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <a href="{{ action('UserController@index') }}">
                            ポーフォリオ一覧
                        </a>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

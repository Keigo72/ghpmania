@extends('layouts.template')

@section('content')
  
    <body>
    
       <h1>質問投稿</h1>
    
        <!--<form action="/question/" method="POST">-->
        <form action="{{ route('question.create') }}" method="post" enctype="multipart/form-data">
            
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group row">
                <label class="col-md-2">名前</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">タイトル</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="title" rows="1">{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">質問内容</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="questioncontents" rows="4">{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">画像</label>
                <div class="col-md-8">
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
            @csrf
            <button class="btn btn-primary"> 投稿 </button>
            
        </form>
    
    </body>
@endsection
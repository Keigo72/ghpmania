@extends('layouts.template')

@section('content')
    <div class="question-btn">
        <a href="{{ route('question.post') }}">質問する</a>
        <!--<a href="{{ url('/question/post') }}">質問する</a>-->
    </div>
    <br>
　　<br style="Line-Height:6pt">
    <div class="links">
        <h3 class="border-bottom border-gray pb-2 mb-0">質問投稿一覧</h3>
    </div>
@endsection
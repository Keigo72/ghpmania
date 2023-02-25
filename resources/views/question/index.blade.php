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
        <p>{{ $hogee }}</p>
    
        <table class="table">
  <thead class="thead-light">
    <tr>
      <th>id</th>
      <th>質問タイトル</th>
      <th>投稿日時</th>
    </tr>
  </thead>
  <tbody>
    @foreach($questions as $q)
        <tr>
            <th scope="row">{{ $q->id}}</th>
            <td>{{ $q->title}}</td>
            <td>{{ $q->created_at->format("Y年m月d日 H:i")}}</td>
        </tr>
    @endforeach
  </tbody>
</table>

    </div>
@endsection
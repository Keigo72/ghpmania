<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;

use Carbon\Carbon;
use Storage;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        return view('question.index');
    }
    public function post()
    {
        return view('question.post'); 
    }
    public function create(Request $request)
    {
        // // 以下追加した
        $this->validate($request, Question::$rules);
        
        $question = new Question;
        $question_form = $request->all();
    
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($question_form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$question_form['image'],'public');
            $question->image_path = Storage::disk('s3')->url($path);
        } else {
            $question->image_path = null;
        }
    
        // フォームから送信されてきた_tokenを削除する
        unset($question_form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($question_form['image']);
    
        // データベースに保存する
        $question->fill($question_form);
        $question->save();
        
        return redirect('question/');
    }
}

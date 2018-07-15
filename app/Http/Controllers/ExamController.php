<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use App\User;
use App\Exam;

class ExamController extends Controller
{
    public function show()
    {
        $usr = session("user");
        $user = User::find($usr['id']);
        $exams = Exam::all();
        $score = Score::where('user_id', $user['id'])->get();
        return view('exam.index')
                ->with('user', $user)
                ->with('exams', $exams)
                ->with('score', $score);
    }

    public function info($id){
        $usr = session("user");
        $user = User::find($usr['id']);
        $exam = Exam::find($id);
        return view('exam.info')
                ->with('user', $user)
                ->with('exam', $exam);
    }

    public function submit(Request $request, $id)
    {
        $usr = session("user");
        $user = User::find($usr['id']);
        $exam = Exam::find($id);
        $score = Score::where('user_id', $usr['id'])
            ->where('exam_id', $id)
            ->first();
        if($score->count == 0){
            $score->count = 1;
        }
        else if($score->count > 0){
            $score->count = $score->count + 1;
        }
        if($request->answer == $exam['answer']){
            if($score->status != 1){
                $score->status = 1;
                $score->save();

                $user->score = $user->score + $exam['score'];
                $user->save();
                session()->forget('user');
                session(['user'=>$user]);

                return redirect('/exam/'.$id)
                    ->with('success', 'คำตอบถูกต้อง');
            }
            else{
                $score->save();
                return redirect('/exam/'.$id)
                    ->with('success', 'คุณทำข้อนี้ไปแล้ว');
            }
        }
        else{
            $score->status = 0;
            $score->save();
            return redirect('/exam/'.$id)
                ->with('error', 'คำตอบผิด');
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TembangDolanan;
use App\Models\TembangDolananGame;
use Illuminate\Http\Request;

class StartTembangDolananGameController extends Controller
{
    public function material(TembangDolanan $tembangDolanan)
    {
        return view('start_tembang_dolanan_game.material', [
            'tembangDolanan' => $tembangDolanan,
        ]);
    }

    public function play(TembangDolanan $tembangDolanan)
    {
        $questions = TembangDolananGame::where('tembang_dolanan_id', $tembangDolanan->id)->get();
        $totalQuestions = count($questions);

        $buildQuestions = [];

        foreach ($questions as $i => $question) {
            $decoded = json_decode($question->options);
            $decoded = array_combine(range('a', 'e'), $decoded);
            $question->options = $decoded;

            $prevIndex = null;
            $nextIndex = null;

            $current = $question;
            $index = $i;

            if ($i == 0) {
                $prev = null;
                $prevIndex = null;

                if ($i == $totalQuestions - 1) {
                    $next = null;
                    $nextIndex = null;
                } else {
                    $next = $questions[$i + 1];
                    $nextIndex = $i + 1;
                }
            } else {
                $prev = $questions[$i - 1];
                $prevIndex = $i - 1;

                if ($i == $totalQuestions - 1) {
                    $next = null;
                    $nextIndex = null;
                } else {
                    $next = $questions[$i + 1];
                    $nextIndex = $i + 1;
                }
            }

            $buildQuestions[$i] = [
                'prev' => $prev,
                'current' => $current,
                'next' => $next,
                'index' => $index,
                'nextIndex' => $nextIndex,
                'prevIndex' => $prevIndex,
                'answer' => '-',
            ];
        }

        session(['tembang_dolanan_questions' => $buildQuestions]);

        return view('start_tembang_dolanan_game.play', [
            'question' => $buildQuestions[0] ?? null,
            'tembangDolanan' => $tembangDolanan,
        ]);
    }

    public function getQuestion(Request $request, TembangDolanan $tembangDolanan) {
        $index = $request->get('index');

        $questions = session('tembang_dolanan_questions');
        $requestQuestion = $questions[$index];
        return view('start_tembang_dolanan_game.play', [
            'question' => $requestQuestion,
            'tembangDolanan' => $tembangDolanan,
        ]);

        // foreach ($questions as $question) {
        //     if ($question['current']['id'] == $id) {
        //         $question['current']['answer'] = $currentAnswer;

        //         session(['tembang_dolanan_questions' => $questions]);

        //         $requestQuestion = $questions[$index];

        //         return view('start_tembang_dolanan_game.play', [
        //             'question' => $requestQuestion,
        //             'tembangDolanan' => $tembangDolanan,
        //         ]);
        //     }
        // }
    }

    public function setAnswer(Request $request) {
        $indexQuestion = $request->get('index');
        $currentAnswer = $request->get('answer');

        $questions = session('tembang_dolanan_questions');

        foreach ($questions as $index => $question) {
            if ($index == $indexQuestion) {
                $question['current']['answer'] = $currentAnswer;
                $questions[$index] = $question;
                session(['tembang_dolanan_questions' => $questions]);
            }
        }

        return response()->json([
            'status' => 'ok',
            'all' => $request->all(),
            'sent' => [
                'index' => $indexQuestion,
                'answer' => $currentAnswer,
            ],
        ]);
    }
}

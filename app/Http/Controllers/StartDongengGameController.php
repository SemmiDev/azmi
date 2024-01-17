<?php

namespace App\Http\Controllers;

use App\Models\Dongeng;
use Illuminate\Http\Request;

class StartDongengGameController extends Controller
{
    public function material(Dongeng $dongeng) {
        return view('start_dongeng_game.material', [
            'dongeng' => $dongeng,
        ]);
    }

    public function play(Dongeng $dongeng) {
        $qa = $dongeng->dongeng_games()->get();

        $data = [];
        foreach ($qa as $q) {
            $data[$q->id] = $q->answer;
        }

        session(['data_game' => $data]);

        $answer = $qa->map(function ($item, $key) {
            return $item->answer;
        });

        $answer = $answer->shuffle();

        $answer = $answer->map(function ($item, $i) {
            return [
                'no' => $i + 1,
                'answer' => $item,
            ];
        });

        session(['data_answer' => $answer]);

        return view('start_dongeng_game.play', [
            'dongeng' => $dongeng,
            'qa' => $qa,
            'answer' => $answer,
        ]);
    }

    public function check(Request $request, Dongeng $dongeng) : \Illuminate\Http\JsonResponse {
        $data = session('data_game');
        $answer = session('data_answer');

        $userAnswerInput = $request->get('answer');

        $summary = [];

        $score = 0;
        foreach ($data as $id => $keyAnswer) {
            $userAnswer = $userAnswerInput[$id] ?? null;
            $correctAnswer = collect($answer)->firstWhere('no', $userAnswer);
            if ($correctAnswer && $correctAnswer['answer'] == $keyAnswer) {
                $score++;
                $summary[] = [
                    'id_answer' => 'answer-'. $id,
                    'check' => true,
                ];
            } else {
                $summary[] = [
                    'id_answer' => 'answer-'. $id,
                    'check' => false,
                ];
            }
        }

        $nilai = $score / count($data) * 100;
        $nilai = (int) $nilai;

        $data = [
            'score' => $nilai,
            'summary' => $summary,
        ];

        return response()->json($data);
    }
}

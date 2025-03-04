<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterCheckController extends Controller
{
    public function index()
    {
        return view('character-check.index');
    }

    public function check(Request $request)
    {
        $request->validate([
            'input1' => 'required|string',
            'input2' => 'required|string',
        ]);

        $input1 = strtoupper($request->input('input1'));
        $input2 = strtoupper($request->input('input2'));

        $input1Array = str_split($input1);
        $input2Array = str_split($input2);

        $matchCount = 0;
        $checkedChars = [];

        foreach ($input1Array as $char1) {
            if (!in_array($char1, $checkedChars) && in_array($char1, $input2Array)) {
                $matchCount++;
                $checkedChars[] = $char1;
            }
        }

        $totalChars = count($input1Array);
        $percentage = $totalChars > 0 ? ($matchCount / $totalChars) * 100 : 0;

        return view('character-check.result', compact('input1', 'input2', 'percentage'));
    }
}

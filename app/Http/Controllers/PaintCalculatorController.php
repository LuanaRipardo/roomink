<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaintCalculatorRequest;

class PaintCalculatorController extends Controller
{
    public function index()
    {
        return view('paint-calculator');
    }

    public function calculate(PaintCalculatorRequest $request)
{
    $wallHeight = $request->input('wall_height');
    $wallWidth = $request->input('wall_width');
    $numberOfDoors = $request->input('number_of_doors');
    $numberOfWindows = $request->input('number_of_windows');
    $paintCoverage = 10;
    $paintVolume = 0.5;
    $paintNeeded = 0;

    // Calcula a área total a ser pintada
    $totalArea = ($wallHeight * $wallWidth) - (($numberOfDoors * 2) + ($numberOfWindows * 1.5));

    // Calcula a quantidade de tinta necessária
    $paintNeeded = $totalArea / $paintCoverage;

    // Calcula a quantidade de latas de tinta necessárias
    $cansNeeded = ceil($paintNeeded / $paintVolume);

    // Formata a quantidade de tinta e de latas para exibição
    $paintNeededFormatted = number_format($paintNeeded, 2, ',', '.');
    $cansNeededFormatted = $cansNeeded > 1 ? $cansNeeded . ' latas' : '1 lata';

    // Redireciona para a página de resultado com as informações do resultado
    return redirect()->route('paint-calculator', ['#result'])->with([
        'paintNeededFormatted' => $paintNeededFormatted,
        'cansNeededFormatted' => $cansNeededFormatted,
        'paintVolume' => $paintVolume,
    ]);

}

}

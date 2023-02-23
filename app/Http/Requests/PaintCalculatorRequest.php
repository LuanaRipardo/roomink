<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaintCalculatorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'wall_height' => 'required|numeric|min:1|max:50',
            'wall_width' => 'required|numeric|min:1|max:50',
            'number_of_doors' => 'required|integer|min:0',
            'number_of_windows' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'min' => 'O campo :attribute deve ter no mínimo :min.',
            'max' => 'O campo :attribute deve ter no máximo :max.',
        ];
    }

    public function calculate()
{
    $wall_height = $this->input('wall_height');
    $wall_width = $this->input('wall_width');
    $number_of_doors = $this->input('number_of_doors');
    $number_of_windows = $this->input('number_of_windows');

    $total_wall_area = ($wall_height * $wall_width) * 4;
    $door_area = $number_of_doors * 1.52;
    $window_area = $number_of_windows * 2.4;

    $total_area = $total_wall_area - $door_area - $window_area;

    if ($total_area < 0) {
        $total_area = 0;
    }

    $paint_needed = $total_area / 5;
    $recommended_can_size = null;
    $minimum_height_for_door_wall = $this->input('number_of_doors') > 0 ? $this->input('wall_height') + 0.3 : $this->input('wall_height');

    $can_sizes = [0.5, 2.5, 3.6, 18];
    foreach ($can_sizes as $can_size) {
        if ($paint_needed <= $can_size * 5) {
            $recommended_can_size = $can_size;
            break;
        }
    }

    return [
        'paint_needed' => $paint_needed,
        'recommended_can_size' => $recommended_can_size,
        'minimum_height_for_door_wall' => $minimum_height_for_door_wall
    ];
}

}

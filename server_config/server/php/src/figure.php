<?php
/* 
    Кодирование фигуры состоит из нескольких параметров:
    Форма, Цвет, размеры ограничивающего прямоугольника примитива 
*/

class Figure
{
    public int $shape_type, $color, $x, $y;

    function __construct(int $num)
    {
        $this->shape_type = $num & 1;
        $this->color = ($num >> 1) & 3;
        $this->x = ($num >> 2) & 3;
        $this->y = ($num >> 3) & 3;
    }
}

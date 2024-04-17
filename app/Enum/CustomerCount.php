<?php

namespace App\Enum;

enum CustomerCount : int
{
    case lowCount = 3;
    case mediumCount = 5;
    case highCount = 10;
}

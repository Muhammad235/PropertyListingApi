<?php


namespace App\Enums;

enum PropertyTypeEnum : string{
    case SINGLE = 'Single-family Home';
    case TOWNHOUSE = 'Townhouse listing';
    case MULTIFAMILY = 'Multi-family Home';
    case BUNGALON = 'Bungalow';
}



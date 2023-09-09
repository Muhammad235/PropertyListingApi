<?php


namespace App\Enums;

enum ListingType : string{
    case OPEN = 'Open listing';
    case SELL = 'Sell listing';
    case EXECUTIVE = 'Exclusive listing';
    case NET = 'Net listing';
}

<?php


namespace App\Enums;

enum ListingTypeEnum : string{
    case OPEN = 'Open listing';
    case SELL = 'Sell listing';
    case EXECUTIVE = 'Exclusive listing';
    case NET = 'Net listing';
}

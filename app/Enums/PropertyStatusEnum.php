<?php


namespace App\Enums;

enum PropertyStatusEnum : string{
    case SOLD = 'sold';
    case SALE = 'On Sale';
    case HOLD = 'On Hold';
}

<?php


namespace App\Enums;


enum TaskStatus: string
{
    case PENDING = 'pending';
    case ON_PROGRESS  = 'on progress';
    case CANCEL = 'cancel';
    case DONE = 'done';
    case REDO = 'redo';
}

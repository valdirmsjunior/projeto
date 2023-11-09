<?php

namespace App\Enums;

enum TipoContratoEnum: int 
{
    case CLT = 1;
    case PESSOA_JURIDICA = 2;
    case FREELANCER = 3;
}
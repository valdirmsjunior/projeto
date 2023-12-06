<?php

namespace App\Enums;

use App\Attributes\BackgroundColor;
use App\Attributes\Description;
use App\Traits\AttributableEnum;

enum StatusEnum: string 
{
    use AttributableEnum;

    #[Description('Em andamento')]
    #[BackgroundColor('success')]
    case ABERTA = 'aberta';

    #[Description('Vaga em analise')]
    #[BackgroundColor('warning')]
    case PAUSA = 'paralisada';

    #[Description('Vaga arquivada')]
    #[BackgroundColor('red')]
    case ARQUIVADA = 'arquivada';

}
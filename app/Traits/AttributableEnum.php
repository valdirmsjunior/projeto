<?php

namespace App\Traits;

use App\Attributes\AttributeProperty;
use BadMethodCallException;
use Illuminate\Support\Str;
use ReflectionAttribute;
use ReflectionEnum;

trait AttributableEnum 
{
    public function __call(string $method, array $args): mixed{

        // Obtendo os atributos do enum via reflection API
        $reflection = new ReflectionEnum(static::class);
        $attributes = $reflection->getCase($this->name)->getAttributes();

        //Verifique se o atributo existe em nossa lista de atributos
        $filtered_attributes = array_filter($attributes, fn (ReflectionAttribute $attribute) 
            => $attribute->getName() === AttributeProperty::ATTRIBUTE_PATH . Str::ucfirst($method));

        if (empty($filtered_attributes)) {
            throw new BadMethodCallException(sprintf('Chamada indefinida ao metodo %s::%s()', static::class, $method));
        }

        return array_shift($filtered_attributes)->newInstance()->get();
    }
}
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute deve ser aceite.',
    'active_url'           => 'O :attribute não é um URL válido.',
    'after'                => ':attribute deve ser uma data depois de :date.',
    'after_or_equal'       => ':attribute deve ser uma data depois ou igual a :date.',
    'alpha'                => 'O :attribute só pode conter letras.',
    'alpha_dash'           => 'O :attribute só pode conter letras, números, e traços.',
    'alpha_num'            => 'O :attribute só pode conter letras e números.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma data antes de :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data antes ou igual a :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ser entre :min e :max characters.',
        'array'   => 'O :attribute deve possuir entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação :attribute não coincide.',
    'date'                 => ':attribute não é uma data válida.',
    'date_format'          => 'O :attribute não coincide com o formato :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve ser :digits digitos.',
    'digits_between'       => 'O :attribute deve ser entre :min e :max digitos.',
    'dimensions'           => 'O :attribute possui dimensões de imagem inválidas.',
    'distinct'             => 'O :attribute campo possui um valor duplicado.',
    'email'                => 'O :attribute deve ser um e-mail válido.',
    'exists'               => 'O selected :attribute is inválido.',
    'file'                 => 'O :attribute deve ser um ficheiro.',
    'filled'               => 'O campo :attribute deve possuir um valor.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço IP válido.',
    'ipv4'                 => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O :attribute deve ser uma JSON string válida.',
    'max'                  => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file'    => 'O :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O :attribute não pode ser maior que :max characters.',
        'array'   => 'O :attribute não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um ficheiro do tipo: :valores.',
    'mimetypes'            => 'O :attribute deve ser um ficheiro do tipo: :valores.',
    'min'                  => [
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'file'    => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ter pelo menos :min characters.',
        'array'   => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O selected :attribute é inválido.',
    'numeric'              => 'O :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O :attribute é um formato inválido.',
    'required'             => 'O :attribute campo é necessário.',
    'required_if'          => 'O :attribute campo é necessário quando :other é :valor.',
    'required_unless'      => 'O :attribute campo é necessário a não ser que :other está em :valores.',
    'required_with'        => 'O :attribute campo é necessário quando :valores é present.',
    'required_with_all'    => 'O :attribute campo é necessário quando :valores é present.',
    'required_without'     => 'O :attribute campo é necessário quando :valores não está presente.',
    'required_without_all' => 'O :attribute campo é necessário quando nenhum :valores está presente.',
    'same'                 => 'O :attribute e :other devem coincidir.',
    'size'                 => [
        'numeric' => 'O :attribute deve ter :size.',
        'file'    => 'O :attribute deve ter :size kilobytes.',
        'string'  => 'O :attribute deve ter :size characters.',
        'array'   => 'O :attribute deve conter :size itens.',
    ],
    'string'               => 'O :attribute deve ser uma string.',
    'timezone'             => 'O :attribute deve ser uma zona valida.',
    'unique'               => 'O :attribute já foi escolhido.',
    'uploaded'             => 'O :attribute falhou ao fazer upload.',
    'url'                  => 'O :attribute é um formato inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

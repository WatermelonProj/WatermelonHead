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

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => ':attribute não é uma URL válida.',
    'after'                => ':attribute deve ser uma data depois de :date.',
    'alpha'                => ':attribute pode conter apenas letras',
    'alpha_dash'           => ':attribute pode conter apenas letras, números e traços.',
    'alpha_num'            => ':attribute pode conter apenas letras e números.',
    'array'                => ':attribute deve ser um vetor.',
    'before'               => ':attribute deve ser uma data antes de :date.',
    'between'              => [
        'numeric' => 'O valor de :attribute deve estar entre :min e :max.',
        'file'    => 'O tamanho de :attribute deve estar entre :min e :max kilobytes.',
        'string'  => ':attribute deve conter entre :min e :max caracteres.',
        'array'   => ':attribute deve conter entre :min e :max itens.',
    ],
    'boolean'              => ':attribute deve ser "true" ou "false".',
    'confirmed'            => ':attribute não confere com a confirmação.',
    'date'                 => ':attribute não é uma data válida.',
    'date_format'          => ':attribute não confere com o formato :format.',
    'different'            => ':attribute e :other devem ser diferentes.',
    'digits'               => ':attribute deve ser de :digits dígitos.',
    'digits_between'       => ':attribute deve estar entre :min e :max digitos.',
    'dimensions'           => ':attribute tem uma dimensão inválida.',
    'distinct'             => ':attribute tem um valor duplicado.',
    'email'                => ':attribute deve conter um endereço de email válido.',
    'exists'               => 'O :attribute é inválido.',
    'file'                 => ':attribute deve ser um arquivo.',
    'filled'               => ':attribute é obrigatório.',
    'image'                => ':attribute deve ser uma imagem.',
    'in'                   => 'O :attribute é inválido.',
    'in_array'             => ':attribute não existe em :other.',
    'integer'              => ':attribute deve ser inteiro.',
    'ip'                   => ':attribute deve ser um endereço IP válido.',
    'json'                 => ':attribute deve ser uma string JSON válida.',
    'max'                  => [
        'numeric' => ':attribute não pode ser maior que :max.',
        'file'    => ':attribute não pode ultrapassar :max kilobytes.',
        'string'  => ':attribute não pode ultrapassar :max caracteres.',
        'array'   => ':attribute não pode conter mais que :max itens.',
    ],
    'mimes'                => ':attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute deve ser no mínimo :min.',
        'file'    => ':attribute deve ser maior que :min kilobytes.',
        'string'  => ':attribute deve conter ao menos :min caracteres.',
        'array'   => ':attribute deve conter ao menos :min itens.',
    ],
    'not_in'               => ':attribute é inválido.',
    'numeric'              => ':attribute deve ser um número.',
    'present'              => ':attribute deve estar presente.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => ':attribute é obrigatório.',
    'required_if'          => ':attribute é obrigatório quando :other é :value.',
    'required_unless'      => ':attribute é obrigatório ao menos que :other esteja em :values.',
    'required_with'        => ':attribute é obrigatório algum desses valores esteja presente: :values',
    'required_with_all'    => ':attribute é obrigatório quando todos esses valores estejam presentes: :values',
    'required_without'     => ':attribute é obrigatório quando algum desses valores não estejam presentes: :values',
    'required_without_all' => ':attribute é obrigatório quando nenhum desses valores estejam presentes: :values',
    'same'                 => ':attribute e :other devem combinar.',
    'size'                 => [
        'numeric' => ':attribute deve ser :size.',
        'file'    => ':attribute deve ser de :size kilobytes.',
        'string'  => ':attribute deve conter :size caracteres.',
        'array'   => ':attribute deve conter :size itens.',
    ],
    'string'               => ':attribute deve ser uma string.',
    'timezone'             => ':attribute deve ser uma timezone válida.',
    'unique'               => 'O valor de :attribute deve ser único, porém, o valor atual já foi selecionado.',
    'url'                  => 'O formato de :attribute é inválido.',

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

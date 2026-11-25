<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'string' => 'O campo :attribute deve ser texto.',
    'email' => 'O campo :attribute deve conter um email válido.',
    'max' => [
        'string' => 'O campo :attribute não pode ter mais de :max caracteres.',
    ],
    'min' => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],
    'confirmed' => 'A confirmação de :attribute não coincide.',
    'unique' => 'O valor indicado para :attribute já está a ser utilizado.',
    'current_password' => 'A palavra-passe atual está incorreta.',
    'attributes' => [
        'name' => 'nome',
        'email' => 'email',
        'password' => 'palavra-passe',
        'password_confirmation' => 'confirmação da palavra-passe',
    ],
];

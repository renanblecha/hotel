<?php

return [
    'requires_strong_password' => 'Sua senha deve ter no mínimo de 8 caracteres, deve conter ao menos uma letra maiúscula, uma minúscula, um número e um caracter especial.',
    'hotels_has_quartos_has_categorias' => [
        'error' => [
//            'unique' => 'A combinação [":hotel_id", ":quarto_id", ":categoria_id"] já existe',
            'unique' => 'A combinação hotel/quarto/categoria que deseja fazer já existe, tente outra configuração',
        ],
    ]
];

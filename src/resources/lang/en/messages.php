<?php

return [
    'hotels_has_quartos_has_categorias' => [
        'error' => [
            'unique' => 'The combination [":hotel_id", ":quarto_id", ":categoria_id"] already exists',
        ],
    ]
];

<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $register = [
        'nombre_usuario' => [
            'rules' => 'required|min_length[3]|is_unique[usuarios.nombre_usuario]',
            'errors' => [
                'required' => 'El nombre de usuario es obligatorio.',
                'min_length' => 'El nombre de usuario debe tener al menos 3 caracteres.',
                'is_unique' => 'El nombre de usuario ya está en uso. Por favor, elija otro nombre de usuario.'
            ]
        ],
        'correo_electronico' => [
            'rules' => 'required|valid_email|is_unique[usuarios.correo_electronico]',
            'errors' => [
                'required' => 'El correo electrónico es obligatorio.',
                'valid_email' => 'El correo electrónico no es válido.',
                'is_unique' => 'El correo electrónico ya está en uso. Por favor, elija otro correo electrónico.'
            ]
        ],
        'contrasena' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'La contraseña es obligatoria.',
                'min_length' => 'La contraseña debe tener al menos 6 caracteres.'
            ]
        ]
    ];
}

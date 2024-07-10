<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    public static function defaultPermissions()
    {
        return [
            [
                'title' => 'Painel',
                'items' => [
                    array('name' => 'dashboard_view', 'description' => 'Visualizar'),
                ]
            ],
            [
                'title' => 'Cadastros',
                'items' => [
                    [
                        'title' => 'Estados',
                        'items' => [
                            array('name' => 'states_view', 'description' => 'Visualizar'),
                            array('name' => 'states_create', 'description' => 'Criar'),
                            array('name' => 'states_edit', 'description' => 'Editar'),
                            array('name' => 'states_delete', 'description' => 'Deletar'),
                        ]
                    ],
                    [
                        'title' => 'Cidades',
                        'items' => [
                            array('name' => 'cities_view', 'description' => 'Visualizar'),
                            array('name' => 'cities_create', 'description' => 'Criar'),
                            array('name' => 'cities_edit', 'description' => 'Editar'),
                            array('name' => 'cities_delete', 'description' => 'Deletar'),
                        ]
                    ],
                    [
                        'title' => 'Mandatos',
                        'items' => [
                            array('name' => 'mandates_view', 'description' => 'Visualizar'),
                            array('name' => 'mandates_create', 'description' => 'Criar'),
                            array('name' => 'mandates_edit', 'description' => 'Editar'),
                            array('name' => 'mandates_delete', 'description' => 'Deletar'),
                        ]
                    ],
                ]
            ],
            [
                'title' => 'Gerencimento',
                'items' => [
                    [
                        'title' => 'Usuários',
                        'items' => [
                            array('name' => 'users_view', 'description' => 'Visualizar'),
                            array('name' => 'users_create', 'description' => 'Criar'),
                            array('name' => 'users_edit', 'description' => 'Editar'),
                            array('name' => 'users_delete', 'description' => 'Deletar'),
                        ]
                    ],
                    [
                        'title' => 'Atribuições',
                        'items' => [
                            array('name' => 'roles_view', 'description' => 'Visualizar'),
                            array('name' => 'roles_create', 'description' => 'Criar'),
                            array('name' => 'roles_edit', 'description' => 'Editar'),
                            array('name' => 'roles_delete', 'description' => 'Deletar'),
                        ]
                    ],
                    [
                        'title' => 'Permissões',
                        'items' => [
                            array('name' => 'permissions_view', 'description' => 'Visualizar'),
                            array('name' => 'permissions_create', 'description' => 'Criar'),
                            array('name' => 'permissions_edit', 'description' => 'Editar'),
                            array('name' => 'permissions_delete', 'description' => 'Deletar'),
                        ]
                    ]
                ]
            ],
        ];
    }
}

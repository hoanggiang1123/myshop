<?php 

    return [
        'url'=> [
            'prefix_admin'=>'Admin'
        ],
        'template' => [
            'button' => [
                'edit' => ['class'=> 'btn btn-success btn-sm btn-hg' , 'title'=> 'Edit'      , 'icon' => 'fa-pencil' , 'route-name' => '/form'],
                'delete' => ['class'=> 'btn btn-danger btn-delete btn-sm btn-hg' , 'title'=> 'Delete'      , 'icon' => 'fa-trash' , 'route-name' => '/delete'],
                'info' => ['class'=> 'btn btn-info btn-sm' , 'title'=> 'Info'      , 'icon' => 'fa-pencil' , 'route-name' => '/info'],
            ],
            
            'is_home' => [
                'yes' =>['name'=>'Hiển Thị','class'=>'btn btn-danger btn-sm'],
                'no' =>['name'=>'Không Hiển Thị','class'=>'btn btn-warning btn-sm'],
            ],
            'display'       => [
                'list'      => ['name'=> 'Danh sách'],
                'grid'      => ['name'=> 'Lưới'],
            ],
            'status' => [
                'active' => ['name'=> 'Bật', 'class'=>'btn btn-sm btn-success'],
                'inactive' => ['name'=> 'Tắt', 'class'=>'btn btn-sm btn-danger'],
            ]
        ],
        'config' => [
            'button' => [
                'category'  => ['edit', 'delete']
            ]
        ],
        'format' => [
            'long_time'    => 'H:m:s d/m/Y',
            'short_time'   => 'd/m/Y',
        ]
    ];
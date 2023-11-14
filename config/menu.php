<?php
return [
    [
        'name' => 'admin.home',
        'label' => 'Dashboard',
        'icon' => 'fa-home'
        
    ],
    [
        'name' => 'admin.category.list',
        'label' => 'Quản lý danh mục',
        'icon' => 'fa-th',
        'item'=> [
            [
                'name' => 'admin.category.list',
                'label' => 'Danh sách',
                'icon' => 'fa-circle-o'
            ],
            [
                'name' => 'admin.category.list',
                'label' => 'Thêm mới',
                'icon' => 'fa-circle-o'
            ]

        ]
    ],
    [
                'name' => 'admin.product.list',
                'label' => 'Quản lý sản phẩm',
                'icon' => 'fa-th',
                'item'=> [
                    [
                        'name' => 'admin.product.list',
                        'label' => 'Danh sách',
                        'icon' => 'fa-circle-o'
                    ],
                    [
                        'name' => 'admin.product.create',
                        'label' => 'Thêm mới',
                        'icon' => 'fa-circle-o'
                    ]
        
                ]
                    ],
                    [
                        'name' => 'flash-sales.list',
                        'label' => 'Quản lý giảm giá',
                        'icon' => 'fa-th',
                        'item'=> [
                            [
                                'name' => 'flash-sales.list',
                                'label' => 'Danh sách',
                                'icon' => 'fa-circle-o'
                            ]
                         
                
                        ]
                    ]
]
?>
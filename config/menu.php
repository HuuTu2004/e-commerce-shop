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
        'name' => 'admin.product.list',
        'label' => 'Quản lý Đơn Hàng',
        'icon' => 'fa-th',
        'item'=> [
                [
                    'name' => 'orderDetail.index',
                    'label' => 'Danh sách ',
                    'icon' => 'fa-circle-o'
                ],
                [
                    'name' => 'orderDetail.trash',
                    'label' => 'Sản phẩm đã hủy ',
                    'icon' => 'fa-circle-o'
                ],
                
        
         ]
    ],
                    [
                        'name' => 'flash-sales.list',
                        'label' => 'Quản lý blog',
                        'icon' => 'fa-th',
                        'item'=> [
                            [
                                'name' => 'blog.list',
                                'label' => 'Danh sách',
                                'icon' => 'fa-circle-o'
                            ],
                            [
                                'name' => 'blog.create',
                                'label' => 'Thêm mới',
                                'icon' => 'fa-circle-o'
                            ]
                         
                
                        ]
                    ]
]
?>
<h1>this is routes.php</h1>
<?php
return [
    'login' => ['controller' => 'AuthController', 'method' => 'login'],
    'register' => ['controller' => 'AuthController', 'method' => 'register'],
    'logout' => ['controller' => 'AuthController', 'method' => 'logout'],

    'user/dashboard' => ['controller' => 'UserController', 'method' => 'dashboard'],
    'user/update-profile' => ['controller' => 'UserController', 'method' => 'updateProfile'],
    'user/order-history' => ['controller' => 'UserController', 'method' => 'orderHistory'],
    'user/add-to-cart' => ['controller' => 'UserController', 'method' => 'addToCart'],

    'admin/dashboard' => ['controller' => 'AdminController', 'method' => 'dashboard'],
    'admin/manage-users' => ['controller' => 'AdminController', 'method' => 'manageUsers'],
    'admin/delete-user' => ['controller' => 'AdminController', 'method' => 'deleteUser'],
    'admin/manage-reviews' => ['controller' => 'AdminController', 'method' => 'manageReviews'],
    'admin/delete-product' => ['controller' => 'AdminController', 'method' => 'deleteProduct'],

    'store/search' => ['controller' => 'StoreController', 'method' => 'search'],
    'store/detail' => ['controller' => 'StoreController', 'method' => 'detail'],
    'product/list' => ['controller' => 'ProductController', 'method' => 'list'],
    'product/detail' => ['controller' => 'ProductController', 'method' => 'detail'],
    'cart/view' => ['controller' => 'CartController', 'method' => 'view'],
    'order/checkout' => ['controller' => 'OrderController', 'method' => 'checkout'],
    'review/view' => ['controller' => 'ReviewController', 'method' => 'view'],
    'review/write' => ['controller' => 'ReviewController', 'method' => 'write'],
];

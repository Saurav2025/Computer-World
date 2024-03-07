<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'admin');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/admin/');
define('SITE_PATH', 'http://localhost/admin/');

define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'media/product/');

define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH', SERVER_PATH . 'media/product_images/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH', SITE_PATH . 'media/product_images/');

define('BANNER_IMAGE_SERVER_PATH', SERVER_PATH . 'media/banner/');
define('BANNER_IMAGE_SITE_PATH', SITE_PATH . 'media/banner/');

define('SHIPROCKET_TOKEN_EMAIL', 'saurab.j111@gmail.com');
define('SHIPROCKET_TOKEN_PASSWORD', 'Saurav@65');

if ($conn == false) {
    die('Error:Cannot Connect');
}

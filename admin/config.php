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

define('SMTP_EMAIL', 'sauravproject855@gmail.com');
define('SMTP_PASSWORD', 'Saurav18052');

define('INSTAMOJO_KEY', 'test_0c1b1866832591cb3bab8476589');
define('INSTAMOJO_TOKEN', 'test_c7d7c7bfd47907958cbcc7a9dd8');

define('SMS_KEY', '');

if ($conn == false) {
    die('Error:Cannot Connect');
}
?>
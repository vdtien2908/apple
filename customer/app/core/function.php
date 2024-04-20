<?php
class Func
{

    private $url;

    public function __construct()
    {
        if (isset($_REQUEST['url'])) {
            $this->url =  explode('/', filter_var(trim($_REQUEST['url'], '/')));
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    function handleActive($name)
    {
        if (empty($this->url)) {
            $display = 'active';
        }
        if ($this->url[0] == $name) {
            $active = 'active';
        }

        return ['active' => $active, 'display' => $display];
    }

    function setRootPath()
    {
        define('SCRIPT_ROOT', 'http://localhost/apple/customer/public');
        define('IMAGES_PATH', 'http://localhost/apple/product_img');
        define('URL_APP', 'http://localhost/apple/customer');
    }
}

<?php
class AboutController extends BaseController
{
    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'about/index',
                'title' => 'Trang Blog',
            ]
        );
    }
}

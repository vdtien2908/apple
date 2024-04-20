<?php
class BlogController extends BaseController
{
    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'blog/index',
                'title' => 'Trang Blog',
            ]
        );
    }
}

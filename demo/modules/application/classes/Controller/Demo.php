<?php defined('SYSPATH') or die('No direct script access.');

use Demo\User\UserService;

class Controller_Demo extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function action_index()
    {
        $this->response->body(get_class($this->userService));
    }
}

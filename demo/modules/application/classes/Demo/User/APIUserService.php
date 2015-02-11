<?php

namespace Demo\User;

/**
 * This is a UserSerivice that uses a 3rd party service to manage our users
 */
class APIUserService implements UserService
{
    public function addUser($username, $password)
    {
        // request an api to a 3rd party user management service
    }
}

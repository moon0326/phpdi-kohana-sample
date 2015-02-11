<?php

namespace Demo\User;

/**
 * This interface simply defines how a client of a UserService
 * should consume its APIs
 */
interface UserService
{
    /**
     * Add a user to a persistence store
     * It can be a third party service, mysql, mongo, whatever you decide
     */
    public function addUser($username, $password);
}

<?php

use Response\Response;

abstract class Controller
{
    public Response $response;

    /**
     * Default method for all controllers. If no method is defined in the path, this will be run.
     */
    abstract public function index();

    public function __construct()
    {
        $this->response = new Response();
    }
}

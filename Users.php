<?php

    function get_users()
    {
        $params = $_REQUEST;
        response($params);
    }

    function post_users()
    {
        $params = file_get_contents('php://input');
        $params = json_decode($params, true);
        response($params, 201);
    }
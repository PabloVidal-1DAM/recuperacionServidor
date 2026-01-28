<?php

namespace App\Interface;

interface ControllerInterface
{
    function index();

    function create();

    function update();

    function delete();

    function show($id);

    function showAll();
}
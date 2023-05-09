<?php

namespace Controller;

use Model\Connect;

class homeController
{

    function displayHome()
    {
        require 'view/home.php';
    }

    function displayAbout()
    {
        require 'view/about.php';
    }

    function displayContact()
    {
        require 'view/contact.php';
    }
}

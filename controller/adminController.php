<?php

namespace Controller;

use Model\Connect;

class adminController
{
    function displayDashboard()
    {
        require 'view/dashboardCreate.php';
    }
}

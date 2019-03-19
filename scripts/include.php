<?php

define('BASE_PATH', '../src');

$settings = require BASE_PATH . '/src/settings.php';

// Load db class
require BASE_PATH . '/src/db.php';

//Load models
require BASE_PATH . '/models/Model.class.php';
require BASE_PATH . '/models/GoogleGeo.class.php';
require BASE_PATH . '/models/User.class.php';
require BASE_PATH . '/models/Room.class.php';
require BASE_PATH . '/models/Bed.class.php';
require BASE_PATH . '/models/Apartment.class.php';


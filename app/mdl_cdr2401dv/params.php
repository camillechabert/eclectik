<?php

define('DEV_ENV', true);

if (DEV_ENV == true) {
    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '2401cc');
    define('DBNAME', 'eclectik');
} else {
    define('SERVER', 'mon.domaine.fr');
    define('USERNAME', 'userdifficilealire');
    define('PASSWORD', 'motdepasseelabore12345');
    define('DBNAME', 'nomdelabasesql');
}
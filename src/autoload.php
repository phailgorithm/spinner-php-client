<?php

spl_autoload_register(
    function ($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'phailgorithm\\spinnerclient\\v1\\repositories\\spinnerrepository' => '/v1/Repositories/SpinnerRepository.php',
                'phailgorithm\\spinnerclient\\v1\\client' => '/v1/Client.php',
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);

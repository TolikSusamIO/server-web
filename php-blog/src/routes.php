<?php

return [

    '~^hello/(.+)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],

    '~^bye/(.+)$~' => [\MyProject\Controllers\MainController::class, 'sayBye'],

    '~^about-me$~' => [\MyProject\Controllers\MainController::class, 'aboutMe'],

    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],

    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
];

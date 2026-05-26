<?php

return [
    '~^hello/(.+)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.+)$~' => [\MyProject\Controllers\MainController::class, 'sayBye'],
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];

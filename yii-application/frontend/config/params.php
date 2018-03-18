<?php
return [
    'adminEmail' => 'admin@example.com',
    'shortTextLimit' => 20,
    'maxFileSize' => 1024 * 1024 * 2, // 2 megabites
    'storagePath' => '@frontend/web/uploads/',
    'storageUri' => '/uploads/',

    // Настройки могут быть вложенными
    'postPicture' => [
        'maxWidth' => 800,
        'maxHeight' => 600,
    ],

];

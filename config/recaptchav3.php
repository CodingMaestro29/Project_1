<?php
return [
    'origin' => env('RECAPTCHAV3_ORIGIN', 'https://www.google.com/recaptcha'),
    'sitekey' => env('RECAPTCHAV3_SITEKEY', '6Lfv75QpAAAAAEYsclEvPz89cF11XpMI_5tcrdWW'),
    'secret' => env('RECAPTCHAV3_SECRET', '6Lfv75QpAAAAAPvKBfBEomkXesAClBRvo2SkGuoJ'),
    'locale' => env('RECAPTCHAV3_LOCALE', app()->getLocale())
];

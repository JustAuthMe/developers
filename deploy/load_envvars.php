<?php


$env_vars = [
    "APP_URL" => "string",

    "JAM_CORE" => "string",
    "JAM_CORE_API" => "string",
    "JAM_CORE_KEY" => "string",
    "JAM_STATIC" => "string",
    "JAM_STATIC_KEY" => "string",
    "JAM_REDIRECT_URL" => "string",
    "JAM_SECRET_KEY" => "string",
    "JAM_APP_ID" => "string",
    "DEFAULT_APP_LOGO" => "string",

    "DB_CONNECTION" => "string",
    "DB_HOST" => "string",
    "DB_PORT" => "string",
    "DB_DATABASE" => "string",
    "DB_USERNAME" => "string",
    "DB_PASSWORD" => "string",

    'DEPLOYED_REF' => 'CI_COMMIT_REF_NAME',
    'DEPLOYED_COMMIT' => 'CI_COMMIT_SHA',
];

$env_prefix = getenv('ENV_PREFIX');
$config_output = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '../.env.common') . "\n";


foreach ($env_vars as $KEY => $type){


    switch($type){
        case 'string':
            $raw_value = getenv($env_prefix.$KEY);
            $value = count(explode(" ", $raw_value)) > 1 ? "\"$raw_value\"" : $raw_value;
            $config_output .= "$KEY=$value\n";
            // test => test
            // test test => "test test"
            break;
        default:
            $config_output .= "$KEY='" . addcslashes(getenv($type), "'") . "'\n";
            break;
    }
}

echo $config_output;
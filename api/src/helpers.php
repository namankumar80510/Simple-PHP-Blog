<?php

use App\Libraries\API\ApiDataLibrary;
use App\Libraries\Config\Config;
use League\Plates\Engine;

function view(string $template, array $data = []): string
{
    return new Engine(__DIR__ . '/Views')->render($template, $data);
}

function config(string $key, $default = null)
{
    return new Config()->get($key, $default);
}

function vite_assets()
{
    $config = config('assets');
    if (ENV == 'prod') {
        echo <<<HTML
        <link rel="stylesheet" href="{$config['prod']['css']}">
        <script type="module" crossorigin src="{$config['prod']['js']}"></script>
        HTML;
    } else {
        echo <<<HTML
        <script type="module" src="{$config['dev']['client']}"></script>
        <script type="module" src="{$config['dev']['js']}"></script>
        HTML;
    }
}

function replace_accents($str)
{
    $str = htmlentities($str, ENT_COMPAT, "UTF-8");
    $str = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $str);
    return html_entity_decode($str);
}

function slug($string)
{
    $slug = trim($string); // trim the string
    $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug);
    $slug = str_replace(' ', '-', $slug);
    $slug = strtolower(replace_accents($slug));
    $slug = substr($slug, 0, 100);

    return $slug;
}
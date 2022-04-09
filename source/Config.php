<?php
const URL_BASE = "http://localhost/CadastroPacientes";

function url(string $uri = null):string
{
    if($uri) {
        return URL_BASE . "/{$uri}";
    }
    return URL_BASE;
}

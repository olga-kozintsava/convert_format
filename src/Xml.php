<?php

declare(strict_types=1);

namespace FileConverter;

class Xml extends Manager
{
    public function read()
    {
        return simplexml_load_string('t.xml');
    }
}
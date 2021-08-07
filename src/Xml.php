<?php

declare(strict_types=1);

namespace FileConverter;

use SimpleXMLElement;

class Xml extends Manager
{
    public function read():array
    {
        $contents = $this->file->fread($this->file->getSize());
        return (array)simplexml_load_string($contents);
    }

    public function write(array $content, $xml = false): void
    {
        if($xml === false){
            $xml = new SimpleXMLElement('<root/>');
        }
        foreach($content as $key => $value){
            if(is_array($value)){
                $this->write($value, $xml->addChild($key));
            }else{
                $xml->addChild($key, $value);
            }
        }
        file_put_contents($this->outputFilePath, $xml->asXML());
    }
}
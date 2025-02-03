<?php

namespace App\Types\Gedcom;

use Gedcom\Record\Indi\Famc as IndiFamc;

class Famc extends IndiFamc{
    private string $id = '';

    public function __construct(IndiFamc $famc) {
        $this->id = $famc->_famc;
    }

    public function getId(): string{
        return $this->id;
    }
}
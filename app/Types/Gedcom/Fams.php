<?php

namespace App\Types\Gedcom;

use Gedcom\Record\Indi\Fams as IndiFams;

class Fams extends IndiFams{
    private string $id = '';

    public function __construct(IndiFams $famc) {
        $this->id = $famc->_fams;
    }

    public function getId(): string{
        return $this->id;
    }
}
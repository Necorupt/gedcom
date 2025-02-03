<?php

namespace App\Types\Gedcom;

class GedcomRegistry {
    /**
     * @var GedcomNode[] $indi
     */
    private array $indi;
    /**
     * @var GedcomFamily[] $families
     */
    private array $families;
    
    public function __construct() {
        $this->indi = [];
        $this->families = [];
    }

    public function addIndividual(GedcomNode $node): void {
        $this->indi[$node->getId()] = $node;
    }

    public function addFamily(GedcomFamily $family): void {
        $this->families[$family->getId()] = $family;
    }

    public function getIndividual(string $id): GedcomNode|null {
        return $this->indi[$id]?? null;
    }

    public function getFamily(string $id): GedcomFamily|null {
        return $this->families[$id]?? null;
    }
}
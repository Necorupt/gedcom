<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FamilyTree extends Model
{
    protected $fillable = ['name'];

    public function nodes(): HasMany{
        return $this->hasMany(FamilyTreeNode::class);
    }
}

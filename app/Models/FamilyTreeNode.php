<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyTreeNode extends Model
{
    protected $fillable = ['family_tree_id'];

    public function tree(): BelongsTo{
        return $this->belongsTo(FamilyTree::class);
    }
}

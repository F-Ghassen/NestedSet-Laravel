<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SelfReferenceTrait;
use Kalnoy\Nestedset\NodeTrait;

class ArticleRelation extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = ['relation_id', 'relation_type'];

}

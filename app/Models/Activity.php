<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    use UsesUuid;

    protected $fillable = [
        "id",
        "name",
        "type",
        "description",
    ];

    protected $table = "activity";

    public $timestamps = true;
}

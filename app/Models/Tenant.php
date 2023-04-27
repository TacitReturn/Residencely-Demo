<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static make(array $array)
 * @method static create(array $array)
 */
class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "user_id",
        "property_id"

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

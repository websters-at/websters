<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsitePackage extends Model
{
    protected $fillable = [
        "name",
        "email",
        "company",
        "message",
        "package"
    ];
}

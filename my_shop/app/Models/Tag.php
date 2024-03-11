<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function mb_ucfirst($string) : string
    {
        $firstChar = mb_substr($string, 0, 1);
        $then = mb_substr($string, 1, null);
        return mb_strtoupper($firstChar) . $then;
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $this->mb_ucfirst($value),
            set: fn(string $value) => mb_strtolower($value)
        );
    }
}

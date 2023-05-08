<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $appends = ['full_name'];
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function setFullNameAttribute($value)
    {
        $names = explode(" ", $value);
        if (count($names) > 1) {
            $this->first_name = $names[0];
            $this->last_name = $names[1];
            return;
        }
        $this->first_name = $value;
        $this->last_name = $value;
    }

    public function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtolower($value) == 'm' ? 'Male' : 'Female',
            set: fn ($value) => strtolower($value) == 'male' ? 'm' : 'f'
        );
    }
}

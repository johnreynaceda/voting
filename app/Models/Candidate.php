<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function position()
    {
        return $this->hasOne(Position::class, "id", "position_id");
    }
    public function partylist()
    {
        return $this->belongsTo(Partylist::class);
    }
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}

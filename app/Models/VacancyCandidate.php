<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCandidate extends Model
{
    use HasFactory;

    
    public function documents() {
        return $this->hasMany(VacancyCandidateUpload::class,"vacancy_candidate_id");
    }

    public function posts() {
        return $this->hasMany(Post::class,'vacancy_candidate_id');
    }
}

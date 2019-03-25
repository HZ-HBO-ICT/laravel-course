<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Assignment extends Model
{
    // // mass assigned
    protected $fillable = [
        'project_name', 'image_url', 'description'
    ];

    public function numberOfDays(){
        //get the start_date attribute of Assignment
        $start = $this->start_date;
        //get the end_date attribute of Assignment
        $end = $this->end_date;
        $difference = Carbon::parse($start)->diff(Carbon::parse($end));
        return $difference;
    }
}

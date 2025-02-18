<?php

namespace App\Models\Youtube;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    protected $table = 'views';
    protected $fillable = ['views', 'views_label', 'watch_hrs', 'watch_hrs_label', 'subscribers', 'subscribers_label', 'new_data', 'new_data_label', 'duration', 'graph_data'];
}

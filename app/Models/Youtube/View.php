<?php

namespace App\Models\Youtube;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    protected $table = 'views';
    protected $fillable = ['client_id', 'views', 'views_label', 'watch_hrs', 'watch_hrs_label', 'watch_hrs_status', 'subscribers', 'subscribers_label', 'subscribers_status', 'new_data', 'new_data_label', 'duration', 'views_graph_data', 'watch_time_graph_data', 'subscribers_graph_data', 'new_data_graph_data'];
}

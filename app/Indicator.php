<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicator';
    protected $fillable = [
        'name', 'label', 'unit_label', 'is_parent'
    ];
    public function reportTemplates()
    {
        return $this->belongsToMany(App\Http\Models\ReportTemplate::class, 'report_indicator_map');
    }
}

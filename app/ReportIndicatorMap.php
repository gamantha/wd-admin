<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportIndicatorMap extends Model
{
    public $timestamps = false;
    protected $table = 'report_indicator_map';
    protected $fillable = [
        'indicator_id', 'report_template_id', 'order'
    ];
    public function reportTemplate()
    {
        return $this->hasOne(ReportTemplate::class, 'id', 'report_template_id');
    }
    public function indicator()
    {
        return $this->hasOne(Indicator::class, 'id', 'indicator_id');
    }

    public function category()
    {
        return $this->hasOne(IndicatorCategory::class, 'id', 'category_id');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndicatorCategory;
use App\ReportTemplate;
use App\Indicator;
use App\ReportIndicatorMap;

class MappingController extends Controller
{
    public function index()
    {
        $mappings =  ReportIndicatorMap::with('indicator', 'category', 'reportTemplate')->get();

        $dataMapping = [];
        foreach($mappings as $mapping) {
            $data = [];
            $data['indicatorName'] = $mapping->indicator->name;
            $data['categoryName'] = $mapping->category->name;
            $data['templateName'] = $mapping->reportTemplate->name;
            $data['order'] = $mapping->order;
            $dataMapping[] = $data;
        }
        return view('mapping.index', ['mapping' => $dataMapping]);
    }

    public function add()
    {
        $categorys =  IndicatorCategory::get();
        $indicators =  Indicator::get();
        $templates =  ReportTemplate::get();

        return view('mapping.add', ['categorys' => $categorys, 'indicators' => $indicators, 'templates' => $templates]);
    }

    public function store(Request $request)
    {
        try {
            $lastId = ReportIndicatorMap::latest('order')->first();

            $mapping = new ReportIndicatorMap();
            $mapping->indicator_id = $request->indicator;
            $mapping->category_id = $request->category;
            $mapping->report_template_id = $request->template;
            $mapping->order = $lastId->order + 1;
            $mapping->save();

            return redirect('/admin/mapping/')->with('status', 'Success create template ' . $request->name);
        } catch (\Exception $e) {
            return redirect('/admin/mapping/add')->with('error', $e->getMessage());
        }
    }

    public function del($indicator, $category, $template)
    {
        ReportIndicatorMap::whereIn(['indicator_id' => $indicator, 'category_id' => $category, 'report_template_id' => $template])->delete();
        return redirect('/admin/mapping/')->with('status', 'Success delete mapping ');
    }
}

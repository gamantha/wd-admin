<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportTemplate;

class ReportTemplateController extends Controller
{
    public function index()
    {
        $templates =  ReportTemplate::get();
        return view('report-template.index', ['templates' => $templates]);
    }

    public function add()
    {
        return view('report-template.add');
    }

    public function store(Request $request)
    {
        try {
            $template = new ReportTemplate();
            $template->name = $request->name;
            $template->label = $request->label;
            $template->author_id = 'admin';
            $template->report_type = $request->type;
            $template->save();

            return redirect('/admin/report-template/')->with('status', 'Success create report template ' . $request->name);
        } catch (\Exception $e) {
            return redirect('/admin/report-template/add')->with('error', $e->getMessage());
        }
    }

    public function del($id)
    {
        ReportTemplate::where(['id' => $id])->delete();
        return redirect('/admin/report-template/')->with('status', 'Success delete report template ');
    }
}

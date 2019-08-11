<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicator;

class IndicatorController extends Controller
{
    public function index()
    {
        $indicators =  Indicator::get();
        return view('indicator.index', ['indicators' => $indicators]);
    }

    public function add()
    {
        $indicators =  Indicator::where('indicator_parent_id', 0)->get();
        return view('indicator.add', ['indicators' => $indicators]);
    }

    public function store(Request $request)
    {
        try {
            $indicator = new Indicator();
            $indicator->name = $request->name;
            $indicator->label = $request->label;
            $indicator->unit_label = $request->unit_label;
            $indicator->indicator_parent_id = $request->parent ?: 0;
            $indicator->is_parent = $request->parent == 0 ? 1 : $request->is_parent;
            $indicator->save();

            return redirect('/admin/indicator/')->with('status', 'Success create indicator ' . $request->name);
        } catch (\Exception $e) {
            return redirect('/admin/indicator/add')->with('error', $e->getMessage());
        }
    }

    public function del($id)
    {
        Indicator::where(['id' => $id])->delete();
        return redirect('/admin/indicator/')->with('status', 'Success delete indicator ' . $id);
    }
}

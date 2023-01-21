<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMyPlanRequest;
use App\Http\Requests\StoreMyPlanRequest;
use App\Http\Requests\UpdateMyPlanRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MyPlanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('my_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myPlans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('my_plan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myPlans.create');
    }

    public function store(StoreMyPlanRequest $request)
    {
        $myPlan = MyPlan::create($request->all());

        return redirect()->route('admin.my-plans.index');
    }

    public function edit(MyPlan $myPlan)
    {
        abort_if(Gate::denies('my_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myPlans.edit', compact('myPlan'));
    }

    public function update(UpdateMyPlanRequest $request, MyPlan $myPlan)
    {
        $myPlan->update($request->all());

        return redirect()->route('admin.my-plans.index');
    }

    public function show(MyPlan $myPlan)
    {
        abort_if(Gate::denies('my_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myPlans.show', compact('myPlan'));
    }

    public function destroy(MyPlan $myPlan)
    {
        abort_if(Gate::denies('my_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $myPlan->delete();

        return back();
    }

    public function massDestroy(MassDestroyMyPlanRequest $request)
    {
        MyPlan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

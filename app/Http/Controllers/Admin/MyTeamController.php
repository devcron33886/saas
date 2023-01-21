<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMyTeamRequest;
use App\Http\Requests\StoreMyTeamRequest;
use App\Http\Requests\UpdateMyTeamRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MyTeamController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('my_team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myTeams.index');
    }

    public function create()
    {
        abort_if(Gate::denies('my_team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myTeams.create');
    }

    public function store(StoreMyTeamRequest $request)
    {
        $myTeam = MyTeam::create($request->all());

        return redirect()->route('admin.my-teams.index');
    }

    public function edit(MyTeam $myTeam)
    {
        abort_if(Gate::denies('my_team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myTeams.edit', compact('myTeam'));
    }

    public function update(UpdateMyTeamRequest $request, MyTeam $myTeam)
    {
        $myTeam->update($request->all());

        return redirect()->route('admin.my-teams.index');
    }

    public function show(MyTeam $myTeam)
    {
        abort_if(Gate::denies('my_team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myTeams.show', compact('myTeam'));
    }

    public function destroy(MyTeam $myTeam)
    {
        abort_if(Gate::denies('my_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $myTeam->delete();

        return back();
    }

    public function massDestroy(MassDestroyMyTeamRequest $request)
    {
        MyTeam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

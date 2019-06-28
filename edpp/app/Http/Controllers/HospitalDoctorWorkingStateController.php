<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hospital;
use App\User;
use App\working_state;

class HospitalDoctorWorkingStateController extends Controller
{
    //

    //doctor woking states
    public function allWorkingStates()
    {
        $user_id = Auth::user()->id;
        $hospital_id = User::find($user_id)->hospital->id;
        $working_states = working_state::where('hospital_id', $hospital_id)->get();

        return view('hospital.working_state.all_working_states', compact('working_states'));
    }

    public function activeWorkingStates()
    {

        $morning_actives = working_state::where([['m_status', '=', 'active'], ['m_visit_s', '<>', 'null']])->get();
        $afternoon_actives = working_state::where([['a_status', '=', 'active'], ['a_visit_s', '<>', 'null'],])->get();
        $evening_actives = working_state::where([['e_status', '=', 'active'], ['e_visit_s', '<>', 'null'],])->get();
        return view(
            'hospital.working_state.active_working_states',
            compact('morning_actives', 'afternoon_actives', 'evening_actives')
        );
    }

    public function inactiveWorkingStates()
    {
        $morning_inactives = working_state::where('m_status', '=', 'inactive')->get();
        $afternoon_inactives = working_state::where('a_status', '=', 'inactive')->get();
        $evening_inactives = working_state::where('e_status', '=', 'inactive')->get();

        return view(
            'hospital.working_state.inactive_working_states',
            compact(['morning_inactives', 'afternoon_inactives', 'evening_inactives'])
        );
    }

    //set working state inactive
    public function stateInactive($id, $state)
    {

        $ws = working_state::findOrFail($id);

        if ($state == 'morning')
            $ws->m_status = 'inactive';
        elseif ($state == 'afternoon')
            $ws->a_status = 'inactive';
        else
            $ws->e_status = 'inactive';

        $ws->save();
        return back()->with('info', 'This working state is inactive now!');
    }

    //set working state active
    public function stateActive($id, $state)
    {
        $ws = working_state::findOrFail($id);

        if ($state == 'morning')
            $ws->m_status = 'active';
        elseif ($state == 'afternoon')
            $ws->a_status = 'active';
        else
            $ws->e_status = 'active';

        $ws->save();
        return back()->with('info', 'This working state is inactive now!');
    }

}

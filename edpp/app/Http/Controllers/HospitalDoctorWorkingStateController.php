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

    public function __construct()
    {
        return $this->middleware(['isHospital', 'auth']);
    }

    //doctor woking states
    public function allWorkingStates()
    {
        $user_id = Auth::user()->id;
        $hospital_id = User::find($user_id)->hospital->id;
        $working_states = working_state::where('hospital_id', $hospital_id)->get();

        return view('hospital.working_state.all_working_states', compact('working_states'));
    }

    public function workingStateRequests()
    {
        $user_id = Auth::user()->id;
        $hospital_id = User::find($user_id)->hospital->id;

        // active requests
        $morning_active_requests = working_state::where([['m_status', '=', 'active-request'], ['m_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();
        $afternoon_active_requests = working_state::where([['a_status', '=', 'active-request'], ['a_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();
        $evening_active_requests = working_state::where([['e_status', '=', 'active-request'], ['e_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();

        //inactive requests
        $morning_inactive_requests = working_state::where([['m_status', '=', 'inactive-request'], ['m_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();
        $afternoon_inactive_requests = working_state::where([['a_status', '=', 'inactive-request'], ['a_visit_s', '<>', 'null'],  ['hospital_id', '=', $hospital_id]])->get();
        $evening_inactive_requests = working_state::where([['e_status', '=', 'inactive-request'], ['e_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();

        return view(
            'hospital.working_state.working_state_requests',
            compact(
                'morning_active_requests',
                'afternoon_active_requests',
                'evening_active_requests',
                'morning_inactive_requests',
                'afternoon_inactive_requests',
                'evening_inactive_requests'
            )
        );
    }

    public function activeWorkingStates()
    {

        $user_id = Auth::user()->id;
        $hospital_id = User::find($user_id)->hospital->id;

        $morning_actives = working_state::where([['m_status', '=', 'active'], ['m_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();
        $afternoon_actives = working_state::where([['a_status', '=', 'active'], ['a_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();
        $evening_actives = working_state::where([['e_status', '=', 'active'], ['e_visit_s', '<>', 'null'], ['hospital_id', '=', $hospital_id]])->get();
        return view(
            'hospital.working_state.active_working_states',
            compact('morning_actives', 'afternoon_actives', 'evening_actives')
        );
    }

    public function inactiveWorkingStates()
    {
        $user_id = Auth::user()->id;
        $hospital_id = User::find($user_id)->hospital->id;

        $morning_inactives = working_state::where([['m_status', '=', 'inactive'], ['hospital_id', '=', $hospital_id]])->get();
        $afternoon_inactives = working_state::where([['a_status', '=', 'inactive'], ['hospital_id', '=', $hospital_id]])->get();
        $evening_inactives = working_state::where([['e_status', '=', 'inactive'], ['hospital_id', '=', $hospital_id]])->get();

        return view(
            'hospital.working_state.inactive_working_states',
            compact(['morning_inactives', 'afternoon_inactives', 'evening_inactives'])
        );
    }

    //rejected working states
    public function rejectedWorkingStates()
    {
        $user_id = Auth::user()->id;
        $hospital_id = User::find($user_id)->hospital->id;

        $m_rejected = working_state::where([['m_status', '=', 'm-reject'], ['hospital_id', '=', $hospital_id]])->get();
        $a_rejected = working_state::where([['a_status', '=', 'a-reject'], ['hospital_id', '=', $hospital_id]])->get();
        $e_rejected = working_state::where([['e_status', '=', 'e-reject'], ['hospital_id', '=', $hospital_id]])->get();

        return view(
            'hospital.working_state.rejected_working_states',
            compact('m_rejected', 'a_rejected', 'e_rejected')
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

    //set working state reject
    public function stateReject($id, $r_state)
    {

        $ws = working_state::findOrFail($id);

        if ($r_state == 'm-reject')
            $ws->m_status = 'm-reject';
        elseif ($r_state == 'a-reject')
            $ws->a_status = 'a-reject';
        else
            $ws->e_status = 'e-reject';

        $ws->save();
        return back()->with('info', 'This working state is rejected!');
    }
}

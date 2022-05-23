<?php
class AdminController extends Controller
{
    function edit_events(Request $request){
        $id = $request->route('id');
        $event = DB::select('select * from event where event_id = "' . $id . '"');
        return view('admin.view_event')->with('event', $event);
    }

    function edit_event(Request $request)
    {
        $query = DB::table('event')
            ->where(
                'event_id',
                $request->input('id')
            )
            ->update([
                "install_date" => $request->input('install_date'),
                "install_time" => $request->input('install_time'),
                "pic_id" => $request->input('pic_id'),
                "pic_name" => $request->input('pic_name'),
                "device_id" => $request->input('device_id'),
                "location_id" => $request->input('location_id'),
                "reading_id" => $request->input('reading_id'),
                "status_id" => $request->input('status_id')
            ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully updated');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function view_events()
    {
        $data = array(
            'list' => DB::table('event')->get()
        );
        return view('admin.view_events', $data);
    }
}
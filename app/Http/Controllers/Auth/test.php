<?php
class AdminController extends Controller
{
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
                "device_id" => $request->input('device_id')
            ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully updated');
        } else {
            // return $query;
            return back()->with('fail', 'Something went wrong');
        }
    }
}
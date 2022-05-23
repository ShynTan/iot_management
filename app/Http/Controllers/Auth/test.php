<?php
class EventController extends Controller
{
public function add_event(Request $request)
{
    $query = DB::table('event')->insert([
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
        return back()->with('success', 'Record has been successfully inserted');
    } else {
        return back()->with('fail', 'Something went wrong');
    }
}
}
<?php
class AdminController extends Controller
{
    function addDeviceTypeAction(Request $request)
    {
        $query = DB::table('device_type')->insert([
            "device_type" => $request->input('device_type'),
        ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function addDeviceTypeView()
    {
        return view('admin.add_device_type');
    }
}
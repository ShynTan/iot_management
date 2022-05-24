<?php
class AdminController extends Controller
{
    function addDeviceUnitAction(Request $request)
    {
        $query = DB::table('device_unit')->insert([
            "device_unit" => $request->input('device_unit'),
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
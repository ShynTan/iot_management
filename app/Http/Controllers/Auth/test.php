<?php
class AdminController extends Controller
{
    function edit_device(Request $request)
    {
        $query = DB::table('devices')
            ->where(
                'id',
                $request->input('id')
            )
            ->update([
                "device_id" => $request->input('device_id'),
                "device_type" => $request->input('device_type'),
                "device_unit" => $request->input('device_unit'),
                "device_reading" => $request->input('device_reading'),
                "device_location" => $request->input('device_location'),
                "floor_level" => $request->input('floor_level'),
                "window_id" => $request->input('window_id'),
                "door_id" => $request->input('door_id'),
                "device_status" => $request->input('device_status'),
                "device_health" => $request->input('device_health'),
                "device_uptime" => $request->input('device_uptime'),
                "device_ip" => $request->input('device_ip'),
                "device_subnet" => $request->input('device_subnet'),
                "user_id" => $request->input('user_id'),
                "device_name" => $request->input('device_name'),
                "updated_at" => date('Y-m-d')
            ]);

        if ($query) {
            return back()->with('success', 'Record has been successfully updated');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
<?php
class AdminController extends Controller
{
    function deleteDeviceHealth(Request $request){

        $id = $request->route('id');

        $res=DB::delete('delete from device_health where id = ?', [$id]);

        if($res){
            return back()->with('success', 'Device Health ID ' . $request->route('id') . " deleted!");
        }else{
            return back()->with('failed', 'something is wrong');
        }
    }
}
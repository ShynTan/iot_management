<?php
class AdminController extends Controller
{
    function deleteDeviceType(Request $request){

        $id = $request->route('id');

        $res=DB::delete('delete from device_type where device_type_id = ?', [$id]);

        if($res){
            return back()->with('success', 'Device Type ID ' . $request->route('id') . " deleted!");
        }else{
            echo 'haha' . $request->route('id');
        }
    }
}
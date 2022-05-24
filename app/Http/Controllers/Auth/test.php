<?php
class AdminController extends Controller
{
    function deleteDeviceUnit(Request $request){

        $id = $request->route('id');

        $res=DB::delete('delete from device_unit where id = ?', [$id]);

        if($res){
            return back()->with('success', 'Device Unit ID ' . $request->route('id') . " deleted!");
        }else{
            return back()->with('failed', 'something is wrong');
        }
    }
}
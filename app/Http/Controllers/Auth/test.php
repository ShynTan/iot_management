<?php
class AdminController extends Controller
{
    function archiveDeviceAction(Request $request){
        $id = $request->route('id');

        $res=DB::update("UPDATE devices SET archive = '1' WHERE device_id = ?;", [$id]);

        if($res){
            return back()->with('success', 'Device Type ID ' . $request->route('id') . " deleted!");
        }else{
            echo 'haha' . $request->route('id');
        }
    }
}
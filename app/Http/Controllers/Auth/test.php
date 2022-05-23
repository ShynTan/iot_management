<?php
class AdminController extends Controller
{
public function updateApprovalView(Request $request)
{
    $id = $request->route('id');
    $user = DB::select('select * from users where id = "' . $id . '"');
    return view('admin.userUpdate')->with('user', $user);
}

public function updateApproval(Request $request)
{
    $id = $request->input('id');
    $name = $request->input('name');
    $approval = $request->input('approval');
    DB::update('update users set approved = ? where id = ?', [$approval, $id]);
    return redirect()->route('updateUserApproval.user');
}
}
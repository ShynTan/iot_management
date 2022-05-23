<?php
class AdminController extends Controller
{
    public function viewProfile()
    {
        $id = Auth::user()->id;
        $user = DB::select('select * from users where id = "' . $id . '"');
        $result = false;
        return view('user.profile')->with('user', $user)->with('result', $result);
    }

    public function updateuserinfo(Request $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $name = $request->input('name');

        $result = DB::update('update users set email = ?, name=? where id = ?',[$email,$name,$id]);

        $user = DB::select('select * from users where id = "' . $id . '"');
        return view('user.profile')->with('user', $user)->with('result', $result);

    }
}
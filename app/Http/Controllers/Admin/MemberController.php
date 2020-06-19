<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class MemberController extends BaseController
{
    public function index()
    {
        $users = User::all();

        $this->setPageTitle('Members','Members');

        return view('admin.members.index',compact('users'));
    }
    

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while deleting User.', 'error', true, true);
        }
        return $this->responseRedirect('admin.members.index', 'User deleted successfully', 'success', false, false);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = $this->getUserList();
        return view('user.list')->with('userList', $users);
    }

    public function details($id){
        $users = $this->getUserList();
        $user = '';
        foreach($users as $u){
            if($u['id'] == $id){
                $user = $u;
                break;
            }
        }
        return view('user.details')->with('user', $user);
    }

    public function create(){
        return view('user.create');
    }

    public function insert(Request $req){
        $users = $this->getUserList();
        $user = ['id'=>$req->id, 'name'=>$req->uname, 'email'=>$req->email];
        array_push($users, $user);
        return view('user.list')->with('userList', $users);
    }

    public function edit($id)
        {
            $users = $this->getUserList();
            $user = '';
            foreach ($users as $u) {
                if ($u['id'] == $id) {
                    $user = $u;
                    break;
                }
            }
        return view("list.userList") -> with('userList' , $users);
        return view('user.edit')->with('user', $users);
    }
       
    public function update(Request $req, $id){
        //craete new user array & add to list
        //new userList
        $newArray = $this->destroy($id);
        $user = ['id' =>$req->id, 'name' => $req->uname, 'email' => $req->email];
        array_push( $newArray, $user);
        return view('user.list')->with('userList',  $newArray);
    }

    public function delete( $id){
        //confirm window
        //find user by id $user
        $users = $this->getUserList();
        
        for($i=0;$i<count($users);$i++)
        {
           if($users[$i]['id'] == $id)
            {

              unset($users['$i']);
            }
        }
        return view('user.list')->with('userList', $users);
    }

    public function destroy($id){
        //remove user form list
        //create new list & display
         $users = $this->userList;
         for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]['id'] == $id) {
                unset($users[$i]);
            }
        }
        return  $users ;
    }


    public function getUserList(){
        return [
            ['id'=>1, 'name'=>'almain', 'email'=>'email@email.com'],
            ['id'=>2, 'name'=>'abc', 'email'=>'abc@email.com'],
            ['id'=>3, 'name'=>'xyz', 'email'=>'xyz@email.com']
        ];
    }
}

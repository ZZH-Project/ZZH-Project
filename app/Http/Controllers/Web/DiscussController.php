<?php

namespace App\Http\Controllers\web;

use App\Models\Discuss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussController extends Controller
{
    //吐槽主页
    public function index(Request $request){
        $data = Discuss::select('discusses.*', 'wusers.username')
              ->leftJoin('wusers', 'discusses.user_id', '=', 'wusers.id' )
              ->orderBy('created_at', 'desc')
              ->get();
        return view('web.discuss.index', ['data' => $data]);
    }
    //添加吐槽
    public function add(){
        return view('web.discuss.add');
    }

    //提交吐槽
    public function addData(Request $request){
        $user_id = $request->user_id;
        $content = $request->content;

        $res = Discuss::create([
            'user_id'=>$user_id,
            'content'=>$content,
        ]);

        return redirect('web/discuss/index');
    }

}


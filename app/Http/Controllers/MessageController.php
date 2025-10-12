<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Models\Message_table;
use App\Models\Conversation_table;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function UserStoreMessage(Request $request){

        //dd($request);
        $userid = Auth::id();
        $adminid = User::select('id')->where('role', 'admin')->first();

        $conversation = Conversation_table::where('member_id', $userid)->first();

        if(!$conversation){

            $conversation = Conversation_table::create([
                'admin_id' => $adminid->id,
                'member_id' => $userid
            ]);

        }

        $file_storage = [];

        if ($request->hasFile('files')) {
            foreach($request->file('files') as $file){
                $file_storage[] = $file->store('jobscoutfiles', 'public');
            }
        }

        $message = Message_table::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $userid,
            'message' => $request->message,
            'files' =>json_encode($file_storage),
            'is_read' => 1
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return back();

    }

    public function AdminStoreMessage(Request $request){

        $adminid = Auth::id();;

        $conversation = Conversation_table::where('member_id', $request->userid)->first();

        if(!$conversation){

            $conversation = Conversation_table::create([
                'admin_id' =>  $adminid,
                'member_id' => $request->userid
            ]);

        }

        $file_storage = [];

        if ($request->hasFile('files')) {
            foreach($request->file('files') as $file){
                $file_storage[] = $file->store('jobscoutfiles', 'public');
            }
        }

        $message = Message_table::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $adminid,
            'message' => $request->message,
            'files' =>json_encode($file_storage),
            'is_read' => 1
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return back();

    }
}

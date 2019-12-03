<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //All users logged in user
        $users = User::where('id', '!=', Auth::id())->get();
//        $messages = Message::where('id', '!=', Auth::id())->get();

        //count how many message are unread from the selected
        $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread 
        from users LEFT JOIN messages ON users.id = messages.from and is_read = 0 and messages.to = " .Auth::id(). "
        where users.id != " . Auth::id() ."
        group by users.id, users.name, users.avatar, .users.email");

        return view('home',
            ['users' => $users,
//            'messages' => $messages
]);
    }

    public function getMessage($user_id){

        $my_id = Auth::id();
        // when click to see message users's message will be read, update
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        //Getting all messages from selected user
        //getting the message which is from = Auth::id() and to = user_id or from = user_id and to = Auth::id();
        $messages = Message::where(function ($query) use ($user_id, $my_id){
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();

        return view('messages.index',
            ['messages' => $messages]);
    }

    public function sendMessage(Request $request){
        $from = Auth::id();
        //Вытаскуем данные из реквеста переданные с помощью ajax
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->to = $to;
        $data->message = $message;
        $data->from = $from;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        // pusher
        $options = array(
          'cluster' => 'ap2',
          'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; //Sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);

    }
    
    public function changeAvatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return redirect(route('home'));
        }
    }
}

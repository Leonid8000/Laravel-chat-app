<?php

namespace App;

use App\Events\BroadcastChat;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $dispatchesEvents = [
        'created' => BroadcastChat::class
    ];
    
    protected $fillable = [
        'from', 'to', 'message', 'is_read'
    ];
    
}

<?php

namespace App\Channels;

use Maharlika\Routing\Attributes\BroadcastChannel;

class ChannelAuthorization
{
    #[BroadcastChannel('broadcastChannel.{Id}')]
    public function authorizeChannel()
    {
        // do some channel authorization here...
    }
}

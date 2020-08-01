class ReservationConfirmation
{
use Dispatchable, InteractsWithSockets, SerializesModels;

public $entry;

/**
* Create a new event instance.
*
* @param ReservationConfirmation $entry
*/
public function __construct(ReservationConfirmation $entry)
{
$this->entry = $entry;

}

/**
* Get the channels the event should broadcast on.
*
* @return \Illuminate\Broadcasting\Channel|array
*/
public function broadcastOn()
{
return new PrivateChannel('channel-name');
}
}

<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $hidden = [
        'id',
        'event_id',
        'user_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }


    public static function checkActiveEvent($events){
        foreach ($events as $event) {
            if ($event->status == 1) {
                //quando a data de inicio for inferior à actual e quando a data actual for superior a data de término
                if ($event->start_date < Carbon::now() && Carbon::now() > $event->end_date) {
                    $event->status = 0;
                    $event->save();
                //caso contrario activa
                }elseif ($event->start_date <= Carbon::now() && Carbon::now() < $event->end_date && $event->status == 0 && $event->status == 1) {
                    $event->status = 1;
                    $event->save();
                }
            }
            else{
                //quando a data de inicio for inferior à actual e quando a data actual for superior a data de término
                if ($event->start_date < Carbon::now() && Carbon::now() > $event->end_date) {
                    $event->status = 0;
                    $event->save();
                //caso contrario activa
                }elseif(date("d-M H:i", strtotime($event->start_date)) <= date("d-M H:i", strtotime(Carbon::now())) && date("d-M H:i", strtotime(Carbon::now())) < date("d-M H:i", strtotime($event->end_date))  && $event->status == 0 && $event->status == 1) {
                    $event->status = 1;
                    $event->save();
                }
            }
        }
        return;
    }
}

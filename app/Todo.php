<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $table = 'ToDo';

    protected $fillable = [
        'title',
        'Notes',
        'SendEmailReminder',
        'ReminderDate',
        'DueDate',
        'Urgency',

      ];


public function todo()
{
  return $this->belongsTo('App\User');
}

}

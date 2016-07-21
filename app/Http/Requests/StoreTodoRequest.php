<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTodoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        return [
            'title' => 'required|max:255|unique:todo,title,'.$this->route('id'),
            'Notes' => 'max:1024',
            'ReminderDate' => 'required_with:SendEmailReminder',
            'Urgency' => 'required',
            'user_id' => 'required'
        ];
    }
}

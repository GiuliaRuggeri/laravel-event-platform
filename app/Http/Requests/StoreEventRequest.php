<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreEventRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'date' => 'required',
            'available_tickets' => 'required',
            'photo'=> ['required',File::image()],
            'user_id' => ["nullable", "exists:users,id"],
            'tag_id' => ["nullable", "exists:tags,id"]
            
        ];
    }
}

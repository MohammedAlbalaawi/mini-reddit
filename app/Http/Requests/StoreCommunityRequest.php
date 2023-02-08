<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCommunityRequest extends FormRequest
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
            'user_id' => ['required'],
            'name' => ['required', 'min:3',Rule::unique('communities','name')->ignore($this->community)],
            'description' => ['required', 'max:500'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::user()->id
        ]);
    }
}

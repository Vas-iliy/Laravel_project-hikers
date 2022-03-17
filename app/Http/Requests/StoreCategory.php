<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategory extends FormRequest
{
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    public function rules()
    {
        return [
            'title' => 'required',
        ];
    }
}

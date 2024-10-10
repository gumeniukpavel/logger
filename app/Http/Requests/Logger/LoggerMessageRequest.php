<?php

namespace App\Http\Requests\Logger;

use Illuminate\Foundation\Http\FormRequest;

class LoggerMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'string'
            ],
        ];
    }
}

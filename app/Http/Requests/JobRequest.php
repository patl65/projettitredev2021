<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     * TODO : Fill in this FormRequest to validate your data in the controller
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'contract' => 'required|string',
            'job' => 'required|string',
            'visible' => 'string',
            'closed' => 'string',
        ];
    }
}

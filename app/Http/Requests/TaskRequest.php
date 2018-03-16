<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TaskRequest
 *
 * Properties
 * @property integer $project_id
 * @property integer $position
 * @property string $title
 */
class TaskRequest extends FormRequest
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
        if($this->method() == 'POST') {
            return [
                'project_id' => 'required|integer',
                'title' => 'required|string',
                'position' => 'nullable|integer',
            ];
        } elseif ( $this->method() == 'PUT' ) {
            return [
                'title' => 'required|string',
                'position' => 'nullable|integer',
            ];
        }

        return [];
    }
}

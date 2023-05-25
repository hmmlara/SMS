<?php

namespace App\Http\Requests;

use App\Models\Exam;
use App\Models\Mark;
use App\Models\StudentPersonal;
use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            //
            'student_personal_id'=>'required',
            'exam_id'=>'required',
            'mark'=>'required'
        ];
    }
}

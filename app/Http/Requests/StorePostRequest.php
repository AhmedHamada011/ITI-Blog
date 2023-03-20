<?php

namespace App\Http\Requests;

use App\Rules\MaxThreePosts;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
          'title' => ['required','min:3','unique:posts,title'],
          'description' => ['required','min:10'],
          'user_id' => ['required','exists:users,id',new MaxThreePosts()],
          'image' => ['required','mimes:jpg,png'],
        ];
    }
}

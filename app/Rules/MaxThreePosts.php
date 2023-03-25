<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxThreePosts implements ValidationRule
{

  public $user;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->user = User::find($value);
        if($this->user->posts->count() >= 3){
          $fail("Sorry, User \"{$this->user["name"]}\" Exceed the max posts number");
        }
    }


  public function message()
  {
    return "Sorry, User \"{$this->user["name"]}\" Exceed the max posts number";
  }

}

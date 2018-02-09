<?php namespace App\Helpers;

use Respect\Validation\Validator as v;
class Validation {
  /**
   * validating from input
   * @param  array $array it will be $_POST or $_GET
   * @param  array $rules rules for validations
   * @return array errors
   */
  public function validate($array, $rules)
  {
    $errors = [];
    foreach ($rules as $key => $value)
    {
      // check whether rules key available inside $_POST array
      if (!array_key_exists($key, $array)) {
        $errors = [];
        $errors['not found'] = $key . ' is not submitted';
        return $errors;
      }
      $subrules = explode('|', $value);
      foreach ($subrules as $subrule) {
        $terms = explode(':', $subrule);
        switch ($terms[0]) {
          case "min":
            $min = $terms[1];
            !v::alpha()->min($min)->validate($array[$key]) && $errors[$key] = "$key can't be less than $min characters";
            break;
          case "max":
            $max = $terms[1];
            !v::alpha()->max($max)->validate($array[$key]) && $errors[$key] = "$key can't be more than $max characters";
            break;
          case "email":
            !v::email()->validate($array[$key]) && $errors[$key] = "$key should be a valid email address";
            break;
          case "same":
            !v::equals($array[$terms[1]])->validate($array[$key]) && $errors[$key] = "$key should be same as $terms[1]";
          default:
            break;
        }
      }
    }
    return $errors;
  }
}


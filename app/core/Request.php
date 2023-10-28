<?php 

/**
 * The function `validateRequest` takes in a request and a set of rules, and returns an array of errors
 * based on the validation rules.
 * 
 * @param request The  parameter is an array that contains the data to be validated. Each key
 * in the array represents a field name, and the corresponding value is the data for that field.
 * 
 * @param rules An associative array where the keys are the field names and the values are the
 * validation rules for each field.
 * 
 * @return an array of errors. Each error is associated with a specific field and contains a message
 * describing the validation rule that was not met.
 */
function validateRequest($request, $rules)
{
    $errors = [];
    foreach ($rules as $field => $rule) {
        $rules = explode('|', $rule);
        foreach ($rules as $rule) {
            switch ($rule) {
                case 'required':
                    if (empty($request[$field])) {
                        $errors[$field][] = 'Le champ ' . $field . ' est obligatoire';
                    }
                break;
                case 'numeric':
                    if (!is_numeric($request[$field])) {
                        $errors[$field][] = 'Le champ ' . $field . ' doit être un nombre';
                    }
                break;
                case 'email':
                    if (!filter_var($request[$field], FILTER_VALIDATE_EMAIL)) {
                        $errors[$field][] = 'Le champ ' . $field . ' doit être un email valide';
                    }
                break;
                case 'url':
                    if (!filter_var($request[$field], FILTER_VALIDATE_URL)) {
                        $errors[$field][] = 'Le champ ' . $field . ' doit être une url valide';
                    }
                break;
            }
        }
    }
    return $errors;     
}

/**
 * The function `renderErrors` is used to display error messages for a specific field.
 * 
 * @param errors An array that contains the error messages for different fields. The keys of the array
 * represent the field names, and the values are arrays of error messages for that field.
 * 
 * @param field The  parameter is the name of the field for which we want to render the errors.
 * It is used to access the errors array and retrieve the errors specific to that field.
 */
function renderErrors($errors, $field)
{
    if (isset($errors[$field])) {
        foreach ($errors[$field] as $error) {
            echo '<div class="text-red-500 text-sm">' . $error . '</div>';
        }
    }
}
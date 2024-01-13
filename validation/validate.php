<?php 
    
    foreach($_POST as $key => $value) {
        // ignore 'submit' key
        if ($key !== 'submit') {
            validate($key, $value);
        }
    }

    function validate($key, $value) {
        global $errors;
        global $values;

        if(empty($_POST[$key])) {
            $errors[$key] = ucfirst("$key is required! <br />");
        } else {
            if($key === 'email') {
                // validate email
                if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$key] = ucfirst("$key must be valid email address.<br />");
                } else {
                    $values[$key] = $value;
                }
            } elseif ($key === 'name') {
                // validate name
                if(!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]{1,48}[a-zA-Z0-9]$/', $value)) {
                    $errors[$key] = ucfirst("$key is not valid. Try again.<br />");
                } else {
                    $values[$key] = $value;
                }
            } elseif ($key === 'ingredients') {
                // validate ingredients
                // if(!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]+)*$/', $value)) {
                //     $errors[$key] = ucfirst("$key must be a comma seperated list.");
                // }

                if(!preg_match('/^(?!\s)(?!.*\s{2})[\s\S]*$/', $value)) {
                    $errors[$key] = ucfirst("$key must be a comma seperated list.");
                } elseif (strlen($value) > 255) {
                    $errors[$key] = ucfirst("maximum of 255 characters.");
                } else {
                    $values[$key] = $value;   
                }
            }
        }

    }
?>
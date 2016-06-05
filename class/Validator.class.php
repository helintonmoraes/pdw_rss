<?php

class Validator {

    function Email($email) {
        if (preg_match(
                        '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
<?php

namespace Plugin\Rating;

class ValidateSubscriber extends \Ip\Form\Validator {

    public function getError($values, $valueKey, $environment) {

        if (empty($values[$valueKey])) {
            $errorText = __('Firma is requered', 'Rating');
            return $errorText;
        }else{
			return false;
		}

    }

}
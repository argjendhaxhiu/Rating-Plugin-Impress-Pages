<?php
/**
 * @package ImpressPages
 *
 */

namespace Plugin\Rating;


use Ip\Form\Field;

class RadioR extends \Ip\Form\Field\Radio{

    private $values;
    private $stolenId;

    public function __construct($options = array()) {
        if (isset($options['values'])) {
            $this->values = $options['values'];
        } else {
            $this->values = array();
        }
        parent::__construct($options);
        $this->stolenId = $this->getAttribute('id');
        $this->removeAttribute('id'); //we need to put id only on the first input. So we will remove it from attributes list. And put it temporary to stolenId;
    }

	
    public function render($doctype, $environment) {
        $attributesStr = '';
        $answer = '';
		$values = array(
			array(5, 5),
			array(4, 4),
			array(3, 3),
			array(2, 2),
			array(1, 1)
		);
		$loop = 1;
        foreach($values as $key => $value) {
            if ($value[0]== $this->value) {
                $checked = 'checked="checked"';
            } else {
                $checked = '';
            }
            if ($key == 0) {
                $id = 'id="'.$this->stolenId.'"';
            } else {
                $id = '';
            }

            $answer .= '
                    <input  id="star_' . $loop . '" class="'.implode(' ',$this->getClasses()).'" name="'.htmlspecialchars($this->getName()).'" type="radio" '.$this->getValidationAttributesStr($doctype).' '.$checked.' value="'.htmlspecialchars($value[0]).'" />
                    <label class="visible" for="star_' . $loop . '"></label>';
					$loop++;
        }

        return $answer;
    }


    public function setValues($values) {
        $this->values = $values;
    }

    public function getValues() {
        return $this->values;
    }

    /**
    * CSS class that should be applied to surrounding element of this field. By default empty. Extending classes should specify their value.
    */
    public function getTypeClass() {
        return 'radio';
    }

    public function getId() {
        return $this->stolenId;
    }
}

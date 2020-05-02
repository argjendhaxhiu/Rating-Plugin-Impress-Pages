<?php
/**
 * Model. Various database and form data operations.
 */
namespace Plugin\Rating;


class Model {

    /**
     * Store Firma in a database
     * @param $firma
     */

    public static function save($firma, $name, $feedback, $stars) {

        ipDb()->insert('rating', array('firma' => $firma, 'name' => $name, 'feedback' => $feedback,'stars'=> $stars, 'Enabled' => 'false', 'lang' => ipContent()->getCurrentLanguage()->getId()));
    }

    public static function createForm()
    {

        // Create a form object
        $form = new \Ip\Form();

        // Add a text field to form object
        $field = new \Ip\Form\Field\Text(
        array(
        'name' => 'Firma', // HTML "name" attribute
        'label' => __('Firma', 'Rating') // Field label that will be displayed next to input field
        ));
		//$field->addValidator('Email');
		
		
		$field2 = new \Ip\Form\Field\Text(
        array(
        'name' => 'name', // HTML "name" attribute
        'label' => __('Name', 'Rating') // Field label that will be displayed next to input field
        )
		);
		
		$field3 = new \Ip\Form\Field\Textarea(
        array(
        'name' => 'feedback', // HTML "name" attribute
        'label' => __('Feedback', 'Rating') // Field label that will be displayed next to input field
        )
		);
		
		
		
		
		
		$values = array(
		 array(1, 1),
                        array(2, 2),
						array(3, 3),
						array(4, 4),
						array(5, 5)
		);
		$field4 = new \Plugin\Rating\RadioR(
        array(
		
        'name' => 'stars', // HTML "name" attribute
        'label' => __('Stars', 'Rating'), // Field label that will be displayed next to input field
		'values' => $values,
        'value' => 0, 
                    
        )
		);

        // Add custom validator for checking if firma already exists in a table.
        $customValidator = new ValidateSubscriber();
        $field->addValidator($customValidator);
		
		$form->addField($field);
        $form->addField($field2);		
		$form->addField($field3);
		$form->addField($field4);
        // Firma is submitted to Site controller's `Rating` action `save`.

        $field = new \Ip\Form\Field\Hidden(
        array(
        'name' => 'sa',
        'value' => 'Rating.save',
        ));

        $form->addField($field);

        // Add submit button
        $form->addField(new \Ip\Form\Field\Submit(array('value' => __('Absenden', 'Rating'))));

        return $form;
    }
	
	

} 
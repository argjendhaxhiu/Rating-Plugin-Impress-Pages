<?php
/**
 * Plugin's site controller. Validates an e-mail address submitted from FAQ widget, and stores it to database.
 */
namespace Plugin\Rating;


class SiteController extends \Ip\Controller {

    public function save(){
        // Initialize the same form object as it was used to render a form
        $form = new \Ip\Form();
		
			$field = new \Ip\Form\Field\Text(
            array(
                'name' => 'Firma', //html "name" attribute
            ));

        // Validate e-mail
        //$field->addValidator('Email');

        // Add custom validator, which checks if Firma already registered
        $customValidator = new ValidateSubscriber();
        $field->addValidator($customValidator);

        $form->addField($field);
		
        // Add text input field field
        $field = new \Ip\Form\Field\Text(
            array(
                'name' => 'name', //html "name" attribute
            ));

        $form->addField($field);
		
	
		
		$field = new \Ip\Form\Field\Textarea(
            array(
                'name' => 'feedback', //html "name" attribute
            ));

        $form->addField($field);
		
		$values = array(
    array(1, 1),
                        array(2, 2),
						array(3, 3),
						array(4, 4),
						array(5, 5)
);

		
		$field = new \Ip\Form\Field\Radio(
            array(
                'name' => 'stars', //html "name" attribute
				'values' => $values,
        'value' => 0 // 
            ));

        $form->addField($field);
		
		
		
		$postData = ipRequest()->getPost();
		
        $errors = $form->validate($postData);

        if ($errors) {
            $status = array('status' => 'error', 'errors' => $errors); //success
        } else {
            Model::save(ipRequest()->getPost('Firma'), ipRequest()->getPost('name'), ipRequest()->getPost('feedback'),ipRequest()->getPost('stars'));
			
    
            $status = array('status' => 'ok'); //success
        }

        return new \Ip\Response\Json( $status);
    }
}

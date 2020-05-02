<?php
/**
 * Adds administration grid
 *
 * When this plugin is installed, `FAQ` panel appears in administration site.
 *
 */

namespace Plugin\Rating;


class AdminController extends \Ip\GridController
{
/*
    public function index()
    {
          return '<h1>Ratings and Feedbacks</h1>';
    }
	*/
	
	
    protected  function config(){
        $langs = ipContent()->getLanguages();
		$langs_values = array();
		if(!empty($langs)){
			foreach($langs as $key=>$val){
				$langs_values[] = array($val->getId(), $val->getTitle());
			}
		}
		
		return array(
            'title' => 'Rating',
            'table' => 'rating',
            'deleteWarning' => 'Are you sure you want to delete this post?',
            'sortField' => 'personOrder',
            'createPosition' => 'top',
			'filter' => '(`lang` = "'.ipContent()->getCurrentLanguage()->getId().'")',
            'pageSize' => 25,
            'fields' => array(
                array(
                    'label' => 'Name',
                    'field' => 'name',
                ),
				array(
                    'label' => 'Firma',
                    'field' => 'firma',
                    
                ),
				array(	
					'type'  => 'Textarea',
                    'label' => 'Feedback',
                    'field' => 'feedback',
                ),
				array(	
					'type'  => 'Select',
                    'label' => 'Stars',
                    'field' => 'stars',
					'values' => array(
                        array(1, 1),
                        array(2, 2),
						array(3, 3),
						array(4, 4),
						array(5, 5)
                    )

				),
				array(	
					'type'  => 'Checkbox',
                    'label' => 'Visible',
                    'field' => 'Enabled',
                ),
				array(
					'type' => 'Select',
                    'label' => 'Language',
                    'field' => 'lang',
					'values' => $langs_values, 
                ),
            )
        );
    }

}
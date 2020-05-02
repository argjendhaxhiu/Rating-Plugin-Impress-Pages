<?php

//displaying ratings

namespace Plugin\Rating;

class Slot {
    public static function showRating($params)
    {
		$lang = ipContent()->getCurrentLanguage();
		$items = ipDb()->selectAll('rating', '*', array('lang' => $lang->getId(), 'Enabled' => '1'), 'ORDER BY `personOrder`');
		
		$helperData = array(
            'items' => $items
        );
        return ipView('view/htmlRating.php', $helperData)->render();
    }
	
}

?>

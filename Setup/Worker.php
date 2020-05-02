<?php

namespace Plugin\Rating\Setup;

class Worker extends \Ip\SetupWorker
{

    /**
     * Create SQL table on plugin activation
     */
    public function activate()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS
           ' . ipTable('rating') . '
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `personOrder` double,
        `firma` varchar(255) ,
		`name` varchar(255) ,
		`feedback` text ,
		`stars` varchar(5) ,
		`Enabled` boolean,
		`lang` varchar(4),
        PRIMARY KEY (`id`)
        )';
        ipDb()->execute($sql);

    }

    public function deactivate()
    {
    }

    public function remove()
    {
        $sql = '
        DROP TABLE IF EXISTS
           ' . ipTable('rating') ;

        ipDb()->execute($sql);
    }

}


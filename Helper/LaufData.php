<?php
/**
 * Created by PhpStorm.
 * User: karstenschutz
 * Date: 09.07.17
 * Time: 13:00
 */

$laufdata = $database->getRow('
                SELECT
                  total,
                  drei,
                  fuenf,
                  missing
                FROM
                counter
                ');


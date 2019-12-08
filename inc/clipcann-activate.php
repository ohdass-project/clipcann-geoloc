<?php
/**
 * @package ClipcannGeoloc
 */

class ClipcannActivate
{

    public static function activate(){
        flush_rewrite_rules();
    }

}
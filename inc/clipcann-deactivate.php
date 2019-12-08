<?php
/**
 * @package ClipcannGeoloc
 */

class ClipcannDeActivate
{

    public static function deactivate(){
        flush_rewrite_rules();
    }

}
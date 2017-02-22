<?php

namespace DreamFactory\Core\Firebird\Models;

use DreamFactory\Core\SqlDb\Models\SqlDbConfig;

class FirebirdConfig extends SqlDbConfig
{
    public static function getDriverName()
    {
        return 'firebird';
    }

    public static function getDefaultPort()
    {
        return 3050;
    }

    protected function getConnectionFields()
    {
        $fields = parent::getConnectionFields();
        // Removing the last schema field
        array_pop($fields);

        return array_merge($fields, ['charset']);
    }

    public static function getDefaultConnectionInfo()
    {
        $defaults = parent::getDefaultConnectionInfo();
        // Removing the last schema field
        array_pop($defaults);
        $defaults[] = [
            'name'        => 'charset',
            'label'       => 'Character Set',
            'type'        => 'string',
            'description' => 'The character set to use for this connection, i.e. ' . static::getDefaultCharset()
        ];

        return $defaults;
    }
}
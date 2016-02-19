<?php

namespace App\Model\Repository;

use Nette\Database\Context;

class BaseRepository
{
    private $database;

    protected $tableName = 'unknown';

    public function __construct(Context $database)
    {
        $this->database = $database;
    }

    protected function getTable()
    {
        return $this->database->table($this->tableName);
    }
}

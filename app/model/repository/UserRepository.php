<?php

namespace App\Model\Repository;

use Nette\Utils\DateTime;

class UserRepository extends BaseRepository
{
    public function all()
    {
        return $this->getTable()->order('created_at DESC');
    }

    public function add($name, $position = null)
    {
        return $this->getTable()->insert([
            'name' => $name,
            'position' => $position,
            'created_at' => new DateTime(),
        ]);
    }

    public function find($id)
    {
        return $this->getTable()->where(['id' => $id])->limit(1)->fetch();
    }
}
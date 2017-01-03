<?php

namespace App\Messages;

use App\Messages\MessagesRepository;
use Nette\Database\Table\Selection;

/**
 * Description of FilterQuery
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class FilterQuery
{
    /** @var MessagesRepository */
    private $repository;

    /** @var Selection */
    private $query;

    /**
     * @param MessagesRepository $repository
     */
    public function __construct(MessagesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $string
     * @return self
     */
    public function whereUrlContain($string)
    {
        $this->getQuery()->where('url LIKE ', "%$string%");
        return $this;
    }

    /**
     * @param int $id
     * @return self
     */
    public function whereTargetIs($id)
    {
        $this->getQuery()->where('target = ?', $id);
        return $this;
    }

    /**
     * @param int $limit
     * @return self
     */
    public function limit($limit)
    {
        $this->getQuery()->limit($limit);
        return $this;
    }

    /**
     * @return Message[]
     */
    public function fetchAll()
    {
        $list = [];
        foreach($this->getQuery() as $row) {
            $list[] = $entity = $this->repository->mapToObject($row);
            $entity->setOther('count', $row->cnt);
        }

        return $list;
    }

    /**
     * @return Selection
     */
    protected function getQuery()
    {
        if($this->query === null) {
            $this->query = $this->prepare();
        }

        return $this->query;
    }

    /**
     * @return Selection
     */
    protected function prepare()
    {
        return $this->repository->getTable()
                        ->select('*, count(*) cnt')
                        ->group('hash')
                        ->order('created DESC')
                        ->limit(100);
    }
}

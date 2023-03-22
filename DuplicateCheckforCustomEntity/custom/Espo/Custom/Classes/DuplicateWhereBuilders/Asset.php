<?php
namespace Espo\Custom\Classes\DuplicateWhereBuilders;

use Espo\Core\Duplicate\WhereBuilder;

use Espo\ORM\Query\Part\Condition as Cond;
use Espo\ORM\Query\Part\WhereItem;
use Espo\ORM\Query\Part\Where\OrGroup;
use Espo\ORM\Entity;

class Asset implements WhereBuilder
{
    public function build(Entity $entity): ?WhereItem
    {
        if ($entity->get('assetMainCode')) {
            return Cond::equal(
                Cond::column('assetMainCode'),
                $entity->get('assetMainCode')
            );
        }

        return null;
    }
}

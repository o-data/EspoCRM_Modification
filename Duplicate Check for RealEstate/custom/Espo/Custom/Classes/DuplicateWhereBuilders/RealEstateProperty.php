<?php
namespace Espo\Custom\Classes\DuplicateWhereBuilders;

use Espo\Core\Duplicate\WhereBuilder;

use Espo\ORM\Query\Part\Condition as Cond;
use Espo\ORM\Query\Part\WhereItem;
use Espo\ORM\Query\Part\Where\OrGroup;
use Espo\ORM\Entity;

class RealEstateProperty implements WhereBuilder
{
    public function build(Entity $entity): ?WhereItem
    {
        $orBuilder = OrGroup::createBuilder();

        $toCheck = false;

        if ($entity->get('addressStreet') || $entity->get('addressCity')) {
            $orBuilder->add(
                Cond::and(
                    Cond::equal(
                        Cond::column('addressStreet'),
                        $entity->get('addressStreet')
                    ),
                    Cond::equal(
                        Cond::column('addressCity'),
                        $entity->get('addressCity')
                    )
                )
            );

            $toCheck = true;
        }

        // Here you can add more conditions.

        if (!$toCheck) {
            return null;
        }

        return $orBuilder->build();
    }
}

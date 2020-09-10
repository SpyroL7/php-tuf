<?php


namespace Tuf\Metadata;

use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Trait with methods to provide common constraints.
 */
trait ConstraintsTrait
{

    /**
     * Gets the common hash constraint.
     *
     * @return array[]
     *   The hash constraint.
     */
    protected static function getHashesConstraint()
    {
        return [
            'hashes' => [
                new Count(['min' => 1]),
                new Type(['type' => 'array']),
              // The keys for 'hashes is not know but they all must be strings.
                new All([
                    new Type(['type' => 'string']),
                    new NotBlank(),
                ]),
            ],
        ];
    }

    /**
     * Gets the common version constraint.
     *
     * @return array[]
     *   The version constraint.
     */
    protected static function getVersionConstraint()
    {
        return [
            'version' => [
                new Type(['type' => 'integer']),
                new GreaterThanOrEqual(1),
            ],
        ];
    }
}

<?php

namespace App\Validator;

use Api\Entity\EntityInterface;
use Api\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractValidator
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * UserValidator constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(EntityInterface $entity, $groups = null)
    {
        $validator = $this->validator->validate($entity, null, $groups);
        if ($validator->count() > 0) {
            throw new ValidatorException($validator);
        }
    }
}
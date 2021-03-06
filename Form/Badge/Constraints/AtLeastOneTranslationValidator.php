<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\CoreBundle\Form\Badge\Constraints;

use Claroline\CoreBundle\Entity\Badge\Badge;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AtLeastOneTranslationValidator extends ConstraintValidator
{
    /**
     * @param Badge      $badge
     * @param Constraint $constraint
     */
    public function validate($badge, Constraint $constraint)
    {
        $frTranslation = $badge->getFrTranslation();
        $enTranslation = $badge->getEnTranslation();

        $frName        = $frTranslation->getName();
        $frDescription = $frTranslation->getDescription();
        $frCriteria    = $frTranslation->getCriteria();

        $enName        = $enTranslation->getName();
        $enDescription = $enTranslation->getDescription();
        $enCriteria    = $enTranslation->getCriteria();

        // Have to put all method call in variable because of empty doesn't
        // support result of method as parameter (prior to PHP 5.5)
        $hasFrTranslation = !empty($frName) && !empty($frDescription) && !empty($frCriteria);
        $hasEnTranslation = !empty($enName) && !empty($enDescription) && !empty($enCriteria);

        if (!$hasFrTranslation && !$hasEnTranslation) {
            $this->context->addViolation($constraint->message);
        }
    }
}

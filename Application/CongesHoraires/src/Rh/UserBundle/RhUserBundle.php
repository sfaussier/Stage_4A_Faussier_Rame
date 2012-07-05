<?php

namespace Rh\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RhUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
<?php

namespace Rh\UserBundle\Security\Provider;

use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Cette classe nous permet de nous authentifier à partir de l'adresse Email de l'utilisateur.
 * Nous sommes obligés de surcharger cette classe en tant que Provider car,
 * de base, nous utilisons le "username" pour nous authentifier.
 * 
 * (voir https://github.com/FriendsOfSymfony/FOSUserBundle/blob/1.2.0/Resources/doc/logging_by_username_or_email.md )
 * 
 * @author Simon
 *
 */
class MyProvider implements UserProviderInterface
{
    private $userManager;

    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * On surcharge la fonction d'authentification
     * pour la forcer à s'authentifier par email.
     * 
     * @param string $email
     */
    public function loadUserByUsername($email)
    {
        $user = $this->userManager->findUserByEmail($email);

        if (!$user) {
            throw new UsernameNotFoundException(
                    sprintf('No user with name "%s" was found.', $email));
        }

        return $user;
    }

    /**
     * Cette fonction rafraichit l'utilisateur.
     * Elle permet donc de vérifier si l'utilisateur est toujours authentifié.
     * 
     * @param \FOS\UserBundle\Model\UserInterface $user
     */
    public function refreshUser(UserInterface $user)
    {
        return $this->userManager->reloadUser($user);
    }

    public function supportsClass($class)
    {
        return $this->userManager->supportsClass($class);
    }
}

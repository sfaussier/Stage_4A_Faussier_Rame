<?php

namespace Rh\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

use Rh\AdminBundle\Entity\Entreprise;

/**
 * EntrepriseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntrepriseRepository extends EntityRepository {

	public function chercherFeriePonts(Entreprise $id) {

		$em = $this->getEntityManager();
		$qb = $em->createQueryBuilder();
		$qb->select('f.nom', 'f.date', 'f.type')
				->from('RhAdminBundle:Entreprise', 'e')
				->join('e.feriePonts', 'f')
				->where('e.id = :idEntreprise')
				->setParameter('idEntreprise', $id->getId());
		$query = $qb->getQuery();
		return $query->getResult();

	}
}
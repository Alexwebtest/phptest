<?php

namespace AdminBundle\Controller;

use AppBundle\Entity\AdminPage;
use AppBundle\Entity\Medicine;
use AppBundle\Entity\Page;
use AppBundle\Entity\SmPCRevision;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Sonata\AdminBundle\Controller\CoreController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CustomPageController extends CoreController
{
    public function helpAction(Request $request)
    {
        /** @var User $user */
        $user = $this->getUser();
        $page = $this->getDoctrine()->getRepository(AdminPage::class)->findOneBy(['name' => 'help']);

        return $this->render('AdminBundle:Custom:help.html.twig', array(
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks'),
            'text'            => $page ? $page->getText() : ''
        ));
    }

    public function mergeAction(Request $request, $fromId, $toId)
    {
        /** @var User $user */
        $user = $this->getUser();

        $em = $this->get('doctrine.orm.entity_manager');

        /** @var Medicine $medicineFrom */
        $medicineFrom = $em->getRepository('AppBundle:Medicine')->find($fromId);

        /** @var Medicine $medicineTo */
        $medicineTo = $em->getRepository('AppBundle:Medicine')->find($toId);

        if(!$user->canMerge($medicineFrom,$medicineTo)) {
            throw $this->createAccessDeniedException();
        }

        if (!$medicineFrom || !$medicineTo) {
            throw $this->createNotFoundException();
        }

        if ($request->isMethod('POST')) {

            $pilId = $request->get('pil');
            $smpcId = $request->get('smpc');

            if (isset($smpcId)) {
                $smpcRevision = $em->getRepository('AppBundle:SmPCRevision')->find($smpcId);

                /** @var SmPCRevision $revision */
                foreach ($medicineTo->getSmPCRevisions() as $smpcItem) {
                    $em->remove($smpcItem);
                }

                $medicineTo->setImportedSmPCHistory($medicineFrom->getImportedSmPCHistory());
                $medicineTo->setImportedSmPCId($medicineFrom->getImportedSmPCId());

                /** @var SmPCRevision $revision */
                foreach ($medicineFrom->getSmPCRevisions() as $smpcItem) {

                    $duplicateSmpItem = clone $smpcItem;

                    if ($smpcItem === $smpcRevision) {
                        $medicineTo->setActiveSmPC($duplicateSmpItem);
                    }

                    $duplicateSmpItem->setMedicine($medicineTo);
                    $em->persist($duplicateSmpItem);
                }
                $this->addFlash('sonata_flash_success', 'SmPC merged successfully');
            }

            if (isset($pilId)) {
                $pilRevision = $em->getRepository('AppBundle:PilRevision')->find($pilId);

                /** @var SmPCRevision $revision */
                foreach ($medicineTo->getPilRevisions() as $pilItem) {
                    $em->remove($pilItem);
                }

                $medicineTo->setImportedPilHistory($medicineFrom->getImportedPilHistory());
                $medicineTo->setImportedPilId($medicineFrom->getImportedPilId());

                /** @var SmPCRevision $revision */
                foreach ($medicineFrom->getPilRevisions() as $pilItem) {

                    $duplicatePilItem = clone $pilItem;

                    if ($pilItem === $pilRevision) {
                        $medicineTo->setActivePil($duplicatePilItem);
                    }

                    $duplicatePilItem->setMedicine($medicineTo);
                    $em->persist($duplicatePilItem);
                }
                $this->addFlash('sonata_flash_success', 'PIL merged successfully');
            }

            $em->persist($medicineTo);


            if ($request->get('removeMedicine')) {
                $em->remove($medicineFrom);
                $this->addFlash('sonata_flash_success', "Medicine {$medicineFrom->getId()} removed successfully");
            }

            $em->flush();

            return $this->redirect($this->generateUrl('admin_app_medicine_list').'#clear');
        }

        return $this->render('AdminBundle:Custom:merge.html.twig', [
            'base_template' => $this->getBaseTemplate(),
            'admin_pool' => $this->container->get('sonata.admin.pool'),
            'blocks' => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks'),
            'medicineFrom' => $medicineFrom,
            'medicineTo' => $medicineTo,
        ]);
    }
}
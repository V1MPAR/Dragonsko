<?php

namespace App\Controller;

use App\Entity\AdminStatus;
use App\Entity\VirtualServerInfo;
use App\Service\RequestToApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param RequestToApiService $request
     * @return Response
     */
    public function index(RequestToApiService $request)
    {
        $serverInfo = $request->getServerInfo();
        $adminStatus = $request->getAdminStatus();
        $em = $this->getDoctrine()->getManager();
        $repoServer = $em->getRepository(VirtualServerInfo::class);
        $repoAdmin = $em->getRepository(AdminStatus::class);
        if ($serverInfo) {
            $count = $repoServer->createQueryBuilder('a')
                ->select('count(a.id)')
                ->getQuery()
                ->getSingleScalarResult();

            if ($count == 1) {
                $entityVSI = $repoServer->find(1);
            } else {
                $entityVSI = new VirtualServerInfo();
            }

            $entityVSI->setCurrentUsersOnline($serverInfo->{'virtualserver_clientsonline'} - 1);
            $entityVSI->setMaxUsers($serverInfo->{'virtualserver_maxclients'});
            $entityVSI->setUptime($serverInfo->{'virtualserver_uptime'});

            $em->persist($entityVSI);
            $em->flush();
        } else {
            $entityVSI = $repoServer->find(1);
        }

        if ($entityVSI->getCurrentUsersOnline()) {
            $currentUsersOnline = $entityVSI->getCurrentUsersOnline();
        }

        if ($entityVSI->getMaxUsers()) {
            $maxUsers = $entityVSI->getMaxUsers();
        }

        if ($entityVSI->getUptime()) {
            $time = $entityVSI->getUptime();

            $d = floor($time / 86400);
            $_d = ($d < 10 ? '0' : '') . $d;

            $h = floor(($time - $d * 86400) / 3600);
            $_h = ($h < 10 ? '0' : '') . $h;

            $m = floor(($time - ($d * 86400 + $h * 3600)) / 60);
            $_m = ($m < 10 ? '0' : '') . $m;

//            $s = $time-($d * 86400 + $h * 3600 + $m * 60);
//            $_s = ($s < 10 ? '0' : '') . $s;

            $uptime = $_d . 'd '. $_h . 'h ' . $_m . 'm';

            if ($time) {
                $status = 'online';
            } else {
                $status = 'offline';
            }
        }

        if ($adminStatus) {
            $owners = [];
            $clients = unserialize (base64_decode($adminStatus->{'data'}));
            foreach ($clients as $key => $var)
            {
//                $adminDb = $repoAdmin->findOneBy(['cluqid' => $var['client_unique_identifier']]);
//                if ($adminDb) {
//                    array_push($owners, $adminDb);
//                }
            }
        }

        print_r($adminStatus);
        print_r($clients);

        return $this->render('index/index.html.twig', [
            'currentUsersOnline' => $currentUsersOnline,
            'maxUsers' => $maxUsers,
            'uptime' => $uptime,
            'status' => $status
        ]);
    }
}

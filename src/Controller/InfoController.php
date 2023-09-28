<?php  

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\InfoService;

class InfoController extends AbstractController
{
    #[Route('/info')]
    public function info(InfoService $info)
    {
        dd($info);
    }
}

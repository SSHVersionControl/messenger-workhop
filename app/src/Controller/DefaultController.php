<?php

namespace App\Controller;

use App\Entity\CampaignPrice;
use App\Entity\Order;
use App\Entity\OrderPrice;
use App\Entity\Price;
use App\Entity\Vat;
use App\Form\SimpleForm;
use App\Form\WinnerForm;
use App\Message\GetRegisterBets;
use App\Message\RegisterBet;
use App\Message\ReportGame;
use App\Message\WinnerBet;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function test(SerializerInterface $serializer)
    {

        $price = new Price(300, 'EUR');
        $vat = new Vat(30, 'IRL');
        $orderPrice = new OrderPrice($price, $vat);

        $campaignPrice = new CampaignPrice($price, $vat);
        $order = new Order(new \App\Entity\Uuid());
        $order->setOrderPrice($orderPrice);
        $order->setOrderPrices([$orderPrice,$campaignPrice]);

        $data = $serializer->serialize($order, 'json');

        var_dump($data);

        $newOrder = $serializer->deserialize($data, Order::class, 'json');

        print_r($newOrder);
        die();
    }

    /**
     * @Route("/", name="home")
     */
    public function home(Request $request, MessageBusInterface $messageBus)
    {
        $result = new RegisterBet('', '', '', '');
        $resultForm = $this->createForm(SimpleForm::class, $result);

        $reportGame = new ReportGame('', '', '');

        $reportForm = $this->createForm(
            WinnerForm::class,
            $reportGame,
            array(
                'action' => $this->generateUrl('winner')
            )
        );

        $resultForm->handleRequest($request);
        if ($request->isMethod('POST') && $resultForm->isSubmitted() && $resultForm->isValid()) {
            $messageBus->dispatch($result);
        }

        $envelope = $messageBus->dispatch(new GetRegisterBets());
        $stamp = $envelope->last(HandledStamp::class);

        return $this->render('home/home.html.twig', [
            'form' => $resultForm->createView(),
            'reportForm' => $reportForm->createView(),
            'bets' => $stamp->getResult()
        ]);
    }

    /**
     * @Route("/winner", name="winner")
     */
    public function winner(Request $request, MessageBusInterface $messageBus)
    {
        $reportGame = new ReportGame('', '', '');

        $reportForm = $this->createForm(
            WinnerForm::class,
            $reportGame,
            array(
                'action' => $this->generateUrl('winner'),
            )
        );

        $reportForm->handleRequest($request);

        if ($request->isMethod('POST')
            && $reportForm->isSubmitted() && $reportForm->isValid()) {
            $messageBus->dispatch($reportGame);
        } else {
            die('not submited');
        }

        return $this->render('home/report.html.twig', [
//            'results' => $stamp->getResult()
        ]);
    }
}

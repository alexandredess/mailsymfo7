<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
  #[Route('/', name: 'email')]
  public function index(MailerInterface $mailer): Response
  {
    $email = new Email();
    $email
      ->to('alexandre.dessoly1@gmail.com')
      ->subject('Bienvenue chez Sofip!')
      ->cc('jp@gmail.com,marie@gmail.com')
      ->text('Bienvenue chez nous, nous sommes très contents de votre arrivée !');
    $mailer->send($email);

    return $this->render('email/index.html.twig', [
      'controller_name' => 'EmailController',
    ]);
  }
}

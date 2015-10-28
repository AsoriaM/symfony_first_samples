<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class LuckyController extends Controller{
    /**
     * @Route("/lucky/number/{count}")
     */
    public function numberAction($count){
        $numbers = array();
		for($i=0; $i<$count; $i++){
			$numbers[] = rand(0,100);
		}
		$numberList = implode(', ', $numbers);
	
		/*
		$html = $this->container->get('templating')->render(
			'lucky/number.html.twig',
			array('luckyNumberList'=> $numberList)
		);

        return new Response($html);
		 */
		 
		 //render: a shortcut that does the same as above
		 return $this->render(
		 	'lucky/number.html.twig', 
		 	array('luckyNumberList' => $numberList)
		);
    }
	
	/**
	 * @Route("/api/lucky/number")
	 */
	public function apiNumberAction(){
		$data = array(
			'lucky_number'=>rand(0,100),
		);
		
		return new JsonResponse($data);
		
		/*Without JsonResponse:
		 * 
		 * return new Response(
			json_encode($data),
			200,
			array('Content-Type' => 'application/json')
		*/
	}	
			
		
}

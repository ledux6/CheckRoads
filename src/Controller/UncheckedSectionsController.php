<?php

namespace App\Controller;

use App\Entity\DoneJob;
use App\Entity\RoadSection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UncheckedSectionsController extends AbstractController
{
    /**
     * @Route("/unchecked/sections", name="unchecked_sections")
     */
    public function index()
    {
        $roads = $this->getDoctrine()->getRepository(RoadSection::class)->findAll();

        return $this->render('index.html.twig', [ 'roads' => $roads]);
    }

    public function checkRoad(Request $request){
        $roads = $this->getDoctrine()->getRepository(RoadSection::class)->findAll();

        $sectionId = $request->request->get('road');
        $doneJobs = $this->getDoctrine()->getRepository(DoneJob::class)->findBy(array('section_id' => $sectionId));
        $roadChecked = false;
        if( empty($doneJobs)){
            $roadChecked = false;
            $section = $this->getDoctrine()->getRepository(RoadSection::class)->findBy(array('section_id' => $sectionId));
            return $this->render('index.html.twig', [ 'roads' => $roads, 'roadChecked' => $roadChecked, 'section' => $section]);
        }
        else {
            $slices = array();
            $count = 0;
            foreach($doneJobs as $job){
                $count = $count +1;
                if($this->checkDate($job)){

                    $roadChecked = true;
                    $section = $this->getDoctrine()->getRepository(RoadSection::class)->findBy(array('section_id' => $sectionId));
                    if($job->getRoadSectionBegin() == $section[0]->getSectionBegin() and $job->getRoadSectionEnd == $section[0]->getSectionEnd()){
                        return $this->render('index.html.twig', [ 'roads' => $roads, 'roadChecked' => $roadChecked, 'section' => $section]);
                    }
                    else{
                        if($job->getRoadSectionBegin() == $section[0]->getSectionBegin()){
                            $slice = array( 'job_number' => $count, 'if' => 1,'section_begin' => $job->getRoadSectionEnd(),
                                'section_end' => $section[0]->getSectionEnd(), 'unchecked_kilometers' => $section[0]->getSectionEnd() - $job->getRoadSectionEnd());
                            array_push($slices,$slice);
                        }
                        else if($job->getRoadSectionEnd() == $section[0]->getSectionEnd()){
                            $slice = array( 'job_number' => $count, 'if' => 2,'section_begin' => $section[0]->getSectionBegin(),
                                'section_end' => $job->getRoadSectionBegin(), 'unchecked_kilometers' =>  $job->getRoadSectionBegin() - $section[0]->getSectionBegin());
                            array_push($slices,$slice);
                        }
                        else {
                            //slice1 should logically be the opposite, but then it gives negative results
                            $slice1 = array( 'job_number' => $count, 'if' => 3,'section_begin' => $job->getRoadSectionBegin(),
                                'section_end' => $section[0]->getSectionBegin(), 'unchecked_kilometers' => $section[0]->getSectionBegin() - $job->getRoadSectionBegin());
                            $slice2 = array( 'job_number' => $count, 'if' => 4,'section_begin' => $job->getRoadSectionEnd(),
                                'section_end' => $section[0]->getSectionEnd(), 'unchecked_kilometers' => $section[0]->getSectionEnd() - $job->getRoadSectionEnd() );
                            array_push($slices,$slice1);
                            array_push($slices,$slice2);
                        }
                    }
                }
                else{
                    continue;
                }
            }
            if($roadChecked == false){
                $section = $this->getDoctrine()->getRepository(RoadSection::class)->findBy(array('section_id' => $sectionId));
                return $this->render('index.html.twig', [ 'roads' => $roads, 'roadChecked' => $roadChecked, 'section' => $section]);
            }
            else{
                $sum = 0;
                foreach ($slices as $slice){
                    $sum = $sum + $slice['unchecked_kilometers'];
                }
                return $this->render('index.html.twig', ['roads' => $roads, 'roadChecked' => $roadChecked,
                    'section' => $section, 'slices' => $slices, 'unchecked_kilometers' => $sum]);
            }

        }
    }

    public function checkDate($job){
        //return true;
        $date = $job->getDoneJobDate()->format('Y-m-d');
        $date = strtotime($date);
        $month = strtotime('-30 days');
        if($date > $month){
            return true;
        }
        return false;
    }
}

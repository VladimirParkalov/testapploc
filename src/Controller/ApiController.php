<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 2017-03-11
 * Time: 10:11 PM
 */

namespace App\Controller;

use App\Controller\AppController;

class ApiController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Csrf');
    }

    public function index()
    {
        $this->loadModel('Courses');
        $course = $this->Courses->find('all')
            ->contain(['Students','Teachers'])
            ->toArray();
        // Set the view vars that have to be serialized.
        $this->viewBuilder()->setClassName('json');
        $this->set('courses', $course);
        $this->set('_serialize', ['courses']);

    }

    public function courses($id = null)
    {
        $this->loadModel('Courses');
        if(!$id)
        {
            $course = $this->Courses->find('all')
                ->contain(['Students'])
                ->toArray();
        }
        else
        {
            $course = $this->Courses->find('all')
                ->contain(['Students'])
//                ->autoFields(false)
                ->where(['courses.id IS' => $id])
                ->toArray();
        }

        if (isset($course) && !empty($course))
        {
            foreach ($course as $item)
            {
                if(isset($item['students']))
                {
                    foreach ($item['students'] as &$student)
                    {
                        unset($student['_joinData']);
                    }
                }
            }
        }

        if($this->request->is('ajax'))
        {
            $this->response = $this->response->withDisabledCache();
            $students = [];
            if(isset($course[0]['students']))
            {
                $students = $course[0]['students'];
            }
            $this->set('course',$students );
            $this->render('courses');
        }
        else
        {
            // Set Out Format View
            $this->viewBuilder()->setClassName('json');
            $this->set('course', $course);
            $this->set('_serialize', ['course']);
        }
    }

}
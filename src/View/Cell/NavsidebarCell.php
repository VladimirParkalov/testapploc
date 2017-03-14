<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Navsidebar cell
 */
class NavsidebarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $sidebar = [
            'Courses'=>[
                'New Course'=>['action' => 'add','controller' => 'Courses'],
                'List students'=>['action' => 'index','controller' => 'Courses'],
            ],
            'Students'=>[
                'New student'=>['action' => 'add','controller' => 'Students']],
                'List students'=>['action' => 'index','controller' => 'Students'],
            'Teachers'=>[
                'New teacher'=>['action' => 'add'],
                'List teachers'=>['action' => 'index','controller' => 'Teachers']
            ],
        ];

        $this->set('sidebar', $sidebar);
    }
}

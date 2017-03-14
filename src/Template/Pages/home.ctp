<div class="courses form large-9 medium-8 columns content">
    <div id="students_waiting">
    </div>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Api', 'action' => 'courses']
    ]);?>
    <fieldset>
        <legend><?= __('Looking students for course.') ?></legend>
        <?php
        echo $this->Form->input('course_number', array('id'=>'id_course'));

        ?>
    </fieldset>
    <?= $this->Form->button('Get students', array(
        'type'=>'button',
        'onclick'=>'send_form();'
        ));
    ?>
    <?= $this->Form->end() ?>
    <div id="students_list">
    </div>
</div>
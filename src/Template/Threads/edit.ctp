<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Thread $thread
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $thread->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $thread->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Threads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="threads form large-9 medium-8 columns content">
    <?= $this->Form->create($thread) ?>
    <fieldset>
        <legend><?= __('Edit Thread') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('store_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

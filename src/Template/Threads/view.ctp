<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Thread $thread
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Thread'), ['action' => 'edit', $thread->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Thread'), ['action' => 'delete', $thread->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thread->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Threads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Thread'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="threads view large-9 medium-8 columns content">
    <h3><?= h($thread->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($thread->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($thread->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($thread->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($thread->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($thread->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Thread Id') ?></th>
                <th scope="col"><?= __('Writer') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($thread->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->thread_id) ?></td>
                <td><?= h($posts->writer) ?></td>
                <td><?= h($posts->content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

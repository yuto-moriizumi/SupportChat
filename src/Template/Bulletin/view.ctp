<main style="margin: 0px 200px 0px">
    <?= $this->Html->link('<< 戻る', ['action' => 'index', $storeId]) ?>
    <h1>スレッド：<?= h($thread->title) ?></h1>

    <?php if (!empty($thread)) : ?>
        <?= $this->Form->create($myPost) ?>
        <?= $this->Form->hidden('thread_id', ['value' => $thread->id]) ?>
        名前：
        <?= $this->Form->text('writer'); ?>
        メッセージ：
        <?= $this->Form->textarea('content', ['rows' => 2]); ?>
        <?= $this->Form->button('Submit') ?>
        <?= $this->Form->end() ?>
        <table cellpadding='0' cellspacing='0'>
            <thead>
                <tr>
                    <th scope='col'>送信者</th>
                    <th class='main' scope='col'>メッセージ</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($thread->posts)) : ?>
                    <?php foreach ($thread->posts as $post) : ?>
                        <tr>
                            <td><?= h($post->writer) ?></td>
                            <td><?= h($post->content) ?></td>
                            <td><?= $this->Form->postLink('削除する', ['controller' => 'bulletin', 'action' => 'delete', $post->id, $thread->id, $storeId]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan='3'>投稿はまだありません</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php else : ?>
        <h2>エラー：スレッドが見つかりませんでした</h2>
    <?php endif; ?>
</main>
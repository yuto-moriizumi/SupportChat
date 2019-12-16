<h1>サポートセンタ</h1>
<p>サポートセンタとつなぎます。</p>
<?= $this->Form->create($message) ?>
<?= $this->Form->control('name') ?>
<?= $this->Form->control('content') ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>
<table>
    <thead>
        <tr>
            <th>日時</th>
            <th>送信者</th>
            <th>メッセージ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $msg) : ?>
            <tr>
                <td><?= h($msg->created) ?></td>
                <td><?= h($msg->name) ?></td>
                <td><?= h($msg->content) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
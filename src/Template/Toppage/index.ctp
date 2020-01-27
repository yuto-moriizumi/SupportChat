<main style="margin: 0px 200px 0px">
    <h1>Y社 社内掲示板</h1>
    <h3>新規店舗を登録する：</h3>
    <?= $this->Form->create($newStore) ?>
    <?= $this->Form->hidden('store_id'); ?>
    店舗名：
    <?= $this->Form->text('name'); ?>
    <?= $this->Form->button('Submit') ?>
    <?= $this->Form->end() ?>
    <h2 style="font-size:x-large">店舗一覧</h2>
    <table cellpadding='0' cellspacing='0'>
        <thead>
            <tr>
                <th class='main' scope='col'><?= $this->Paginator->sort('name') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stores as $store) : ?>
                <tr>
                    <td><?= $this->Html->link(h($store->name), ['controller' => 'bulletin', 'action' => 'index', $store->id]) ?>
                        <?= $this->Form->postLink('削除する', ['controller' => 'toppage', 'action' => 'delete', $store->id]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class='paginator'>
        <ul class='pagination'>
            <?= $this->Paginator->first('<<' . __('first')) ?>
            <?= $this->Paginator->prev('<' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . '>') ?>
            <?= $this->Paginator->last(__('last') . '>>') ?>
        </ul>
    </div>
</main>
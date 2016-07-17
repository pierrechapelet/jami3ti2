<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Provider Office'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Donation Campaign Providers'), ['controller' => 'DonationCampaignProviders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Donation Campaign Provider'), ['controller' => 'DonationCampaignProviders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="providerOffices index large-9 medium-8 columns content">
    <h3><?= __('Provider Offices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('provider_id') ?></th>
                <th><?= $this->Paginator->sort('country_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('addr_line1') ?></th>
                <th><?= $this->Paginator->sort('addr_line2') ?></th>
                <th><?= $this->Paginator->sort('addr_line3') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('postcode') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('fax') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($providerOffices as $providerOffice): ?>
            <tr>
                <td><?= $this->Number->format($providerOffice->id) ?></td>
                <td><?= $providerOffice->has('provider') ? $this->Html->link($providerOffice->provider->name, ['controller' => 'Providers', 'action' => 'view', $providerOffice->provider->id]) : '' ?></td>
                <td><?= $providerOffice->has('country') ? $this->Html->link($providerOffice->country->name_en, ['controller' => 'Countries', 'action' => 'view', $providerOffice->country->id]) : '' ?></td>
                <td><?= h($providerOffice->name) ?></td>
                <td><?= h($providerOffice->addr_line1) ?></td>
                <td><?= h($providerOffice->addr_line2) ?></td>
                <td><?= h($providerOffice->addr_line3) ?></td>
                <td><?= h($providerOffice->city) ?></td>
                <td><?= h($providerOffice->postcode) ?></td>
                <td><?= h($providerOffice->phone) ?></td>
                <td><?= h($providerOffice->fax) ?></td>
                <td><?= h($providerOffice->email) ?></td>
                <td><?= $this->Number->format($providerOffice->is_active) ?></td>
                <td><?= h($providerOffice->created) ?></td>
                <td><?= h($providerOffice->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $providerOffice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $providerOffice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $providerOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providerOffice->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Provider Office'), ['action' => 'edit', $providerOffice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Provider Office'), ['action' => 'delete', $providerOffice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providerOffice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Provider Offices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider Office'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Donation Campaign Providers'), ['controller' => 'DonationCampaignProviders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Donation Campaign Provider'), ['controller' => 'DonationCampaignProviders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="providerOffices view large-9 medium-8 columns content">
    <h3><?= h($providerOffice->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $providerOffice->has('provider') ? $this->Html->link($providerOffice->provider->name, ['controller' => 'Providers', 'action' => 'view', $providerOffice->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $providerOffice->has('country') ? $this->Html->link($providerOffice->country->name_en, ['controller' => 'Countries', 'action' => 'view', $providerOffice->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($providerOffice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Addr Line1') ?></th>
            <td><?= h($providerOffice->addr_line1) ?></td>
        </tr>
        <tr>
            <th><?= __('Addr Line2') ?></th>
            <td><?= h($providerOffice->addr_line2) ?></td>
        </tr>
        <tr>
            <th><?= __('Addr Line3') ?></th>
            <td><?= h($providerOffice->addr_line3) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($providerOffice->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= h($providerOffice->postcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($providerOffice->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($providerOffice->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($providerOffice->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($providerOffice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($providerOffice->is_active) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($providerOffice->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($providerOffice->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Donation Campaign Providers') ?></h4>
        <?php if (!empty($providerOffice->donation_campaign_providers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Donor Id') ?></th>
                <th><?= __('Donation Campaign Id') ?></th>
                <th><?= __('Provider Office Id') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Budget') ?></th>
                <th><?= __('Currency Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($providerOffice->donation_campaign_providers as $donationCampaignProviders): ?>
            <tr>
                <td><?= h($donationCampaignProviders->id) ?></td>
                <td><?= h($donationCampaignProviders->donor_id) ?></td>
                <td><?= h($donationCampaignProviders->donation_campaign_id) ?></td>
                <td><?= h($donationCampaignProviders->provider_office_id) ?></td>
                <td><?= h($donationCampaignProviders->start_date) ?></td>
                <td><?= h($donationCampaignProviders->end_date) ?></td>
                <td><?= h($donationCampaignProviders->budget) ?></td>
                <td><?= h($donationCampaignProviders->currency_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DonationCampaignProviders', 'action' => 'view', $donationCampaignProviders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DonationCampaignProviders', 'action' => 'edit', $donationCampaignProviders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DonationCampaignProviders', 'action' => 'delete', $donationCampaignProviders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $donationCampaignProviders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($providerOffice->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Country Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Role') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($providerOffice->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->country_id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

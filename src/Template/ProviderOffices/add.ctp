<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Provider Offices'), ['action' => 'index']) ?></li>
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
<div class="providerOffices form large-9 medium-8 columns content">
    <?= $this->Form->create($providerOffice) ?>
    <fieldset>
        <legend><?= __('Add Provider Office') ?></legend>
        <?php
            echo $this->Form->input('provider_id', ['options' => $providers, 'empty' => true]);
            echo $this->Form->input('country_id', ['options' => $countries, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('addr_line1');
            echo $this->Form->input('addr_line2');
            echo $this->Form->input('addr_line3');
            echo $this->Form->input('city');
            echo $this->Form->input('postcode');
            echo $this->Form->input('phone');
            echo $this->Form->input('fax');
            echo $this->Form->input('email');
            echo $this->Form->input('is_active');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

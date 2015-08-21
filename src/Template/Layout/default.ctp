<?= $this->element('header'); ?>
        <div id="page-wrapper">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
<?= $this->element('footer'); ?>

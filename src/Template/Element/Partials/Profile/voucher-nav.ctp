<ul class="nav nav-tabs">
    <?php
        $navigations = [
            [
                'title' => 'Belum Dipakai',
                'url' => [
                    'controller' => 'Voucher',
                    'action' => 'index',
                    'prefix' => 'user',
                    'type' => '1'
                ]
            ],
            [
                'title' => 'Terpakai',
                'url' => [
                    'controller' => 'Voucher',
                    'action' => 'index',
                    'prefix' => 'user',
                     'type' => '2'
                ]
            ],
            [
                'title' => 'Tidak Berlaku',
                'url' => [
                    'controller' => 'Voucher',
                    'action' => 'index',
                    'prefix' => 'user',
                    'type' => '3'
                ]
            ]
    ];



    ?>
    <?php foreach($navigations as $nav): ?>
    <?php
            $is_active = $nav['url']['controller'] == $this->request->getParam('controller')&& $nav['url']['type'] == $this->request->getQuery('type');
    ?>
    <li class="<?= $is_active ? 'active' : '';?>"><a href="<?= $this->Url->build($nav['url']); ?>"><?= $nav['title']; ?></a></li>
    <?php endforeach; ?>
</ul>
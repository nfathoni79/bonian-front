<ul class="nav nav-tabs">
    <?php
        $navigations = [
            [
                'title' => 'Menunggu Diulas',
                'url' => [
                    'controller' => 'Review',
                    'action' => 'index',
                    'prefix' => 'user'
                ]
            ],
            [
                'title' => 'Ulasan Saya',
                'url' => [
                    'controller' => 'Review',
                    'action' => 'history',
                    'prefix' => 'user'
                ]
            ],
        ];


    ?>
    <?php foreach($navigations as $nav): ?>
        <?php
            $is_active = $nav['url']['controller'] == $this->request->getParam('controller')
                && $nav['url']['action'] == $this->request->getParam('action');
        ?>
        <li class="<?= $is_active ? 'active' : '';?>"><a href="<?= $this->Url->build($nav['url']); ?>"><?= $nav['title']; ?></a></li>
    <?php endforeach; ?>
</ul>
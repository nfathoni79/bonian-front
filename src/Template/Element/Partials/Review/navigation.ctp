<ul class="nav nav-tabs">
    <?php
        $navigations = [
            [
                'title' => 'Menunggu Diulas',
                'url' => [
                    'controller' => 'Review',
                    'action' => 'index',
                    'prefix' => 'user'
                ],
                'in_scope' => ['index', 'add']
            ],
            [
                'title' => 'Ulasan Saya',
                'url' => [
                    'controller' => 'Review',
                    'action' => 'history',
                    'prefix' => 'user'
                ],
                'in_scope' => ['history', 'view']
            ],
        ];


    ?>
    <?php foreach($navigations as $nav): ?>
        <?php
            $is_active = $nav['url']['controller'] == $this->request->getParam('controller')
                && in_array($this->request->getParam('action'), $nav['in_scope']);
        ?>
        <li class="<?= $is_active ? 'active' : '';?>"><a href="<?= $this->Url->build($nav['url']); ?>"><?= $nav['title']; ?></a></li>
    <?php endforeach; ?>
</ul>
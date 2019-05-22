<ul class="nav nav-tabs">
    <?php
        $navigations = [
            [
                'title' => 'Detail Profile',
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'index',
                    'prefix' => 'user'
                ]
            ],
            [
                'title' => 'Alamat',
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'address',
                    'prefix' => 'user'
                ]
            ],
            [
                'title' => 'Keamanan',
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'secure',
                    'prefix' => 'user'
                ]
            ],
            [
                'title' => 'Ubah Kata sandi',
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'changePass',
                    'prefix' => 'user'
                ]
            ],
            [
                'title' => 'Pembayaran',
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'payment',
                    'prefix' => 'user'
                ]
            ]
        ];

        if(($_profile['is_email_verified'] == false) || ($_profile['is_verified'] == '0')){
            $navigations[] = [
                'title' => 'Verifikasi Akun',
                'url' => [
                    'controller' => 'Profile',
                    'action' => 'verification',
                    'prefix' => 'user'
                ]
            ];
        }


    ?>
    <?php foreach($navigations as $nav): ?>
        <?php
            $is_active = $nav['url']['controller'] == $this->request->getParam('controller')
                && $nav['url']['action'] == $this->request->getParam('action');
        ?>
        <li class="<?= $is_active ? 'active' : '';?>"><a href="<?= $this->Url->build($nav['url']); ?>"><?= $nav['title']; ?></a></li>
    <?php endforeach; ?>
</ul>
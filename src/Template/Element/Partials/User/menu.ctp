<!--Right Part Start -->
<aside class="col-sm-4 col-md-3 content-aside" id="column-left">

    <div class="module user-menu">
        <div class="modcontent profile-container">
            <div class="profile-image">
                <img src="<?= $this->Url->build($_basePath . 'files/Customers/avatar/thumbnail-'.$this->request->getSession()->read('Auth.Customers.avatar')); ?>" width="40px" />
            </div>
            <div class="profile-name">
                <span class="full-name">
                    <?= $this->request->getSession()->read('Auth.Customers.first_name'); ?>
                    <?= $this->request->getSession()->read('Auth.Customers.last_name'); ?>
                </span>
                <span class="label label-default"> <?= $this->request->getSession()->read('Auth.Customers.email'); ?></span>
            </div>
            <div class="divider"></div>
        </div>
        <?php
            $nav = [
                [
                    'title' => 'Profile Saya',
                    'url' => $this->Url->build(['controller' => 'Profile', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-user',
                    'controller' => 'Profile'
                ],
                [
                    'title' => 'Riwayat pesanan',
                    'url' => $this->Url->build(['controller' => 'History', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-history',
                    'controller' => 'History'
                ],
                [
                    'title' => 'Notifikasi',
                    'url' => $this->Url->build(['controller' => 'Notification', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-notif',
                    'controller' => 'Notification',
                    'children' => [
                        [
                            'title' => 'Pesanan',
                            'url' => $this->Url->build(['controller' => 'Notification', 'action' => 'index', 'prefix' => 'user']),
                            'controller' => 'Notification'
                        ],
                        [
                            'title' => 'Update',
                            'url' => $this->Url->build(['controller' => 'Notification', 'action' => 'update', 'prefix' => 'user']),
                            'controller' => 'Notification'
                        ],
                    ]
                ],
                [
                    'title' => 'Voucher',
                    'url' => $this->Url->build(['controller' => 'Voucher', 'action' => 'index', 'prefix' => 'user','type' => '1']),
                    'icon' =>'zl zl-voucher',
                    'controller' => 'Voucher'
                ],
                [
                    'title' => 'Point saya',
                    'url' => $this->Url->build(['controller' => 'Point', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-point',
                    'controller' => 'Point'
                ],
                [
                    'title' => 'Jaringan',
                    'url' => $this->Url->build(['controller' => 'Network', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-network',
                    'controller' => 'Network'
                ],
                [
                    'title' => 'Leaderboard',
                    'url' => $this->Url->build(['controller' => 'Leaderboard', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-leaderboard',
                    'controller' => 'Leaderboard'
                ],
                [
                    'title' => 'Wishlist',
                    'url' => $this->Url->build(['controller' => 'Wishlist', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'fa fa-heart',
                    'controller' => 'Wishlist'
                ],
            ];
        ?>
        <!-- SIDEBAR MENU -->
        <div class="modcontent profile-usermenu">
            <ul class="nav">
                <?php foreach($nav as  $val):?>
                    <?php if($this->request->getParam('controller') == $val['controller']){ $active = 'active';}else{$active = '';}?>
                    <li class="<?= $active;?>">
                        <a href="<?= $val['url']; ?>">
                            <i class="<?= $val['icon']; ?>" aria-hidden="true"></i>
                            <?= $val['title']; ?> </a>
                        <?php if(!empty(@$val['children'])):?>
                            <ul>
                            <?php foreach($val['children'] as $value):?>
                                <li>
                                    <a href="<?= $value['url']; ?>"> <?= $value['title']; ?> </a>
                                </li>
                            <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- END MENU -->

        <div class="modcontent ">

        </div>
    </div>

</aside>
<!--Right Part End -->
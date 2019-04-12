<!--Right Part Start -->
<aside class="col-sm-4 col-md-3 content-aside" id="column-left">

    <div class="module user-menu">
        <div class="modcontent profile-container">
            <div class="profile-image">
                <img src="<?= $this->Url->build('/images/jpeg/users-profile/user-1.jpg'); ?>" width="40px" />
            </div>
            <div class="profile-name">
                <span class="full-name">
                    <?= $this->request->getSession()->read('Auth.Customers.full_name'); ?>
                    <?= $this->request->getSession()->read('Auth.Customers.last_name'); ?>
                </span>
                <span class="label label-primary label-point">150 Point</span>
            </div>
            <div class="divider"></div>
        </div>
        <?php
            $nav = [
                [
                    'title' => 'Profile Saya',
                    'url' => $this->Url->build(['controller' => 'Profile', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-user'
                ],
                [
                    'title' => 'Riwayat pesanan',
                    'url' => $this->Url->build(['controller' => 'History', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-history'
                ],
                [
                    'title' => 'Notifikasi',
                    'url' => $this->Url->build(['controller' => 'Notification', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-notif'
                ],
                [
                    'title' => 'Voucher',
                    'url' => $this->Url->build(['controller' => 'Voucher', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-voucher'
                ],
                [
                    'title' => 'Point saya',
                    'url' => $this->Url->build(['controller' => 'Point', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-point'
                ],
                [
                    'title' => 'Jaringan',
                    'url' => $this->Url->build(['controller' => 'Network', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-network'
                ],
                [
                    'title' => 'Leaderboard',
                    'url' => $this->Url->build(['controller' => 'Leaderboard', 'action' => 'index', 'prefix' => 'user']),
                    'icon' =>'zl zl-leaderboard'
                ],
            ];
        ?>
        <!-- SIDEBAR MENU -->
        <div class="modcontent profile-usermenu">
            <ul class="nav">
                <?php foreach($nav as  $val):?>
                    <?php if($this->request->here == $val['url']){ $active = 'active';}else{$active = '';}?>
                    <li class="<?= $active;?>">
                        <a href="<?= $val['url']; ?>">
                            <i class="<?= $val['icon']; ?>" aria-hidden="true"></i>
                            <?= $val['title']; ?> </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- END MENU -->

        <div class="modcontent ">
            test
        </div>
    </div>

</aside>
<!--Right Part End -->
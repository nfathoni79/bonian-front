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

        <!-- SIDEBAR MENU -->
        <div class="modcontent profile-usermenu">
            <ul class="nav">
                <li class="active">
                    <a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'index', 'prefix' => 'user']); ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Profile saya </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        Riwayat pesanan </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Notifikasi </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Voucher </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Point saya </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Jaringan </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Leaderboard </a>
                </li>


            </ul>
        </div>
        <!-- END MENU -->

        <div class="modcontent ">
            test
        </div>
    </div>

</aside>
<!--Right Part End -->
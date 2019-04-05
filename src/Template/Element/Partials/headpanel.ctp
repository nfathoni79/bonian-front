<!-- start : headpanel -->
<div class="c-headpanel c-headpanel--shadow u-pos-fixed--top z-index-100">
    <!-- navbar top -->
    <div class="u-bg-grad--red-y__v1">
        <div class="o-container c-navbar-default--top">
            <!-- left navigation -->
            <nav class="c-nav c-nav--inline c-nav--white">
                <a href="contact-us.html" class="c-nav--link c-separator">Kontak Kami</a>
                <a href="chat-app.html" class="c-nav--link c-separator">Chat</a>
            </nav>
            <!-- left navigation -->

            <!-- right navigation -->
            <nav class="c-nav c-nav--inline c-nav--white">
                <a href="contact-us.html" class="c-nav--link c-separator">Be Zolaku Members</a>
                <a href="chat-app.html" class="c-nav--link c-separator">Redeem Points</a>
                <a href="chat-app.html" class="c-nav--link c-separator">Track Order</a>
            </nav>
            <!-- right navigation -->
        </div>
    </div>
    <!-- navbar top -->

    <!-- navbar bottom -->
    <div class="u-bg--white">
        <!-- navbar #1 -->
        <div class="o-container c-navbar-default--middle">
            <!-- main logo -->
            <h1 class="c-logo o-block">
                <img class="u-img--fluid" src="images/png/logo/logo-wide.png" width="120" alt="logo zolaku">
            </h1>
            <!-- main logo -->

            <!-- input searchbar & select category -->
            <div class="c-default-searchbar">
                <form name="SearchForm" method="GET" action="">
                    <!-- input form -->
                    <div class="c-default-searchbar--layout-center">
                        <div id="z-searchbar" class="c-default-searchbar--layout__input" style="margin-left: 169px;">
                            <input type="text" class="c-default-searchbar--form__input typeahead tt-input" name="prd_category" placeholder="Masukan kata pencarian ..." autocomplete="off" spellcheck="false" dir="auto">
                        </div>
                    </div>

                    <!-- select category -->
                    <div class="c-default-searchbar--layout-left" style="width: 160px;">
                        <!-- cat title is selected -->
                        <div class="c-default-searchbar--select__cat" data-mate-select="active" >
                            <!-- id select category -->
                            <select name="" onchange="" onclick="return false;" id="">
                                <option value="">Semua Kategori</option>
                                <?php foreach($categories as $category) : ?>
                                <option value="<?= $category['id']; ?>"><?= $this->Text->truncate($category['name'], 23); ?></option>
                                <?php endforeach; ?>
                            </select>

                            <p class="c-default-searchbar--select__option" onclick="open_select(this)" ></p>
                            <!-- up/down arrow -->
                            <span onclick="open_select(this)" class="c-default-searchbar--select__icon" >
										<svg fill="#DC5054" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
											<path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
											<path d="M0-.75h24v24H0z" fill="none"/>
										</svg>
									</span>

                            <div class="c-default-searchbar--select__list">
                                <ul class="c-default-searchbar--select__list-item"></ul>
                            </div>
                        </div>
                        <!-- cat title is selected -->
                    </div>
                    <!-- select category -->

                    <!-- action button -->
                    <div class="c-default-searchbar--layout-right">
                        <div class="c-default-searchbar--btn-wrap">
                            <button type="submit" class="c-default-searchbar--btn c-searchbar-icon c-searchbar-icon--search">
                                <i aria-label="searching" class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- action button -->
                </form>
            </div>
            <!-- input searchbar & select category -->

            <!-- shoping action -->
            <nav class="c-nav c-nav--inline c-nav--gray">
                <a href="" class="c-nav--link u-font--20 u-mrg-r--25">
                    <!-- menu icon -->
                    <div class="c-nav-menu__icon">
                        <i aria-label="wishlist" class="fas fa-heart"></i>
                    </div>
                </a>

                <a href="" class="c-nav--link u-font--20 u-mrg-r--15">
                    <!-- menu icon -->
                    <div class="c-nav-menu__icon">
                        <i aria-label="cart" class="fas fa-shopping-cart"></i>
                    </div>
                    <!-- menu badge -->
                    <div class="c-nav-menu__badge">
                        <div class="c-nav-menu__badge-cart-count">12</div>
                    </div>
                </a>
            </nav>
            <!-- shoping action -->
        </div>
        <!-- navbar #1 -->

        <!-- navbar #2 -->
        <div class="o-container c-navbar-default--bottom">
            <!-- market category -->
            <nav class="c-nav c-nav--inline u-font--14 u-font--500">
                <a href="" class="c-nav--link u-fg--green">Gadget & Accesories</a>
                <a href="" class="c-nav--link u-fg--soft-purple">Health & Beauty</a>
                <a href="" class="c-nav--link u-fg--soft-pink">Home & Living</a>
                <a href="" class="c-nav--link u-fg--teal-blue">Man</a>
                <a href="" class="c-nav--link u-fg--pink">Women</a>
            </nav>
            <!-- market category -->

            <!-- login link -->
            <nav class="c-nav c-nav--inline c-nav--red u-font--14 u-font--500">
                <a href="" class="c-nav--link u-pad-r--0">
                    <i class="fas fa-user"></i>
                </a>
                <a href="" data-toggle="modal" data-target="#m_form_login" class="c-nav--link u-font--500 c-separator--slash">Masuk</a>
                <a href="" data-toggle="modal" data-target="#m_form_register" class="c-nav--link u-font--500">Daftar</a>
            </nav>
            <!-- login link -->
        </div>
        <!-- navbar #2 -->
    </div>
    <!-- navbar bottom -->
</div>
<!-- end : headpanel -->


<!-- start : login modal show -->
<div id="#m_form_login" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h5 class="modal-title">Message Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pd-20">
                <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Why We Use Electoral College, Not Popular Vote</a></h4>
                <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary bd-0" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end : login modal show -->


<!-- start : register modal show -->
<div id="#m_form_register" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h5 class="modal-title">Message Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pd-20">
                <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Why We Use Electoral College, Not Popular Vote</a></h4>
                <p class="mg-b-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary bd-0" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end : register modal show -->
<?php
    $uri = service('uri');
    $uriArray = $uri->getSegments();
    $uri1 = $uriArray[0];
    $uri2 = isset($uriArray[1]) ? $uriArray[1] : '';
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?=base_url()?>" class="app-brand-link w-100">
            <span class="app-brand-logo demo w-100">
                <img src="<?=base_url()?>design_assets/images/mycsmtp_logo.jpg" style="width: 100%; height: 50px;">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
            <?php if (session()->get('userData')['user_type']=='admin'): ?>
            <!-- Dashboards -->
            <li class="menu-item <?=$uri1=='admin_panel' ? 'active' : ''?>">
                <a href="<?=base_url()?>admin_panel" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            </li>
            <!-- Level -->
            <li class="menu-item <?=in_array($uri2, ['add-level','level-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Level">Level</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-level' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-level" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=$uri2=='level-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/level-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Type -->
            <li class="menu-item <?=in_array($uri2, ['add-type','type-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Type</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-type' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-type" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=$uri2=='type-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/type-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Subject -->
            <li class="menu-item <?=in_array($uri2, ['add-subject','subject-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Subject</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-subject' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-subject" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=$uri2=='subject-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/subject-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Subject -->
            <li class="menu-item <?=in_array($uri2, ['add-paper','paper-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Paper</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-paper' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-paper" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=$uri2=='paper-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/paper-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- promocodes -->
            <li class="menu-item <?=in_array($uri2, ['add-promocode','promocode-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Promo Codes</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-promocode' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-promocode" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=$uri2=='promocode-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/promocode-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- upload notice -->
            <li class="menu-item <?=in_array($uri2, ['add-notice','notice-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Upload Notice</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-notice' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-notice" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=$uri2=='notice-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/notice-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- student -->
            <li class="menu-item <?=in_array($uri2, ['student-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Student</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='student-list' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/student-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>
        <!-- assignment -->
        <li class="menu-item <?=in_array($uri2, ['assignment-level-list']) ? 'open' : ''?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Front Pages">Assignment</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?=$uri2=='assignment-level-list' ? 'active' : ''?>">
                    <a href="<?=base_url()?>admin/assignment-level-list" class="menu-link">
                        <div data-i18n="Without menu">List</div>
                    </a>
                </li>
            </ul>
        </li>
        <?php if (session()->get('userData')['user_type']=='admin'): ?>
            <!-- Examinar -->
            <li class="menu-item <?=in_array($uri2, ['add-examinar','examinar-list','examinar']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Examinar</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-examinar' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-examinar" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=in_array($uri2, ['add-examinar','examinar-list','examinar']) ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/examinar-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Newsletter -->
            <li class="menu-item <?=in_array($uri2, ['newsletter-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">NewsLetter</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=in_array($uri2, ['newsletter-list']) ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/newsletter-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Blog -->
            <li class="menu-item <?=in_array($uri2, ['add-blog','blog-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Blog</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-blog' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-blog" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=in_array($uri2, ['blog-list']) ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/blog-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Amendment -->
            <li class="menu-item <?=in_array($uri2, ['add-amendment','amendment-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Amendment</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-amendment' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-amendment" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=in_array($uri2, ['amendment-list']) ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/amendment-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Question Bank -->
            <li class="menu-item <?=in_array($uri2, ['add-qbank','qbank-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Question Bank</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-qbank' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-qbank" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=in_array($uri2, ['qbank-list']) ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/qbank-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Notes -->
            <li class="menu-item <?=in_array($uri2, ['add-notes','notes-list']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Notes</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='add-notes' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/add-notes" class="menu-link">
                            <div data-i18n="Without navbar">Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?=in_array($uri2, ['notes-list']) ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/notes-list" class="menu-link">
                            <div data-i18n="Without menu">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item <?=in_array($uri2, ['view-sales']) ? 'open' : ''?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Front Pages">Sales</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?=$uri2=='view-sales' ? 'active' : ''?>">
                        <a href="<?=base_url()?>admin/view-sales" class="menu-link">
                            <div data-i18n="Without navbar">Sales</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>
    </ul>
</aside>
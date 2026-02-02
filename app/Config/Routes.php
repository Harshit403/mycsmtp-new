<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'StudentController::loadIndex');
$routes->get('/login', 'LoginController::loadLoginPage');
$routes->post('/verify/adminlogin', 'LoginController::verifyAdminLogin');
$routes->get('/admin/logout','LoginController::logoutAdmin');
$routes->get('/page/access-denied','LoginController::loadAccessDenied');

$routes->get('/admin_panel','DashboardController::loadAdminPanel',['filter' => 'authGuard']);
// level routes
$routes->get('/admin/add-level','DashboardController::loadAddLevelPage',['filter' => 'authGuard']);
$routes->get('/admin/add-level/(:any)','DashboardController::loadAddLevelPage/$1',['filter' => 'authGuard']);
$routes->post('/admin/add-level','DashboardController::addLevel',['filter' => 'authGuard']);
$routes->get('/admin/level-list','DashboardController::loadLevelListPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-level-list','DashboardController::fetchLevelListPage',['filter' => 'authGuard']);
$routes->post('/admin/delete-level','DashboardController::deleteLevel',['filter' => 'authGuard']);


// type routes
$routes->get('/admin/add-type','DashboardController::loadAddTypePage',['filter' => 'authGuard']);
$routes->get('/admin/add-type/(:any)','DashboardController::loadAddTypePage/$1',['filter' => 'authGuard']);
$routes->post('/admin/add-type','DashboardController::addType',['filter' => 'authGuard']);
$routes->get('/admin/type-list','DashboardController::loadTypeListPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-type-list','DashboardController::fetchTypeListPage',['filter' => 'authGuard']);
$routes->post('/admin/delete-type','DashboardController::deleteType',['filter' => 'authGuard']);

// subject routes
$routes->get('/admin/add-subject','DashboardController::loadAddSubjectPage',['filter' => 'authGuard']);
$routes->get('/admin/add-subject/(:any)','DashboardController::loadAddSubjectPage/$1',['filter' => 'authGuard']);
$routes->post('/admin/add-subject','DashboardController::addSubject',['filter' => 'authGuard']);
$routes->post('/admin/get-type-list','DashboardController::getTypeInfo',['filter' => 'authGuard']);
$routes->get('/admin/subject-list','DashboardController::loadSubjectListPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-subject-list','DashboardController::fetchSubjectListPage',['filter' => 'authGuard']);
$routes->post('/admin/delete-subject','DashboardController::deleteSubject',['filter' => 'authGuard']);

// paper routes
$routes->get('/admin/add-paper','DashboardController::loadAddPaperPage',['filter' => 'authGuard']);
$routes->get('/admin/add-paper/(:any)','DashboardController::loadAddPaperPage/$1',['filter' => 'authGuard']);
$routes->post('/admin/add-paper','DashboardController::addPaper',['filter' => 'authGuard']);
$routes->post('/admin/get-subject-list','DashboardController::getSubjectInfo',['filter' => 'authGuard']);
$routes->post('/admin/update-paper-status','DashboardController::updatePaperStatus',['filter' => 'authGuard']);
$routes->post('/admin/delete-paper','DashboardController::deletePaper',['filter' => 'authGuard']);
$routes->get('/admin/paper-list','DashboardController::loadPaperListPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-paper','DashboardController::fetchedPaperList',['filter' => 'authGuard']);


// promocodes
$routes->get('/admin/add-promocode','DashboardController::loadAddPromocodePage',['filter' => 'authGuard']);
$routes->get('/admin/add-promocode/(:any)','DashboardController::loadAddPromocodePage/$1',['filter' => 'authGuard']);
$routes->post('/admin/add-promocode','DashboardController::addPromoCode',['filter' => 'authGuard']);
$routes->get('/admin/promocode-list','DashboardController::loadPromocodeListPage',['filter' => 'authGuard']);
$routes->post('/admin/delete-promocode','DashboardController::deletePromocode',['filter' => 'authGuard']);
$routes->post('/admin/fetch-prmocodes','DashboardController::fetchPromocodes',['filter' => 'authGuard']);

// notice
$routes->get('/admin/add-notice','DashboardController::loadAddNotice',['filter'=>'authGuard']);
$routes->get('/admin/add-notice/(:any)','DashboardController::loadAddNotice/$1',['filter'=>'authGuard']);
$routes->post('/admin/add-notice','DashboardController::addNotice',['filter'=>'authGuard']);
$routes->get('/admin/notice-list','DashboardController::loadNoticeListPage',['filter'=>'authGuard']);
$routes->post('/admin/fetch-notice-list','DashboardController::fetchNoticeList',['filter'=>'authGuard']);
$routes->post('/admin/delete-notice','DashboardController::deleteNotice',['filter' => 'authGuard']);

// student /admin
$routes->get('/admin/student-list','DashboardController::loadStudentListPage',['filter'=>'authGuard']);
$routes->post('/admin/fetch-student-list','DashboardController::fetchStudentList',['filter'=>'authGuard']);
$routes->post('/admin/change-block-status','DashboardController::changeStudentBlockStatus',['filter'=>'authGuard']);
$routes->get('/admin/student-export','DashboardController::exportStudentDetails',['filter' => 'authGuard']);
$routes->post('/admin/subject-list','DashboardController::getSubjectList',['filter' => 'authGuard']);
$routes->post('/admin/change-subject-visibility','DashboardController::changeSubVisibility',['filter' => 'authGuard']);

// assignment
$routes->get('/admin/assignment-level-list','DashboardController::loadAssignmentLevelListPage',['filter'=>'authGuardBoth']);
$routes->post('/admin/fetch-assignment-level-list','DashboardController::fetchAssignmentLevelList',['filter'=>'authGuardBoth']);

$routes->get('/admin/assignment-list/(:any)','DashboardController::loadAssignmentListPage/$1',['filter'=>'authGuardBoth']);
$routes->post('/admin/fetch-assignment-list','DashboardController::fetchAssignmentList',['filter'=>'authGuardBoth']);
$routes->get('/admin/upload-recheck/export','DashboardController::exportPaperDetails',['filter' => 'authGuardBoth']);
$routes->post('/admin/upload-rechek/papers','DashboardController::updateRecheckAssignment',['filter' => 'authGuardBoth']);

// examinar
$routes->get('/admin/add-examinar','DashboardController::loadAddExaminarPage',['filter' => 'authGuard']);
$routes->get('/admin/add-examinar/(:any)','DashboardController::loadAddExaminarPage/$1',['filter' => 'authGuard']);
$routes->post('/admin/add-examinar','DashboardController::addExaminar',['filter' => 'authGuard']);
$routes->get('/admin/examinar-list','DashboardController::loadExaminarListPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-examinar-list','DashboardController::getExaminarList',['filter' => 'authGuard']);
$routes->post('/admin/examinar-status-change','DashboardController::changeExaminarBlockedStatus',['filter' => 'authGuard']);


$routes->get('admin/examinar/assign-examinar/(:any)','DashboardController::loadAssignExaminar/$1',['filter'=>'authGuard']);
$routes->post('admin/examinar/assign-examinar','DashboardController::assignExaminar',['filter'=>'authGuard']);

$routes->get('admin/examinar/assign-subjects/(:any)','DashboardController::loadAssignSubjects/$1',['filter'=>'authGuard']);

$routes->post('admin/fetch-assign-sub-list','DashboardController::fetchAssignSubList');
$routes->post('admin/delete-assign-subject','DashboardController::deleteAssignSubject');

// newsletter
$routes->get('admin/newsletter-list','DashboardController::loadNewsletterList',['filter'=>'authGuard']);
$routes->post('/admin/fetch-newsletter-list','DashboardController::fetchNewsLetter');
$routes->post('/admin/newsletter/active','DashboardController::changeNewsletterStatus');
$routes->post('/admin/send-newsletter','DashboardController::sendnewsLetter');

// blog
$routes->get('/admin/add-blog','DashboardController::loadAddBlogPage',['filter'=>'authGuard']);
$routes->get('/admin/add-blog/(:any)','DashboardController::loadAddBlogPage/$1',['filter'=>'authGuard']);
$routes->post('/admin/add-blog','DashboardController::addBlogDetails',['filter'=>'authGuard']);
$routes->get('/admin/blog-list','DashboardController::loadBlogListPage',['filter'=>'authGuard']);
$routes->post('/admin/fetch-blog-list','DashboardController::fetchBlogList',['filter'=>'authGuard']);
$routes->post('/admin/delete-blog','DashboardController::deleteBlogItem',['filter'=>'authGuard']);
$routes->post('/admin/blog-status','DashboardController::changeBlogStatus',['filter'=>'authGuard']);

// notes
$routes->get('/admin/add-notes','DashboardController::loadAddNotesPage',['filter'=>'authGuard']);
$routes->get('/admin/add-notes/(:any)','DashboardController::loadAddNotesPage/$1',['filter'=>'authGuard']);
$routes->post('/admin/add-notes','DashboardController::addNotes',['filter'=>'authGuard']);
$routes->get('/admin/notes-list','DashboardController::loadNoteListPage',['filter'=>'authGuard']);
$routes->post('/admin/fetch-notes','DashboardController::fetchNotesDetails',['filter'=>'authGuard']);
$routes->post('/admin/notes/status-update','DashboardController::statusUpdate',['filter' => 'authGuard']);
$routes->post('/admin/notes/delete','DashboardController::deleteNotes',['filter' => 'authGuard']);

// amendment
$routes->get('/admin/add-amendment','DashboardController::loadAddAmendmentPage',['filter'=>'authGuard']);
$routes->get('/admin/add-amendment/(:any)','DashboardController::loadAddAmendmentPage/$1',['filter'=>'authGuard']);
$routes->post('/admin/add-amendment','DashboardController::addAmendment',['filter'=>'authGuard']);
$routes->get('/admin/amendment-list','DashboardController::loadAmendmentListPage',['filter'=>'authGuard']);
$routes->post('/admin/fetch-amendment','DashboardController::fetchAmendmentList',['filter'=>'authGuard']);
$routes->post('/admin/amendment-status','DashboardController::updateAmendmentStatus',['filter'=>'authGuard']);
$routes->post('/admin/delete-amendment','DashboardController::deleteAmendment',['filter'=>'authGuard']);

// 	questionbank
$routes->get('/admin/add-qbank','DashboardController::loadAddQbankPage',['filter'=>'authGuard']);
$routes->get('/admin/add-qbank/(:any)','DashboardController::loadAddQbankPage/$1',['filter'=>'authGuard']);
$routes->post('/admin/add-qbank','DashboardController::addQbank',['filter'=>'authGuard']);
$routes->get('/admin/qbank-list','DashboardController::loadQbankListPage',['filter'=>'authGuard']);
$routes->post('/admin/fetch-qbank','DashboardController::fetchQbankList',['filter'=>'authGuard']);
$routes->post('/admin/qbank-status','DashboardController::updateQbankStatus',['filter'=>'authGuard']);
$routes->post('/admin/delete-qbank','DashboardController::deleteQbank',['filter'=>'authGuard']);


// examinar routes
 $routes->post('/verify/examinarlogin', 'LoginController::verifyEaxminarLogin');

// sales
$routes->get('/admin/view-sales','DashboardController::loadViewSales',['filter'=>'authGuard']);
$routes->post('/admin/get-sales','DashboardController::fetchSales',['filter'=>'authGuard']);

// validity control
$routes->get('/admin/control-validity','DashboardController::loadControlValidity',['filter'=>'authGuard']);
$routes->post('/admin/close-validity','DashboardController::closeValidity',['filter'=>'authGuard']);

// Student
// navbar link

$routes->get('/sign-in','StudentController::loadSignInPage');
$routes->get('/register','StudentController::loadSignUpPage');
$routes->post('/student/register-details','StudentController::addStudentDetails');
$routes->post('/student/sign-in','StudentController::verifyStudentLogin');
$routes->get('/orders','StudentController::loadOrderPage',['filter' => 'studentAuthGuard']);
$routes->get('/profile','StudentController::loadProfilePage',['filter' => 'studentAuthGuard']);
$routes->get('/logout','StudentController::logoutStudent');
$routes->post('/add-to-cart','StudentController::addToCartItem');
$routes->get('/fetch-cart-qty','StudentController::getCartDetails',['filter' => 'studentAuthGuard']);
$routes->get('/fetch-active-cartitems','StudentController::getCartItemsArray',['filter' => 'studentAuthGuard']);
$routes->post('/update-profile','StudentController::updateStudentProfile');
$routes->post('/update/password','StudentController::updateStudentPassword');

$routes->post('/add-to-cart-note','StudentController::addToCartNote',['filter' => 'studentAuthGuard']);
$routes->get('/get-cart-items','StudentController::getCartItems');
$routes->post('/checkout-cart-items','StudentController::checkoutCartItem');
$routes->get('/dashboard','StudentController::loadDashboardPage',['filter' => 'studentAuthGuard']);
$routes->get('/dashboard/(:any)','StudentController::loadDashboardPage/$1',['filter' => 'studentAuthGuard']);

$routes->get('/payment-status','StudentController::getPaymentStatus',['filter' => 'studentAuthGuard']);
$routes->get('/payment/free-payable-product','StudentController::addFreeProductByItsPromoCode',['filter' => 'studentAuthGuard']);
$routes->post('/remove-cart-items','StudentController::removeCartItems',['filter' => 'studentAuthGuard']);
$routes->post('/promo/remove-promocode','StudentController::removePromocode',['filter' => 'studentAuthGuard']);

$routes->get('/about-us','StudentController::loadAboutUsPage');
$routes->get('/contact-us','StudentController::loadContactUsPage');
$routes->get('/privacy-policy','StudentController::loadPrivacyPolicyPage');
$routes->get('/important-links','StudentController::loadImportantLinkPage');
$routes->get('/faq','StudentController::loadStudentFaq');
$routes->get('/testimonial','StudentController::loadStudentTestimonial');
$routes->get('/syllabus','StudentController::loadStudentSyllabus');
$routes->get('/why-us','StudentController::loadWhyUsPage');
$routes->get('/plans','StudentController::loadplansPage');
$routes->get('/pricing','StudentController::loadpricingPage');
$routes->get('/sample-answersheet','StudentController::loadsampleAnsPage');
$routes->get('/disclaimer','StudentController::loadDisclaimer');
$routes->get('/cancellation-policy','StudentController::loadCancelationPolicy');
$routes->get('/pass-plan-policy','StudentController::loadPassPlanPolicy');

$routes->get('/terms-and-conditions','StudentController::loadTermsAndConditions');
$routes->get('/my-resources/level','STDashboradController::loadMyResourceLevelPage',['filter' => 'studentAuthGuard']);
$routes->get('/my-resources/type/(:any)','STDashboradController::loadMyResourceTypePage/$1',['filter' => 'studentAuthGuard']);
$routes->get('/my-resources/subject','STDashboradController::loadMyResourceSubjectPage',['filter' => 'studentAuthGuard']);
$routes->get('/my-resources/subject/(:any)','STDashboradController::loadMyResourceSubjectPage/$1',['filter' => 'studentAuthGuard']);

$routes->get('/notes-list','StudentController::loadNotesListPage');
$routes->get('/level/type/(:any)','StudentController::loadTopicListPage/$1');
$routes->get('/level/cs-test-series','StudentController::loadLevelList');
$routes->get('/type/subject/(:any)','StudentController::loadSubjectListPage/$1');
$routes->get('/subject/more-details/(:any)','StudentController::loadSubjectMoreDetailsPage/$1');
$routes->get('/my-resources/paper/(:any)','STDashboradController::loadPaperListPage/$1');
$routes->get('/my-resources/paper/(:any)/(:any)','STDashboradController::loadPaperListPage/$1/$2');

$routes->post('/upload/assignment-file','STDashboradController::uploadAssignmentFile');
$routes->get('/fetch-assignment-status','STDashboradController::fetchAssignmentStatus');
$routes->post('/apply-promocode','StudentController::applyPromocode');
$routes->get('/forgot-password','StudentController::loadForgotPassword');
$routes->post('/forgot-pass-email','StudentController::forgotPassEmail');
$routes->post('/verify-otp','StudentController::verifyOTP');
$routes->post('/set-new-password','StudentController::setNewPassword');
$routes->get('/set-password','StudentController::loadSetPasswordPage');

$routes->get('/cart-payment','StudentController::loadPaymentpage');
$routes->post('/cart-payment/manual','StudentController::addManualPayment');

$routes->get('/order-history','StudentController::loadOrderHistoryPage');

$routes->get('/checkout-phone-pe-cart-items','StudentController::checkoutGatewayRedirect');
$routes->post('/success-payment','StudentController::phonepePaymentSuccess');

$routes->get('/purchase-status','StudentController::cashfreepurchaseStatus');

// newsletter
$routes->post('/newsletter/add-newsletter','StudentController::addNewsLetter');

// blog
$routes->get('/blog/(:any)','StudentController::loadBlogDetailsPage/$1');
$routes->get('/blogs','StudentController::loadBlogListPage');

// notes
$routes->get('/notes/subject-list','STDashboradController::loadNotesSubjectList');
$routes->get('/notes/subject-list/(:any)','STDashboradController::loadNotesSubjectList/$1');
$routes->get('/notes/notes-list/(:any)','STDashboradController::loadNotesList/$1');
$routes->get('/notes/notes-list/(:any)/(:any)','STDashboradController::loadNotesList/$1/$2');

// invoice
$routes->get('/invoice/download-invoice','STDashboradController::downloadInvoice');

// amendment
$routes->get('/amendment/subject-list','STDashboradController::loadAmendmentSubjectList');
$routes->get('/amendment/amendment-list/(:any)','STDashboradController::loadAmendmentList/$1');

// question bank
$routes->get('/qbank/subject-list','STDashboradController::loadQbankSubjectList');
$routes->get('/qbank/qbank-list/(:any)','STDashboradController::loadQbankList/$1');
$routes->get('/download-invoice','STDashboradController::downloadInvoice');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

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

$routes->get('/admin_panel','DashboardController::loadAdminPanel',['filter' => 'authGuard']);
$routes->get('/admin/upload-notes','DashboardController::loadUploadNotesPage',['filter' => 'authGuard']);
$routes->post('/admin/addLevel','DashboardController::addLevel',['filter' => 'authGuard']);
$routes->get('/admin/fetch-level-list','DashboardController::fetchLevelList',['filter' => 'authGuard']);
$routes->post('/admin/delete-level','DashboardController::deleteLevel',['filter' => 'authGuard']);

$routes->post('/admin/addType','DashboardController::addType',['filter' => 'authGuard']);
$routes->post('/admin/fetch-type-list','DashboardController::fetchTypeList',['filter' => 'authGuard']);
$routes->post('/admin/delete-type','DashboardController::deleteType',['filter' => 'authGuard']);

$routes->post('/admin/addSubject','DashboardController::addSubject',['filter' => 'authGuard']);
$routes->post('/admin/fetch-subject-list','DashboardController::fetchSubjectList',['filter' => 'authGuard']);
$routes->post('/admin/delete-subject','DashboardController::deleteSubject',['filter' => 'authGuard']);

$routes->post('/admin/upload-type-more-details','DashboardController::uplodTypeMoreDetails',['filter' => 'authGuard']);
$routes->post('/admin/fetch-type-details','DashboardController::fetchTypeDetails',['filter' => 'authGuard']);
$routes->post('/admin/upload-type-schedule','DashboardController::uploadTypeSchedule',['filter' => 'authGuard']);
$routes->post('/admin/remove-type-schedule','DashboardController::removeTypeSchedule',['filter' => 'authGuard']);

$routes->post('/admin/add-subject-additional-details','DashboardController::addSubjectAdditionalDetails',['filter' => 'authGuard']);
$routes->post('/admin/fetch-subject-details','DashboardController::fetchSubjectAdditionalDetails',['filter' => 'authGuard']);
$routes->post('/admin/upload-paper-details','DashboardController::uploadPaperDetails',['filter' => 'authGuard']);
$routes->get('/admin/upload-recheck/export','DashboardController::exportPaperDetails',['filter' => 'authGuard']);

$routes->get('/admin/notes-list','DashboardController::loadNotesListPage',['filter' => 'authGuard']);
$routes->post('/admin/delete-notes','DashboardController::deleteNotes',['filter' => 'authGuard']);
$routes->get('/admin/upload-notice','DashboardController::loadUploadNoticePage',['filter' => 'authGuard']);
$routes->post('/admin/upload/notice','DashboardController::uploadNotice',['filter' => 'authGuard']);
$routes->get('/admin/notice-list','DashboardController::loadNoticeListPage',['filter' => 'authGuard']);

$routes->post('/admin/delete/notice','DashboardController::deleteNotice',['filter' => 'authGuard']);
$routes->get('/admin/student-list','DashboardController::loadStudentListPage',['filter' => 'authGuard']);
$routes->post('/admin/get-student-list','DashboardController::getStudentList',['filter' => 'authGuard']);

$routes->post('/admin/student-details','DashboardController::fetchStudentDetails',['filter' => 'authGuard']);
$routes->post('/admin/change/student-status','DashboardController::changeStudentStatus',['filter' => 'authGuard']);

$routes->get('/admin/assignment-level-list','DashboardController::loadAssignmentLevel',['filter' => 'authGuard']);
$routes->get('/admin/assignment-list/(:any)','DashboardController::loadAssignmentPage/$1',['filter' => 'authGuard']);
$routes->post('/admin/fetch-assignments','DashboardController::fetchAssignmentDetails',['filter' => 'authGuard']);
$routes->post('/admin/upload-rechek/papers','DashboardController::updateRecheckAssignment',['filter' => 'authGuard']);
$routes->get('/admin/promocodes','DashboardController::loadPromocodePage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-prmocodes','DashboardController::fetchPromocodes',['filter' => 'authGuard']);
$routes->post('/admin/add-promo-codes','DashboardController::addPromoCodes',['filter' => 'authGuard']);
$routes->post('/admin/delete-promo-code','DashboardController::deletePromocode',['filter' => 'authGuard']);
$routes->post('/admin/subject-list','DashboardController::getSubjectList',['filter' => 'authGuard']);
$routes->post('/admin/change-subject-visibility','DashboardController::changeSubVisibility',['filter' => 'authGuard']);
$routes->get('/admin/student-export','DashboardController::exportStudentDetails',['filter' => 'authGuard']);

// pending payment
$routes->get('/admin/pending-payment-list','DashboardController::loadPendingPaymentDeatils',['filter' => 'authGuard']);
$routes->post('/admin/fetch-pending-payment','DashboardController::fetchPendingPaymentList',['filter' => 'authGuard']);
$routes->post('/admin/verify-manual-payment','DashboardController::verifyManualPayment',['filter' => 'authGuard']);
 
// examinar list
$routes->post('/verify/examinarlogin', 'LoginController::verifyEaxminarLogin');
$routes->post('/examinar-change-password', 'DashboardController::examinarChangePassword');
$routes->get('/admin/examinar-list','DashboardController::fetchExaminarListPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-examinar-list','DashboardController::getExaminarList',['filter' => 'authGuard']);
$routes->post('/admin/add-examinar','DashboardController::addExaminar',['filter' => 'authGuard']);
$routes->post('/admin/examinar-status-change','DashboardController::changeExaminarBlockedStatus',['filter' => 'authGuard']);

// paper list
$routes->get('/admin/paper-list','DashboardController::loadPaperListPage');
$routes->post('/admin/fetch-paper-list-details','DashboardController::fetchedPaperList');
$routes->post('/admin/paper-remove','DashboardController::removePaper');
$routes->post('/admin/paper/upload-file','DashboardController::uploadFile');
$routes->post('/admin/paper/change-status','DashboardController::changePaperStatus');
$routes->post('/admin/paper/update-paper-details','DashboardController::updatePaperDetails');

// newsletter
$routes->get('/admin/newsletter','DashboardController::loadNewsLetterPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-newsletter-list','DashboardController::fetchNewsLetter');
$routes->post('/admin/newsletter/active','DashboardController::changeNewsletterStatus');
$routes->post('/admin/send-newsletter','DashboardController::sendnewsLetter');

// blog
$routes->get('/admin/blog-list','DashboardController::loadBlogPage',['filter' => 'authGuard']);
$routes->post('/admin/fetch-blog-list','DashboardController::fetchBlogList');
$routes->get('/admin/blog-list/add','DashboardController::loadAddBlogPage',['filter' => 'authGuard']);
$routes->post('/admin/blog-list/add-details','DashboardController::addBlogDetails');
$routes->get('/admin/blog-list/add/(:any)','DashboardController::loadAddBlogPage/$1');
$routes->post('/admin/blog-list/changeStatus','DashboardController::changeBlogStatus');
$routes->post('/admin/blog-list/delete','DashboardController::deleteBlogItem');

// note
$routes->get('/admin/notes','DashboardController::loadNotes');
$routes->post('/admin/fetch-notes','DashboardController::fetchNotesDetails');
$routes->get('/admin/notes-list/add','DashboardController::loadAddNotesPage');
$routes->get('/admin/notes-list/add/(:any)','DashboardController::loadAddNotesPage/$1');
$routes->post('/admin/notes/fetch-type-list','DashboardController::fetchTypeList');
$routes->post('/admin/notes/fetch-subject-list','DashboardController::fetchSubjectList',['filter' => 'authGuard']);
$routes->post('/admin/notes/upload-sub-note','DashboardController::uploadSubNotes',['filter' => 'authGuard']);
$routes->post('/admin/notes/status-update','DashboardController::statusUpdate',['filter' => 'authGuard']);
$routes->post('/admin/notes/delete','DashboardController::deleteNotes',['filter' => 'authGuard']);

// student Access
$routes->get('/admin/student-access','DashboardController::loadStudentAccess',['filter'=>'authGuard']);
$routes->post('/admin/fetch-student-access-list','DashboardController::fetchTypeListForAccess',['filter'=>'authGuard']);
$routes->post('/admin/access','DashboardController::studentAccess',['filter'=>'authGuard']);

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

$routes->get('/notes-list','StudentController::loadNotesListPage');
$routes->get('/level/type/(:any)','StudentController::loadTopicListPage/$1');
$routes->get('/level/level-list','StudentController::loadLevelList');
$routes->get('/type/subject/(:any)','StudentController::loadSubjectListPage/$1');
$routes->get('/subject/more-details/(:any)','StudentController::loadSubjectMoreDetailsPage/$1');
$routes->get('/my-resources/paper/(:any)','STDashboradController::loadPaperListPage/$1');
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

$routes->post('/checkout-phone-pe-cart-items','StudentController::phonepePayment');
$routes->post('/success-payment','StudentController::phonepePaymentSuccess');
// newsletter
$routes->post('/newsletter/add-newsletter','StudentController::addNewsLetter');
// blog
$routes->get('/blog-details/(:any)','StudentController::loadBlogDetailsPage/$1');

// notes
$routes->get('/notes/subject-list','STDashboradController::loadNotesSubjectList');
$routes->get('/notes/notes-list/(:any)','STDashboradController::loadNotesList/$1');
// invoice
$routes->get('/invoice/download-invoice','STDashboradController::downloadInvoice');

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

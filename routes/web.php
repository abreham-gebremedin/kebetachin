<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// ////////////////////////////
// sample payment

Route::post('/pay', 'paymenttypeController@pay');
Route::get('/ipn', 'ipncontroller@index');
Route::get('/yenepaysuccess', 'yenepaysucesscontroller@index');
Route::get('/yenepaycancel', 'yenepaycancelcontroller@index');


// ///////////////////








Route::get('/home', 'HomeController@index');

Route::get('/useragreement', 'FreelancerController@useragreement');
Route::get('/reghome','FreelancerController@reghome');

 
Route::get('/', 'JobController@hmecategories');
// Route::get('/email', 'HomeController@email')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('auth','admin');
Route::get('/freelancerlogin', 'HomeController@freelancersession');
Route::get('/cleintlogin', 'HomeController@clientsession')
->name("cleintlogin")->middleware('auth', 'iscleintregistered');

 
Route::resources([
    'freelancer' => 'FreelancerController',
    'client' => 'HireManager',

    'company' => 'ComponyController',
    'education' => 'EducationController'
    
]);

Auth::routes(['verify' => true]);


 
// Company registration
 Route::get('/location1', 'LocationController@createStep1')->name('signup');
 Route::post('/location1', 'LocationController@PostcreateStep1');
 Route::get('/company2', 'ComponyController@createStep2')
->name("newcompany")->middleware('auth', 'cleint');

 
 Route::post('/company2', 'ComponyController@PostcreateStep2')
->name("postnewcompany")->middleware('auth', 'cleint');

 Route::get('/company3', 'ComponyController@createStep3')
->name("newcompanynext")->middleware('auth', 'cleint');

 Route::post('/company3', 'ComponyController@PostcreateStep3')
->name("postnewcompanynext")->middleware('auth', 'cleint');

 Route::post('/store', 'ComponyController@store')
->name("storenewcompany")->middleware('auth', 'cleint');

 Route::get('/data', 'ComponyController@index')
->name("company")->middleware('auth', 'cleint');



// frelancer registration
 
Route::get('/freelance1', 'FreelancerController@createStep1')
->name("newfrelancer")->middleware('auth', 'freelancer');

Route::post('/freelance1', 'FreelancerController@PostcreateStep1')
->name("postfreelance1")->middleware('auth', 'freelancer');
Route::get('/freelancer2', 'FreelancerController@createStep2')
->name("freelancer2")->middleware('auth', 'freelancer');
Route::post('/freelancer2', 'FreelancerController@PostcreateStep2')
->name("postfreelancer2")->middleware('auth', 'freelancer');
 
Route::get('/freelancer3', 'FreelancerController@createStep3')
->name("freelancer3")->middleware('auth', 'freelancer');
Route::post('/freelancer3', 'FreelancerController@PostcreateStep3')
->name("postfreelancer3")->middleware('auth', 'freelancer');
Route::get('/freelancer4', 'FreelancerController@createStep4')
->name("freelancer4")->middleware('auth', 'freelancer');
Route::post('/freelancer4', 'FreelancerController@PostcreateStep4')
->name("postfreelancer4")->middleware('auth', 'freelancer');

Route::get('/freelancer5', 'FreelancerController@createStep5')
->name("freelancer5")->middleware('auth', 'freelancer');
Route::post('/freelancer5', 'FreelancerController@store')
->name("postfreelancer5")->middleware('auth', 'freelancer');
Route::get('/freelancers', 'FreelancerController@index')
->name("freelancer6")->middleware('auth', 'freelancer');
Route::get('/freelancer-detail', 'FreelancerController@freelancer_detail');


// job area
Route::get('/jobpost', 'JobController@create1')
->name("ceateJob")->middleware('auth', 'cleint');
Route::post('/jobpost', 'JobController@PostcreateJob1')
->name("postceateJob")->middleware('auth', 'cleint');

Route::get('/jobpost/next', 'JobController@create2')
->name("ceateJobnext")->middleware('auth', 'cleint');

Route::post('/jobpost/next', 'JobController@PostcreateJob2')
->name("postceateJobnext")->middleware('auth', 'cleint');

Route::get('/job-a-detail/{id}', 'JobController@showjobmanager')
->name("jobadetail")->middleware('auth', 'cleint');

Route::get('/job-f-detail/{id}', 'JobController@showjobfreelancer')
->name("jobfdetail")->middleware('auth', 'freelancer');
Route::get('/submit/{id}/proposal', 'proposalController@create')
->name("proposal.create")->middleware('auth', 'freelancer');
Route::post('/submit/proposal', 'proposalController@createPost')
->name("proposal.post")->middleware('auth', 'freelancer');
Route::post('submit/proposalnext', 'proposalController@nn')
->name("proposal.createnext")->middleware('auth', 'freelancer');
Route::get('/submit/proposalnext', 'proposalController@nextCreate')
->name("proposal.postnext")->middleware('auth', 'freelancer');
Route::get('/cproposals', 'proposalController@cleintproposals')
->name("cproposals")->middleware('auth', 'cleint');

Route::get('/fproposals', 'proposalController@Freelancerproposals')
->name("fproposals")->middleware('auth', 'freelancer');
Route::get('/view/{id}/proposal', 'proposalController@viewproposal')
->name("veiw.proposals")->middleware('auth');

Route::post('/change/proposalstatus', 'proposalController@changeproposalstatus')
->name("edit.proposals")->middleware('auth', 'freelancer');



Route::get('/create/{id}/contract', 'proposalController@createcontract')
->name("contract.create")->middleware('auth', 'cleint');

Route::post('/make/contract', 'proposalController@storecontract')
->name("contract.make")->middleware('auth', 'cleint');

Route::post('/make/payment', 'proposalController@makepayment')
->name("contract.payment")->middleware('auth', 'cleint');

Route::get('/hpayment', 'proposalController@Hpayments')
->name("hpayment")->middleware('auth', 'cleint');
Route::get('/contracts', 'proposalController@contracts')
->name("contracts")->middleware('auth', 'cleint');
Route::get('/fcontracts', 'proposalController@fcontracts')
->name("fcontract")->middleware('auth', 'freelancer');
Route::get('/view/{id}/contract', 'proposalController@viewcontract')
->name("view.contract")->middleware('auth');




Route::get('/jobs', 'JobController@index')
->name("jobs");

Route::get('/myjobs', 'JobController@index2')
->name("myjobs")->middleware('auth', 'cleint');

// message rote

Route::get('/fmessages', 'MessageController@index')
->name("fmessages")->middleware('auth', 'freelancer');

Route::get('/cmessages', 'MessageController@index2')
->name("cmessages")->middleware('auth', 'cleint');

Route::get('/view/{id}/fmessages', 'MessageController@fview')
->name("view.fmessages")->middleware('auth', 'freelancer');
Route::get('/view/{id}/cmessages', 'MessageController@cview')
->name("view.cmessages")->middleware('auth', 'cleint');

Route::post('/sendmessage', 'MessageController@send')
->name("sendmessage");




 

Route::get('/freelancers', 'FreelancerController@index')
->name("freelancers")->middleware('auth', 'freelancer');




Route::get('addpost','PostController@create');
Route::post('addpost','PostController@store');
Route::get('post','PostController@index');

 



// categories
Route::get('/categories', 'JobCatagoryController@index')
->name("categories")->middleware('auth','admin');
Route::post('/categories/create', 'JobCatagoryController@store')
->name("ceatecategories")->middleware('auth','admin');

Route::get('/categories/d/{id}', 'JobCatagoryController@destroy')
->name("jobcategory.destroy")->middleware('auth','admin');

Route::get('/categories/u/{id}', 'JobCatagoryController@edit')
->name("jobcategory.edit")->middleware('auth','admin');


Route::put('/categories/update/{id}', 'JobCatagoryController@update')
->name("jobcategory.update")->middleware('auth','admin');



// Skills
Route::get('/skills', 'skillcontroller@index')
->name("skills")->middleware('auth','admin');
Route::post('/skills/create', 'skillcontroller@store')
->name("ceateskill")->middleware('auth','admin');

Route::get('/skills/d/{id}', 'skillcontroller@destroy')
->name("skills.destroy")->middleware('auth','admin');

Route::get('/skills/u/{id}', 'skillcontroller@edit')
->name("skills.edit")->middleware('auth','admin');

Route::put('/skills/update/{id}', 'skillcontroller@update')
->name("skills.update")->middleware('auth','admin');


// expecteddurations
Route::get('/expecteddurations', 'expectedeurationcontroller@index')
->name("expecteddurations")->middleware('auth','admin');
Route::post('/expecteddurations/create', 'expectedeurationcontroller@store')
->name("ceateexpecteddurations")->middleware('auth','admin');

Route::get('/expecteddurations/d/{id}', 'expectedeurationcontroller@destroy')
->name("expecteddurations.destroy")->middleware('auth','admin');

Route::get('/expecteddurations/u/{id}', 'expectedeurationcontroller@edit')
->name("expecteddurations.edit")->middleware('auth','admin');


Route::put('/expecteddurations/update/{id}', 'expectedeurationcontroller@update')
->name("expecteddurations.update")->middleware('auth','admin');

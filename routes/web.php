<?php
Route::get('/', 'MainController@index')->name('main');
Route::post('/topay', 'MainController@topay')->name('topay');
Route::post('/comment', 'CommentController@store');

// Backend...
Route::get('/admin', function () { return redirect('/admin/home'); });

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::resource('portfolios', 'Admin\PortfoliosController');
    Route::post('portfolios_mass_destroy', ['uses' => 'Admin\PortfoliosController@massDestroy', 'as' => 'portfolios.mass_destroy']);
    Route::post('portfolios_restore/{id}', ['uses' => 'Admin\PortfoliosController@restore', 'as' => 'portfolios.restore']);
    Route::delete('portfolios_perma_del/{id}', ['uses' => 'Admin\PortfoliosController@perma_del', 'as' => 'portfolios.perma_del']);
    
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoriesController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoriesController@restore', 'as' => 'categories.restore']);
    Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoriesController@perma_del', 'as' => 'categories.perma_del']);

    Route::resource('programs', 'Admin\ProgramsController');
    Route::post('programs_mass_destroy', ['uses' => 'Admin\ProgramsController@massDestroy', 'as' => 'programs.mass_destroy']);
    Route::post('programs_restore/{id}', ['uses' => 'Admin\ProgramsController@restore', 'as' => 'programs.restore']);
    Route::delete('programs_perma_del/{id}', ['uses' => 'Admin\ProgramsController@perma_del', 'as' => 'programs.perma_del']);

    Route::resource('subprogrammes', 'Admin\SubprogrammesController');
    Route::post('subprogrammes_mass_destroy', ['uses' => 'Admin\SubprogrammesControllerr@massDestroy', 'as' => 'subprogrammes.mass_destroy']);
    Route::post('subprogrammes_restore/{id}', ['uses' => 'Admin\SubprogrammesController@restore', 'as' => 'subprogrammes.restore']);
    Route::delete('subprogrammes_perma_del/{id}', ['uses' => 'Admin\SubprogrammesController@perma_del', 'as' => 'subprogrammes.perma_del']);

    Route::resource('main_menus', 'Admin\MainMenusController');
    Route::post('main_menus_mass_destroy', ['uses' => 'Admin\MainMenusController@massDestroy', 'as' => 'main_menus.mass_destroy']);
    Route::post('main_menus_restore/{id}', ['uses' => 'Admin\MainMenusController@restore', 'as' => 'main_menus.restore']);
    Route::delete('main_menus_perma_del/{id}', ['uses' => 'Admin\MainMenusController@perma_del', 'as' => 'main_menus.perma_del']);

    Route::resource('menu_socials', 'Admin\MenuSocialsController');
    Route::post('menu_socials_mass_destroy', ['uses' => 'Admin\MenuSocialsController@massDestroy', 'as' => 'menu_socials.mass_destroy']);
    Route::post('menu_socials_restore/{id}', ['uses' => 'Admin\MenuSocialsController@restore', 'as' => 'menu_socials.restore']);
    Route::delete('menu_socials_perma_del/{id}', ['uses' => 'Admin\MenuSocialsController@perma_del', 'as' => 'menu_socials.perma_del']);

    Route::resource('prices', 'Admin\PricesController');
    Route::post('prices_mass_destroy', ['uses' => 'Admin\PricesController@massDestroy', 'as' => 'prices.mass_destroy']);
    Route::post('prices_restore/{id}', ['uses' => 'Admin\PricesController@restore', 'as' => 'prices.restore']);
    Route::delete('prices_perma_del/{id}', ['uses' => 'Admin\PricesController@perma_del', 'as' => 'prices.perma_del']);

    Route::resource('photo_image_pages', 'Admin\PhotoImagePageController');
    Route::post('photo_image_pages_mass_destroy', ['uses' => 'Admin\PhotoImagePageController@massDestroy', 'as' => 'photo_image_pages.mass_destroy']);
    Route::post('photo_image_pages_restore/{id}', ['uses' => 'Admin\PhotoImagePageController@restore', 'as' => 'photo_image_pages.restore']);
    Route::delete('photo_image_pages_perma_del/{id}', ['uses' => 'Admin\PhotoImagePageController@perma_del', 'as' => 'photo_image_pages.perma_del']);

    Route::resource('comments', 'Admin\CommentController');
    Route::get('/comment/toggle/{id}', 'Admin\CommentController@toggle');
    Route::post('comments_mass_destroy', ['uses' => 'Admin\CommentController@massDestroy', 'as' => 'comments.mass_destroy']);
    Route::post('comments_restore/{id}', ['uses' => 'Admin\CommentController@restore', 'as' => 'comments.restore']);
    Route::delete('comments_perma_del/{id}', ['uses' => 'Admin\CommentController@perma_del', 'as' => 'comments.perma_del']);




});

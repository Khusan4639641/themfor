<?php
//Router
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r){
////////////////////*** GET ***//////////////////////////////
//  HOME ROUTE AND SETTINGS
    $r->addRoute('GET', '/admin', ["App\controllers\AdminController", "index"]);
    $r->addRoute('GET', '/admin/', ["App\controllers\AdminController", "index"]);

    $r->addRoute('POST', '/setting-set', ["App\controllers\settingController", "set"]);
    $r->addRoute('POST', '/setting-set/', ["App\controllers\settingController", "set"]);

    $r->addRoute('POST', '/setting-select', ["App\controllers\settingController", "select"]);
    $r->addRoute('POST', '/setting-select/', ["App\controllers\settingController", "select"]);

    $r->addRoute('POST', '/pass-check', ["App\controllers\settingController", "passCheck"]);
    $r->addRoute('POST', '/pass-check/', ["App\controllers\settingController", "passCheck"]);

//  INSTALL
    $r->addRoute('GET', '/install', ["App\controllers\installController", "install"]);
    $r->addRoute('GET', '/install/', ["App\controllers\installController", "install"]);

    $r->addRoute('POST', '/install', ["App\controllers\installController", "installation"]);
    $r->addRoute('POST', '/install/', ["App\controllers\installController", "installation"]);

//  LOGIN ROUTE
    $r->addRoute('GET', '/login', ["App\controllers\loginController", "index"]);
    $r->addRoute('GET', '/login/', ["App\controllers\loginController", "index"]);

    $r->addRoute('POST', '/login', ["App\controllers\loginController", "login"]);
    $r->addRoute('POST', '/login/', ["App\controllers\loginController", "login"]);

    $r->addRoute('GET', '/logout', ["App\controllers\loginController", "logout"]);
    $r->addRoute('GET', '/logout/', ["App\controllers\loginController", "logout"]);

//  FORM ROUTE
    $r->addRoute('GET', '/admin/form-create', ["App\controllers\\formController", "createView"]);
    $r->addRoute('GET', '/admin/form-create/', ["App\controllers\\formController", "createView"]);

    $r->addRoute('GET', '/admin/form-list', ["App\controllers\\formController", "formList"]);
    $r->addRoute('GET', '/admin/form-list/', ["App\controllers\\formController", "formList"]);

    $r->addRoute('GET', '/admin/form-disabled-list', ["App\controllers\\formController", "formListDis"]);
    $r->addRoute('GET', '/admin/form-disabled-list/', ["App\controllers\\formController", "formListDis"]);

    $r->addRoute('POST', '/save-form', ["App\controllers\\formController", "saveForm"]);
    $r->addRoute('POST', '/save-form/', ["App\controllers\\formController", "saveForm"]);

    $r->addRoute('POST', '/show-form-one', ["App\controllers\\formController", "showOne"]);
    $r->addRoute('POST', '/show-form-one/', ["App\controllers\\formController", "showOne"]);

    $r->addRoute('POST', '/delete-form', ["App\controllers\\formController", "deleteForm"]);
    $r->addRoute('POST', '/delete-form/', ["App\controllers\\formController", "deleteForm"]);

    $r->addRoute('POST', '/delete-form-image', ["App\controllers\\formController", "deleteFormImage"]);
    $r->addRoute('POST', '/delete-form-image/', ["App\controllers\\formController", "deleteFormImage"]);

    $r->addRoute('POST', '/delete-upload-file', ["App\controllers\\formController", "deleteUploadFile"]);
    $r->addRoute('POST', '/delete-upload-file/', ["App\controllers\\formController", "deleteUploadFile"]);

    $r->addRoute('POST', '/delete-form-video', ["App\controllers\\formController", "deleteFormVideo"]);
    $r->addRoute('POST', '/delete-form-video/', ["App\controllers\\formController", "deleteFormVideo"]);

    $r->addRoute('POST', '/upload-form-image', ["App\controllers\\formController", "uploadFormImage"]);
    $r->addRoute('POST', '/upload-form-image/', ["App\controllers\\formController", "uploadFormImage"]);

    $r->addRoute('POST', '/upload-form-video', ["App\controllers\\formController", "uploadFormVideo"]);
    $r->addRoute('POST', '/upload-form-video/', ["App\controllers\\formController", "uploadFormVideo"]);

    $r->addRoute('POST', '/disable-form', ["App\controllers\\formController", "disableForm"]);
    $r->addRoute('POST', '/disable-form/', ["App\controllers\\formController", "disableForm"]);

    $r->addRoute('POST', '/save-update-form', ["App\controllers\\formController", "saveUpdateForm"]);
    $r->addRoute('POST', '/save-update-form/', ["App\controllers\\formController", "saveUpdateForm"]);

    $r->addRoute('POST', '/form-check-url', ["App\controllers\\formController", "formCheckUrl"]);
    $r->addRoute('POST', '/form-check-url/', ["App\controllers\\formController", "formCheckUrl"]);

    $r->addRoute('GET', '/admin/form/copy/{id}', ["App\controllers\\formController", "formCopy"]);
    $r->addRoute('GET', '/admin/form/copy/{id}/', ["App\controllers\\formController", "formCopy"]);

    $r->addRoute('GET', '/admin/form/edit/{id}', ["App\controllers\\formController", "formEdit"]);
    $r->addRoute('GET', '/admin/form/edit/{id}/', ["App\controllers\\formController", "formEdit"]);

    $r->addRoute('GET', '/data/{form}', ["App\controllers\\formController", "showForm"]);
    $r->addRoute('GET', '/data/{form}/', ["App\controllers\\formController", "showForm"]);

    $r->addRoute('POST', '/html-text', ["App\controllers\\formController", "htmlToText"]);
    $r->addRoute('POST', '/html-text/', ["App\controllers\\formController", "htmlToText"]);

    $r->addRoute('POST', '/images-show', ["App\controllers\\formController", "imagesShow"]);
    $r->addRoute('POST', '/images-show/', ["App\controllers\\formController", "imagesShow"]);

    $r->addRoute('POST', '/videos-show', ["App\controllers\\formController", "videosShow"]);
    $r->addRoute('POST', '/videos-show/', ["App\controllers\\formController", "videosShow"]);

//  MESSAGE ROUTE
    $r->addRoute('GET', '/admin/message-new', ["App\controllers\\emailController", "index"]);
    $r->addRoute('GET', '/admin/message-new/', ["App\controllers\\emailController", "index"]);

    $r->addRoute('GET', '/admin/message-copy/{id}', ["App\controllers\\emailController", "messageCopy"]);
    $r->addRoute('GET', '/admin/message-copy/{id}/', ["App\controllers\\emailController", "messageCopy"]);

    $r->addRoute('POST', '/message-new', ["App\controllers\\emailController", "messageNew"]);
    $r->addRoute('POST', '/message-new/', ["App\controllers\\emailController", "messageNew"]);

    $r->addRoute('POST', '/candidate-select', ["App\controllers\\candidateController", "candidateSelect"]);
    $r->addRoute('POST', '/candidate-select/', ["App\controllers\\candidateController", "candidateSelect"]);

    $r->addRoute('POST', '/message-delete', ["App\controllers\\emailController", "messageDelete"]);
    $r->addRoute('POST', '/message-delete/', ["App\controllers\\emailController", "messageDelete"]);

    $r->addRoute('GET', '/admin/message-history', ["App\controllers\\emailController", "messageHistory"]);
    $r->addRoute('GET', '/admin/message-history/', ["App\controllers\\emailController", "messageHistory"]);

    $r->addRoute('POST', '/message-history', ["App\controllers\\emailController", "messageHistoryId"]);
    $r->addRoute('POST', '/message-history/', ["App\controllers\\emailController", "messageHistoryId"]);


    $r->addRoute('POST', '/files-show', ["App\controllers\\emailController", "messageShow"]);
    $r->addRoute('POST', '/files-show/', ["App\controllers\\emailController", "messageShow"]);

    $r->addRoute('POST', '/file-size', ["App\controllers\\emailController", "fileSize"]);
    $r->addRoute('POST', '/file-size/', ["App\controllers\\emailController", "fileSize"]);

//  NOTE ROUTE
    $r->addRoute('GET', '/admin/note-create', ["App\controllers\\noteController", "noteCreateView"]);
    $r->addRoute('GET', '/admin/note-create/', ["App\controllers\\noteController", "noteCreateView"]);

    $r->addRoute('GET', '/admin/note-edit/{id}', ["App\controllers\\noteController", "noteEdit"]);
    $r->addRoute('GET', '/admin/note-edit/{id}/', ["App\controllers\\noteController", "noteEdit"]);

    $r->addRoute('POST', '/note-update', ["App\controllers\\noteController", "noteUpdate"]);
    $r->addRoute('POST', '/note-update/', ["App\controllers\\noteController", "noteUpdate"]);

    $r->addRoute('GET', '/admin/note-active', ["App\controllers\\noteController", "noteNewView"]);
    $r->addRoute('GET', '/admin/note-active/', ["App\controllers\\noteController", "noteNewView"]);

    $r->addRoute('GET', '/admin/note-disabled', ["App\controllers\\noteController", "noteDoneView"]);
    $r->addRoute('GET', '/admin/note-disabled/', ["App\controllers\\noteController", "noteDoneView"]);

    $r->addRoute('POST', '/note-create', ["App\controllers\\noteController", "noteCreate"]);
    $r->addRoute('POST', '/note-create/', ["App\controllers\\noteController", "noteCreate"]);

    $r->addRoute('POST', '/view-note', ["App\controllers\\noteController", "viewNote"]);
    $r->addRoute('POST', '/view-note/', ["App\controllers\\noteController", "viewNote"]);

    $r->addRoute('POST', '/note-do-it', ["App\controllers\\noteController", "noteDoIt"]);
    $r->addRoute('POST', '/note-do-it/', ["App\controllers\\noteController", "noteDoIt"]);

    $r->addRoute('POST', '/note-delete', ["App\controllers\\noteController", "noteDelete"]);
    $r->addRoute('POST', '/note-delete/', ["App\controllers\\noteController", "noteDelete"]);

//  STATISTICS ROUTE
    $r->addRoute('GET', '/admin/setting', ["App\controllers\\settingController", "settingView"]);
    $r->addRoute('GET', '/admin/setting/', ["App\controllers\\settingController", "settingView"]);

    $r->addRoute('POST', '/statistics', ["App\controllers\\statisticController", "statistics"]);
    $r->addRoute('POST', '/statistics/', ["App\controllers\\statisticController", "statistics"]);

//  CANDIDATE ROUTE
    $r->addRoute('GET', '/admin/candidate', ["App\controllers\candidateController", "index"]);
    $r->addRoute('GET', '/admin/candidate/', ["App\controllers\candidateController", "index"]);

    $r->addRoute('GET', '/admin/candidate-success', ["App\controllers\candidateController", "activeView"]);
    $r->addRoute('GET', '/admin/candidate-success/', ["App\controllers\candidateController", "activeView"]);

    $r->addRoute('GET', '/admin/candidate-disabled', ["App\controllers\candidateController", "disabledView"]);
    $r->addRoute('GET', '/admin/candidate-disabled/', ["App\controllers\candidateController", "disabledView"]);

    $r->addRoute('POST', '/vacancy/{id}', ["App\controllers\candidateController", "addCandidate"]);
    $r->addRoute('POST', '/vacancy/{id}/', ["App\controllers\candidateController", "addCandidate"]);

    $r->addRoute('POST', '/resume-create', ["App\controllers\candidateController", "resumeCreate"]);
    $r->addRoute('POST', '/resume-create/', ["App\controllers\candidateController", "resumeCreate"]);

    $r->addRoute('POST', '/candidate-status', ["App\controllers\candidateController", "candidateStatus"]);
    $r->addRoute('POST', '/candidate-status/', ["App\controllers\candidateController", "candidateStatus"]);

//  UPLOADS ROUTE
    $r->addRoute('GET', '/admin/upload-images', ["App\controllers\uploadController", "images"]);
    $r->addRoute('GET', '/admin/upload-images/', ["App\controllers\uploadController", "images"]);

    $r->addRoute('GET', '/admin/upload-videos', ["App\controllers\uploadController", "videos"]);
    $r->addRoute('GET', '/upload-videos/', ["App\controllers\uploadController", "videos"]);

    $r->addRoute('POST', '/admin/upload-files', ["App\controllers\uploadController", "files"]);
    $r->addRoute('POST', '/admin/upload-files/', ["App\controllers\uploadController", "files"]);
//  LANDING ROUTE

    $r->addRoute('GET', '/admin/landing', ["App\controllers\landingController", "creatView"]);
    $r->addRoute('GET', '/admin/landing/', ["App\controllers\landingController", "creatView"]);

    $r->addRoute('POST', '/select-template', ["App\controllers\landingController", "selectTemplate"]);
    $r->addRoute('POST', '/select-template/', ["App\controllers\landingController", "selectTemplate"]);


    $r->addRoute('POST', '/save-template', ["App\controllers\landingController", "saveTemplate"]);
    $r->addRoute('POST', '/save-template/', ["App\controllers\landingController", "saveTemplate"]);

    $r->addRoute('POST', '/delete-template', ["App\controllers\landingController", "deleteTemplate"]);
    $r->addRoute('POST', '/delete-template/', ["App\controllers\landingController", "deleteTemplate"]);

    $r->addRoute('POST', '/new-template', ["App\controllers\landingController", "newTemplate"]);
    $r->addRoute('POST', '/new-template/', ["App\controllers\landingController", "newTemplate"]);
////////////////////*** POST ***//////////////////////////////

    $r->addRoute('POST', '/form-select', ["App\controllers\\formController", "select"]);
    $r->addRoute('POST', '/form-select/', ["App\controllers\\formController", "select"]);

    $r->addRoute('GET', '/{url}', ["App\controllers\landingController", "pageView"]);
    $r->addRoute('GET', '/{url}/', ["App\controllers\landingController", "pageView"]);

    $r->addRoute('GET', '/', ["App\controllers\landingController", "pageView"]);
});
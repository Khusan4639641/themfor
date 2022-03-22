<?php
namespace App\models;
class Install{
    public $secret_key;
    protected $pdo;
    public $installTable=[
        'messages'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    subject varchar(250) not null,
                    message text not null,
                    file text null,
                    mail varchar(255) not null,
                    org_copy text not null,
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'candidate'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    form_id int(10) not null,
                    income text not null,
                    status int(1) default '0',
                    mail varchar(255) not null,
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'forms'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    form_name varchar(200) not null,
                    structure text not null,
                    form_div text not null,
                    messageG text null,
                    url varchar(200) null,
                    status int(1) default '0',
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'notes'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    subject varchar(250) not null,
                    content text null,
                    status int(1) default '0',
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'menu'=>"
                    id int(1) not null auto_increment PRIMARY KEY,
                    menu text not null,
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'template'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    template text null,
                    url text null,
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'settings'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    property varchar(250) not null,
                    value text null,
                    reg_date datetime default CURRENT_TIMESTAMP not null",
        'users'=>"
                    id int(10) not null auto_increment PRIMARY KEY,
                    login varchar(250) not null,
                    password varchar(250) not null,
                    reg_date datetime default CURRENT_TIMESTAMP not null"
    ];
    protected $insertData = [
        "menu"=>[
            "menu" =>"<div class='topnav' id='myTopnav' data-style-read='
                         .topnav [#]
                         .topnav a [#]
                         .dropdown .dropbtn [#]
                         .topnav a.active [#]
                         .dropdown-content [#]
                         .dropdown-content a [#]
                         .topnav a:hover,.dropdown:hover .dropbtn [#]
                         .dropdown-content a:hover [#] ' data-style='menu-opacity=>0.7
                        menu-back-color=>#000000
                        menu-font-weight=>normal
                        menu-font-family=>Verdana, sans-serif
                        menu-font-style=>normal
                        menu-text-color=>#f2f2f2
                        menu-font-size=>16
                        menu-active-opacity=>1
                        menu-active-text-color=>#ffffff
                        menu-active-back-color=>#04AA6D
                        menu-dropdown-opacity=>1
                        menu-dropdown-back-color=>#f9f9f9
                        menu-dropdown-text-color=>#000000
                        menu-hover-opacity=>1
                        menu-hover-text-color=>#ffffff
                        menu-hover-back-color=>#555555
                        menu-dropdown-hover-opacity=>1
                        menu-dropdown-hover-text-color=>#ffffff
                        menu-dropdown-hover-back-color=>#dddddd
                        menu-blur=>3' data-style-code=' 
                         overflow: hidden;background-color:rgba(0, 0, 0, 0.7);position: sticky;top: 0;width: 100%;z-index: 10;font-size:14px;font-weight:normal;font-family:verdana, sans-serif;font-style:normal; [#]
                         float: left;display: block;color:rgb(242, 242, 242);text-align: center;padding: 14px 16px;text-decoration: none;font-size:16px; [#]
                         border: none;outline: none;color:rgb(242, 242, 242);padding: 14px 16px;background-color: inherit;margin: 0;font-size:16px;font-weight:normal;font-family:verdana, sans-serif;font-style:normal; [#]
                         background-color:rgba(4, 170, 109, 1);color:#ffffff; [#]
                         display: none;position: fixed;background-color:rgba(249, 249, 249, 1);min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 10; [#]
                         float: none;color:#000;padding: 12px 16px;text-decoration: none;display: block;text-align: left; [#]
                         background-color:rgba(85, 85, 85, 1);color:#ffffff; [#]
                         background-color:rgba(221, 221, 221, 1);color:#ffffff; [#] '><a href='home' data-link='home' class='active'>Home</a><a href='' data-link=''>News</a><a href='#news' data-link='#news'>Contact</a><div class='dropdown'><button class='dropbtn'>Dropdown
                            <i class='fa fa-caret-down'></i></button><div class='dropdown-content'><a href='#' data-link='#'>Link 1</a><a href='#' data-link='#'>Link 2</a><a href='#' data-link='#'>Link 3</a></div></div><a href='#about1' data-link='#about1'>About</a><a href='javascript:void(0);' class='icon' onclick='menu()'><i class='fa fa-bars'></i></a></div>"],
        "template"=>["template"=>"
        <div id='pasteBlog' data-style='body-opacity=>0.7;body-back-color=>#000000;selectBodyImage=>/web/form/images/1642926272.jpg;body-blur=>0;' data-style-read='#backTemplate::after [#] #backTemplate::before [#] ' data-style-code='content: &quot;&quot;;background-color:rgba(0, 0, 0, 0.7);position: fixed;z-index: -1;width: 100%;height: 100%;top: 0;left: 0;
 [#] background-image:url(&quot;/web/form/images/1642926272.jpg&quot;); background-repeat: no-repeat;background-size: cover;content: &quot;&quot;;position: fixed;top: 0;left: 0;z-index: -9;width: 100%;height: 100%;filter:blur(0px);

 [#] '>
    <div id='block-934-back' class='blocks'>
        <div class='paste workPlace' id='block-934' data-style='.block-flex=>center;#block-back-opacity=>0.3;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.1;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>100;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#block-934 [#] #block-934-back [#] #block-934:hover' data-style-code='justify-content:center;background-color:rgba(0, 0, 0, 0.3);  transition: 0.5s;color:#000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);margin:0px auto;width:100%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(0, 0, 0, 0.1);color:#000000;backdrop-filter:blur(0px);'>
            <div class='paste-inner draggable' draggable='true' id='element-840-back'>
                <div id='element-840' class='sub' data-style='.block-flex=>center;#block-back-opacity=>0.6;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>100;.block-padding=>0;.block-padding=>100;.block-padding=>50;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>70;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-840 [#] #element-840-back [#] #element-840:hover' data-style-code='justify-content:center;background-color:rgba(255, 255, 255, 0.6);  transition: 0.5s;color:#000000;padding-top:100px;padding-right:0px;padding-bottom:100px;padding-left:50px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:70%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '><span style='font-size: 36px; font-family: &quot;Source Sans Pro&quot;;' contenteditable='true'><span style='font-family: PangramLight;' contenteditable='true'><font style='' contenteditable='true'><span style='font-family: PangramExtraLight;' contenteditable='true'><font contenteditable='true'><span style='font-family: PangramLight;' contenteditable='true'><font color='#424242' contenteditable='true'>THIS PLATFORM HELP</font></span></font></span></font></span></span><span style='font-family: PangramLight;' contenteditable='true'><font color='#424242' contenteditable='true'>﻿</font></span><span style='font-size: 36px; font-family: &quot;Source Sans Pro&quot;;' contenteditable='true'><span style='font-family: PangramLight;' contenteditable='true'><font style='' contenteditable='true'><span style='font-family: PangramLight;' contenteditable='true'><font contenteditable='true' color='#424242'>S HR MANAGERS</font></span></font></span></span></p><p contenteditable='true' style='text-align: center; '><span style='font-size: 36px; font-family: &quot;Source Sans Pro&quot;;' contenteditable='true'><span style='font-family: PangramLight;' contenteditable='true'><font style='' contenteditable='true'><span style='font-family: PangramLight;' contenteditable='true'><font contenteditable='true' color='#424242'>&nbsp;</font></span></font></span></span><span style='color: rgb(66, 66, 66); font-family: PangramLight; font-size: 36px;'>GATHER&nbsp;</span><span style='color: rgb(66, 66, 66); font-family: PangramLight; font-size: 36px;'>RELEVANT CANDIDATES&nbsp;</span></p><p contenteditable='true' style='text-align: center; '><span style='color: rgb(66, 66, 66); font-family: PangramLight; font-size: 36px;'>UPON THEIR REQUEST</span></p>
                </div>
            </div>
        </div>
    </div>
    <div id='block-391-back' class='blocks'>
        <div class='paste workPlace' id='block-391' data-style='.block-flex=>center;#block-back-opacity=>0;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>100;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#block-391 [#] #block-391-back [#] #block-391:hover' data-style-code='justify-content:center;background-color:rgba(0, 0, 0, 0);  transition: 0.5s;color:#000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);margin:0px auto;width:100%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(0, 0, 0, 0);color:#000000;backdrop-filter:blur(0px);'>
            <div class='paste-inner draggable' draggable='true' id='element-835-back'>
                <div id='element-835' class='sub' data-style='.block-flex=>center;#block-back-opacity=>0.5;.block-back-color=>#04aa6d;.block-text-color=>#000000;.block-padding=>10;.block-padding=>10;.block-padding=>0;.block-padding=>10;.block-blur=>0;.border-radius=>30;.border-radius=>30;.border-radius=>30;.border-radius=>30;#block-hover-opacity=>0.4;.block-hover-back-color=>#04aa6d;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>50;.border-radius=>30;.border-radius=>30;.border-radius=>30;.border-radius=>30;' data-style-read='#element-835 [#] #element-835-back [#] #element-835:hover' data-style-code='justify-content:center;background-color:rgba(4, 170, 109, 0.5);  transition: 0.5s;color:#000000;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px;backdrop-filter:blur(0px);border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:50%;border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px; [#] background-color:rgba(4, 170, 109, 0.4);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '>
      <span style='font-size: 24px; font-family: &quot;Courier New&quot;;' contenteditable='true'>
       <span contenteditable='true' style='font-family: PangramExtraLight;'>
        <font color='#ffffff' contenteditable='true' style=''>What the new</font>
       </span>
      </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id='block-73-back' class='blocks'>
        <div class='paste workPlace' id='block-73' data-style='.block-flex=>space-between;#block-back-opacity=>0;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>100;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#block-73 [#] #block-73-back [#] #block-73:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0);  transition: 0.5s;color:#000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);margin:0px auto;width:100%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(0, 0, 0, 0);color:#000000;backdrop-filter:blur(0px);'>
            <div class='paste-inner draggable' draggable='true' id='element-804-back'>
                <div id='element-804' class='sub' data-style='#block-back-opacity=>0.5;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>30;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-804 [#] #element-804-back [#] #element-804:hover' data-style-code='background-color:rgba(255, 255, 255, 0.5);  transition: 0.5s;color:#000000;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:30%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <div style='text-align: center;' contenteditable='true'>
      <span style='font-size: 1rem;' contenteditable='true'>
       <span style='font-family: PangramLight; font-size: 24px;' contenteditable='true'>1. Easy to construct filling form and download the information of candidates in PDF format</span>
      </span>
                    </div>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-749-back'>
                <div id='element-749' class='sub' data-style='#block-back-opacity=>0.5;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>30;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-749 [#] #element-749-back [#] #element-749:hover' data-style-code='background-color:rgba(255, 255, 255, 0.5);  transition: 0.5s;color:#000000;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:30%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <div style='text-align: center;' contenteditable='true'>
                        <font face='Courier New' contenteditable='true'>
       <span style='font-size: 24px; font-family: PangramExtraLight;' contenteditable='true'>
        <span contenteditable='true' style='font-family: PangramLight;'>2. Create landing of your company</span>
       </span>
                        </font>
                    </div>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-143-back'>
                <div id='element-143' class='sub' data-style='#block-back-opacity=>0.5;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>30;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-143 [#] #element-143-back [#] #element-143:hover' data-style-code='background-color:rgba(255, 255, 255, 0.5);  transition: 0.5s;color:#000000;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:30%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <div style='text-align: center;' contenteditable='true'>
      <span style='font-size: 1rem;' contenteditable='true'>
       <span style='font-family: PangramLight; font-size: 24px;' contenteditable='true'>3. Sending multiple e-mails to candidates simultaneously&nbsp;</span>
      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='block-974-back' class='blocks'>
        <div class='paste workPlace' id='block-974' data-style='.block-flex=>space-between;#block-back-opacity=>0;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>100;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#block-974 [#] #block-974-back [#] #block-974:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0);  transition: 0.5s;color:#000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);margin:0px auto;width:100%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(0, 0, 0, 0);color:#000000;backdrop-filter:blur(0px);'>
            <div class='paste-inner draggable' draggable='true' id='element-695-back'>
                <div id='element-695' class='sub' data-style='#block-back-opacity=>0.5;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>30;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-695 [#] #element-695-back [#] #element-695:hover' data-style-code='background-color:rgba(255, 255, 255, 0.5);  transition: 0.5s;color:#000000;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:30%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <div style='text-align: center;' contenteditable='true'>
                        <font face='Courier New' contenteditable='true'>
       <span style='font-size: 24px; font-family: PangramExtraLight;' contenteditable='true'>
        <span contenteditable='true' style='font-family: PangramLight;'>4. Ease to instalation and other opportunities&nbsp;</span>
       </span>
                        </font>
                    </div>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-268-back'>
                <div id='element-268' class='sub' data-style='#block-back-opacity=>0.5;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>30;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-268 [#] #element-268-back [#] #element-268:hover' data-style-code='background-color:rgba(255, 255, 255, 0.5);  transition: 0.5s;color:#000000;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:30%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <div style='text-align: center;' contenteditable='true'>
                        <font face='Courier New' contenteditable='true'>
       <span style='font-size: 24px;' contenteditable='true'>
        <span contenteditable='true' style='font-family: PangramLight;'>5. Easy to learn and convenient to use</span>
       </span>
                        </font>
                    </div>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-957-back'>
                <div id='element-957' class='sub' data-style='#block-back-opacity=>0.5;.block-back-color=>#ffffff;.block-text-color=>#000000;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-padding=>30;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0.6;.block-hover-back-color=>#ffffff;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>30;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#element-957 [#] #element-957-back [#] #element-957:hover' data-style-code='background-color:rgba(255, 255, 255, 0.5);  transition: 0.5s;color:#000000;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:30%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(255, 255, 255, 0.6);color:#000000;backdrop-filter:blur(0px);'>
                    <div style='text-align: center;' contenteditable='true'>
                        <font face='Courier New' contenteditable='true'>
       <span style='font-size: 24px;' contenteditable='true'>
        <span contenteditable='true' style='font-family: PangramLight;'>6. Documentation and video course available</span>
       </span>
                        </font>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='block-254-back' class='blocks'>
        <div class='paste workPlace' id='block-254' data-style='.block-flex=>center;#block-back-opacity=>0;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>100;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#block-254 [#] #block-254-back [#] #block-254:hover' data-style-code='justify-content:center;background-color:rgba(0, 0, 0, 0);  transition: 0.5s;color:#000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);margin:0px auto;width:100%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(0, 0, 0, 0);color:#000000;backdrop-filter:blur(0px);'>
            <div class='paste-inner draggable' draggable='true' id='element-94-back'>
                <div id='element-94' class='sub' data-style='.block-flex=>center;#block-back-opacity=>0.5;.block-back-color=>#04aa6d;.block-text-color=>#000000;.block-padding=>10;.block-padding=>10;.block-padding=>0;.block-padding=>10;.block-blur=>0;.border-radius=>30;.border-radius=>30;.border-radius=>30;.border-radius=>30;#block-hover-opacity=>0.4;.block-hover-back-color=>#04aa6d;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>50;.border-radius=>30;.border-radius=>30;.border-radius=>30;.border-radius=>30;' data-style-read='#element-94 [#] #element-94-back [#] #element-94:hover' data-style-code='justify-content:center;background-color:rgba(4, 170, 109, 0.5);  transition: 0.5s;color:#000000;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px;backdrop-filter:blur(0px);border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:50%;border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px; [#] background-color:rgba(4, 170, 109, 0.4);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '>
      <span style='font-size: 24px; font-family: PangramExtraLight;' contenteditable='true'>
       <span contenteditable='true'>
        <font color='#ffffff' contenteditable='true' style=''>Videos and images available</font>
       </span>
      </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id='block-518-back' class='blocks'>
        <div class='paste workPlace' id='block-518' data-style='.block-flex=>space-between;#block-back-opacity=>0;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-padding=>0;.block-blur=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;#block-hover-opacity=>0;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>100;.border-radius=>0;.border-radius=>0;.border-radius=>0;.border-radius=>0;' data-style-read='#block-518 [#] #block-518-back [#] #block-518:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0);  transition: 0.5s;color:#000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;backdrop-filter:blur(0px);border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);margin:0px auto;width:100%;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px; [#] background-color:rgba(0, 0, 0, 0);color:#000000;backdrop-filter:blur(0px);'>
            <div class='paste-inner draggable' draggable='true' id='element-209-back'>
                <div id='element-209' class='sub' data-style='.block-flex=>space-between;#block-back-opacity=>0.5;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-blur=>0;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;#block-hover-opacity=>0.3;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>20;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;' data-style-read='#element-209 [#] #element-209-back [#] #element-209:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0.5);  transition: 0.5s;color:#000000;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;backdrop-filter:blur(0px);border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:20%;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-color:rgba(0, 0, 0, 0.3);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '>
                        <img src='/web/form/images/17.%20%D0%9C%D0%BE%D1%81%D1%82.jpg' style='width: 100%;' contenteditable='true'>
                        <font color='#ffffff' contenteditable='true'>
                            <strong style='margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;' contenteditable='true'>
                                <span style='font-family: PangramExtraLight;'>Lorem Ipsum</span>
                            </strong>
                            <span style='font-family: PangramExtraLight; font-size: 14px; text-align: justify;' contenteditable='true'>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                        </font>
                    </p>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-580-back'>
                <div id='element-580' class='sub' data-style='.block-flex=>space-between;#block-back-opacity=>0.5;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-blur=>0;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;#block-hover-opacity=>0.3;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>25;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;' data-style-read='#element-580 [#] #element-580-back [#] #element-580:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0.5);  transition: 0.5s;color:#000000;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;backdrop-filter:blur(0px);border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:25%;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-color:rgba(0, 0, 0, 0.3);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '>
                        <video controls='' src='/web/form/videos/Monster%20-%20Skillet%20[GMV].mp4' width='640' height='360' class='note-video-clip' contenteditable='true'></video>
                        <font color='#ffffff' contenteditable='true'>
                            <strong style='margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;' contenteditable='true'>
                                <span style='font-family: PangramExtraLight;'>Lorem Ipsum</span>
                            </strong>
                            <span style='font-family: PangramExtraLight; font-size: 14px; text-align: justify;' contenteditable='true'>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                        </font>
                    </p>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-351-back'>
                <div id='element-351' class='sub' data-style='.block-flex=>space-between;#block-back-opacity=>0.5;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-blur=>0;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;#block-hover-opacity=>0.3;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>20;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;' data-style-read='#element-351 [#] #element-351-back [#] #element-351:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0.5);  transition: 0.5s;color:#000000;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;backdrop-filter:blur(0px);border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:20%;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-color:rgba(0, 0, 0, 0.3);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '>
                        <img src='/web/form/images/17.%20%D0%9C%D0%BE%D1%81%D1%82.jpg' style='width: 100%;' contenteditable='true'>
                        <font color='#ffffff' contenteditable='true'>
                            <strong style='margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;' contenteditable='true'>
                                <span style='font-family: PangramExtraLight;' contenteditable='true'>Lorem Ipsum</span>
                            </strong>
                            <span style='font-family: PangramExtraLight; font-size: 14px; text-align: justify;' contenteditable='true'>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                        </font>
                    </p>
                </div>
            </div>
            <div class='paste-inner draggable' draggable='true' id='element-191-back'>
                <div id='element-191' class='sub' data-style='.block-flex=>space-between;#block-back-opacity=>0.5;.block-back-color=>#000000;.block-text-color=>#000000;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-padding=>20;.block-blur=>0;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;#block-hover-opacity=>0.3;.block-hover-back-color=>#000000;.block-hover-text-color=>#000000;.block-hover-blur=>0;.block-back-img=>/admin/landing/;#block-width-ext=>%;.block-back-width=>25;.border-radius=>10;.border-radius=>10;.border-radius=>10;.border-radius=>10;' data-style-read='#element-191 [#] #element-191-back [#] #element-191:hover' data-style-code='justify-content:space-between;background-color:rgba(0, 0, 0, 0.5);  transition: 0.5s;color:#000000;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;backdrop-filter:blur(0px);border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-repeat:no-repeat;background-size:cover;background-image:url(/admin/landing/);width:25%;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px; [#] background-color:rgba(0, 0, 0, 0.3);color:#000000;backdrop-filter:blur(0px);'>
                    <p contenteditable='true' style='text-align: center; '>
                        <video controls='' src='/web/form/videos/Lil%20Jon%20&amp;%20Eminem%20-%20Let%20It%20Out%20(2021).webm' width='640' height='360' class='note-video-clip' contenteditable='true'></video>
                        <font color='#ffffff' contenteditable='true'>
                            <strong style='margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;' contenteditable='true'>
                                <span style='font-family: PangramExtraLight;'>Lorem Ipsum</span>
                            </strong>
                            <span style='font-family: PangramExtraLight; font-size: 14px; text-align: justify;' contenteditable='true'>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                        </font>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>",
'url'=>""
    ]
];
    public function __construct()
    {
        if($this->existBoolSettings())
            header("location: ". "/login");
    }

    protected function existBoolSettings(){
        $file = 'init/install.json';
        $check = file_exists($file);
        if($check!=false)
            return true;
    }
    public function insertData($data){
//        install file
        $file = 'init/install.json';
        $check = file_exists($file);
        if($check==false){
            unset($data['admin_pass_confirm']);
            unset($data['submit']);
            file_put_contents($file,json_encode($data));
            foreach ($data as $key=>$val)
                define(strtoupper($key),$val);
        }
        $this->db_install($data);
        header("location: ". "/login");
    }
    protected function db_install($data)
    {
        try {
            $this->pdo = new \PDO("mysql:host=" . $data['host'] . ";dbname=" . $data['db_name'], $data['db_login'], $data['db_pass']);
        }catch (\Exception $exception){
            echo $exception->getMessage();
        }
        foreach ($this->installTable as $key => $value)
            $this->executeDBAll("CREATE TABLE $key ($value);");

            $this->executeDBAll("INSERT INTO users (`login`,`password`) VALUES ('".LOGIN."','".md5(PASSWORD)."');");

        foreach ($this->insertData as $table => $value)
            $this->insert($table,$value);

        $SETTINGS = [
            'login'=>$data['login'],
            'password'=>md5($data['password']),
            'gmail'=>$data['gmail'],
            'gmail_pass'=>md5($data['gmail_pass']),
            'user'=>$data['user']
        ];
//        Set to DB settings
        foreach ($SETTINGS as  $key=>$val)
            $this->insert('settings',[
                'property'=>$key,
                'value'=>$val,
            ]);
    }
    protected function executeDBAll($sql)
    {
        $statement = $this->pdo->prepare($sql); //подготовить
        return $statement->execute(); //true || false
    }
    protected function insert($table, $data)
    {
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Сформировать строку title, content
        $stringOfKeys = implode(',', $keys);
        //3. Сформировать метки
        $placeholders = ":" . implode(', :', $keys);
//        end test
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true || false
        return $this->pdo->lastInsertId();
    }
}
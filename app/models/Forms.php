<?php
namespace App\models;
use App\models\QueryBuilder;

class Forms
{
    protected $table = "forms";

    private $formProperty=[
        'select'=>   [
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='select' data-property='label' data-value='text' class='form-control'>
                                </div>
                            </div>
                        </div>
                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='select' data-property='data-message' data-value='text' class='form-control' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='select' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='select' data-property='multiple' data-value='multiple'> <span>Multi select</span> </div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='select' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Add select options</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <textarea name='' onkeyup='propertyInputs(this)' data-type='select' data-property='option' data-value='option'  id='option' class='form-control' rows='7'></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Default set value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <select name='' onclick='propertyInputs(this)' data-type='select' data-property='selected' data-value='selected' id='selected' class='form-control'></select>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='select' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label select 2</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                        <select id='select2' data-label='Label select 2' class='form-control select2' name='select' style='width: 100%;'></select>
                                    </div>
                                </div>
                            </div>"
                     ],

        'input:text'=>[
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Placeholder</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='placeholder' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Default value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='default' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Max length</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='number' onkeyup='propertyInputs(this)' data-type='input' data-property='max' data-value='text' onchange='propertyInputs(this)' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Min length</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='number' onkeyup='propertyInputs(this)' data-type='input' data-property='min' data-value='text' onchange='propertyInputs(this)' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' data-value='text' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='input:text' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label input text</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                        <input type='text' data-label='Label input text' id='inputText' class='form-control' name='inputName'>
                                    </div>
                                </div>
                            </div>"
                    ],

        'input:email'=>[
            "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Placeholder</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='placeholder' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Default value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='default' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' data-value='text' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
            ,
            "<div class='formDiv draggable' data-id='id' data-type='input:email' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label input email</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                        <input type='email' data-label='Label input email' id='inputEmail' class='form-control' name='email'>
                                    </div>
                                </div>
                            </div>"
        ],

        'input:@email'=>[
            "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Placeholder</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='placeholder' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Default value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='default' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' data-value='text' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
            ,
            "<div class='formDiv draggable' data-id='id' data-type='input:@email' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label input email for notification </label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                        <input type='email' data-mail='true' data-label='Label input email' id='inputEmail' class='form-control' name='Email'>
                                    </div>
                                </div>
                            </div>"
        ],

        'text'=>    [
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='text' data-property='label' data-value='text' class='form-control' name='inputText[]'>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Text value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <textarea rows='7' onkeyup='propertyInputs(this)' data-type='text' data-property='text' class='form-control' name='textValue[]'></textarea>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='text' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label Text</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm' id='textDiv1'>
                                        <span id='text' data-text='text'>Text</span><br/><br/>
                                    </div>
                                </div>
                            </div>"
                    ],

        'text:offer'=>    [
            "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='text' data-property='label' data-value='text' class='form-control' name='inputText[]'>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Text value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <textarea rows='7' onkeyup='propertyInputs(this)' data-type='text' data-property='offer' class='form-control' name='textValue[]'></textarea>
                                </div>
                            </div>
                        </div>"
            ,
            "<div class='formDiv draggable' data-id='id' data-type='text:offer' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label accept Text</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm' id='textDiv1'>
                                        <input type='checkbox' id='offer' name='offer' onclick='statusOffer(this)' data-offer='true' style='margin-top: 6px;float: left;'>
                                        <span id='text' style='font-style: italic;color: #9898A5;font-weight: bold' data-text='text'>Text</span><br/><br/>
                                    </div>
                                </div>
                            </div>"
        ],

        'textarea'=>[
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='textarea' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Placeholder</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='textarea' data-property='placeholder' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Default value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='textarea' data-property='default' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Min length</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='number' onkeyup='propertyInputs(this)' data-type='textarea' data-property='min' data-value='text' onchange='propertyInputs(this)' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>
                        <div class='formDivDetails'>
                            <label>Max length</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='number' onkeyup='propertyInputs(this)' data-type='textarea' data-property='max' data-value='text' onchange='propertyInputs(this)' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='textarea' data-property='data-message' data-value='text' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>
                        
                        <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='textarea' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='textarea' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='textarea' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label textarea</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm' id='textDiv1'>
                                        <textarea name='textarea' data-label='Label textarea' id='textarea' rows='5' class='form-control'></textarea>
                                    </div>
                                </div>
                            </div>"
                    ],

        'input:checkbox'=>[
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='true' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' data-value='true' class='form-control' name='checkbox[]' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true'  name='inputName' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'> <input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'  name='inputName'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Add checkbox options</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <textarea name='' onkeyup='propertyInputs(this)' data-type='input' data-property='checked' data-value='true' id='' class='form-control' rows='7'>checkbox</textarea>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Default selected value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <select name='' onclick='propertyInputs(this)' data-type='input' data-property='checking' data-value='true' class='form-control'>
                                        <option value=''></option>
                                        <option value='checkbox'>checkbox</option>
                                    </select>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='input:checkbox' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label CheckBox</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>

                                        <div class='form-group clearfix'>
                                            <div class='icheck-primary d-inline'>
                                                <input type='checkbox' data-label='Label CheckBox' value='checkbox' name='checkbox' id='checkboxPrimary5'>
                                                <label for='checkboxPrimary5' style='color: #212529;'>
                                                    checkbox
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>"
                    ],

        'input:radio'=>[
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='true' class='form-control' value='Label RadioBox' name='inputName'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' data-value='true' class='form-control' name='checkbox[]' value='radiobox' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true'  name='inputName' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'> <input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'  name='inputName'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Add radioBox options</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <textarea name='' onkeyup='propertyInputs(this)' data-type='input' data-property='checked' data-value='true' id='' class='form-control' rows='7'>radiobox</textarea>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Default selected value</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <select name='' onclick='propertyInputs(this)' data-type='input' data-property='checking' data-value='true' class='form-control'>
                                        <option value=''></option>
                                        <option value='checkbox'>checkbox</option>
                                    </select>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='input:radio' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label RadioBox</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>

                                      <div class='icheck-primary d-inline' style='padding-bottom: 10px;'>
                                        <input type='radio' data-label='Label RadioBox' value='radiobox' id='radioPrimary2' name='radiobox'>
                                        <label for='radioPrimary2' style='color: black'>
                                            radiobox
                                        </label>
                                      </div>
                                      
                                    </div>
                                </div>
                            </div>"
                    ],

        'button'=>  [
                        "<div class='formDivDetails'>
                            <label>Change button text</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='button' data-property='button' data-value='true' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='button' onclick='onInfo(this)' draggable='true'>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm' style='border: none'>
                                        <button type='submit' class='btn btn-outline-info' name='' data-id='buttonSend' id='buttonSend' style='width: 100%;margin-top: 20px;'> Submit </button>
                                    </div>
                                </div>
                            </div>"
                    ],

        'date'=>    [
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>  
                        
                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' data-value='text' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='date' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label Date</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                            <input type='date' data-label='Label Date' class='form-control datetimepicker-input' name='date' data-target='#reservationdate'/>
                                    </div>
                                </div>
                            </div>"
                    ],

        'time'=>    [
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>  
                        
                         <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>

                         <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='time' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label Time</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                            <input type='time' data-label='Label Time' class='form-control datetimepicker-input' name='time' data-target='#reservationdate'/>
                                    </div>
                                </div>
                            </div>"
                    ],

        'file'=>    [
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='text' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>
                          
                        <div class='formDivDetails'>
                            <label>Input name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' readonly data-type='input' data-property='data-message' class='form-control' name='inputName' placeholder='without simbols and probels'>
                                </div>
                            </div>
                        </div>
                        
                         <div class='formDivDetails'>
                            <label>Others</label>
                            <div class='formPasteDetails'>
                                <div class='flexFormDetails row'>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='required' data-value='true' style='margin: 5px 0px 0px 0px; position: relative'> <span>Required</span></div>
                                    <div class='col-sm-4'><input type='checkbox' onclick='propertyInputs(this)' data-type='input' data-property='disabled' data-value='true'> <span>Disable</span> </div>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='file' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>Label input text</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                        <input type='file' data-label='Label input text' id='inputText'  name='fileInputName'>
                                    </div>
                                </div>
                            </div>"
                    ],

        'captcha'=> [
                        "<div class='formDivDetails'>
                            <label>Label Name</label>
                            <div class='formPasteDetails' >
                                <div class='flexFormDetails'>
                                    <input type='text' onkeyup='propertyInputs(this)' data-type='input' data-property='label' data-value='true' class='form-control' name='inputName'>
                                </div>
                            </div>
                        </div>"
                            ,
                        "<div class='formDiv draggable' data-id='id' data-type='captcha' onclick='onInfo(this)' draggable='true'>
                                <label for='formPaste'>This is captcha</label>
                                <div class='formPaste' id='formPaste'>
                                    <div class='flexForm'>
                                        <div style='display: flex;align-items: center;justify-content: flex-start;' >
                                        <div class='col'>
                                            <img style='border: 3px solid #ad2dff; padding: 4px;' src='/bootstrap/captcha.php' />
                                        </div>
                                            <input class='form-control' data-type='captcha' style='padding-left:5px;text-align:center;margin-left: 10px;' type='text' id='align' onkeyup='Align()' name='norobot' autocomplete='off'>
                                        </div>
                                    </div>
                                </div>
                            </div>"
                    ]
    ];
    /**
     * @var \App\models\QueryBuilder
     */
    private $builder;

    public function __construct(QueryBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function property($index)
    {
        return json_encode($this->formProperty[$index]);
    }

    public function isIsset($data)
    {
        return $this->builder->existInfo($this->table,['form_name'=>$data['formName']]);
    }

    public function formStructor($data)
    {
        $return="";
        $arrayCombines = array_combine($data['label'],$data['nameInput']);
        foreach ($arrayCombines as $key => $val)
        {
            $return .=$key."=>".$val.",";
        }

        return rtrim($return, ',');
    }

    public function addNew($data){
        $data = json_decode($data,true);
         if ($this->isIsset($data))
             return "exist";
         else
         {

             return $this->builder->insert(
                 $this->table,[
                     'form_name'=>$data['formName'],
                     'structure'=>$this->formStructor($data),
                     'form_div'=> str_replace("\"","'",$data['formHtml']),
                     'messageG'=> $data['messageG'],
                     'url'=> $data['url']
                 ]
             );
         }

    }

    public function showForm($url=null)
    {
        if($url==null)
            return $this->builder->where($this->table," WHERE status=0");
        else{
            if ((int) $url)
                return $this->builder->getOne($this->table,$url);
            else
                return $this->builder->where($this->table," WHERE url='".$url."' and status=0");
        }
    }
    public function showFormDis()
    {
            return $this->builder->where($this->table," WHERE status=1");
    }

    public function checkUrl($url)
    {
        if ($this->builder->where($this->table," WHERE url='".$url."'"))
            return 'exist';
        else
            return '';
    }

    public function deleteForm($id)
    {
        return $this->builder->delete($this->table,$id);
    }

    public function deleteFormFile($file)
    {
        if (!unlink($file))
            return 'error';
        else
            return $file;
    }


    public function disableForm($id)
    {
        if ($this->builder->getOne($this->table,$id)->status==0)
            return $this->builder->update($this->table,['id'=>$id,'status'=>1]);
        else
            return $this->builder->update($this->table,['id'=>$id,'status'=>0]);
    }

    public function updateForm($data)
    {
        $data = json_decode($data,true);
        if ($this->isIsset($data)->id!=$data['id'] && (!empty($this->isIsset($data))))
            return "exist";
        else
            return $this->builder->update(
                $this->table,[
                    'id'=>$data['id'],
                    'form_name'=>$data['formName'],
                    'structure'=>$this->formStructor($data),
                    'form_div'=> str_replace("\"","'",$data['formHtml']),
                    'messageG'=> $data['messageG'],
                    'url'=> $data['url']
                ]
            );
    }

    public function fileImages()
    {
        return glob("web/form/images/*[.jpg|.png|.tif|.tiff|.bmp|.jpeg|.gif]");
    }
    public function fileUploads()
    {
        return glob("web/uploads/*");
    }
    public function fileVideos()
    {
        return glob("web/form/videos/*[.mp4|.webm|.ogg]");
    }
    public function uploadFileImage($file){
        $target_dir = "web/form/images/";
        $temp = explode(".", basename($file["name"]));
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        $check = getimagesize($file["tmp_name"]);
        if($check == false) {
            echo "error: file is not an image.";
            $uploadOk = 0;
        }
// Check file size
        if ($file["size"] > 10000000) {
            echo "error: max size";
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "error: sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "error: sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $newfilename;
            } else {
                echo "error: sorry, there was an error uploading your file.";
            }
        }
    }
    public function uploadFileVideo($file){
        $target_dir = "web/form/videos/";
        $temp = explode(".", basename($file["name"]));
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
// Check file size

        // Allow certain file formats
        if($videoFileType != "mp4" && $videoFileType != "webm" && $videoFileType != "ogg") {
            echo "error: sorry, only mp4, webm, ogg files are allowed.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "error: sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $newfilename;
            } else {
                echo "error: sorry, there was an error uploading your file.";
            }
        }
    }
}
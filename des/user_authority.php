<?php
include 'header.php';
include 'bidix.php';
?>
<style>
    fieldset.authority{
        border: 1px groove #ddd;
        padding: 0 1.4em 1.4em 1.4em;
        margin: 0 0 1.5em 0;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }
    .legend{
        width: inherit;
        padding: 0 10px;
        border-bottom: none;
    }
    input[type*checkbox]{
        transform: scale(1.5);
    }
    #all{
        transform: scale(2);
    }
</style>
<div class="pcoded-main-container">

<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
       
            <div class="main-body">
                <div class="page-wrapper">
                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Basic Table</h5>
                                            <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <form id="formuser">
                                                <div class="row">
                                                <div class="col-sm-12">
                                                        <select name="user" id="user" class="form-control mt-2" >
                                                            <option value="0">Select user</option>
                                                        </select>
                                              </div>
                                              <div class="row">
                                                  
                                                  <div class="col-sm-12">
                                                      <fieldset class="authority mt-3">
                                                            <legend>
                                                              <input type="checkbox" id="all" name="all" class="mr-2">
                                                              all authority
                                                            </legend>
                                                            <div class="row" id="rowall">
                                                              <!--
                                                              <div class="col-sm-4">
                                                                <fieldset class="authority">
                                                                    <legend class="authority">
                                                                    <input type="checkbox" id="" name="" class="mr-1">
                                                                    Dashboard
                                                                    </legend>
                                                                </fieldset>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <fieldset class="authority">
                                                                    <legend class="authority">
                                                                    <input type="checkbox" id="" name="" class="mr-1">
                                                                    Dashboard
                                                                    </legend>
                                                                    <label>
                                                                    <input type="checkbox" id="" name="" class="mr-1">
                                                                    Dashboard
                                                                    </label>
                                                                        <div class="link-action">
                                                                        <label class='ml-3'>
                                                                        <input type="checkbox" id="" name="" class="mr-1">
                                                                        Dashboard
                                                                        </label>
                                                                        <label class='ml-4'>
                                                                        <input type="checkbox" id="" name="" class="mr-1">
                                                                        Dashboard
                                                                        </label>
                                                                        <label class='ml-5'>
                                                                        <input type="checkbox" id="" name="" class="mr-1">
                                                                        Dashboard
                                                                        </label>
                                                                        </div>
                                                                </fieldset>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <fieldset class="authority">
                                                                    <legend class="authority">
                                                                    <input type="checkbox" id="" name="" class="mr-1">
                                                                    Dashboard
                                                                    </legend>
                                                                    <label>
                                                                    <input type="checkbox" id="" name="" class="mr-1">
                                                                    Dashboard
                                                                    </label>
                                                                        <div class="link-action">
                                                                        <label class='ml-3'>
                                                                        <input type="checkbox" id="" name="" class="mr-1">
                                                                        Dashboard
                                                                        </label>
                                                                        <label class='ml-4'>
                                                                        <input type="checkbox" id="" name="" class="mr-1">
                                                                        Dashboard
                                                                        </label>
                                                                        <label class='ml-5'>
                                                                        <input type="checkbox" id="" name="" class="mr-1">
                                                                        Dashboard
                                                                        </label>
                                                                        </div>
                                                                </fieldset>
                                                            -->
                                                            </div>
                                                          </div>
                                                      </fieldset>
                                                  </div>
                                              </div>
                                              <div class="col-sm-3">
                                                  <button id="submit" class="btn btn-primary m-2">user authority</button>
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                </div>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>
<script src="../js/user_authority.js"></script>
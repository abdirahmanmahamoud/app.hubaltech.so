<?php
include 'header.php';
include 'bidix.php';
?>
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
                                            <form id="form">
                                                <div class="row">
                                                <div class="col-sm-4">
                                                        <select name="type" id="type" class="form-control mt-2">
                                                            <option value="0">All</option>
                                                            <option value="custon">Custon</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="date" name="fromdate" id="fromdate" class='form-control mt-2'>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="date" name="todate" id="todate" class='form-control mt-2'>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary m-2" id='add'>summit</button>
                                            </form>
                                            <div class="table-responsive" id="print_table">
                                                <table class="table" id="table">
                                                    <thead>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button  class="btn btn-primary m-2" id='addprint'><i class="fa fa-print"></i>print</button>
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
<script src="../js/user_expense.js"></script>
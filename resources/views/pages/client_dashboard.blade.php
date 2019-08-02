@extends('layouts.inner')

@section('title', 'Clients')
    
@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
<style>
    #client-card{
        background-color: #f1f1f1;
    }
        
    </style>
@endsection

@section('content')

<div class="m-portlet ">
    
    <div id="rows" class="m-portlet__body  m-portlet__body--no-padding">
        <div style="margin-bottom: 15px;" class="row m-row--no-padding m-row--col-separator-xl">
                    <div  id="client-card" class="col-md-12 col-lg-12 col-xl-12">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h1 style="font-size: 30px;" class="m-widget24__title">
                                    Stransact
                                </h1>
                                
                                <br>

                                <span class="m-widget24__stats m--font-brand">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="assets/app/media/img/users/100_4.jpg" alt width="75px" height="75px" style="border-radius: 1000px">
                                    </div>
                                </span>

                                <div class="m--space-10"></div>

                                
                                <p style="margin-top: 10px">
                                        <a style="margin-top: -15px; margin-left: 25px" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            View Projects
                                        </a>
                                    </p>
                                    <div style="box-sizing: border-box;" class="collapse" id="collapseExample">
                                        <ul style="list-style: none;" >
                                            <li>
                                                <p style="font-size: 15px; font-weight: bold;">Tax</p>
                                                <p>
                                                    <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleIn" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        View Tasks Progress
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseExampleIn">
                                                    
                                                    <div class="k-portlet__body">
                                                        <!--begin: Search Form -->
                                                        <div class="k-form k-fork--label-right k-margin-t-20 k-margin-b-10">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-8 order-2 order-xl-1">
                                                            <div class="row align-items-center">				
                                                                <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                    <div class="k-input-icon k-input-icon--left">
                                                                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                                        <span class="k-input-icon__icon k-input-icon__icon--left">
                                                                            <span><i class="la la-search"></i></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                    <div class="k-form__group k-form__group--inline">
                                                                        <div class="k-form__label">
                                                                            <label>Status:</label>
                                                                        </div>
                                                                        <div class="k-form__control">
                                                                            <select style="display: inline;" class="form-control bootstrap-select" id="k_form_status">
                                                                                <option value="">All</option>
                                                                                <option value="1">Completed</option>
                                                                                <option value="2">Pending</option>
                                                                                <option value="3">Holding</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		<!--end: Search Form -->
                                            </div>
                                            <div class="k-portlet__body k-portlet__body--fit">
                                                        <!--begin: Datatable -->
                                                <table class="k-datatable" id="html_table" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th title="Field #1">Task</th>
                                                        <th title="Field #2">In Charge</th>
                                                        <th title="Field #3">Status</th>
                                                        <th title="Field #4">Deadline</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Audit</td>
                                                            <td>Wale Yimika</td>
                                                            <td>Pending</td>
                                                            <td>27/09/2019</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Audit</td>
                                                                <td>Wale Yimika</td>
                                                                <td>Pending</td>
                                                                <td>27/09/2019</td>
                                                            </tr>
                                                            <tr>
                                                                    <td>Audit</td>
                                                                    <td>Wale Yimika</td>
                                                                    <td>Pending</td>
                                                                    <td>27/09/2019</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Audit</td>
                                                                        <td>Wale Yimika</td>
                                                                        <td>Pending</td>
                                                                        <td>27/09/2019</td>
                                                                    </tr>
                                                    </tbody>
                                                </table>
                                                        <!--end: Datatable -->
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                    <p style="font-size: 15px; font-weight: bold;">Account</p>
                                                    <p>
                                                        <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleInTwo" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            View Tasks Progress
                                                        </a>
                                                    </p>
                                                    <div class="collapse" id="collapseExampleInTwo">
                                                        
                                                        <div class="k-portlet__body">
                                                            <!--begin: Search Form -->
                                                            <div class="k-form k-fork--label-right k-margin-t-20 k-margin-b-10">
                                                        <div class="row align-items-center">
                                                            <div class="col-xl-8 order-2 order-xl-1">
                                                                <div class="row align-items-center">				
                                                                    <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                        <div class="k-input-icon k-input-icon--left">
                                                                            <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                                            <span class="k-input-icon__icon k-input-icon__icon--left">
                                                                                <span><i class="la la-search"></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                        <div class="k-form__group k-form__group--inline">
                                                                            <div class="k-form__label">
                                                                                <label>Status:</label>
                                                                            </div>
                                                                            <div class="k-form__control">
                                                                                <select style="display: inline;" class="form-control bootstrap-select" id="k_form_status">
                                                                                    <option value="">All</option>
                                                                                    <option value="1">Completed</option>
                                                                                    <option value="2">Pending</option>
                                                                                    <option value="3">Holding</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>		<!--end: Search Form -->
                                                </div>
                                                <div class="k-portlet__body k-portlet__body--fit">
                                                            <!--begin: Datatable -->
                                                    <table class="k-datatable" id="html_table" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th title="Field #1">Task</th>
                                                            <th title="Field #2">In Charge</th>
                                                            <th title="Field #3">Status</th>
                                                            <th title="Field #4">Deadline</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Audit</td>
                                                                <td>Funso</td>
                                                                <td>Pending</td>
                                                                <td>27/09/2019</td>
                                                            </tr>
                                                            <tr>
                                                                    <td>Audit</td>
                                                                    <td>Wale Yimika</td>
                                                                    <td>Pending</td>
                                                                    <td>27/09/2019</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Audit</td>
                                                                        <td>Wale Yimika</td>
                                                                        <td>Pending</td>
                                                                        <td>27/09/2019</td>
                                                                    </tr>
                                                                    <tr>
                                                                            <td>Audit</td>
                                                                            <td>Wale Yimika</td>
                                                                            <td>Pending</td>
                                                                            <td>27/09/2019</td>
                                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                            <!--end: Datatable -->
                                                        </div>
                                                    </div>
                                            </li>
                                            
                                        </ul>
                                </div>
                                
                            
                        </div>
                    </div>
            </div>
        </div>

        <div class="row m-row--no-padding m-row--col-separator-xl">
                <div  id="client-card" class="col-md-12 col-lg-12 col-xl-12">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h1 style="font-size: 30px;" class="m-widget24__title">
                                NNPC
                            </h1>
                            
                            <br>

                            <span class="m-widget24__stats m--font-brand">
                                <div class="m-widget4__img m-widget4__img--pic">
                                    <img src="assets/app/media/img/users/100_4.jpg" alt width="75px" height="75px" style="border-radius: 1000px">
                                </div>
                            </span>

                            <div class="m--space-10"></div>

                            
                            <p style="margin-top: 10px">
                                    <a style="margin-top: -15px; margin-left: 25px" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleThree" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        View Projects
                                    </a>
                                </p>
                                <div style="box-sizing: border-box;" class="collapse" id="collapseExampleThree">
                                    <ul style="list-style: none;" >
                                        <li>
                                            <p style="font-size: 15px; font-weight: bold;">Tax</p>
                                            <p>
                                                <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleInFour" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    View Tasks Progress
                                                </a>
                                            </p>
                                            <div class="collapse" id="collapseExampleInFour">
                                                
                                                <div class="k-portlet__body">
                                                    <!--begin: Search Form -->
                                                    <div class="k-form k-fork--label-right k-margin-t-20 k-margin-b-10">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-8 order-2 order-xl-1">
                                                        <div class="row align-items-center">				
                                                            <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                <div class="k-input-icon k-input-icon--left">
                                                                    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                                    <span class="k-input-icon__icon k-input-icon__icon--left">
                                                                        <span><i class="la la-search"></i></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                <div class="k-form__group k-form__group--inline">
                                                                    <div class="k-form__label">
                                                                        <label>Status:</label>
                                                                    </div>
                                                                    <div class="k-form__control">
                                                                        <select class="form-control bootstrap-select" id="k_form_status">
                                                                            <option value="">All</option>
                                                                            <option value="1">Completed</option>
                                                                            <option value="2">Pending</option>
                                                                            <option value="3">Holding</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>		<!--end: Search Form -->
                                        </div>
                                        <div class="k-portlet__body k-portlet__body--fit">
                                                    <!--begin: Datatable -->
                                            <table class="k-datatable" id="html_table" width="100%">
                                                <thead>
                                                <tr>
                                                    <th title="Field #1">Task</th>
                                                    <th title="Field #2">In Charge</th>
                                                    <th title="Field #3">Status</th>
                                                    <th title="Field #4">Deadline</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Audit</td>
                                                        <td>Wale Yimika</td>
                                                        <td>Pending</td>
                                                        <td>27/09/2019</td>
                                                    </tr>
                                                    <tr>
                                                            <td>Audit</td>
                                                            <td>Wale Yimika</td>
                                                            <td>Pending</td>
                                                            <td>27/09/2019</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Audit</td>
                                                                <td>Wale Yimika</td>
                                                                <td>Pending</td>
                                                                <td>27/09/2019</td>
                                                            </tr>
                                                            <tr>
                                                                    <td>Audit</td>
                                                                    <td>Wale Yimika</td>
                                                                    <td>Pending</td>
                                                                    <td>27/09/2019</td>
                                                                </tr>
                                                </tbody>
                                            </table>
                                                    <!--end: Datatable -->
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                                <p style="font-size: 15px; font-weight: bold;">Audit</p>
                                                <p>
                                                    <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleInFive" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        View Tasks Progress
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseExampleInFive">
                                                    
                                                    <div class="k-portlet__body">
                                                        <!--begin: Search Form -->
                                                        <div class="k-form k-fork--label-right k-margin-t-20 k-margin-b-10">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-8 order-2 order-xl-1">
                                                            <div class="row align-items-center">				
                                                                <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                    <div class="k-input-icon k-input-icon--left">
                                                                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                                        <span class="k-input-icon__icon k-input-icon__icon--left">
                                                                            <span><i class="la la-search"></i></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                    <div class="k-form__group k-form__group--inline">
                                                                        <div class="k-form__label">
                                                                            <label>Status:</label>
                                                                        </div>
                                                                        <div class="k-form__control">
                                                                            <select class="form-control bootstrap-select" id="k_form_status">
                                                                                <option value="">All</option>
                                                                                <option value="1">Completed</option>
                                                                                <option value="2">Pending</option>
                                                                                <option value="3">Holding</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		<!--end: Search Form -->
                                            </div>
                                            <div class="k-portlet__body k-portlet__body--fit">
                                                        <!--begin: Datatable -->
                                                <table class="k-datatable" id="html_table" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th title="Field #1">Task</th>
                                                        <th title="Field #2">In Charge</th>
                                                        <th title="Field #3">Status</th>
                                                        <th title="Field #4">Deadline</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Audit</td>
                                                            <td>Funso</td>
                                                            <td>Pending</td>
                                                            <td>27/09/2019</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Audit</td>
                                                                <td>Wale Yimika</td>
                                                                <td>Pending</td>
                                                                <td>27/09/2019</td>
                                                            </tr>
                                                            <tr>
                                                                    <td>Audit</td>
                                                                    <td>Wale Yimika</td>
                                                                    <td>Pending</td>
                                                                    <td>27/09/2019</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Audit</td>
                                                                        <td>Wale Yimika</td>
                                                                        <td>Pending</td>
                                                                        <td>27/09/2019</td>
                                                                    </tr>
                                                    </tbody>
                                                </table>
                                                        <!--end: Datatable -->
                                                    </div>
                                                </div>
                                        </li>
                                        
                                    </ul>
                            </div>
                            
                        
                    </div>
                </div>
        </div>
        </div>				
    </div>
    </div>
</div>

@endsection
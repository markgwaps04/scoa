
{strip}


<HEAD>

    {block name=head}

        <link href="{$css}plugins/select2/select2.min.css" rel="stylesheet">
        <link href="{$css}plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">


    {/block}

</HEAD>




<SCRIPTS>

    {block name=script}

        <script src="{$js}plugins/select2/select2.full.min.js"></script>
        <script src="{$js}jquery.validate.min.js?{$pin}" type="text/javascript"></script>
        <script src="{$js}scoa/scoa_create_org.js?{$pin}"></script>

        <script>


        $(".scoa_position").select2({
            placeholder: "Who are you in your organization / department ?",
            allowClear: true
        });




    </script>

    {/block}

</SCRIPTS>


<SCOA_BODY>

    {block name=body}

    <div class="row">

        <div class="col-md-8">

            <div class="alert alert-dark" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-angle-left" style="font-size: 19px;vertical-align: bottom"></i>&nbsp;
                <a class="alert-link" href="{$public}">Back to home </a>

            </div>

            {if $request eq 1}

            <div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">Invalid Request</a> a undefined parameter sent, we cant verify your request right now if you think this an error <a href="javascript:void 0">Let us know</a>.
            </div>

            {elseif $request eq 3}

            <div class="alert alert-warning" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                <i class="fa fa-exclamation-triangle" style="font-size: 15px"></i>&nbsp;
                <a class="alert-link" href="#">An Error occured</a> internal error , we cant verify your request right now if you think this is a mistake <a href="javascript:void 0">Let us know</a>.
            </div>

            {/if}

            <div class="ibox">
                <div class="ibox-title">
                    <strong><i class="fa fa-pencil-square"></i>&nbsp; Create new organization</strong>
                </div>
                <div class="ibox-content">
                    <div class="row">


                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Request form</h3>
                            <p>sent us a request to create and publish a organization for your members.</p>

                            <form role="form" method="post" class="user_org">

                                <div class="form-group">

                                    <label>Name of your organization</label>
                                    <input type="text" name="name" placeholder="e.g. must unique" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Position</label>
                                    <select name="position" required class="required scoa_position form-control m-b">
                                        <option value=""></option>
                                        <option value="1">Treasurer</option>
                                        <option value="2">Auditor</option>
                                        <option value="3">Org Pres.</option>
                                        <option value="4">Dept Gov.</option>
                                        <option value="5">Adviser</option>
                                    </select>
                                </div>

                                <div class="form-group">

                                    <label>Details</label>
                                    <textarea name="details" style="min-height: 155px" placeholder="e.g. what organization or department you creating for, should be detailed." class="form-control"></textarea>

                                </div>





                                {*<div class="form-group">*}

                                    {*<div class="checkbox checkbox-primary">*}
                                        {*<div class="row">*}

                                            {*<div class="col-sm-1">*}
                                                {*<input id="checkbox2" required name="agreement" type="checkbox">&nbsp;*}
                                            {*</div>*}
                                            {*<div class="col-sm-10"> by clicking this means that you agree the <a href="#">terms and conditions</a> of a site. </div>*}
                                            {**}
                                        {*</div>*}

                                    {*</div>*}

                                {*</div>*}
                                <br>
                                <div class="form-group">

                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                                        <strong>Submit</strong></button>


                                </div>

                            </form>
                        </div>

                        <div class="col-sm-6">
                            <h3 class="m-t-none m-b">Required</h3>
                            <p>to activate your group , your organization must have..</p>

                            <div class="pull-left">

                                <div class="row">

                                    <div class="col-sm-1">
                                        <i class="fa fa-check"></i>
                                    </div>

                                    <div class="col-sm-10 no-padding">
                                        5 members the Treasurer, Auditor,  OrgaPresident, Department Governor and Adviser.
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-sm-1">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="col-sm-10 no-padding">
                                        Complete member requirements.
                                        <ul>
                                            <li>Profile</li>
                                            <li>Signature</li>
                                        </ul>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm-1">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="col-sm-10 no-padding">
                                        Cover photo.
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>


        {block name=info}

            {include "`$root`public\included_template\user\user_index_right_div.tpl"}

        {/block}





    </div>

    {/block}


</SCOA_BODY>


{/strip}
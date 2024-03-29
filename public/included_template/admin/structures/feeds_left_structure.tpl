

{capture requirements}

    <div class="col-sm-12">

        <div class="ibox float-e-margins" id="ibox1">
            <div class="ibox-title">
                <h5>Requirements</h5>
            </div>
            <div class="ibox-content sk-loading scoa-requirements">

                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1"></div>
                    <div class="sk-double-bounce2"></div>
                </div>


                <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                    <li class="warning-element" id="task1">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="positions" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

                                </div>

                            </div>

                        </div>

                    </li>
                    <li class="warning-element" id="task2">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="members" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">Complete members requirements.</a>

                                </div>

                            </div>

                        </div>

                    </li>
                    <li class="warning-element" id="task3">

                        <div class="checkbox checkbox-primary no-padding">

                            <div class="row no-padding">

                                <div class="col-sm-1">
                                    <input id="cover" class="scoa hide" required name="agreement" disabled type="checkbox">&nbsp;
                                </div>
                                <div class="col-sm-10">

                                    <a href="javascript: void 0">Cover photo of organization</a>

                                </div>

                            </div>

                        </div>


                    </li>

                </ul>

            </div>
        </div>

    </div>

{/capture}




<div class="wrapper wrapper-content">

    <div class="row m-b-xl">


        <div class="col-sm-12">

            <div class="col-sm-5">


                <div class="col-sm-12 m-b-md">

                    <div class="ibox-title">
                        <h5>Organization details</h5>
                    </div>

                    <ul class="ibox-content no-padding border-left-right coverphoto">
                        <li style="list-style: none">
                            <img class="scoa-img-responsive cover-photo" src="http://localhost/SCOA/public//files/default_image/default.png" id="coverphoto" alt="img04">
                        </li>
                    </ul>


                    <div class="ibox-content">

                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"></div>
                            <div class="sk-double-bounce2"></div>
                        </div>


                        <h5>ABOUT</h5>

                        <p>



                            {$org.details}



                        </p>

                        <h5>CODE</h5>
                        <span>


                    {$org.member_code}


                        </span>


                        <h5>MEMBERS</h5>

                        <p class="user-friends">

                            {* populate the members of target organization *}


                            {foreach $org.members.approved as $every => $user}


                                <a href="">
                                    <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                    "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">
                                </a>


                            {/foreach}


                            {* end of comment *}

                        </p>


                    </div>

                </div>


                {if $org.members.approved or $isStrict}

                    {$smarty.capture.requirements}

                {/if}




            </div>

            <div class="col-lg-7">


                {if not $org.members.approved}


                    <div class="col-sm-12 no-padding no-margins">

                        <div class="alert alert-info" style="background-color: #fdfdfde0"> <!--style="background-color: #fdfdfde0"-->
                            <i class="fa fa-info-circle" style="font-size: 15px"></i>&nbsp;
                            <a class="alert-link" href="#">No members yet.</a>
                        </div>


                    </div>


                    {if not $isStrict} {$smarty.capture.requirements} {/if}




                {/if}






                {block content}{/block}


            </div>
        </div>

    </div>


    {call footer}

</div>


<script>

    $(document).ready(function(){



        {block inner_script}

        {literal}



        let checkbox = $('.scoa-requirements input[type=checkbox]');



        $.post("{/literal}{$public}/scoa_organization/requirements/{$org.RCode}{literal}",{ tempath : "{/literal}{$org.tempath}{literal}" },function(response){

            console.log(response);

            let data = JSON.parse(response);

            if(data.hasOwnProperty("is_position_fill") &&
                data.hasOwnProperty("is_cover_photo_set") &&
                data.hasOwnProperty("is_members_set_the_requirements")){

                if(data.is_position_fill)

                    jQuery(".scoa-requirements #positions").attr("checked",true);

                if(data.is_cover_photo_set)

                    jQuery(".scoa-requirements #cover").attr("checked",true);

                if(data.is_members_set_the_requirements)

                    jQuery(".scoa-requirements #members").attr("checked",true);


                checkbox.iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    disabledClass: "scoa-disabled-checkbox"
                });


                $(".scoa-requirements").toggleClass("sk-loading")

            }


        });






        {/literal}

        {/block}


    })



</script>
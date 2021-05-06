

{block content prepend}

    {message}

    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-12">



            <h2>


                {$user_club.name|truncate:55:"..."|default:'Your Organization'}

                {* check if current user is approved *}

                {if $user_club.isCurrentUserApproved}

                    <a href="javascript:void 0">
                        <i class="fa fa-pencil small text-muted scoa_small_text" data-toggle="tooltip" data-placement="right" title="change name" style="vertical-align: top"></i>
                    </a>

                {/if}

                {* end of comment *}


            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{$public}">Home</a>
                </li>
                <li class="active">
                    <strong>Info</strong>
                </li>
            </ol>
        </div>


    </div>

    <div class="row  m-t / m-t-(xs,sm,md,lg,xl)">

        <div class="row">

            <div class="col-lg-6 ">

                <div class="ibox float-e-margins" id="ibox1">
                    <div class="ibox-title">
                        <h5>Details</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"></div>
                            <div class="sk-double-bounce2"></div>
                        </div>


                        <h5>ABOUT


                            {* check if current user is approved *}

                            {if $user_club.isCurrentUserApproved}

                                <i class="fa fa-pencil small text-muted scoa_xxsmall_text" data-toggle="tooltip" data-placement="right" title="edit" style="vertical-align: top"></i>

                            {/if}

                            {* end of comment *}



                        </h5>

                        <p>

                            {* about the organization *}

                            {$user_club.details}

                            {* end of comment *}

                        </p>

                        <h5>CODE</h5>
                        <span>

                            {$user_club.member_code}

                            {* check if current user is approved *}

                            {if $user_club.isCurrentUserApproved}

                                <form method="post" class="inline">

                            <input type="hidden" name="url" value="{$user_club.url}">

                            <button type="submit"  class="btn btn-sm small text-success scoa_xsmall_text btn-default fa fa-repeat"></button>

                        </form>

                            {/if}

                            {* end of comment *}


                        </span>

                        <h5><a href="{$public}organization/members/{$user_club.url}">MEMBERS</a></h5>

                        <p class="user-friends">

                            {* populate the members of target organization *}


                            {foreach $user_club.members.approved as $every => $user}


                                <a href="">
                                    <img alt="image" data-toggle="tooltip" data-placement="auto" title=
                                    "{$user.Firstname|cat:" "|cat: $user.Lastname|capitalize:true:true }" class="img-circle profile" src="{$public}/files/profile/{$user.profile|default:'default/1.jpg'}">
                                </a>


                            {/foreach}


                            {* end of comment *}

                        </p>


                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="ibox float-e-margins" id="ibox1">
                    <div class="ibox-title">
                        <h5>Required</h5>
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

                                            <a href=
                                               "{if $user_club.isCurrentUserApproved}

                                               {$public}organization/members/{$user_club.url}

                                               {else}

                                               javascript:void 0

                                               {/if}">5 members including the Treasurer, Auditor, Organization President, Department Governor and Adviser.</a>

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

                                            <a href=
                                               "{if $user_club.isCurrentUserApproved}

                                               {$public}organization/members/{$user_club.url}

                                               {else}

                                               javascript:void 0

                                               {/if}">Complete members requirements.</a>

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

                                            <a>Cover photo of organization</a>

                                        </div>

                                    </div>

                                </div>


                            </li>

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </div>

{/block}





{block script}


{literal}

    <script>

        $(document).ready(function(){

            let checkbox = $('.scoa-requirements input[type=checkbox]');


            $.post('{/literal}{$public}{literal}/organization/requirements',{ tempath : "{/literal}{$user_club.tempath}{literal}" },function(response){

                let data = JSON.parse(response);

                console.log(data);

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







        })

    </script>


{/literal}

{/block}
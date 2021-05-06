
{extends "`$root`public\included_template\user\user_index_home_structure.tpl"}



{block content}



    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-sm-12">

           <div class="row">

               <div class="col-sm-9">

                   <h2>

                       {$user_club.name|truncate:55:"..."|default:'Your Organization'}


                   </h2>


                   <ol class="breadcrumb">
                       <li>
                           <a href="{$public}/organization">Home</a>
                       </li>
                       <li>
                           <a href="{$public}/organization?#tab2">Organization</a>
                       </li>

                       <li class="active">
                           <strong>Members</strong>
                       </li>
                   </ol>



               </div>

               <div class="col-sm-3">
                   <h4 class="scoa-xxs-brand-name pull-right middle-box no-margins margin-top-negative ">{$user_club.member_code}</h4>
               </div>

           </div>

        </div>


    </div>



    <div class="row  m-t / m-t-(xs,sm,md,lg,xl)">

        <div class="row">

            <div class="col-sm-12">

                {include "`$root`public\included_template\user\user_index_org_members_populate.tpl"}

            </div>

        </div>

    </div>

{/block}



{block script}


{literal}


    <script id="remove_feed" type="text/html">

        <div class="social-feed-box no-margin-left">
            <div class="social-body">
                <h4 class="scoa-small-brand-name">#SCOA</h4>
            </div>
        </div>

    </script>



    <script>

        $(document).ready(function()
        {



            $('input[type=checkbox]:not(.scoa)').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                disabledClass: "scoa-disabled-checkbox"
            });


            $(".scoa_remove_member").click(function(){

                let request_id = $(this).attr("request"),
                    parent = $(this).parents('.scoa-social-feed'),
                    tempath = "{/literal}{$user_club.tempath}{literal}",
                    type = $(this).attr("state"),
                    id= jQuery(this).attr("id");

                swal({
                    title: "Are you sure?",
                    text: "This will be notify others",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: false
                }, function () {


                     jQuery.post("{/literal}{$public}/organization/members_state{literal}",
                         {
                        tempath : tempath ,
                        state : type ,
                        user_id : request_id,
                        renewalID : id
                         },
                        function (response) {


                        let result = JSON.parse(response),
                            is_valid_result = result.hasOwnProperty("response")
                                && result.hasOwnProperty("tempath")
                                && result.response;


                            if(is_valid_result)
                            {
                                jQuery(parent).html(jQuery("#remove_feed").html());
                                swal("Success", "A member has been "+type, "success");

                            }

                            if(!is_valid_result)

                                swal("Error", "an error occur, we cant accept your request at this moment", "error");


                            if(result.tempath)

                                tempath = result.tempath;


                    });




                });

            })


        })


    </script>

{/literal}


{/block}


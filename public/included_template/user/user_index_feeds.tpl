{extends "`$root`public\included_template\user\user_index_feed_structure.tpl"}


{strip}

{* @param id @param title @param body *}




<script>



    {block innerscript append}


    $('.tagsinput').tagsinput({

        tagClass: 'label label-primary',
        maxTags: 4,
        maxChars: 11,
        confirmKeys: [13,32,44,8],
        trimValue : true

    });

    window.scoa_token = `{$user_club.url}`;

    /** initialize post_box action **/

    jQuery.scoa._reset = function()
    {


        try{

            const club_url = "{$user_club.url}";

            let scoa = jQuery.scoa;

            scoa.post_box._call("post_box *");

            scoa.file_input._call('#scoa-file-browser',"../feeds/upload");

            let create_post = scoa.create_post;

            create_post.uri = "../feeds/post_request";
            create_post.org_uri = club_url;
            create_post._call('.post-button','.scoa-textarea');

            scoa.feed._call("feeds:last-of-type","{$public}/feeds/users_post",club_url);

            jQuery._scoa(
                {

                    postOptions : {
                        Ajax_parameter : {
                            url : club_url
                        },


                    }
                });


        }catch(err)
        {

            console.log(err);

            swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");

            /** window.location.reload() **/

        }

        return true;


    }();


    {/block}

</script>



 {function main_feeds}

     {include "`$root`public\included_template\misc\content_feeds.tpl"}

 {/function}


{block content}


    {assign org $user_club}


    <div id="body_content">

        {call main_feeds}


    </div>


{/block}



{block head}

    <link href="{$css}plugins/spreadsheet/spreadsheet.css?{$pin}" rel="stylesheet">

    <link href="{$css}plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

{/block}




{/strip}



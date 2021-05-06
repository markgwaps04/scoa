{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{assign isStrict true}

{assign org $user_org[0]}


{block title} SCOA | FEEDS {/block}




{block upper_head}


    <link href="{$css}ckin.min.css?{$pin}" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link href="{$css}plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <style>

        .file-thumb-progress.kv-hidden
        {
            top: 34px !important;
        }
        .scoa-textarea
        {
            color: black;
        }

    </style>


{/block}






{block script}

    <script src="{$js}plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <script src="{$js}ckin.min.js?{$pin}" type="text/javascript"></script>

    <script src="{$js}fileinput.min.js?{$pin}" type="text/javascript"></script>


{/block}










{block body}


    {include "`$root`public\included_template\misc\org_info_header.tpl"}

    {include "`$root`public\included_template\admin\admin_feeds.tpl"}


{/block}


<script>

    {block inner_script append}


    {literal}


    //initialize post_box action


    try{

        let scoa = jQuery.scoa;




        scoa.post_box._call("post_box *");

        scoa.file_input._call('#scoa-file-browser',"../upload");

        let create_post = scoa.create_post;

        create_post.uri = "../post_request/{/literal}{$org.RCode}{literal}";
        create_post.org_uri = {/literal}"{$org.url}"{literal};
        create_post._call('.post-button','.scoa-textarea');

        scoa.feed._call("feeds:last-of-type","{/literal}{$public}/scoa_feeds/org_posts/{$org.RCode}","{$org.url}"{literal});



    }catch(err)
    {

        swal("Reloading...", "authentication request failed please wait while reprocessing your request", "error");

        window.location.reload();

    }



    {/literal}



    {/block}

</script>
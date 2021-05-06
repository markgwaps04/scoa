{extends "`$root`public\included_template\user\user_index_structure.tpl"}


{block head append}

    <link href="{$css}plugins/steps/jquery.steps.css" rel="stylesheet">



    <style>


        #steps div.content
        {

            background: white;

        }

    </style>

{/block}





{block script append}

    <script src="{$js}plugins/steps/jquery.steps.min.js"></script>

    <script src="{$js}plugins/validate/jquery.validate.min.js"></script>

{/block}



<script>


    {block innerscript}

    jQuery._scoa();

    $("#steps").steps({
        headerTag : "h3",
        bodyTag : "section",
        transitionEffect : "slideLeft"
    });


    {/block}

</script>




{include "`$root`public\included_template\user\user_index_FS.tpl"}


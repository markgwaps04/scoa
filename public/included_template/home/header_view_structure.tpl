

<!DOCTYPE html>
<html lang="en">
<head>

    {include 'included_template/home/home_view_header.tpl'}

    {block name=header}{/block}

    {*{if $request neq 3}*}

        {*{block name=header}{/block}*}

    {*{/if}*}


</head>
<body>



<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="javascript:void 0">
                SCOA.staff
            </a>



            <div class="nav-collapse navbar-inverse-collapse">

                <ul class="nav pull-right">

                    {block name=navbar}{/block}

                </ul>
            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->


<div class="wrapper">

<div class="container">

       <div class="row">


            {* BODY AREA *}

            {if $request neq 3}

            {block name=body}{/block}

            {else}

            {include "included_template/home/Error.html"}

            {/if}



        </div>



    </div><!--/.content-->
</div><!--/.wrapper-->

{include 'included_template/home/home_view_footer.mrk'}
{include 'included_template/home/home_view_scripts.mrk'}

{* SCRIPTS AREA *}

{block name=script}{/block}

</body>

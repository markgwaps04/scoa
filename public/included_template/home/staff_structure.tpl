
{$pin = mt_rand(0,1000)}

<!DOCTYPE html>
<html lang="en">
<head>




    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCOA</title>
    <link href="{$vendor}bootstrap/css/bootstrap1.min.css" rel="stylesheet">
    <link href="{$vendor}fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{$css}theme.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link href="{$css}animate.css" rel="stylesheet">
    <link href="{$css}animate.css" rel="stylesheet">
    <link href="{$vendor}font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{$css}scoa_default.css?{$pin}" rel="stylesheet">

    {block head} {/block}




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


    {block body append}{/block}


</div>


<!--/.wrapper-->

<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2018 SCOA Organization </b> All rights reserved.
    </div>
</div>


<script src="{$vendor}jquery/jquery.min.js" type="text/javascript"></script>
<script src="{$vendor}jquery/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="{$vendor}bootstrap/js/bootstrap1.min.js" type="text/javascript"></script>
<script src="{$js}jquery.validate.min.js" type="text/javascript"></script>
<script src="{$js}scoa.js" type="text/javascript"></script>

{* SCRIPTS AREA *}



{block script append}{/block}


<script>

    {block inner_script append}



    {/block}

</script>

</body>

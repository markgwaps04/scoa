
{include "`$root`public\included_template\global_functions.tpl"}



<html>


<head>

    {literal}


        <style>

            #wrapper {
                background-color: white;
                padding: 40px;
                font-family: auto;
                overflow: hidden;
            }

            body {

                background-color: white !important;

            }

            #wrapper h5 {

                line-height: 15px;
                text-align: center;
                font-family: Times,serif;
                text-decoration: none;
                letter-spacing: 0;

            }


            #body {

                width:98%;

            }

            #body table {

                text-align:center;
                margin-left:auto;
                margin-right:auto;
                width:fit-content;
                min-width: 50%;

            }

            tr,td {

                text-align:center;
                padding: 10px !important;
                font-size: 14px;
                font-family: "Calibri",serif;
                background: none !important;

            }

            #foot {

                margin-top: 20px;

            }

            .spacer {

                padding-top: 10px; padding-bottom:10px

            }

            #total {

                text-decoration: underline;
                text-decoration-style: double;

            }

            #approved {

                font-size: 14px;
                /*position: absolute;*/
                font-family: "Calibri",serif;
                /*left: 17%;*/
                max-width: 30%;
                left: 131px;
                position: relative;

            }


            #approved #content_sign {

                position: relative;
                line-height: 0px;
                text-align: center;
                left: 40%;
                font-weight: 600;
                font-family: "Calibri",serif;


            }

            #signature {
                position: absolute;
                left: 0;
                right : 0;
                top: -65px;
            }

            #signature img {

                max-width: 150px;

            }

        </style>

    {/literal}




    <link href="{$css}bootstrap.min.css" rel="stylesheet">

    <link href="{$vendor}font-awesome/css/font-awesome.css" rel="stylesheet">


    <link href="{$css}/scoa_default.css?{$pin}" rel="stylesheet">

    <link href="{$css}animate.css" rel="stylesheet">

    <link href="{$css}font_style.css" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

</head>


<div id="wrapper">


    {assign batch $checklist_class->getBatchDetails()}

    {assign org $org_details[0]}


    {assign cash_received $checklist_class->getFsAttributes($org.RCode,"cash_received")}


    <div id="_content">


        <h5 style="color:blue"><b>DEPARTMENT OF ACCOUNTING EDUCATION</b></h5>
        <h5><b>STATEMENT OF CASH RECEIVED </b></h5>
        <h5><b>For The Semester Ended {$batch.deadline|date_format:"%B %d %Y"}</b></h5>

        <br>
        <br>


        <div id="body">


            <table>

                {$cash_received->getXML()}

            </table>


            <br>
            <br>
            <br>

            </div>


        <div>

            {if $org.members.approved}


            <div id="approved">

                <b>Prepared by: </b>


                {foreach $fs->getAlreadySignUsers() as $every => $user}


                    {if $user.position neq 5}

                        {if not $user@index <= 2}

                            <br>
                            <br>
                            <br>
                            <br>

                        {/if}

                        <div id="content_sign" style="background-color: white">

                            {if $user.sign_svgbase64|trim}

                                <div id="signature">
                                    <img src="data:{$user.sign_svgbase64}">
                                </div>

                            {/if}


                            {call user_fullname param=$user assign="user_name"}

                            {call position param=$user.position assign="position"}



                            {$user_name|upper}
                            <hr>
                            DAE {$position|upper}


                        </div>


                    {/if}



                {/foreach}



                {foreach $fs->getUnSignUsers() as $every => $user}


                    {if $user.position neq 5}

                        {if not $user@index <= 2}

                            <br>
                            <br>
                            <br>
                            <br>

                        {/if}

                        <div id="content_sign" style="background-color: white">



                            {if $user.sign_svgbase64|trim}

                                <div id="signature">
                                    <img src="data:{$user.sign_svgbase64}">
                                </div>

                            {/if}


                            {call user_fullname param=$user assign="user_name"}

                            {call position param=$user.position assign="position"}


                            {$user_name|upper}
                            <hr>
                            DAE {$position|upper}


                        </div>


                    {/if}



                {/foreach}



                {/if}

        </div>


        </div>


    </div>



</html>
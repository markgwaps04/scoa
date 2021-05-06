<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCOA | Login </title>

    <link href="{$css}bootstrap.min.css" rel="stylesheet">
    <link href="{$vendor}font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{$css}animate.css" rel="stylesheet">
    <link href="{$css}scoa.css" rel="stylesheet">



</head>

<body class="gray-bg">

<div id="particles" style="position: fixed;top:0;bottom: 0;left: 0;right:0;"></div>

    <div class="loginColumns animated {if $request eq 0} fadeInDown {/if}">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">SCOA</h2>

                <p>
                    The Student’s Commission on Audit (SCOA) is an organization that has the power, authority and duty to examine, audit and settle all accounts and expenditures of the funds and properties of every organizations in <a href="#">UM Digos College</a>.


                </p>

                <p>
                    Its principle is to strengthen transparency and reliability in auditing the prepared financial statement in every clubs and organizations by the end of the semester.
                </p>

                <p>
                    The SCOA will examine, evaluate, and report on the adequacy and reliability of existing controls to ensure that revenues are accurately and completely captured and processed ...
                    <a href="#">More</a>
                </p>


            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form method="post" action="{$public}home/SignIn" class="form-vertical">


                        {*** 1 => PASSWORD_INVALID, -1 => USERNAME_INVALID , 2 => REQUEST_VALID ***}

                        {if $request eq 1}

                        <div class="alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <a class="alert-link" href="#"><i class="fa fa-warning"></i></a> &nbsp;
                            The Username/ID and password combination you entered cannot be recognized or does not exist. Please try again.
                        </div>


                        {elseif $request eq -1}

                        <div class="alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert"  class="close" type="button">×</button>
                            <a class="alert-link" href="#"><i class="fa fa-warning"></i></a> &nbsp;
                            Username or ID doesn't exist.
                        </div>


                        {/if}




                        <div class="form-group">
                            <input type="text" class="form-control" name="user" placeholder="Username or ID no." required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{$public}home/new_account">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Student’s Commission on Audit (SCOA) Students</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright <a href="#">Uiversity of Mindanao Digos College</a>
            </div>
            <div class="col-md-6 text-right">
               <small>© SCOA 2018-2019</small>
            </div>
        </div>
    </div>

</body>

</html>


<script src="{$js}scoa/scoa_partial.js"></script>

<script src="{$js}LAB.js"></script>

<script>

    const jsDir = "{$js}";

    {literal}

    (function(){

        const script = [
            "jquery-3.1.1.min.js",
            "bootstrap.min.js",
            "scoa.js",
            "particles.min.js"
        ];

        $LAB
            .setOptions({AlwaysPreserveOrder:true})
            .script(script.toNestedArray(jsDir))
            .wait(function(){

               jQuery._scoa();


               jQuery(document).ready(function() {


                    particlesJS('particles',

                        {
                            "particles": {
                                "number": {
                                    "value": 100,
                                    "density": {
                                        "enable": true,
                                        "value_area": 800
                                    }
                                },
                                "color": {
                                    "value": "#ffffff"
                                },
                                "shape": {
                                    "type": "circle",
                                    "stroke": {
                                        "width": 0,
                                        "color": "#000000"
                                    },
                                    "polygon": {
                                        "nb_sides": 5
                                    },
                                },
                                "opacity": {
                                    "value": 0.5,
                                    "random": false,
                                    "anim": {
                                        "enable": false,
                                        "speed": 1,
                                        "opacity_min": 0.1,
                                        "sync": false
                                    }
                                },
                                "size": {
                                    "value": 5,
                                    "random": true,
                                    "anim": {
                                        "enable": false,
                                        "speed": 40,
                                        "size_min": 0.1,
                                        "sync": false
                                    }
                                },
                                "line_linked": {
                                    "enable": true,
                                    "distance": 150,
                                    "color": "#ffffff",
                                    "opacity": 0.4,
                                    "width": 1
                                },
                                "move": {
                                    "enable": true,
                                    "speed": 6,
                                    "direction": "none",
                                    "random": false,
                                    "straight": false,
                                    "out_mode": "out",
                                    "attract": {
                                        "enable": false,
                                        "rotateX": 600,
                                        "rotateY": 1200
                                    }
                                }
                            },
                            "interactivity": {
                                "detect_on": "canvas",
                                "events": {
                                    "onhover": {
                                        "enable": true,
                                        "mode": "repulse"
                                    },
                                    "onclick": {
                                        "enable": true,
                                        "mode": "push"
                                    },
                                    "resize": true
                                },
                                "modes": {
                                    "grab": {
                                        "distance": 400,
                                        "line_linked": {
                                            "opacity": 1
                                        }
                                    },
                                    "bubble": {
                                        "distance": 400,
                                        "size": 40,
                                        "duration": 2,
                                        "opacity": 8,
                                        "speed": 3
                                    },
                                    "repulse": {
                                        "distance": 200
                                    },
                                    "push": {
                                        "particles_nb": 4
                                    },
                                    "remove": {
                                        "particles_nb": 2
                                    }
                                }
                            },
                            "retina_detect": true,
                            "config_demo": {
                                "hide_card": false,
                                "background_color": "#b61924",
                                "background_image": "",
                                "background_position": "50% 50%",
                                "background_repeat": "no-repeat",
                                "background_size": "cover"
                            }
                        }

                    );

                })


            });





    })();

    {/literal}

</script>


(function()
{

    /** clock picker plugin **/

    $('.clockpicker').clockpicker();


    /** date picker plugin **/

    $('#date .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        todayHighlight : true,
        startDate : "+1d",
        startView : "",
        format : 'DD, M d, yyyy',
        autoclose: true
    });


    jQuery("#renew").click(function ()
    {

        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){

                if (isConfirm){

                    swal.close();

                    let parent = jQuery(".checklist-body"),
                        target = jQuery(this);

                    target.attr("disabled","");
                    parent.addClass("sk-loading");

                    jQuery.get("../scoa_checklist/new_set",function(response)
                    {


                        if(!!response.trim())
                        {

                            swal({
                                title: "Success",
                                text: "a checklist was added to the batch list",
                                type: "success",
                            },function()
                            {

                                window.location.reload();

                            });

                            return;

                        }

                        target.removeAttr("disabled","");
                        parent.removeClass("sk-loading");

                        swal("Failed","No renewable organization found!","warning");


                    })


                }else {

                    swal.close();

                }
            });





    })

})();
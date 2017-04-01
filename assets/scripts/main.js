/**
 * Created by boma1 on 24.02.2017.
 */

jQuery(function ($) {
    $("#dike_rating").bind("rated", function () {
        $(this).rateit("readonly", true);

        var formObj         =   {
            action:             "dp_rate_post",
            rid:                $(this).data("rid"),
            rating:             $(this).rateit("value")
        };

        $.post( dike_obj.ajax_url, formObj, function(data) {
            console.log(data);
        } );

        //console.log(formObj);
    });
});

/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 03/08/11
 * Time: 15:07
 * To change this template use File | Settings | File Templates.
 */

//moved to this folder as this script was cuasingh problems when combined with the others
    

<!-- Controls the help pop up box-->
<!-- This needs to be at the top of the page or the pop up stops working-->
    // increase the default animation speed to exaggerate the effect
// fx speed commented out for no
//    $.fx.speeds._default = 1000;
    $(function() {
        $("#dialog").dialog({
            autoOpen: false,
            width: 450,

              close: function(event, ui) {
//                  $("#second").dialog("destroy");
                  $("#videocontainer").remove();
           }
        });

        $("#opener").click(function() {
            $("#dialog").dialog("open");
$("#dialog").load('http://moodledev.midkent.ac.uk/blocks/ilp/templates/custom/test.html');
return false;
//            $("#dialog").load("test.html").dialog("open");
        });
    });
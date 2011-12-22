//<!--Script to run the submit button graphic - doesn't work when added tot he main js script files-->
//    $(document).ready(function() {
//        $('#submitFlightplan').hover(function() {
//            $(this).addClass('mhover')
//        }, function() {
//            $(this).removeClass('mhover');
//        });
//
//            $('#editFlightplan').hover(function() {
//                $(this).addClass('mhover')
//            }, function() {
//                $(this).removeClass('mhover');
//            });
//        });


function toggle5(showHideDiv, switchImgTag, text) {
      var ele = document.getElementById(showHideDiv);
       var imageEle = document.getElementById(switchImgTag);
//    var text2 = document.getElementById(text);
        if(ele.style.display == "block") {
               ele.style.display = "none";
		imageEle.innerHTML = '<img src="/blocks/ilp/templates/custom/pix/plus.png"><b>' + (text) + '</b>';
        }
       else {
               ele.style.display = "block";
               imageEle.innerHTML = '<img src="/blocks/ilp/templates/custom/pix/minus.png"><b>Collapse this window</b>';
     }
}












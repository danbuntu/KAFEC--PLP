    $(function() {
        $( "#tabs" ).tabs();
    });

    $(function() {
        $( "#accordion" ).accordion({
            collapsible: true
        });
    });

    $(function(){
        $('#multiOpenAccordion').multiAccordion({ active: false });
    });

    $(function(){
        $('#multiOpenAccordion2').multiAccordion();
    });

    $(function(){
        $('#multiOpenAccordion3').multiAccordion({ active: false });
    });

    $(function(){
        $('#multiOpenAccordion4').multiAccordion({ active: false });
    });

    $(function(){
        $('#multiOpenAccordion5').multiAccordion();
    });

    $(function(){
        $('#multiOpenAccordion6').multiAccordion({ active: false });
    });

    $(document).ready(function() {
        $('.assessmentbox').each(function() {
            $(this).qtip({
                content: $(this).children('.assessmentinfo'),
                show: 'mouseover',
                hide: 'mouseout',
                style: {
           name: 'blue',
                tip:  'topRight'


                },
                position: {
                    corner: {
                        target: 'bottomLeft',
                        tooltip: 'topRight'
                    }
                }
            });
        });

// since the qTip copies the content of the info div, you can remove it now
        $('.assessmentbox').remove('.info');
    });
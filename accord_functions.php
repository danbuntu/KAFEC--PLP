<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of accord_functions
 *
 * @author dattwood
 */
// functions to use to setup an accordian menu and keep the code tidy
function accord_first($title) {

    echo '<h3 class="cast"><a href="javascript:void()">' .$title . '</a></h3>';
       echo '<div>';

}

function accord_firstcast($title) {
    echo '<h3><a href="javascript:void()"><font color="#70A02B">' .$title . '</font></a></h3>';
       echo '<div>';
}


function accord_open($title) {
    echo '<dl class="accordion">';
    echo '<dt class="selected">' . $title . '</dt>';

}



function accord_start($title) {
    print "<dt>$title</dt>";
    echo '<dd class="open">';
    echo '<div class="bd">';
}

function accord_end() {
    echo '</div></dd>';
}

function accord_last() {
    echo '</div>';
}


function accord_lastcast() {
        echo '</div>';
}

?>

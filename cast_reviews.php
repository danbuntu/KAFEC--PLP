<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 26/10/11
 * Time: 11:48
 * To change this template use File | Settings | File Templates.
 */

foreach ($resultCast as $key => $item) {
//    echo $key;
    if ($key == 'Reviews') {
accord_first('Cast Reviews');

        echo '<table>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {

                echo '<div id="ilp-target-overview">';
                echo '<div class="block_ilp_ilptarget">';
                echo '<div class="ilp_post yui-t4">';
                echo '<div class="bd" role="main">';
                echo '<div class="yui-main">';
                echo '<div class="yui-b">';
                echo '<div class="yui-gd">';
                echo '<div class="yui-u first">Support to Date:</div>';
                echo '<div class="yui-u">' . $iItem['support_to_date'] . '<p></div>';
                echo '</div>';
                echo '<br/>';
                echo '<div class="yui-gd">';
                echo '<div class="yui-u first">Review of Support:</div>';
                echo '<div class="yui-u">' . $iItem['notes'] . '<p></div>';
                echo '</div>';
                echo '<br/>';
                echo '<div class="yui-gd">';
                echo '<div class="yui-u first">Details of changes:</div>';
                echo '<div class="yui-u">' . $iItem['details_of_changes'] . '<p></div>';
                echo '</div>';
                echo '<br/>';
                echo '<div class="yui-gd">';
                echo '<div class="yui-u first">Perfomance Against SMART Targets:</div>';
                echo '<div class="yui-u">' . $iItem['performance_against_targets'] . '<p></div>';
                echo '</div>';
                echo '<br/>';
                echo '<div class="yui-gd">';
                echo '<div class="yui-u first">New SMART Targets Set:</div>';
                echo '<div class="yui-u">' . $iItem['new_targets'] . '<p></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="yui-b">';
                echo '<ul>';

                echo '<li>Tutor: ' . $iItem['reviewer'] . '</li>';
                $date = strtotime($iItem['date_of_review']);
                echo '<li>Date: ' . date("d F Y", $date) . '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

            }
       echo '</table>';
        accord_last();
        }
}



?>
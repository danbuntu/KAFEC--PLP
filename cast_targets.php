<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 26/10/11
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */


// Check that there are targets


foreach ($resultCast as $key => $item) {
//    echo $key;
    if ($key == 'Targets') {
        accord_first('Cast SMART Targets');

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
              echo '<div class="yui-u first">SMART Objective:</div>';
              echo '<div class="yui-u">' . $iItem['objective'] . '<p></div>';

              echo '</div>';
              echo '<div class="yui-gd">';
              echo '<div class="yui-u first">Resources:</div>';
              echo '<div class="yui-u">' . $iItem['success'] . '<p></div>';
              echo '</div>';
              echo '<div class="yui-gd">';
              echo '<div class="yui-u first">Relevant Evidence:</div>';
              echo '<div class="yui-u">' . $iItem['evidence'] . '<p></div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="yui-b">';
              echo '<ul>';
              echo '<li>Objective Number: ' . $iItem['objective_number'] . '</li>';
              echo '<li>Set By: ' . $iItem['set_by'] . '</li>';
              $date = strtotime($iItem['date_to_achieve']);
              echo '<li>Deadline: ' . date("d F Y", $date) . '</li>';
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
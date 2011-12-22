<?php

                accord_first('Other Actions');
                //echo 'This is only a test block<br/>';
                $url = $CFG->wwwroot;
               // echo '<br/>' . $url . '&var1=' . fullname($user) . ' &var2=' . $user->username . '<br/>';
                // send to the medals page and pass through the name, username and id number for use later
                //Check if the user can edit the student info - if they can dispaly the medal edit button, if not hide it
                if (has_capability('block/ilp_student_info:viewclass', $context)) {
                    echo '<form id="medals" action="./templates/custom/badges/selectbadge.php?var1=' . fullname($user) . '&var2=' . $user->username . '&var3=' . $user->id . '&var4=' . $courseid . '" method="post"><input type="submit" value="Edit Medals"></form>';
                }
//                echo '<input type="button" value="Enable/disable guardian account">';
//                echo '<input type="button" value="Reset guardian password">';

                accord_last();


?>

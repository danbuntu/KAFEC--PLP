<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 24/06/11
 * Time: 10:41
 * Holds the various functions used in the plp
 */

// function to set the attendance colour and text
function attendancecolour($totalattendance)
{
    $totalattendance = $totalattendance;
    if (round($totalattendance) == '0') {
        $text = 'None Registered';
        $colour = 'gold';
    } elseif (round($totalattendance) == 100) {
        $colour = 'gold';
        $text = 'is Outstanding';
    } elseif (round($totalattendance) >= '95') {
        $colour = 'blue';
        $text = 'is Excellent';
    } elseif (round($totalattendance) >= '90' && round($totalattendance) <= '94') {
        $colour = 'teal';
        $text = 'is Good';
    } elseif (round($totalattendance) <= '89' && round($totalattendance) >= '86') {
        $colour = 'orange';
        $text = 'is Cause for Concern';
    } elseif (round($totalattendance) <= '80' && round($totalattendance) >= '85') {
        $colour = 'red';
        $text = 'is Poor';
    } else {
        $colour = 'red';
        $text = 'is Poor';
    }

    $rv = array($colour, $text);
    return $rv;
}

function replaceUnderScore($value)
{
    $value = str_replace("_", " ", $value);
    return $value;
}


function display_ilpconcern_by_year($id, $courseid, $report, $time, $year, $full = TRUE, $title = TRUE, $icon = TRUE, $sortorder = 'DESC', $limit = 0)
{

    // check if this should check against the current year or use the previous years to fill the archive
    if ($year == 'current') {
        $modifier = '>=';
    } elseif ($year == 'archive') {
        $modifier = '<=';
    }

    global $CFG, $USER;
    require_once("$CFG->dirroot/blocks/ilp_student_info/block_ilp_student_info_lib.php");
    require_once("$CFG->dirroot/mod/ilpconcern/lib.php");
    include ('access_context.php');

    $module = 'project/ilp';
    $config = get_config($module);

    $user = get_record('user', 'id', $id);

    $status = $report - 1;

    $select = "SELECT {$CFG->prefix}ilpconcern_posts.*, up.username ";
    $from = "FROM {$CFG->prefix}ilpconcern_posts, {$CFG->prefix}user up ";
    $where = "WHERE up.id = setbyuserid AND status = $status AND setforuserid = $id AND deadline $modifier $time ";

    if ($CFG->ilpconcern_course_specific == 1 && $courseid != 0) {
        $where .= 'AND course = ' . $courseid . ' ';
    }

    $order = "ORDER BY deadline $sortorder ";

    $concerns_posts = get_records_sql($select . $from . $where . $order, 0, $limit);

    if ($title == TRUE) {
        echo '<h2>';

        if ($icon == TRUE) {
            if (file_exists('templates/custom/pix/report' . $report . '.gif')) {
                echo '<img src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/report' . $report . '.gif" alt="" />';
            } else {
                echo '<img src="' . $CFG->wwwroot . '/blocks/ilp/pix/report' . $report . '.gif" alt="" />';
            }
        }

        echo '<a href="' . $CFG->wwwroot . '/mod/ilpconcern/concerns_view.php?' . (($courseid > 1)
                ? 'courseid=' . $courseid . '&amp;'
                : '') . 'userid=' . $id . '&amp;status=' . $status . '">' . (($access_isuser)
                ? get_string('report' . $report . 'plural', 'ilpconcern')
                : get_string('report' . $report . 'plural', 'ilpconcern')) . '</a>';

        echo '<div class="ilpadd">';
        // Knock out the add button when is displaying in archive mode
        if ($year == 'current') {
            if (eval('return $CFG->ilpconcern_report' . $report . ';') == 1 && (has_capability('mod/ilpconcern:addreport' . $report, $context) || ($USER->id == $user->id && has_capability('mod/ilpconcern:addownreport' . $report, $context)))) {
                echo '<img src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/plus.gif"> <a class="button" href="' . $CFG->wwwroot . '/mod/ilpconcern/concerns_view.php?' . (($courseid > 1)
                        ? 'courseid=' . $courseid . '&amp;'
                        : '') . 'userid=' . $id . '&amp;status=' . $status . '&amp;action=updateconcern&amp;status=' . ($status) . '" onclick="this.blur();"><span>' . get_string('addconcern', 'ilpconcern', get_string('report' . $report, 'ilpconcern')) . '</span></a>';
            }
        }
        echo '</div>';
        echo '<div class="clearer">&nbsp;</div>';

        echo '</h2>';

    }

    if ($full == TRUE) {
        echo '<div class="block_ilp_ilpconcern">';

        if ($concerns_posts) {
            foreach ($concerns_posts as $post) {
                $posttutor = get_record('user', 'id', $post->setbyuserid);

                echo '<div class="ilp_post yui-t4">';
                echo '<div class="bd" role="main">';
                echo '<div class="yui-main">';
                echo '<div class="yui-b">';
                if (isset($post->name)) {
                    echo '<div class="yui-gd">';
                    echo '<div class="yui-u first">';
                    echo get_string('name', 'ilpconcern');
                    echo '</div>';
                    echo '<div class="yui-u">';
                    echo $post->name;
                    echo '</div>';
                    echo '</div>';
                }
                echo '<div class="yui-gd">';
                echo '<div class="yui-u first">';
                echo '<p>' . get_string('report' . $report, 'ilpconcern') . '</p>';
                echo '</div>';
                echo '<div class="yui-u">';
                echo '<p>' . $post->concernset . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="yui-b">';
                echo '<ul>';
                echo '<li>' . get_string('setby', 'ilpconcern') . ': ' . fullname($posttutor);
                if ($post->courserelated == 1) {
                    $targetcourse = get_record('course', 'id', $post->targetcourse);
                    echo '<li>' . get_string('course') . ': ' . $targetcourse->shortname . '</li>';
                }
                echo '<li>' . get_string('deadline', 'ilpconcern') . ': ' . userdate($post->deadline, get_string('strftimedate'));
                echo '</ul>';

                $commentcount = count_records('ilpconcern_comments', 'concernspost', $post->id);

                echo '<div class="commands"><a href="' . $CFG->wwwroot . '/mod/ilpconcern/concerns_comments.php?' . (($courseid > 1)
                        ? 'courseid=' . $courseid . '&amp;'
                        : '') . 'userid=' . $id . '&amp;concernspost=' . $post->id . '">' . $commentcount . ' ' . get_string("comments", "ilpconcern") . '</a>';

                echo ilpconcern_update_menu($post->id, $context, $report);

                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}


function checkPassport($value)
{
    $yes = '';
    $selected = '';
    if ($value == 1) {
        $yes = '<img src="./templates/custom/pix/tick-icon.png">';
        $selected = 'checked="yes"';
    } else {
        $yes = '<img src="./templates/custom/pix/delete-icon.png">';
        $selected = '';
    }

    $array = array();
    array_push($array, $yes);
    array_push($array, $selected);
    return $array;
}


function passportCheckbox($string, $name, $context)
{
    if ($string == 1) {
        echo '<img src="./templates/custom/pix/tick-icon.png">';
        if (has_capability('block/ilp_student_info:viewclass', $context)) {
            echo  '<br/><input type="checkbox" name=' . $name . ' checked="yes">';
        }
    } else {
        echo '<img src="./templates/custom/pix/delete-icon.png">';
        if (has_capability('block/ilp_student_info:viewclass', $context)) {
            echo '<br/><input type="checkbox" name=' . $name . '>';
        }
    }
}

function passportCheckboxJob($string, $name, $context, $show)
{
    if ($string == 1) {
        echo '<img src="./templates/custom/pix/tick-icon.png">';
        if ($show ==1) {
            echo  '<br/><input type="checkbox" name=' . $name . ' checked="yes">';
             echo  '<input type="hidden" name=' . $name . 'current value="on"">';
        } else {
            echo  '<input type="hidden" name=' . $name . ' value="on"">';
            echo  '<input type="hidden" name=' . $name . 'current value="on"">';
        }
    } else {
        echo '<img src="./templates/custom/pix/delete-icon.png">';
        if ($show ==1) {
            echo '<br/><input type="checkbox" name=' . $name . '>';
            echo  '<input type="hidden" name=' . $name . 'current value="off"">';
        } else {
            echo  '<input type="hidden" name=' . $name . ' value="0"">';
            echo  '<input type="hidden" name=' . $name . 'current value="off"">';
        }
    }
}


?>


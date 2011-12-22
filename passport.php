<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 27/09/11
 * Time: 11:21
 * Tab to hold the passport information
 **/

include('moodle_connection_mysqli.php');

//print_r($USER);

//$result = load_all_capabilities();

// get the job shop role id
$query = "SELECT id FROM mdl_role WHERE shortname='jobshop'";
$result = $mysqli->query($query);
while ($row = $result->fetch_object()) {
    $resultId = $row->id;
}
//echo 'resultid' . $resultid;
// check they have the job shop role and set the $how flag
$show = '';
$result = user_has_role_assignment($USER->id, $resultId, $contextid = 0);
if ($result) {
//    echo "I'm an a job shopper";
    $show = '1';
}

$query = "SELECT * FROM passport WHERE learner_ref='" . $student_number . "'";
//                echo $query;
$result = $mysqli->query($query);

while ($row = $result->fetch_object()) {
    $b1 = $row->b1;
    $b2 = $row->b2;
    $b3 = $row->b3;
    $s1 = $row->s1;
    $s2 = $row->s2;
    $s3 = $row->s3;
    $g1 = $row->g1;
    $g2 = $row->g2;
    $g3 = $row->g3;
    $bcompleted = $row->bcomp;
    $scompleted = $row->scomp;
    $gcompleted = $row->gcomp;
}
?>
 <b>Key: Personal Tutor (PT) , Course Tutor (CT), Course Teams (CTS), JobShop (JS)</b>
<table style="vertical-align: top;">
<tr>
    <th class="bronze" colspan="4">Bronze</th>
</tr>
<tr class="bronze">
    <th>1. Professional standards of behaviour and reliability</th>
    <th>2. Professional Communication</th>
    <th>3. Draft CV</th>
    <th>Bronze Award</th>
</tr>

<tr class="bronze">
    <td>Completed by CT CTS</td>
    <td>Completed by CT CTS</td>
    <td>Completed by PT</td>
    <td>Completed by JS</td>
</tr>

<tr class="bronze">
    <td style="vertical-align: top;">

        <ul class="passport">
            <li>Maintain attendance above 90%</li>
            <li>Conduct self in a manner appropriate for work (Professionalism)</li>
            <li>Be appropriately dressed for work.- PPE, Equipment</li>
            <li>Prepared for classes - including pens</li>
            <li>Maintain department standards/Customer Service</li>
            <li>Excellent punctuality</li>
            <li>Reliability</li>
        </ul>


    </td>
    <td style="vertical-align: top;">

        <ul class="passport">
            <li>Engage in all theory and workshop sessions</li>
            <li>Make relevant contributions in class
                Communicate with others (tutor, fellow learners, clients and customers etc.) in a manner appropriate for
                a work context
            </li>
            <li>Demonstrates ability to communicate on a range of issues</li>
        </ul>


    </td>
    <td style="vertical-align: top;">

        Student can access Personal Tutor Moodle to use resources to complete a draft CV to discuss at review 1 with PT
        and tutor.
        <ul class="passport">
            <li>Draft CV completed independently</li>
        </ul>


    </td>
    <td style="vertical-align: top;">
        Bronze passport standard awarded by JobShop on receipt of draft CV uploaded to LSR by student or PT – <b>must be
        completed to be released to JobShop for part time job opportunities</b>

    </td>
</tr>

<?php


?>
<form name="passport" method="POST" action="/blocks/ilp/templates/custom/process_passport.php">
    <tr class="bronze2" style="text-align:center;">
        <td>
            <?php  passportCheckbox($b1, 'b1', $context); ?>

        </td>
        <td>
            <?php  passportCheckbox($b2, 'b2', $context); ?>
        </td>
        <td>

            <?php  passportCheckbox($b3, 'b3', $context); ?>

        </td>
        <td>

            <?php  passportCheckboxJob($bcompleted, 'bcomp', $context, $show); ?>

        </td>
    </tr>
    <tr>
        <th class="silver" colspan="4">Silver</th>
    </tr>
    <tr class="silver">
        <th>4. Searching & applying for a job</th>
        <th>5. The Work ready employer interview</th>
        <th>6. Create a CV</th>
        <th>Silver Award</th>
    </tr>
    <tr  class="silver">
        <td>Completed by PT</td>
        <td>Completed by Faculties and JS</td>
        <td>Completed by PT - 2 step process</td>
        <td>Completed by JS</td>
    </tr>
    <tr class="silver">
        <td style="vertical-align: top;">
            Workshops and tutorials will be completed with students providing an opportunity to improve skills in
            searching for and applying for a job. This will be offered over a period of weeks in designated tutorial
            slots known as options weeks. There are a number of resources on v share for self-study, students can access
            through their Personal tutors Moodle pages.
        </td>
        <td style="vertical-align: top;">
            Faculties will work with students to plan Work Ready interview practice. This may be in groups, individually
            or through seminars during options weeks or in designated tutorial sessions. Careers and Educational
            Guidance can also give great advice on interview skills. The JobShop will work with faculties to plan
            occupationally related interview opportunities
        </td>
        <td style="vertical-align: top;">
            The draft CV will be reviewed and improved through workshops in tutorial sessions. The aim is to ensure
            students at MidKent have the edge when applying for full time roles with our key local and national
            employers. Once checked the CV can be released to the JobShop so students are eligible to apply for full time
            roles.
        </td>
        <td style="vertical-align: top;">
            Silver passport standard to be completed by Easter– <b>must complete to be released to JobShop for access to
            full time job opportunities</b>
        </td>
    </tr>
    <tr class="silver2" style="text-align:center;">
        <td>

            <?php  passportCheckbox($s1, 's1', $context); ?>

        </td>
        <td>
            <?php  passportCheckbox($s2, 's2', $context); ?>
        </td>
        <td>

            <?php  passportCheckbox($s3, 's3', $context); ?>

        </td>
        <td>
            <?php  passportCheckboxJob($scompleted, 'scomp', $context, $show); ?>
        </td>
    </tr>
    <tr class="gold">
        <th colspan="4">Gold</th>
    </tr>
    <tr class="gold">
        <th>7. *Optional*</th>
        <th>8. *Optional*</th>
        <th>9. *Optional *</th>
        <th>Gold Award</th>
    </tr>
    <tr class="gold">
        <td>Completed by CT, PT, CTS</td>
        <td>Completed by CT, PT, CTS</td>
        <td>Completed by CT, CTS,JS</td>
        <td>Completed by JS</td>
    </tr>
    <tr class="gold">
        <td style="vertical-align: top;">

            Activities validated by course tutors, personal tutors or course teams. Options weeks allow students to look
            at volunteering, charity work, finance, budgeting, HE, health etc.
        </td>
        <td style="vertical-align: top;">
            Options weeks – Further opportunities to improve on skills and add to the student CV
        </td>
        <td style="vertical-align: top;">
            The offer of short accredited courses may be available to students who are eligible through excellent
            attendance and achievement. These may be delivered by PTs, IAG, outside specialists, banks, HEI or from
            faculty plans such as Food hygiene, Health & Safety , Door supervisor
        </td>
        <td style="vertical-align: top;">
            Gold passport standard denotes a student who has achieved the silver passport and gone onto a achieve in
            skills, activities and short courses
        </td>
    </tr>
    <tr class="gold2" style="text-align:center;">
        <td>
            <?php  passportCheckbox($g1, 'g1', $context); ?>

        </td>
        <td>
            <?php  passportCheckbox($g2, 'g2', $context); ?>
        </td>
        <td>

            <?php  passportCheckbox($g3, 'g3', $context); ?>

        </td>
        <td>
            <?php  passportCheckboxJob($gcompleted, 'gcomp', $context, $show); ?>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right;">
            <?php if (has_capability('block/ilp_student_info:viewclass', $context)) { ?>
            <input type='hidden' name='learner_ref' value='<?php echo $student_number; ?>'>
            <input type='hidden' name='courseid' value='<?php echo $courseid; ?>'>
            <input type='hidden' name='learnerid' value='<?php echo $studentid; ?>'>
            <input type='hidden' name='learnerusername' value='<?php echo $login; ?>'>

            <?php  // Get the student email
            $queryEmail = "SELECT email FROM mdl_user WHERE id='" . $studentid . "'";
            $result = $mysqli->query($queryEmail);
            while ($row = $result->fetch_object()) {
                $studentEmail = $row->email;
            }
            ?>
            <input type='hidden' name='studentEmail' value='<?php echo $studentEmail; ?>'>
            <input type="submit" value="submit changes">
            <?php } ?>
</form>
</td>
</tr>
</table>
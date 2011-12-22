<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 13/09/11
 * Time: 08:24
 * Student induction checklist
 */

//echo 'student number is: ' . $student_number;

?>

<h2> Induction checklist</h2>

   1    Qualifications upon entry and setting of minimum target grade</br>

   2    Information about the course explaining the content, expectations and
    demands of the course.</br>

   3    An introduction to the different teaching and learning styles that will
    be used to deliver the course e.g. home study, independent learning in LRC, research via the internet, etc.</br>

   4    Health and Safety arrangements.</br>

   5    Student Charter and rights and responsibilities</br>

    6    Progression and career opportunities</br>

    7    Careers, Counselling and Welfare Advice</br>

    8    Assessment timetable</br>

    9    The methods of assessment to be used</br>

   10    The setting of a short piece of written work or assignment  - to be
    handed in within four weeks of starting the course</br>

    11    Appeals procedures</br>

    12    Information on the tutorial curriculum and assignment of their course
    tutor</br>

    13    Appointment of course representative</br>

   14    Details of the enrichment programme and how to take part in it</br>

    15    Details of financial support, and how to apply for it</br>

   16    Tour of LRC, discussion of remote learning materials which are
    available and visit to
    the Learning Zones.</br>

    17    Tour of the college centre where they study</br>

    18    Information about the setting and marking of homework</br>

    19    Discussion on the importance of punctuality and the College’s
    expectations-
    lateness is not acceptable, explanation of the late slips</br>

    20    Complaints procedure</br>

    21    The importance of  appropriate additional learning support if learners
    have a disability, learning difficulty or medical condition</br>

    22    The importance of arrangements for Functional Skills.</br>

    23    Setting student placement opportunities/work experience</br>

    24         Dates for Open Days, Parents/Careers Evenings</br>

    25         Disciplinary Procedure</br>

    26         Diversity and Equality of opportunity and the Race Relations
    Act</br>

    27        Logging into Moodle and commencement of the PLP</br>

    28        Receipt of a Course Handbook</br>

    29        Smoking area</br>

    30        Awareness of the Student Code of Conduct</br>

    31        Campus rules and regulations – signed copy to tutor</br>

<?php

if ($campus == 'Medway') {
    ?>

</p>Dear Student</p>

I hope your programme has got off to a good start and that you are feeling more at ease in your new surroundings. We would like your help in looking after the new campus by following some basic rules and reporting thoughtless behaviour that could spoil the facilities for you and others. The rules listed below are there for the security and comfort of all campus users. Please read them carefully, then click the green tick on the main PLP page.
Thank you. We wish you every success on your course.</p>

<b>Medway Student Rules</b></p>

1. Respect – all members of the College Community and the College environment at all times. Do not damage furniture/fittings or put feet on chairs etc.</p>
2. No activity of a criminal nature is permitted. This includes drugs, theft, and damage.</p>
3. Smoking is permitted only in the designated smoking area(s). The correct bins are to be used for cigarette stubs.</p>
4. Alcohol and chewing gum are not permitted on site.</p>
5. ID Cards are to be worn at all times.</p>
6. Visitors - only MidKent Students, Staff or authorised visitors are to be invited onto site.</p>
7. Lifts may only be used by students who have obtained a valid lift pass; these are available from reception. Unauthorised use of lifts will be challenged.</p>
8. Litter must be placed in the correct bins.</p>
9. Café and Bistro tables must be cleared by diners/users.</p>
10. The Social Zones – Respect for the facilities, furniture and each other. No public displays of affection (PDAs) as it offends and alienates others.</p>
11. Classrooms - Students are only permitted to enter classrooms/vocational areas when accompanied by a member of staff or if they have been given permission to/officially booked the space.</p>
12. Parking - there is no parking outside the College on the main road, access road to Brompton Barracks or in any residents’ parking bay.</p>
13. No waiting is allowed in the drop-off zones outside the campus to keep the traffic flowing. The car park barrier is raised at 4.00pm daily and can be used for waiting.</p>
14. Course/department rules, for example on meeting course deadlines, health and safety etc, must be followed at all times.</p>
15. Attendance – must be at least 90% in the first five weeks of your course and thereafter if you are to keep your place at College.</p>
16. Finally, please help us to be a good neighbour by behaving appropriately on your way to and from College and in the roads around the Campus and not dropping litter.</p>

<b>Sue McLeod</b><br/>
Vice Principal

        <?php

} elseif ($campus == 'Maidstone') {
    ?>
</p>Dear Student</p>
I hope your programme has got off to a good start and that you are feeling more at ease in your new surroundings. We would like your help in looking after the new campus by following some basic rules and reporting thoughtless behaviour that could spoil the facilities for you and others. The rules listed below are there for the security and comfort of all campus users. Please read them carefully, then click the green tick on the main PLP page.
Thank you. We wish you every success on your course.</p>
<b>Maidstone Student Rules</b></p>

1. Respect – all members of the College Community and the College environment at all times. Do not damage furniture/fittings or put feet on chairs etc.</p>
2. No activity of a criminal nature is permitted. This includes drugs, theft, and damage.</p>
3. Smoking is permitted only in the designated smoking area(s). The correct bins are to be used for cigarette stubs.</p>
4. Alcohol and chewing gum are not permitted on site.</p>
5. ID Cards are to be worn at all times.</p>
6. Visitors - only MidKent Students, Staff or authorised visitors are to be invited onto site.</p>
7. Lifts may only be used by students who have obtained a valid lift pass; these are available from reception. Unauthorised use of lifts will be challenged.</p>
8. Litter must be placed in the correct bins.</p>
9. Refectory tables must be cleared by diners/users.</p>
10. The Social Zone – Respect for the facilities, furniture and each other. No public displays of affection (PDAs) as it offends and alienates others.</p>
11. Classrooms - Students are only permitted to enter classrooms/vocational areas when accompanied by a member of staff or if they have been given permission to/officially booked the space.</p>
12. Parking – for students is in the student car park only and never on the side roads on the Oakwood park campus.</p>
13. Course/department rules, for example on meeting course deadlines, health and safety etc, must be followed at all times.</p>
14. Attendance – must be at least 90% in the first five weeks of your course and thereafter if you are to keep your place at College.</p>
15. Finally, please help us to be a good neighbour by behaving appropriately on your way to and from College and in the roads around the Campus and not dropping litter.</p>
<b>Sue McLeod</b><br/>
Vice Principal

<?php
}

?>

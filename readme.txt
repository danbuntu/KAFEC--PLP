Mid Kent College Moodle PLP - http://www.midkent.ac.uk
Released under the KAFEC banner - http://www.kafec.org.uk/
Based on the Moodle PLP Module by ULCC - https://moodle.ulcc.ac.uk/course/view.php?id=107

This is presented as is but if you ask nicely dan.attwood@midkent.ac.uk might be able to help with specific problems.


Setup
Drop the folder into moodleroot\blocks\templates\custom
Use the SQL files in the SQL folder to setup the needed database tables
Configure the various database connection files
It’s perhaps better not to do this though and instead use the files as a guide

Features
Tabbed system to allow for extra screens to be added
Flightplan graph using jpgraph
Badges system to allow students to be awarded badges
Multiple hooks into the NG MIS system using a soap server (the soap server I use will go up as a separate project ion the new year) 001274917312



Future plans
Tidy up - sorry I've done a first pass but there is still some redundant stuff here
Upgrading to ULCC PLP module version 2 and re-writing of all underlying code to support this.
Possible re-themeing
Consolidation of settings
Ditch use of student learneref (internal number) for moodleid

<?php
			$thumbs = array("0", "directors.jpg", "meps.jpg", "olympicss.jpg", "deanss.jpg", "LSAMPs.jpg", "pulls.jpg", "brave.jpg", "ROP.jpg", "coms.jpg", "PIQEs.jpg", "JAs.jpg");
			
			$titles = array("0", "Director's list", "MESA Participation Award", "MESA Olympics Award", "Dean's List Award", "LSAMP Participation Award", "P.U.L.L. Recongnition Award", "ECV Braves Recognition", "ROP Business and Computers", "ROP Business and Computers Appreciation", "PIQE Recongnition Award", "Junior Achievement");
			
			$des = array("0", "An award given to students who obtain 3.5 or higher GPA in a semester and are members of MEP/MSP.", "An award given to students who have an outstanding participate in the MESA programs.","An award given to students who participate in the MESA Olympics & Robotics Competition.", "An award given to students who obtain 3.5 or higher GPA in a semester.", "An award given to students who participate in the LSAMP program.","An award given  to students who volunteered in the PULL program.", "One of the hardest awards that a student can get at El Cajon Valley High School.", "One of the best business training programs in San Diego.", "A certificate given instead of the Braves recongnition award.", "A certificate given to student who participated in the PIQE.", "A certificate given to student who completed the JA training program.");
			
            echo('<div id="list1"><ul>');
			for($i=1;$i<=6;$i++){
				echo('
		<a href="#" id="'.$i.'"><li id="'.$i.'"><img src="images/'.$thumbs[$i].'"/><p>'.$titles[$i].'<br/><des>'.$des[$i].'</des></p></li></a><br/>');
			}
			echo('<div class="cleaner"></div></ul></div>');
			echo('<div id="list2"><ul>');
			for ($i=7;$i<=11;$i++) {  		
				echo('
		<a href="#" id="'.$i.'"><li id="'.$i.'"><img src="images/'.$thumbs[$i].'"/><p>'.$titles[$i].'<br/><des>'.$des[$i].'</des></p></li></a><br/>');
			};			
			echo('<div class="cleaner"></div></ul></div>');
?>
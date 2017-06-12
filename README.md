# Think-Less-Eat-Better

Created by 

- Michael Giovannoni
- John Konecny
- Rebecca Kuensting
- Evan Matoske
- Phillip Proulx

Requires PHP 5, mySQL, node.js

Setup: 

1. Host files on a server with PHP 5 and mySQL access (project should run on flip without further installation). Project directory structure must be kept in order to ensure that all parts function.
2. Edit config.php so that the DBHOST, DBNAME, DBUSER and DBPASS variables contain the correct values of your database.

Unit tests:

Unit tests can be found in the tests directory or at the linked locations.

1. caloricNeedsGuiTest
	
	http://web.engr.oregonstate.edu/~giovanmi/361/projectB/tests/caloricNeedsGuiTest.html

	This file was created to test the caloric needs GUI before it was integrated into the database. 
	two sets of objects are used in testing. The objects are dummy user profiles, which, from the perspective 
	of the Calorie Needs Algorithm, is composed of a UserStats object and a UserGoals object. A simple array to 
	hold these pairs of dummy user information. Run tests by entering different indices in the Stats input box and different usernames in the User name box. Currently the test has 
	objects stored at index 0 and 1 but the file can be edited to test a greater range of values.

2. User account creation test
	
	http://web.engr.oregonstate.edu/~giovanmi/361/projectB/tests/formTest.html
	
	This test suite was created to test the formvalidate function used in the creation of the account creation user story.
	Can be run in browser of your choice. No dependencies. Navigate to the file in your browser and use the test buttons to automatically fill the form with various values.
	Test 1 should have no alert when submit is pressed, tests 2, 3, and 4 should all produce alerts when submit is pressed.

3. Caloric needs algorithm tests

	http://web.engr.oregonstate.edu/~giovanmi/361/projectB/caloricNeedsGui.php

	These tests are built in to the caloric needs algorithmNavigate to the page, right click, inspect element and view the console. Can be run in the browser of your choice. Requires the caloricNeedsAlgo.js which must be stored in the same directory. No other dependencies.

	Expected output:

		Run all tests:
		caloricNeedsAlgo.js:559 
		Test #1-1:
		caloricNeedsAlgo.js:122 Test succeeded, value under test: 3
		caloricNeedsAlgo.js:562 
		Test #1-2:
		caloricNeedsAlgo.js:122 Test succeeded, value under test: 4
		caloricNeedsAlgo.js:565 
		Test #2-1:
		caloricNeedsAlgo.js:175 Test succeeded, value under test: 1
		caloricNeedsAlgo.js:568 
		Test #2-2:
		caloricNeedsAlgo.js:175 Test succeeded, value under test: 1
		caloricNeedsAlgo.js:571 
		Test #3-1:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:213 Test succeeded
		caloricNeedsAlgo.js:574 
		Test #3-2:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:213 Test succeeded
		caloricNeedsAlgo.js:577 
		Test #4:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:238 Test succeeded
		caloricNeedsAlgo.js:580 
		Test #5-1:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:308 Test succeeded
		caloricNeedsAlgo.js:583 
		Test #5-2:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:308 Test succeeded
		caloricNeedsAlgo.js:586 
		Test #5-3:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:308 Test succeeded
		caloricNeedsAlgo.js:589 
		Test #6:
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:500 Plan
		caloricNeedsAlgo.js:348 Test succeeded
		caloricNeedsAlgo.js:592 end Test.




Note: parts of the code were copied or adapted from a previous project by Michael Giovannoni. 
This includes the CSS contained in /css/stylesheet.css, the navigation bar, and some back end PHP work. 
Per the instructors comment, the user story effort estimates took this into consideration. This code was used in the implementation of the user account story and no other user stories. 
In addition, bootstrap was used to style the signup page. 
<!DOCTYPE html>
<html>
<head>
    <title>Use properties to set up your survey for plaform jQuery, SurveyJS Library Example</title>
     <script type="text/javascript" language="javascript" src="assets/js/jquery.js"></script>
    <script src="assets/js/survey.jquery.js"></script>
    <link rel="stylesheet" href="./assets/css/surveyform.css">

</head>
<body>
    <div id="surveyElement">
</div>
<div id="surveyResult"></div>


</body>
</html>
<?php 

// $json = $_REQUEST['result'];
// $book = json_decode($json);
// // access name of $survey object
// echo $survey->name; // JavaScript: value

?>
<script>

Survey.Survey.cssType = "bootstrap";
Survey.defaultBootstrapCss.navigationButton = "btn btn-green";

window.survey = new Survey.Model({
 pages: [
  // {
  //  elements: [
  //   {
  //    type: "text",
  //    isRequired: true,
  //    name: "Name",
  //    title: "Name :"}
  //   ,
  //   {
  //    type: "text",
  //    isRequired: true,
  //    name: "P_Address",
  //    title: "Permanent Address  :"
  //   },
  //   {
  //    type: "text",
  //    isRequired: true,
  //    name: "Email",
  //    title: "E-mail Address  :"
  //   },
  //   {
  //    type: "text",
  //    isRequired: true,
  //    name: "Telephone",
  //    title: "Telephone or Contact Number :"
  //   },
  //   {
  //    type: "text",
  //    isRequired: true,
  //    name: "Mobile",
  //    title: "Mobile Number  :"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "Single",
  //     "Married",
  //     "Divorced",
  //     "Married but not living",
  //     "widowed"
  //    ],
  //    colCount: 3,
  //    isRequired: true,
  //    name: "CivilStatus",
  //    title: "Civil Status :"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "Male",
  //     "Female"
  //    ],
  //    isRequired: true,
  //    name: "Gender",
  //    title: "Gender :"
  //   },
  //   {
  //    type: "text",
  //    inputType: "date",
  //    isRequired: true,
  //    name: "Birthday",
  //    title: "Birthday :"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "Region 1",
  //     "Region 2",
  //     "Region 3",
  //     "Region 4",
  //     "Region 5",
  //     "Region 6",
  //     "Region 7",
  //     "Region 8",
  //     "Region 9",
  //     "Region 10",
  //     "Region 11",
  //     "Region 12",
  //     "NCR",
  //     "CAR",
  //     "ARMM",
  //     "CARAGA"
  //    ],
  //    colCount: 4,
  //    isRequired: true,
  //    name: "Region_of_Origin",
  //    title: "Region of Origin"
  //   },
  //   {
  //    type: "text",
  //    name: "Province",
  //    title: "Province  :"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "City",
  //     "Municipality"
  //    ],
  //    isRequired: true,
  //    name: "Location_of_Residence",
  //    title: "Location of Residence :"
  //   }
  //  ],
  //  name: "page1",
  //  title: "A. GENERAL INFORMATION"
  // }
  // ,
  {
   elements: [
    {
     type: "matrixdynamic",
     choices: [
      1,
      2,
      3,
      4,
      5
     ],
     columns: [
      {
       name: "Degree_Specialization",
       title: "Degree(s) & Specialization",
       cellType: "text"
      },
      {
       name: "College_or_University",
       title: "College or University",
       cellType: "text"
      },
      {
       name: "Year_Graduate",
       title: "Year Graduate",
       cellType: "text"
      },
      {
       name: "Honors_Awards_Received",
       title: "Honor (s) Awards (s) Received",
       cellType: "text"
      }
     ],
     name: "Educ_Dec_only",
      title: "Educational Attainment (Baccalaureate Degree Only)"
    },
    {
     type: "html",
     html: "<ul>\n<li>Degree means Program of Study or Program of Discipline, example BS in Teacher Education.</li>\n<li>Specialization means major field of study, example Mathematics.</li>\n<li>Honors or Awards means academic awards received in college or while earning the degree.</li>\n\n</ul>",
     name: "question1"
    },
    // {
    //  type: "matrixdynamic",
    //  choices: [
    //   1,
    //   2,
    //   3,
    //   4,
    //   5
    //  ],
    //  columns: [
    //   {
    //    name: "Name_of_Examination",
    //    title: "Name of Examination",
    //    cellType: "text"
    //   },
    //   {
    //    name: "Date_Taken",
    //    title: "Date Taken",
    //    cellType: "text"
    //   },
    //   {
    //    name: "Rating",
    //    title: "Rating",
    //    cellType: "text"
    //   }
    //  ],
    //  name: "Professional examination (s) Passed"
    // },
    // {
    //  type: "matrix",
    //  columns: [
    //   "Undergraduate/AB/BS ",
    //   "Graduate/MS/MA/Ph.D."
    //  ],
    //  name: "Reason (s) for taking the course (s) or pursuing degree (s).  You may check (/) more than one answer.",
    //  rows: [
    //   "High Grades in the course or subject area (s) related to the course",
    //   "Good grades in high school",
    //   "Influence of parents or relatives",
    //   "Peer Influence",
    //   "Inspired by a role model",
    //   "Strong passion for the profession",
    //   "Prospect for immediate employment",
    //   "Status or prestige of the profession",
    //   "Availability  of course offering in chosen institution",
    //   "Prospect of career advancement",
    //   "Affordable for the family",
    //   "Prospect of attractive compensation",
    //   "Opportunity for employment abroad",
    //   "No particular choice or no better idea"
    //  ]
    // }
   ],
   name: "page2",
   title: "B. EDUCATIONAL BACKGROUND"
  },
  // {
  //  elements: [
  //   {
  //    type: "matrixdynamic",
  //    choices: [
  //     "1",
  //     "2",
  //     "3",
  //     "4",
  //     "5"
  //    ],
  //    columns: [
  //     {
  //      name: "c1",
  //      title: "Title of Training or Advance Study",
  //      cellType: "text"
  //     },
  //     {
  //      name: "c2",
  //      title: "Duration & Credits Earned",
  //      cellType: "text"
  //     },
  //     {
  //      name: "c3",
  //      title: "Name of Training Institution/College/ University",
  //      cellType: "text"
  //     }
  //    ],
  //    name: "Please list down all professional or work-related training program (s) including advance studies you have attended after college.  You may use extra sheet if needed"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "For promotion",
  //     "For professional development"
  //    ],
  //    hasOther: true,
  //    name: "What made you pursue advance studies?"
  //   }
  //  ],
  //  name: "page3",
  //  title: "C. TRAINING (S) ADVNCE STUDIES ATTENDED AFTER COLLEGE"
  // },
  // {
  //  elements: [
  //   {
  //    type: "html",
  //    html: "<p>(Employment here means any type of work performed or services rendered in exchanged for compensation under a contact of hire which create the employer and employee relations)</p>",
  //    name: "question2"
  //   },
  //   {
  //    type: "html",
  //    html: "If NO or NEVER BEEN EMPLOYED,  proceed to Questions 17.<br>\nIf YES, proceed to Questions 18 to 22.\n",
  //    name: "question3"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "Yes ",
  //     "No",
  //     "Never Employed"
  //    ],
  //    colCount: 3,
  //    name: "Are you presently employed?"
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "Advance or further study",
  //     "Family concern and decided not to find a job",
  //     "Health-related reason (s)",
  //     "Lack of work experience",
  //     "No job opportunity",
  //     "Did not look for a job"
  //    ],
  //    hasOther: true,
  //    name: "Please state reason (s) why you are not yet employed.  You may check (/) more than one answer."
  //   },
  //   {
  //    type: "radiogroup",
  //    choices: [
  //     "Regular or Permanent                     ",
  //     "Contractual",
  //     "Temporary",
  //     "Self- employed",
  //     "Casual"
  //    ],
  //    colCount: 2,
  //    name: "Present Employment Status"
  //   },
    // {
    //  type: "html",
    //  html: "( Use the following Phil. Standard Occupational Classification (PSOC), 1992 classification)",
    //  name: "question5"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Officials of Government and Special-Interest Organizations, Corporate Executives, Managers, Managing Proprietors and Supervisors.",
    //   "Professionals",
    //   "Technicians and Associate Professionals",
    //   "Clerks",
    //   "Service workers and Shop and Market Sales Workers",
    //   "Farmers, Forestry Workers and Fishermen",
    //   "Trades and Related Workers",
    //   "Plant and machine Operators and Assemblers",
    //   "Laborers and Unskilled Workers",
    //   "Special Occupation"
    //  ],
    //  name: "Present occupation  "
    // },
    // {
    //  type: "text",
    //  name: "Name of Company or Organization including address"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Agriculture, Hunting and Forestry",
    //   "Fishing",
    //   "Mining and Quarrying",
    //   "Manufacturing",
    //   "Electricity, Gas and Water Supply",
    //   "Construction",
    //   "Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and  household goods",
    //   "Hotels and Restaurants",
    //   "Transport Storage and Communication",
    //   "Financial Intermediation",
    //   "Real State, Renting and Business Activities",
    //   "Public Administration and Defense; Compulsory Social Security.",
    //   "Education",
    //   "Health and Social Work",
    //   "Other community, Social and Personal Service Activities",
    //   "Private Households with Employed Persons",
    //   "Extra-territorial Organizations and Bodies"
    //  ],
    //  name: "Major line of business of the company you are  presently employed in.  Please check one only."
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Local",
    //   "Abroad"
    //  ],
    //  name: "Place of Work"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Yes",
    //   "No"
    //  ],
    //  name: "Is this your first job after college"
    // },
    // {
    //  type: "html",
    //  html: "If NO, proceed to Questions 26 and 27.",
    //  name: "question6"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Salaries and benefits",
    //   "Career challenge",
    //   "Related to special skill",
    //   "Related to course or program of study",
    //   "Proximity to residence",
    //   "Peer influence",
    //   "Family influence"
    //  ],
    //  hasOther: true,
    //  name: "What are the reason (s) for staying on the job? You may check (/) more than one answer."
    // },
    // {
    //  type: "html",
    //  html: "If NO, proceed to Question 26.",
    //  name: "question8"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Salaries and benefits",
    //   "Career challenge",
    //   "Related to special skills",
    //   "Proximity to residence"
    //  ],
    //  hasOther: true,
    //  name: "What were your reasons for accepting the job?  You may check (/) more than one answer."
    // },
    // {
    //  type: "checkbox",
    //  choices: [
    //   "Salaries and benefits",
    //   "Career challenge",
    //   "Related to special skills",
    //   "Proximity to residence"
    //  ],
    //  hasOther: true,
    //  name: "What were your reason (s) for changing job? You may check (/) more than one answer."
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Less than a month               ",
    //   "1 year to less than 2 years",
    //   "1 to 6 months                        ",
    //   "2 years to less than 3 years",
    //   "7 to 11 months                      ",
    //   "3 years to less than 4 years"
    //  ],
    //  colCount: "2",
    //  name: "How long did you stay in your first job?"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Response to an advertisement",
    //   "As walk-in applicant",
    //   "Recommended by someone",
    //   "Information from friends",
    //   "Arranged by school’s job placement officer",
    //   "Family business",
    //   "Job Fair or Public Employment Service Office (PESO)"
    //  ],
    //  hasOther: true,
    //  name: "How did you find your first job?"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Less than a month               ",
    //   "1 year to less than 2 years",
    //   "1 to 6 months                        ",
    //   "2 years to less than 3 years",
    //   "7 to 11 months                      ",
    //   "3 years to less than 4 years"
    //  ],
    //  colCount: "2",
    //  hasOther: true,
    //  name: "How long did it take you to land your first job?"
    // },
    // {
    //  type: "matrix",
    //  columns: [
    //   "First Job",
    //   "Current or Present Job"
    //  ],
    //  name: "Job Level Position",
    //  rows: [
    //   "Rank or Clerical",
    //   "Professional, Technical or Supervisory",
    //   "Managerial or Executive",
    //   "Self-employed\t"
    //  ]
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Below P 5,000.00",
    //   "P 15,000.00 to less than P 20,000.00",
    //   "P 5,000.00 to less than P 10,000.00    ",
    //   "P 20,000.00 to less than P 25,000.00",
    //   "P 10,000.00 to less than P 15,000.00  ",
    //   "P 25,000.00  and above"
    //  ],
    //  colCount: "2",
    //  name: "What is your  initial gross monthly earning  in your  first job after college?"
    // },
    // {
    //  type: "radiogroup",
    //  choices: [
    //   "Yes\t",
    //   "No"
    //  ],
    //  name: "Was the curriculum you had in college relevant to your first job?"
    // },
    // {
    //  type: "checkbox",
    //  choices: [
    //   "Communication skills",
    //   "Human Relations skills",
    //   "Entrepreneurial skills",
    //   "Problem-solving skills",
    //   "Critical Thinking skills"
    //  ],
    //  name: "If YES, what competencies learned in college did you find very useful in your first job?  You may check (/) more than one answer."
    // },
    // {
    //  type: "comment",
    //  name: "List down suggestions to further improve your course curriculum",
    //  placeHolder: "Suggestion",
    //  title: "suggestionbox"
    // },
    // {
    //  type: "html",
    //  html: "<p class=\"text-center\"><b><i>Thank  you  for taking time out to fill out this questionnaire.</i></b></p>",
    //  name: "question7"
    // }
   // ],
  //  name: "page4",
  //  title: "D. EMPLOYMENT DATA"
  // }
 ],
 title: "GRADUATE TRACER SURVEY (GTS)"
});
survey.onComplete.add(function(result) {
    document.querySelector('#surveyResult').innerHTML = "result: " + JSON.stringify(result.data);

    // window.location.assign("http://localhost/Tracer_UI/survey.php?result="+JSON.stringify(result.data));
    window.location.assign("action/surveyresult.php?result="+JSON.stringify(result.data));

});

survey.showProgressBar = 'bottom';

$("#surveyElement").Survey({ 
    model: survey 
});
</script>

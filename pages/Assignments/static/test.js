questions=[];
var ajax=new XMLHttpRequest();
var method='GET';
var url='data.php';
var asynchronus=true;
ajax.open(method,url,asynchronus);
ajax.send();
ajax.onreadystatechange=function()
{
    if(this.readyState==4 && this.status==200)
    {
        var data=JSON.parse(this.responseText);
          
        for(let i=0;i<data.length;i++)
        {
            console.log(data[i]);
            createQuestions(
            {question_no:(i+1),
            question:data[i].question,
            options:[data[i].option1, data[i].option2, data[i].option3, data[i].option4],
            key:data[i].answer
            }
            );
        }
    }
}


//document on ready
$(document).ready(function(){
    console.log("ready")
    $("#instruction").modal({
            backdrop: 'static',
            keyboard: false
        }); // instructions
});

//keys disable function
$(document).keydown(function(e){
    if(e.ctrlKey==true || e.altKey==true ||e.keyCode==13)
    {
        e.preventDefault();
    }
    if(e.key=="F12" || e.key=="Control" || e.key=="Alt" || e.key=="Meta" || e.key=='F11'||e.key=="Escape"){
        e.preventDefault();
    }
});

$(document).bind("contextmenu cut copy paste",function(e){
    e.preventDefault();
})


//timer
$("#start").click(function (){

    var vis=document.getElementById('taketest');
    vis.setAttribute("class","visible container-fluid flex-columns");
    
    var timer=new Date().getTime() + 900000;

    var ct=setInterval(function(){

    var now=new Date().getTime();

    var timeleft=timer-now;

    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
    document.getElementById("counter").innerHTML= "Time left :- " +minutes +":"+ seconds;

    if(timeleft<0){
        clearInterval(ct);
        if(isModalVisible('result')){
            submit(1);
        }
    }
},1000)
})

//checking the result is shown or not
const isModalVisible = (id)=>{
       const modal = document.getElementById(id);
        return modal !== null && window.getComputedStyle(modal).display === "none";
}




//assignment questions
/*questions =[
    {
        "question_no": 1,
        "question": "The minimum velocity that has to be achieved by an object, to escape the gravitational sphere of influence of the celestial body is known as ",
        "options": ["Maximum velocity",
        "Minimum velocity",
        "Escape velocity",
        "none of the option"],
        "key" : "Escape velocity"
    },
    {
        "question_no": 2,
        "question": "The escape velocity from earth is 11 km/sec. The escape velocity from a planet having twice the radius and the same mean density as that of the earth is?",
        "options": ["11","22","3√3", "40√3"],
        "key":"22"

    },
    {
        "question_no": 3,
        "question": "A black hole isan object whose gravitational field is so strong that even light cannot escape from it. To what approximately radius would earth (mass=5.98 X10^24kg) have to be compressed to be a black hole?",
        "options": ["10^-9 m","10^-6 m","100m", "10^-2 m"],
        "key" : "10^-2 m"
    },
    {
        "question_no": 4,
        "question": "Universal gravitational constant is denoted by",
        "options": ["N",
        "G",
        "M",
        "C"],
        "key" : "G"
    },
    {
        "question_no": 5,
        "question": "Escape velocity of the moon is",
        "options": ["2.38 km/s","618 km/s","11.2 km/s", "59.5 km/s"],
        "key":"2.38 km/s"

    },
    {
        "question_no": 6,
        "question": "What causes the ball to fall back on ground when thrown up into the air",
        "options": ["Atmosphere","Gravity","Weight", "None"],
        "key" : "Gravity"
    },
    {
        "question_no": 7,
        "question": "What is the scientific name of a butterfly?",
        "options": [
        "Apis",
        "Coleoptera",
        "Formicidae",
        "Rhopalocera"
        ],
        "key": "Rhopalocera"
        },
        {
        "question_no": 8,
        "question": "How hot is the surface of the sun?",
        "options": [
        "1,233 K",
        "5,778 K",
        "12,130 K",
        "101,300 K"
        ],
        "key": "5,778 K"
        },
        {
            "question_no": 9,
        "question": "Who are the actors in The Internship?",
        "options": [
        "Ben Stiller, Jonah Hill",
        "Courteney Cox, Matt LeBlanc",
        "Kaley Cuoco, Jim Parsons",
        "Vince Vaughn, Owen Wilson"
        ],
        "key": "Vince Vaughn, Owen Wilson"
        },
        {
            "question_no": 10,
        "question": "What is the capital of Spain?",
        "options": [
        "Berlin",
        "Buenos Aires",
        "Madrid",
        "San Juan"
        ],
        "key": "Madrid"
        },
        {
            "question_no": 11,
        "question": "What are the school colors of the University of Texas at Austin?",
        "options": [
        "Black, Red",
        "Blue, Orange",
        "White, Burnt Orange",
        "White, Old gold, Gold"
        ],
        "key": "White, Burnt Orange"
        },
        {
            "question_no": 12,
        "question": "What is 70 degrees Fahrenheit in Celsius?",
        "options": [
        "18.8889",
        "20",
        "21.1111",
        "158"
        ],
        "key": "21.1111"
        },
        {
            "question_no": 13,
        "question": "When was Mahatma Gandhi born?",
        "options": [
        "October 2, 1869",
        "December 15, 1872",
        "July 18, 1918",
        "January 15, 1929"
        ],
        "key": "October 2, 1869"
        },
        {
            "question_no": 14,
        "question": "How far is the moon from Earth?",
        "options": [
        "7,918 miles (12,742 km)",
        "86,881 miles (139,822 km)",
        "238,400 miles (384,400 km)",
        "35,980,000 miles (57,910,000 km)"
        ],
        "key": "86,881 miles (139,822 km)"
        },
        {"question_no": 15,
        "question": "What is 65 times 52?",
        "options": [
        "117",
        "3120",
        "3380",
        "3520"
        ],
        "key": "3380"
        },
        {"question_no": 16,
        "question": "How tall is Mount Everest?",
        "options": [
        "6,683 ft (2,037 m)",
        "7,918 ft (2,413 m)",
        "19,341 ft (5,895 m)",
        "29,029 ft (8,847 m)"
        ],
        "key": "29,029 ft (8,847 m)"
        },
        {
            "question_no": 17,
        "question": "When did The Avengers come out?",
        "options": [
        "May 2, 2008",
        "May 4, 2012",
        "May 3, 2013",
        "April 4, 2014"
        ],
        "key": "May 4, 2012"
        },
        {
            "question_no": 18,
        "question": "What is 48,879 in hexidecimal?",
        "options": [
        "0x18C1",
        "0xBEEF",
        "0xDEAD",
        "0x12D591"
        ],
        "key": "0xBEEF"
        }
]*/

//global things
var appe=document.getElementById("test");
var count=0;

var ele=document.documentElement;

//fullscreen
function openFullscreen() {

    if (ele.requestFullscreen) {
      ele.requestFullscreen();
    } else if (ele.webkitRequestFullscreen) { /* Safari */
      ele.webkitRequestFullscreen();
    } else if (ele.msRequestFullscreen) { /* IE11 */
      ele.msRequestFullscreen();
    }

    //making content cisible on fullscreen
    var vis=document.getElementById('taketest');
    vis.setAttribute("class","visible container-fluid flex-columns");
  }

 
//questions set
let i=0;
function createQuestions(questionOb){
    questions.push(questionOb);
    console.log(questionOb);
    var div = document.createElement("div");
    div.setAttribute("class","card bg-dark p-4 mx-5 h4 question"+i);
    var opdiv=document.createElement("div");
    opdiv.setAttribute("class","d-flex flex-column p-5 h5")

    var ques=document.createTextNode(questionOb.question);
    var no=document.createTextNode(questionOb.question_no+" . ");
    
    for(let j=0;j<questionOb.options.length;j++)
    {
        var divop=document.createElement("div");
        divop.setAttribute("class"," p-2 mx-5")
        var rad=document.createElement("input");
        rad.setAttribute("class","form-check-input op"+i);
        rad.setAttribute("type","radio");
        rad.setAttribute("name","question"+i);
        rad.setAttribute("value",questionOb.options[j]);
        rad.setAttribute("id",questionOb.options[j]);
        var ops=document.createTextNode(questionOb.options[j]);
        divop.appendChild(rad);
        divop.appendChild(ops);
    
        opdiv.appendChild(divop);
    }
    div.appendChild(no);
    div.appendChild(ques);
    div.appendChild(opdiv);
    appe.appendChild(div);
    i++;
}

//user mistake
$(".warn").click(function(){
submit(0);
})

//confirmation
$("#subtest").click(function(){
   display(0);
   $("#confirm").modal({
    backdrop:'static',
    keyboard: false,

});
})

//recheck
$(".recheck").click(function(){
    document.getElementById("testcon").innerText="";
 })

//display
function display(a){
   
    if(a==1){
        console.log("display "+a);
        testr();

    }
    if(a==0)
    {
    console.log("display "+a);
    testc();
    }
}

function testr(){
    for(let i=0;i<questions.length;i++){
        var temp=document.getElementsByName("question"+i);
        var c=0;
        for(let j=0;j<questions[i].options.length;j++){
            if(temp[j].checked){
                if(questions[i].key==questions[i].options[j]){
                    console.log('correct');
                    resul(questions[i].question_no,"✔","testres");
                    count++;
                }
                else{
                    resul(questions[i].question_no,"✘","testres");
                    console.log('incorrect');
                }
            }
            else{
               c++;
            }
        }
        if(c ==4){
            resul(questions[i].question_no,"✐","testres");
        }
    }
}

function testc(){
        for(let i=0;i<questions.length;i++){
            var temp=document.getElementsByName("question"+i);
            var c=0;
            for(let j=0;j<questions[i].options.length;j++){
                if(temp[j].checked){
                    
                        resul(questions[i].question_no,"Answered","testcon");
                   
                }
                else{
                   c++;
                }
            }
            if(c ==4){
                resul(questions[i].question_no,"Not answered","testcon");
            }
    }
}

//answers checking and submit
function submit(e){
    display(1);
    if(e==0){
        count=0;
        console.log("Your total score is "+ count +" and you kicked out of the examination");
        document.getElementById("score").innerHTML="Score :-" + count +" out of " + questions.length +" <b class='text-danger'> as you did restricted task your score is set to '0'</b>";
    }
    else if(e==1){
        console.log("Your total score is "+ count +"Time's UP ");
        document.getElementById("score").innerHTML="Score :-" + count +" out of " + questions.length + "<b class='text-warning'> Time's UP </b>" ;

    }
    else{
        console.log("Your total score is "+ count );
        document.getElementById("score").innerHTML="Score :-" + count +" out of " + questions.length ;

    }
    $("#result").modal({
        backdrop:'static',
        keyboard: false,

    });
  
}

//result 
function resul(e,f,id){
    var ele=document.getElementById(id);
    var rdiv=document.createElement("div");
    rdiv.setAttribute("class","row  d-flex justify-content-around")
    var div=document.createElement("div");
    div.setAttribute("class","col" );

    var ans=document.createElement("div");
    if(f=='✘' || f== "Not answered"){ ans.setAttribute("class","col text-danger")}
    else{ans.setAttribute("class","col text-success")}
    var temp = document.createTextNode(e);
    var temp1 = document.createTextNode(f);
    div.appendChild(temp);
    ans.appendChild(temp1);
    rdiv.appendChild(div);
    rdiv.appendChild(ans);
    ele.appendChild(rdiv);
}


//warnings
function warnings(){
    $("#warning").modal({
        backdrop: 'static',
        keyboard: false
    });
}
//set test invisible on warning
$('#warning').on('shown.bs.modal', function () {
    
    var vis=document.getElementById('taketest');
    vis.setAttribute("class","invisible container-fluid flex-columns");
  });



//tab change warning
document.addEventListener("visibilitychange", () => {
    warnings();
});
//screen change warning
document.onfullscreenchange = function ( event ) 
{
    var full_screen_element = document.fullscreenElement;
     // If no element is in full-screen
     
    if(full_screen_element !== null)
	    console.log('FullScreen mode is activated');
    else
       warnings();
	    console.log('FullScreen mode is not activated');  
  }


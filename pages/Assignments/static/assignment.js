
var ajax=new XMLHttpRequest();
var method='GET';
var url='getassign.php';
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
            appendtest({
                subject:data[i].as_name,
                as_id:data[i].as_id,
                link:'tests/mathtest.html'
            });
            
        }

    }
}

// var tests =[
//     {
//         "subject":"Maths",
//         "type":"MCQ's",
//         "link":"tests/mathtest.html"
//     },
//     {
//         "subject":"Physics",
        
//         "type":"MCQ's",
//         "link":"tests/mathtest.html"
//     },
//     {
//         "subject":"Chemistry",
        
//         "type":"MCQ's",
//         "link":"tests/mathtest.html"
//     },
//     {
//         "subject":"Telugu",
        
//         "type":"MCQ's",
//         "link":"tests/mathtest.html"
//     },
//     {
//         "subject":"English",
        
//         "type":"MCQ's",
//         "link":"tests/mathtest.html"
//     },
//     {
//         "subject":"IT",
        
//         "type":"MCQ's",
//         "link":"tests/mathtest.html"
//     }
// ]

   
function appendtest(tests)
{
        var div=document.createElement("div");
        var sub = document.createElement("h1");
        var asno = document.createElement("div");
        let inputfiled=document.createElement("input");
        inputfiled.type='hidden';
        inputfiled.value=tests.as_id;
        inputfiled.name='testName';
        sub.setAttribute("class","subject p-1 ");
        asno.setAttribute("class","assno p-1");
        div.setAttribute("class","card  p-3 bg-dark")
        var butto=document.createElement("button");
        butto.setAttribute("type","submit");
        butto.setAttribute("href",tests.link);
        butto.setAttribute("name",tests.subject);
        butto.setAttribute("class"," taketest btn btn-outline-primary p-2");
        var take=document.createTextNode("Take test");
        butto.appendChild(take);
        

        let subject=document.createTextNode(tests.subject);
        

        sub.appendChild(subject);
        sub.appendChild(inputfiled);

        div.appendChild(sub);
        div.appendChild(asno);
        div.appendChild(butto);

        var ass=document.getElementById("assigned");
        ass.appendChild(div);
    
}
console.log(tests[0]);
    for(let i=0;i<tests.length;i++){
        
        
        
    }

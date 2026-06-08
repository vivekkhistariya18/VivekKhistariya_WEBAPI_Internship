<!DOCTYPE html>
<html>
<head>
    <title>Internship Search</title>

<style>

body{
    font-family: Arial;
    margin: 40px;
}

h2{
    color:black;
}

#search{
    width:300px;
    padding:10px;
}

#result{
    width:600px;
    margin-top:10px;
}

.item{
    padding:8px;
    border:1px black;
   
}

table{
    
    width:600px;
    margin-top:15px;
}

th,td{
    border:1px solid black;
    padding:8px;
    text-align:center;
}

th{
    background:gray;
}

</style>

<script>

function getSuggestion(str)
{ 
      if(str.length == 0)
    {
        document.getElementById("result").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET","searching.php?q="+str+"&type=suggest",true);
    xhr.send();
}

function loadByMode()
{
    var mode = document.getElementById("mode").value;

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET","searching.php?mode="+mode+"&type=mode",true);
    xhr.send();
}

function selectStudent(name)
{
    document.getElementById("search").value = name;
    document.getElementById("result").innerHTML = "";
}

</script>

</head>

<body>

<h2>Internship Search System</h2>


<select id="mode" onchange="loadByMode()">
    <option value="">Select Mode</option>
    <option value="Online">Online</option>
    <option value="Onsite">Onsite</option>
    <option value="Hybrid">Hybrid</option>
</select>

<div id="result"></div>

</body>
</html>
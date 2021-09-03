<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="csrf-token" content="{{csrf_token()}}">

<script> fetch('api/v1/cars') .then(function(response) {response.json().then(function(data) {var str=JSON.stringify(data.cars); document.getElementById('response').innerHTML=str;});}) .catch(function(err) {console.log('Error: ' + err);});</script>


</head>

<body>

<div id="response"> API response here</div><script> fetch('api/v1/cars') .then(function(response) {response.text().then(function(data) {document.getElementById('response').innerHTML=data;});}) .catch(function(err) {console.log('Error: ' + err);});</script>

</body>
</html>


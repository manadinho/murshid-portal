<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #fff;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #be1109;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #be1150;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.header{
color: light-blue;
font-family: verdana;
pedding: 10px;
margin: 10px;
text-align: center;
}
</style>
</head>
<body>
    
    <div class="container">
  <form class="contact-form" method="POST" action="/create-project" enctype="multipart/form-data">
   @csrf
   <h1 class="header">Create Project</h1>
    <label for="name">Project Name</label>
    <input type="text" id="name" name="name" placeholder="Project name..">
  
    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>
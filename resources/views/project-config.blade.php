<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <style>
     body{
    background-color: #d6d6d6;
    }
    .header{
    background-color: #919191;
    border: 1px solid #555;
    border-radiud: 5px;
    padding: 24px 36px;}

    .input-text{
    color: grey;
    width: 50%;
    padding: 9px 6px;
    border: 1px solid #3d3d3d;
    border-radius: 5px;
    }
    .api-label{
    color: white;
    font-size: 28px;
    font-family: sans-serif;
    padding-right: 10px;
    font-weight: bold;
    text-align: center;
    }
    .generate{
    background-color: #ffe;
    padding: 5px 10px;
    border: 1px solid black;
    border-radius: 6px;
    cursor: pointer;
    margin: 10px;
    }
    .main-content{
    background-color: #999;
    padding: 10px 20px;
    text-align: center;
    }
    .name-label{
    font-family: sans-serif;
    font-size: 15px;
    font-weight: bold;
    position: absolute;
    left: 10%;
    }
    .name-input{
    position: absolute;
    left: 15%;
    }
    .main-auth{
    background-color: #919191;
    }
    .auth-section{
    
    }
    .storage{
    display: inline;
    }
    .add-btn{
    color: grey;
    padding: 4px 8px;
    }
    </style>
</head>
<body>
<div class="header">
<div class="api-form">
<label class="api-label" for="api-key">Get API Key</label>
<input type="text" id="api-key" class="input-text" name="apikey" placeholder="Generate Api Keys...">
<button type="button" class="generate">Generate</button>
<button type="button" class="generate">Copy</button>
</div>
</div>
<div>&nbsp</div>
<div class="main-content">
    <div class="name-field">
        <label for="name" class= "name-label">Name:</label>
        <input type="text" id=""name name="pname" class="name-input">
        <label for="color" class= "color-label">Color:</label>
        <input type="color" id="color" name="color">
    </div>
</div>
<div>&nbsp</div>
 <div class="main-auth">
    <div class="auth-section">
    <h2 >Auth:</h2>
    </div>
    <div class="storage">
    <h2>Local Storage</h2>
    <button type="button" class="add-btn">+</button>
    </div>
</div>

</body>
</html>
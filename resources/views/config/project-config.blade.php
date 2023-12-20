<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <style>
    .header{
    background-color: #eee;
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
    color: black;
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
    background-color: #eee;
    border: 1px solid #555;
    border-radiud: 5px;
    padding: 20px;
    text-align: center;
    }
    .name-label{
    font-family: sans-serif;
    font-size: 18px;
    font-weight: bold;
    position: absolute;
    left: 10%;
    padding-top:4px;
    }
    .color-label{
    font-family: sans-serif;
    font-size: 18px;
    font-weight: bold;
    }
    .name-input{
    position: absolute;
    left: 15%;
    padding: 6px 2px;
    border: 1px solid #3d3d3d;
    border-radius: 5px;
    }
    .main-auth{
    background-color: #eee;
    border: 1px solid #555;
    border-radiud: 5px;
    height: 300px;
    }
    .auth-section{
    padding: 12px 24px;
    }
    .storage {
            display: flex;
            align-items: center;
            justify-content: left;
            padding: 5px;
            margin-left: 10px;
        }
        .add-btn{
        padding: 5px 10px;
        margin:5px;
        }
        .btn-submit{
        padding: 5px 10px;
        margin:5px;
        color: blue;
        position: absolute;
        right: 30%;
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
            <h2>Auth:</h2>
        </div>
        <div class="storage" id="storage-container">
            <h2>Local Storage</h2>
            <button type="button" class="add-btn">+</button>
        </div>
        <div class="btn-submit">
        <button type="submit" class="generate">Submit</button>
        </div>       
</div>

</body>
</html>